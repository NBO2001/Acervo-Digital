<?php
require_once "Interface/Atualiza.php";
require_once "Class/AccessT.php";


class UpAccess extends AccessT implements Atualiza
{
    function ChangeStatus($con, $id)
    {        
        $chk_user = $con->bsConect()->prepare("UPDATE ".$this->getTdname()." SET ".$this->getSituation()." = 0 WHERE ".$this->getTdname().".".$this->getId()." = '$id'");
        if($chk_user->execute())
        {
            $re = array(
                "Sts" => 1
            );
        }else{
            $re = array(
                "Sts" => 0
            );
        }
        return $re;
    }
}