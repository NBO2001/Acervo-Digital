<?php
session_start();
if(empty($_SESSION['sessionuser'])){
    header("Location:login_screen.php");
    die;
}

echo "oii";
?>