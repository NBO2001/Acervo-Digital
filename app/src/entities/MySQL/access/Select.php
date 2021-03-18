<?php

namespace Entities\MySQL\access;

use Entities\MySQL\Conection;
use PDO;
use PDOException;

class Select extends Conection{    

    function __construct()
    {
       
    }

    function verifyAccess(Array $id)
    {
        $id = $id[0];
        
        $sql = "SELECT sessionid,statusse FROM gaccess WHERE users_id LIKE '$id' AND statusse LIKE '1'";
        
        $this->openCon();
      
        $chk = $this->con->prepare($sql);

       if($chk->execute()){

            $rst = $chk->fetchAll(PDO::FETCH_ASSOC);

            if(isset($rst[0]['statusse']))
            {
                $res = array(
                    "Position"        =>  $rst[0]['sessionid']
                );
            }
            else
            {
                $res = array(
                    "Position"        =>  0
                );
            }        
            return $res;

        }
        else
        {
            echo "erro";
        }
        
        
      
    }

    /**
     * Verifica se a sessão está ativa
     */
    function verifySession(Array $sessionUser)
    {
        $this->openCon();

        $sessionNumber = $sessionUser[0];

        $sql = "SELECT statusse FROM gaccess WHERE sessionid LIKE '$sessionNumber'";

        $exe = $this->con->prepare($sql);

        $exe->execute();

        $result = $exe->fetchAll(PDO::FETCH_ASSOC);

        return $result[0]['statusse'];
    }
}