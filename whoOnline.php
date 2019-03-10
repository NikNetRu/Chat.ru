<?php
/**реализовать через доп файл или переменную которая будет хранить дату последнего чека, если последний чек был позднее 5 минут назад
 * провести новую проверку на онлайн, при наличи запроса от пользователя из INDEX **/

  $link = mysqli_connect("127.0.0.1", "root", "", "chat");
  mysqli_set_charset($link, 'utf-8');
  $dateNow = date("Y-m-d H:i:s");
  $temp = date("i")-5;
  $date = date('Y-m-d H:').$temp.date(':s');
  //echo $date;
  $querry = "SELECT Name FROM (users) WHERE (online) BETWEEN STR_TO_DATE('$date', '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE('$dateNow', '%Y-%m-%d %H:%i:%s')";
  $result = mysqli_query($link, $querry);
  $resultP = mysqli_fetch_all($result,MYSQLI_ASSOC);
  $file = fopen('whoOnline.html','w+');
  flock($file, LOCK_EX);
  foreach ($resultP as &$value)
  {$text = '<br> '. $value['Name'];
  $convertedText = mb_convert_encoding($text, 'utf-8', mb_detect_encoding($text));
  fwrite($file, $convertedText);
  }
  flock($file, LOCK_UN);
  fclose($file);
  
  $db = mysqli_close($link); 
  

