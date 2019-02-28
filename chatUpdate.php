<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    /*include_once 'logs.html';
    if ($_SERVER['update']==TRUE) {
    $file = fopen('logs.html','a+');
    flock($file, LOCK_EX);
    $message = fgets($file,4096);
    $convertedText = mb_convert_encoding($message, 'utf-8', mb_detect_encoding($message));
    flock($file, LOCK_UN);
    fclose($file);
    return $convertedText;
    } 

     * 
     * 
     * $lines = file('logs.html');
$numLines = count($lines)-2;
if (empty($_SESSION[userLines])) 
    {
    setcookie("userLines",$numLines);
    }

$userNumLines = $_COOKIE[userLines];
while ($userNumLines != $numLines)
{       if ($userNumLines >= $numLines) { $userNumLines=$userNumLines-2; }
        ++$userNumLines;
        
        $convertedText = mb_convert_encoding($lines[$userNumLines], 'UTF-8');
        
        setcookie("userLines",$userNumLines);
        echo $convertedText;     */



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

// echo "USER: $numLines COOKIE: $_COOKIE[userLines]";