<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//** В Куки пользователя сохраняется последняя строка открытого файла
//с которой будет сверяется текущее значение строки и выводится построчно, до тех пор пока
//значения  $userNumLines - пользовательское и $numLines не совпадут**/
$lines = file('logs.html');
$numLines = count($lines)-2;
if (empty($_COOKIE[userLines])) 
    {
    setcookie("userLines",$numLines);
    }

$userNumLines = $_COOKIE[userLines];
while ($userNumLines != $numLines)
{       if ($userNumLines >= $numLines) { $userNumLines=$userNumLines-2; }
        ++$userNumLines;
        setcookie("userLines",$userNumLines);
        $convertedText = mb_convert_encoding($lines["$userNumLines"], 'UTF-8');
        
        echo "$convertedText";
}