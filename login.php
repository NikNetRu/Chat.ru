<?php
$userAuth=$_POST["user"];
$passwordAuth=$_POST["password"];
$link = mysqli_connect("127.0.0.1", "root", "", "chat");
    mysqli_set_charset($link, 'utf-8');
   $result = mysqli_query($link, "SELECT ID FROM (users)
     WHERE (Name) = ('$userAuth') and (Password) = ('$passwordAuth')
     LIMIT 1");
   sleep(2);  
 if ($row = $result->fetch_assoc()) 
    {
    $db = mysqli_close($link); 
    setcookie("user", $userAuth);
   // header('Location: http://localhost/chat.ru/chat.php');
   echo "loggin";
    } 
 else { $result = mysqli_query($link, "SELECT ID FROM (users) WHERE (Name) = ('$userAuth') LIMIT 1");
         
        if ($row = $result->fetch_assoc() ==true) {            echo 'alreadyexist'; $db = mysqli_close($link); 
 } else           { echo 'somethinwrong'; }
    
}
 