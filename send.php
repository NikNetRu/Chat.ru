<?php

$reply=$_POST["reply"];
$date = date('H:i:s');
$message = " $date : $_COOKIE[user] : $reply \n <br>";
$convertedText = mb_convert_encoding($message, 'utf-8', mb_detect_encoding($message));
$file = fopen('logs.html','a+');
flock($file, LOCK_EX);
fwrite($file, $convertedText);
flock($file, LOCK_UN);
fclose($file);



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

