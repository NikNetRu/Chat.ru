/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


            /* Инициализация чата - скрываем загрзку, выводим чат*/
            function chatInit () 
            {   jQuery('#imageLoad').hide(); 
                jQuery('#chatBox').show();
            }
            
            
            
            /* Скрытие элементов интерфейса для логина */
            function hideBeforeLogin () {
                                            jQuery('#user').hide(); 
                                            jQuery('#insertUser').hide();
                                           jQuery('#password').hide();
                                           jQuery('#insertPassword').hide();
                                           jQuery('#enter').hide(); ;
                                            jQuery('#registration').hide();} ;
                                       
                                       
                                       
                  /* Показывает все элементы для ввода логина и пароля */                     
               function showAllElem () {    jQuery('#imageLoad').hide();
                                            jQuery('#user').show(); 
                                            jQuery('#insertUser').show();
                                           jQuery('#password').show();
                                           jQuery('#insertPassword').show();
                                           jQuery('#enter').show();
                                           jQuery('#registration').show();
                                        } ;                          
                                       
                                       
            /* отправка сообщения в logs.html */
            function messageSend () {
                 $.ajax
                    ({
                            url: "send.php",
                            type: "POST",
                            data: ({reply: $("#message").val()}),
                            dataType: "text"
                            
                                               });
            };
            
            
            /* функия обновления чата */
            function chatUpdate () 
            {
               $.ajax
                    ({
                            url: "chatUpdate.php",
                            type: "POST",
                            success: function (data)
                            {$('#messanger').text(data);} 
                                               });
            }; 
            
            
            function  loginUser ()                            // залогинить юзера
                    {    
                    $.ajax
                    ({
                            url: "login.php",
                            type: "POST",
                            data: ({user: $("#insertUser").val(),
                                    password: $("#insertPassword").val()}),
                            dataType: "html",
                            beforeSend: hideBeforeLogin () ,
                                           
                            success: function (data) {
                                switch (data) {
                            case 'loggin': chatInit (); break;
                                           
                            case 'created': alert ('user created');  chatInit (); break;
                            
                            case 'alreadyexist': alert ('User already Exist');showAllElem () ; break;
                            
                            default: alert ("something wrong");
                                }
                                ;}
                      }) ;   }



            function registration ()
            {
               hideBeforeLogin ();
               jQuery('#registrationFormLabel').show();
               jQuery('#registrationForm').show();
               jQuery('#registrationCheckEmail').hide();
               
               
            }
            
      /* Проверка введённый регистрационных данных*/
            function checkFormReg ()
            {
              errorMess ="";
              var registrationUser = $('#registrationUser').val();
              var registrationPassword = $('#registrationPassword').val();
               chekEmptyAZ09 (registrationUser);
               chekEmptyAZ09 (registrationPassword);
             if ($('#registrationRepeatPassword').val() != registrationPassword)
             {errorMess += "passwords not similary"};
             
             var registrationEmail = $('#registrationEmail').val();  // проверка майла на соотвествиие
             if (!/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i.test(registrationEmail))
             {errorMess="No Correct Email";};
            return errorMess;
            }
            
                function chekEmptyAZ09 (data) {     // проверка на пустоту и символы
                if (data  == "") {errorMess += "is Empty <br>";};
                if (/[^a-zA-Z0-9_-]/.test(data )) {errorMess += "Only A-Z 0-9 _ in NikName and Password <br>";};
                return errorMess;
                }  
                
          
          
          /*Отсылка проверочного кода на Email*/
         function sendCodeEmail ()
         {
             $.ajax
                    ({
                            url: "generateCodeEmail.php",
                            type: "POST",
                            complete : function (data) {console.log(data);}
                                               });
         
                      } ;
         
         
         
       function updateThisUserOnline ()
       {
           $.ajax
                    ({
                            url: "updateThisUserOnline.php",
                            type: "POST",
                            dataType: "html"
                      });
    }
                            
      
      
       function whoOnline ()
       {
           $.ajax
                    ({
                            url: "whoOnline.php",
                            type: "POST",
                            dataType: "html"
                      });
    }
        
         
         /*Запрос сделан в XML, для отсылки введёного пользователем кода высланного на Email результатт проверки выводится в errorReg*/
        function validateEmail ()
        {
                
              xhr = new XMLHttpRequest();
              xhr.open('POST', 'checkEmailCode.php', true);
              xhr.responseType = 'text';
              xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
              xhr.send('userCode='+encodeURIComponent($('#registrationCheckEmail').val()));
              xhr.onload = function () {
              if (xhr.readyState === xhr.DONE) {
              if (xhr.status === 200) {
              console.log(xhr.responseText); // !! ТОЛЬКО ДЛЯ УПРОЩЕНИЯ РЕГИСТРАЦИИ выводит проверочный код
              document.getElementById("errorReg").value=xhr.responseText;
            }};};  
            
                      } ;   
                      
      function registerUser ()
         {                      
                       
                                xhReg = new XMLHttpRequest();
                                xhReg.open('POST', 'registerUser.php', true);
                                 xhReg.responseType = 'text';
                                 xhReg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                 xhReg.send('registrationUser='+encodeURIComponent($('#registrationUser').val())+'&registrationPassword'+encodeURIComponent($('#registrationPassword').val())+'&registrationEmail'+encodeURIComponent($('#registrationEmail').val()));
                                 xhReg.onload = function () {
                                 if (xhReg.readyState === xhReg.DONE) {
                                 if (xhReg.status === 200) {
                                console.log(xhReg.responseText);
                                 document.getElementById("errorForm").value=xhReg.responseText;}};};  
                 }