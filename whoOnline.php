<?php
  $link = mysqli_connect("127.0.0.1", "root", "", "chat");
  $dateNow = date("Y-m-d H:i:s");
  $querry = "SELECT ID FROM users WHERE online BETWEEN STR_TO_DATE('2019-01-01 00:00:00', '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE('2021-03-04 23:59:59', '%Y-%m-%d %H:%i:%s')";
  $result = mysqli_query($link, $querry);
  $resultP = mysqli_fetch_all($result,MYSQLI_ASSOC);
  foreach ($resultP as $key => $value)
    {
     // echo resultP['Name'];
    }
    while ($row = $result->fetch_assoc()) {
        echo "%s (%s)\n", $row["Name"];
    }
  $db = mysqli_close($link); 

