<?php
require_once "Class/Conect.php";
require_once "Class/SelecUsers.php";
require_once "Class/SelecAccess.php";
require_once "Class/UpAccess.php";
require_once "Class/InserAccess.php";

session_start();
date_default_timezone_set('America/Manaus');

if ($_POST['button_submit']){
    $username = md5(filter_input(INPUT_POST, 'user_name',FILTER_SANITIZE_STRING));
    $passwd = md5(filter_input(INPUT_POST, 'password_user', FILTER_SANITIZE_STRING));// --> Send to class

    //Check in the database
    $con = new Conect;
    $rs = new SelecUsers;
    $con->bsConect();
    $rc = $rs->ConsultAccess($con,$username,$passwd);

    //Check if the user is active
    if($rc['Status']){
        $iduser = $rc['Identificador'];
        $userlevel = $rc['Access'];
        $ipuser = $_SERVER['REMOTE_ADDR'];  
        $date = date('Y-m-d H:i');
        $sessionnumber = sha1(md5($date.time().$iduser));
        
        //Check active sessions
        $acc = new SelecAccess;
        $acr = $acc->VerifyAccess($con, $iduser);
        
        if($acr['Position'] != 0){
            //End session
            $up = new UpAccess;
            $up->ChangeStatus($con, $acr['Position']);  
        }

        //insert new session
        $is = new InserAccess;        
        $iss = $is->InsertSe($con, $ipuser, $iduser, $userlevel, $date, $sessionnumber);

        //salve session
        $_SESSION['sessionuser'] = $iss['Session'];
        header("Location:index.php");
    }else{
        //if status or password is wrong
        //Register in the database; computer ip and number of retries
        //after 5 attempts block users, else return login screen
        header("Location:login_screen.php");
        die;
    }   

}else{
    header("Location:login_screen.php");
}
?>