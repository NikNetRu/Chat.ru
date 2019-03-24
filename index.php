<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <link href="CSS/styles.css" rel="stylesheet"> 
        <link src="Scripts/controller.js">
        <title> </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="Scripts/login.js"></script>
        <script charset="utf-8">                
            
            
            
            
            
             /*--------------------------------------------------- */
             
           $(document).ready (function ()     // JQuerry для всего документа
            {
             
             setInterval (function ()      // Периодически скроллит вниз
             {              
                var block = document.getElementById("messanger");
                block.scrollTop = block.scrollHeight; 
             }, 1000); 
             
             
             setInterval (function ()      // Периодически (60 сек) обновляет данные о том, что пользователь онлайн, через БД
             {              
                updateThisUserOnline ();
             }, 60000); 
             
            
             setInterval (function ()      // Инициализирует функцию обновления файла содержащего онлайн пользователей, в будущем идеально переписать скрипт на демона
             {   whoOnline ();           
                $('#online').load('whoOnline.html');
             }, 60000); 
             
             
             setInterval(function ()        // Периодически обновляет чат - берёт данные из файла logs.html
                         {
                                $.ajax
                                      ({
                                           url: "chatUpdate.php",
                                           type: "POST",
                                           success: function (data)
                                           {$('#messanger').append(data);} 
                                       });
                            } , 1000);  
             
             
                $("#buttonSend").bind("click", function () {messageSend ();}) ;   //при "Send" нажатии отправляет сообщение в файл logs.html 
             
             
                $("#enter").bind("click", function ()   //При нажатии "ENTER" в главном меню производит попытку логина, в случае ошибки выводит сообщение об ошибке
                    {
                        loginUser (); 
                        jQuery('#imageLoad').show(); 
                        document.getElementById("status").value="Login";
                    } );    
            
            
                 $("#registration").bind("click", function () {registration ();} );  //при нажатии выводит форму регистрации
            
            
            
                 $("#buttonChekEmail").bind("click", function () 
                        {   //проверка майла работает при активной форме регистрации, генерирует и отправляет код на почту
                        jQuery('#registrationCheckEmail').show(); 
                        sendCodeEmail ();
                        });
            
           
           
           
                //** Функция регистрации проверяет введёные данные пользователя, отправляет в БД и получает ответ, выводит пользователю результат **//
            $("#buttonRegistr").bind("click", function () 
                        {
                            var errorMess = checkFormReg ();  //проверяет введённые данные пользователя
                            if (errorMess === "") 
                                { 
                                    validateEmail().then(function(response) //проверяет код введённые пользоателем сравнивая значение введённое пользователем со значением хранимым на сервере выводит в errorReg результат
                                    {
                                            if (response === "Sucess") //в errorReg записан результат выполнеения validateEmail ()
                                                   {
                                                    jQuery('#imageLoad').show();   
                                                    document.getElementById("status").value="Registration";
                                                    jQuery('#registrationInput').hide();  //скрываем все формы, и показываем загрузку
                                                    jQuery('#registrationFormLabel').hide();
                                                    registerUser().then(function(response)
                                                    {
                                                        if (response === "created") 
                                                                         { 
                                                                             document.getElementById("status").value="Sucess";
                                                                             alert ("Sucess"); 
                                                                             jQuery('#imageLoad').hide();
                                                                             showAllElem ();
                                                                         }
                                                                    if (response === "alreadyexist") 
                                                                        { 
                                                                            document.getElementById("status").value="alreadyexist"; 
                                                                            alert ("Already Exist");jQuery('#registrationInput').show();
                                                                            jQuery('#registrationFormLabel').show();jQuery('#imageLoad').hide();
                                                                        }         
                                                     }, function(reject){alert(errorMess+'wrongCode'+reject);}); 
                                                 }
                                                 else {alert ('WrongCode');}
                                });
                                 }
                                  else {alert (errorMess+'repeat');}    //если errorMess всё таки не пустой
                              });
                                                         
                //** КОНЕЦ ФУНКЦИИ **//                                 
                                                        
              
                                                      
                                                         
    });
        </script>
        
        
        
    </head>
    <body>
        
        <div id = "imageLoad" class="imageLoad" hidden="on">  
            <img src="Img/loader_blue.gif" width="50" height="50" alt="loader_blue"/>
            <output type="text" id="status">  </output>
        </div>
        
        <div id = "user" class="commontext">USER</div>   
        <input id ="insertUser" type="text" name="user" value = <?php echo $_COOKIE[user] ?> >
        
        <div id = "password" class="commontext">PASSWORD</div>
        <input id ="insertPassword" type="text" name="password" value = "">
        
        <input id = "enter" type="submit" value="ENTER">
        
        <input id = "registration" type="submit" value="REGISTRATION">
           
        
        
        
        
        <div id="registrationForm" hidden="on">
            
            <div id ="registrationFormLabel">
                <label class="label">NikName</label>    <br> 
                <label class="label">Password</label>    <br>
                <label class="label">Repeat Password</label>    <br>
                <label class="label">E-Mail</label>    
            </div>    
            
            <div id ="registrationInput">   
                <input id="registrationUser" placeholder="nickname" value="asd" > <br> 
                 <input id="registrationPassword" placeholder="password" value="asd" >  <br> 
                <input id="registrationRepeatPassword" placeholder="repeatPassword" value="asd">  <br> 
                <input id="registrationEmail" placeholder="E-mail" value="asddaw@mail.ru"> <input id="buttonChekEmail" type="button" value="chekEmail"><br> 
                <input id="registrationCheckEmail" type="text" hidden="off" placeholder="validate E-mail"> <output type="text" id="errorReg">  </output><output type="text" id="errorForm"></output><br> 
                 <input id="buttonRegistr" type="button" value="Reg me"><br> 
            </div>     
        </div>
        
        
        
            <div id ="test" name ="test"> </div>
        
            <div id = "chatBox"  name = "chatBox" hidden="on" >
            <div id = "messanger" name = "messanger">  </div>
            <label class="label">ONLINE</label>
            <div id = "online" name = "online" > </div>
            <input id = "message" type="HTML" name="reply"> <input id ="buttonSend" type="button" value="reply" >
            <output id="whoOnline"></output>
            </div>
           
        <?php
     
        
                
        
      
       
       ?> 
    </body>
    
</html>
