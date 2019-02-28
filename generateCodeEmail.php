<?php
$email = $_POST['email'];
function generateChars ()
{   $length=5;
     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

(string) $codeEmail = generateChars ();
 
mail($email, 'user', $codeEmail, "From: webmaster@ example.com \r\n" 
    ."X-Mailer: PHP/" . phpversion());

$codeEmail = mb_convert_encoding($codeEmail, 'UTF-8');
session_start();
$_SESSION['CodeEmail'] = $codeEmail;
echo $_SESSION['CodeEmail'];
//echo "$email";

