<?php

namespace Model;

use Tools\ClassCons\SelecUsers;
use Tools\ClassCons\SelecAccess;
use Tools\ClassCons\UpAccess;
use Tools\ClassCons\InserAccess;
use  PDO;

class ValidaUsers
{
    function verifyUse(string $user,string $senha)
    {   
        //Querry to see if it is in the database
        $consult = new SelecUsers;

        $resultConsult = $consult->ConsultAccess($user,$senha);

        if($resultConsult['Status'])
        {
            $section = new SelecAccess;

            $section = $section->VerifyAccess($resultConsult['Identificador']);

            $chanceSession = $this->chanceAccess($section['Position']);

            if($chanceSession == -1 or $chanceSession == 1)
            {
                $iduser = $resultConsult['Identificador'];

                $userlevel = $resultConsult['Access'];
                
                $ipuser = $_SERVER['REMOTE_ADDR'];
                
                $date = date('Y-m-d H:i');  
                
                $sessionnumber = sha1(md5($date.time().$iduser));

                $is = new InserAccess;  

                $iss = $is->InsertSe($ipuser, $iduser, $userlevel, $date, $sessionnumber);
                
                return $iss;
            }
            else
            {
                echo "Error";
            }

            
        }
        else
        {
            return "Usuário Inátivo";
        }
    }
    private function chanceAccess($id)
    {
        if($id)
            {
                $up = new UpAccess;

                $return = $up->ChangeStatus($id);
                
                if($return['Sts'])
                {
                    return $return['Sts'];
                }
                else
                {
                    return $return['Sts'];
                }

            }else{
              return -1;
            }
    }
}