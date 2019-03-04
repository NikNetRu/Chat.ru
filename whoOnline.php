<?php
  $link = mysqli_connect("127.0.0.1", "root", "", "chat");
  $dateNow = date("Y-m-d H:i:s");
  $querry = "SELECT ID FROM `users` WHERE `online` BETWEEN STR_TO_DATE('2008-08-14 00:00:00', '%Y-%m-%d %H:%i:%s') 
  AND STR_TO_DATE('2021-08-23 23:59:59', '%Y-%m-%d %H:%i:%s')";
  $result = mysqli_query($link, $querry);
  $resultP = mysqli_fetch_array($result);
  foreach ($resultP as &$stroke)
    {
      echo $stroke;
      echo 'Test   ';
    }
  $db = mysqli_close($link); 

