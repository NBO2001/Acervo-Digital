<?php
require_once "Class/Conect.php";
require_once "Class/SelecAccess.php";
session_start();

$con = new Conect;
$vs = new SelecAccess;

$vss = $vs->VerifySession($con,$_SESSION['sessionuser']);
if($vss['STS'] != true)
{
    header("Location:login_screen.php");
   die;
}
echo "oii";
?>