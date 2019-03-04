<?php
  $link = mysqli_connect("127.0.0.1", "root", "", "chat");
  $dateNow = date("Y-m-d H:i:s");
  $querry = "SELECT ID FROM users WHERE online BETWEEN STR_TO_DATE('2019-01-01 00:00:00', '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE('2021-03-04 23:59:59', '%Y-%m-%d %H:%i:%s')";
  $result = mysqli_query($link, $querry);
  $resultP = mysqli_fetch_array($result);
  foreach ($resultP as $key => $value)
    {
      echo "User resultP[$key] = $value /r";
    }
  $db = mysqli_close($link); 

