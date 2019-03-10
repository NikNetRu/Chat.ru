<?php
$link = mysqli_connect("127.0.0.1", "root", "", "chat");
mysqli_set_charset($link, 'utf-8');
$dateNow = date("Y-m-d H:i:s");
$querry="SELECT Name FROM (users)";
 if ($result = $link->query($querry)) {

    /* извлечение ассоциативного массива */
    while ($row = $result->fetch_assoc()) {
        echo  $row['Name'],"  ", $row['ID'];
  }}

