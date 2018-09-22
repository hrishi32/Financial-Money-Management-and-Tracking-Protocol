<?php
// echo "hello";
session_start();
// echo $_SESSION['level'];
if(!isset($_SESSION['level']))
    header("location:helplogin.php");
else
{
    // include "l".$_SESSION['level'].".php";
   header("location:myaccounts.php");
}
?>