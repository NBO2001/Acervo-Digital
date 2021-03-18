<?php

namespace Model;

use Entities\DataBaseController;

class ValidaUsers
{
    function verifyUse(string $user,string $senha)
    {   
        //Querry to see if it is in the database
        $dbController = new DataBaseController;

        $resultConsult = $dbController->execute('Users@Select@consultUsers',[$user,$senha]);
        
        if(isset($resultConsult))
        {

            $vss = $dbController->execute("Access@Select@verifyAccess", [$resultConsult['Identificador']]);

            if($dbController->execute("Access@Update@changeStatus", [$vss['Position']]))
            {
                $iduser = $resultConsult['Identificador'];

                $userlevel = $resultConsult['Access'];
                
                $ipuser = $_SERVER['REMOTE_ADDR'];
                
                $date = date('Y-m-d H:i');  
                
                $sessionnumber = sha1(md5($date.time().$iduser));
                
                $iss = $dbController->execute("Access@Insert@insertSe", [
                    $sessionnumber, $ipuser,$date,$userlevel,$iduser]);

                return $iss;
            }
            else
            {
                return false;
            }

            
        }
        else
        {
            return "Usuário Inátivo";
        }
    }
}