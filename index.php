<?php
// echo "hello";
session_start();
// echo $_SESSION['level'];
if(!isset($_SESSION['loggedin']))
    header("location:helplogin.php");
else
{
    // include "l".$_SESSION['level'].".php";
   include "myaccounts.php";
}
?>