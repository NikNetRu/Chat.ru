<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$nickname=$_POST["registrationUser"];
$password=$_POST["registrationPassword"];
$email=$_POST["registrationEmail"];
$link = mysqli_connect("127.0.0.1", "root", "", "chat");
    mysqli_set_charset($link, 'utf-8');
   $result = mysqli_query($link, "SELECT ID FROM (users)
     WHERE (Name) = ('$nickname') and (Password) = ('$password')
     LIMIT 1");
   sleep(2);  
        if ($result->fetch_assoc()) {echo 'alreadyexist'; $db = mysqli_close($link);} 
        else
        {
        $date = date("Y-m-d H:i:s");    
        $result = mysqli_query ($link, "INSERT INTO `users`(`ID`, `Name`, `Password`, `Email`, `RegistrDate`, `Online`) VALUES ('','$nickname','$password','$email','$date','0');");
        setcookie("user", $userAuth);
        $db = mysqli_close($link); 
        echo 'created';
        }
    

