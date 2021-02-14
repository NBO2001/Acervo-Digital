<?php
require_once "Interface/ManagerAcess.php";
require_once "Class/AccessT.php";

class SelecAccess extends AccessT implements ManagerAcess
{
    function VerifyAccess($con, $id)
    {
        $this->setId("id");       
        $chk = $con->bsConect()->prepare("SELECT ".$this->getId().",".$this->getSituation()." FROM access WHERE iduser LIKE '$id' AND ".$this->getSituation()." LIKE '1'");
        $chk->execute();
        $chk = $chk->fetchALL(PDO::FETCH_ASSOC);
        
        if($chk[0][$this->getSituation()])
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
}