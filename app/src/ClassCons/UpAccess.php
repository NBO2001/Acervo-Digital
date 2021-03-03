<?php

namespace Tools\ClassCons;

use Tools\ClassCons\Conect;

class UpAccess extends AccessT
{
    private $con;
    private $accesst;

    function __construct()
    {
        $this->con = new Conect;
        $this->accesst = new AccessT;
    }
    function ChangeStatus($id)
    {   
        $con = $this->con;

        $accesst = $this->accesst;
    
        $chk_user = $con->bsConect()->prepare("UPDATE ".$accesst->getTdname()." SET ".$accesst->getSituation()." = 0 WHERE ".$accesst->getTdname().".".$accesst->getId()." = '$id'");
        
        if($chk_user->execute())
        {
            $re = array(
                "Sts" => 1
            );

        }
        else
        {
            $re = array(
                "Sts" => 0
            );
        }
        return $re;
    }
}