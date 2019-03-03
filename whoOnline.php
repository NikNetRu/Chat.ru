<?php
  $link = mysqli_connect("127.0.0.1", "root", "", "chat");
  $dateNow = date("Y-m-d H:i:s");
  $querry = "SELECT ID FROM `users` WHERE `online` <= ('$dateNow')";
  $result = mysqli_query($link, $querry);
  foreach ($result as $stroke)
    {
      echo $stroke;
      echo 'Test   ';
    }
  $db = mysqli_close($link); 

