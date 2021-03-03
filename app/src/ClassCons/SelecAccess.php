<?php

namespace Tools\ClassCons;

use Tools\Interfaces\ManagerAcess;
use Tools\ClassCons\Conect;
use PDO;

class SelecAccess extends AccessT
{
    
    function VerifyAccess($id)
    {
        $con = new Conect();

        $chk = $con->bsConect()->prepare("SELECT ".$this->getId().",".$this->getSituation()." FROM ".$this->getTdname()." WHERE ".$this->getForeignkey()." LIKE '$id' AND ".$this->getSituation()." LIKE '1'");
 
        $chk->execute();
        $chk = $chk->fetchALL(PDO::FETCH_ASSOC);
        
        if(isset($chk[0][$this->getSituation()]))
        {
            $res = array(
                "Position"        =>  $chk[0][$this->getId()]
            );
        }else{
            $res = array(
                "Position"        =>  0
            );
        }        
        return $res;
    }
    function VerifySession($con, $id)
    {
        $con = new Conect();
        $chk = $con->bsConect()->prepare("SELECT ".$this->getSituation()." FROM ".$this->getTdname()." WHERE ".$this->getId()." LIKE '$id'");
        $chk->execute();
        $chk = $chk->fetchALL(PDO::FETCH_ASSOC);
        if($chk[0][$this->getSituation()] == 1)
        {
            $res = array(
                "STS" => 1
            );
        }else{
            $res = array(
                "STS" => 0
            );
        }
       
        return $res;
    }
}