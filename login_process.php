<?php
session_start();
date_default_timezone_set('America/Manaus');
require_once 'conect_base.php';

if ($_POST['button_submit']){
    $username = md5(filter_input(INPUT_POST, 'user_name',FILTER_SANITIZE_STRING));
    $passwd = md5(filter_input(INPUT_POST, 'password_user', FILTER_SANITIZE_STRING));

    //Check in the database
    $chk_user = $con->prepare("SELECT id,levelaccess,situation FROM users WHERE lname LIKE '$username' AND passuser LIKE '$passwd'");
    $chk_user->execute();
    $chk_user = $chk_user->fetchALL(PDO::FETCH_ASSOC);

    //Check if the user is active
    if($chk_user[0]['situation'] == 1){
        $iduser = $chk_user[0]['id'];
        $userlevel = $chk_user[0]['levelaccess'];
        $ipuser = $_SERVER['REMOTE_ADDR'];  
        $date = date('Y-m-d H:i');
        $sessionnumber = substr((md5(md5($date.time()))),-30);
        
        //Check active sessions

        $ck_session = $con->prepare("SELECT id FROM access WHERE iduser LIKE '$iduser' AND sessionstatus LIKE '1'");
        $ck_session->execute();
        $ck_session = $ck_session->fetchALL(PDO::FETCH_ASSOC);
        if(isset($ck_session[0]['id'])){
            //End session
            $end_session = $con->prepare("UPDATE access SET sessionstatus = 0 WHERE access.id =".$ck_session[0]['id']);
            $end_session->execute();
        }
        //insert new session
        $fun_inset = $con->prepare("INSERT INTO access (ipaccess, iduser, levleaccess, dateaccess, sessionnumber) VALUES ('$ipuser','$iduser','$userlevel','$date','$sessionnumber')");
        $fun_inset->execute();
        //salve session
        $_SESSION['sessionuser'] = $sessionnumber;
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