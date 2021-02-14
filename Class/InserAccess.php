<?php
require_once "Class/UsersT.php";

class InserAccess extends AccessT
{
    function InsertSe($con,$ipuser,$iduser,$userlevel,$date,$sessionnumber)
    {
        $sessionnumber = substr($sessionnumber, -30);

        $fun_inset = $con->bsConect()->prepare("INSERT INTO access 
        (".$this->getId().", ".$this->getIpus().", ".$this->getLaccess().", ".$this->getDateac().", ".$this->getForeignkey().") VALUES 
        ('$sessionnumber','$ipuser','$userlevel','$date','$iduser')");
        $fun_inset->execute();

        $re = array(
            "Session" => $sessionnumber
        );
        return $re;
    }
}