<?php
if ($_COOKIE['user']) 
    {
    $thisUser = $_COOKIE['user'];
    $date = date("Y-m-d H:i:s"); 
    $link = mysqli_connect("127.0.0.1", "root", "", "chat");
    mysqli_set_charset($link, 'utf-8');
    $request = mysqli_query($link, "UPDATE `users` SET `Online`=('$date') WHERE `Name` = ('$thisUser')");
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

