<?php

namespace Tools\ClassCons;
use Tools\ClassCons\Conect;

class InserAccess extends AccessT
{

    function InsertSe($ipuser,$iduser,$userlevel,$date,$sessionnumber)
    {
        $con = new Conect;
    
        $fun_inset = $con->bsConect()->prepare("INSERT INTO ".$this->getTdname()." 
        (".$this->getId().", ".$this->getIpus().", ".$this->getLaccess().", ".$this->getDateac().", ".$this->getForeignkey().") VALUES 
        ('$sessionnumber','$ipuser','$userlevel','$date','$iduser')");
        if($fun_inset->execute()){
            $re = array(
                "Session" => $sessionnumber
            );
            
        }else{
            $re = array(
                "Session" => 0
            );
        }
        return $re;        
    }
}