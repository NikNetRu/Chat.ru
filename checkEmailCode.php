<?php
/*$_SESSION['CodeEmail'] генерируется в generateCodeEmail */
$userCode = $_POST['userCode'];
session_start();
if ($_SESSION['CodeEmail'] == $userCode)
{   echo "Sucess";
}

 else 
{   
   echo "Wrong Code";
}

