<?php
$userCode = $_POST['userCode'];
session_start();
if ($_SESSION['CodeEmail'] == $userCode)
{   echo "Sucess";
}

 else 
{   
   //echo "wrong Code $userCode";
   echo $_SESSION['CodeEmail'];
}

