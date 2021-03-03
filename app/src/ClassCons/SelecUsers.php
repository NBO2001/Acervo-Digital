<?php

namespace Tools\ClassCons;

use Tools\Interfaces\MangerUser;
use PDO;
use Tools\ClassCons\Conect;

class SelecUsers extends UsersT
{
   
    function ConsultAccess($us, $up)
    {   
        $con = new Conect;

        $chk_user =$con->bsConect()->prepare("SELECT ".$this->getIdentify().",".$this->getLevelaccess().",".$this->getSituation().",".$this->getLpasswd()
        ." FROM ".$this->getTablename()." WHERE ".$this->getLogin()." LIKE '$us'");

        $chk_user->execute();

        $chk_user = $chk_user->fetchALL(PDO::FETCH_ASSOC);

        if(isset($chk_user[0][$this->getLpasswd()]))
        {
            if (password_verify($up, $chk_user[0][$this->getLpasswd()]))
            {
                if($chk_user[0][$this->getSituation()])
                {
                    $res = array(
                        "Identificador" =>  $chk_user[0][$this->getIdentify()],
                        "Access"        =>  $chk_user[0][$this->getLevelaccess()],
                        "Status"        =>  $chk_user[0][$this->getSituation()]
                    );
                }
                else
                {

                    $res = array(
                        "Identificador" =>  0,
                        "Access"        =>  0,
                        "Status"        =>  0
                    );
                }
                return $res;
            } 
            else 
            {
                echo 'Invalid password.';
            }
        }
        else
        {
            return "Nenhum registro encontrado";
        }
    
    }
}