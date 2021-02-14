<?php
require_once "Interface/MangerUser.php";
require_once "Class/UsersT.php";
class SelecUsers extends UsersT implements MangerUser
{
    function ConsultAccess($con, $us, $up)
    {   
        $chk_user = $con->bsConect()->prepare("SELECT ".$this->getIdentify().",".$this->getLevelaccess().",".$this->getSituation()." 
        FROM ".$this->getTablename()." WHERE ".$this->getLogin()." LIKE '$us' AND ".$this->getLpasswd()." LIKE '$up'");
        $chk_user->execute();
        $chk_user = $chk_user->fetchALL(PDO::FETCH_ASSOC);
        if($chk_user[0][$this->getSituation()])
        {
            $res = array(
                "Identificador" =>  $chk_user[0][$this->getIdentify()],
                "Access"        =>  $chk_user[0][$this->getLevelaccess()],
                "Status"        =>  $chk_user[0][$this->getSituation()]
            );
        }else{
            $res = array(
                "Identificador" =>  0,
                "Access"        =>  0,
                "Status"        =>  0
            );
        }
        
        
        return $res;
    
    }
}