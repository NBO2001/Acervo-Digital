<?php

namespace Entities\MySQL\access;

use Entities\MySQL\Conection;

class Insert extends Conection
{

    function insertSe(Array $fields)
    {
        
        $this->openCon();

        $values = [
            ":sessionid" => $fields[0],
            ":ipUser" => $fields[1],
            ":dateaccess" => $fields[2], 
            ":levelacc" => $fields[3],
            ":users_id" => $fields[4]
        ];

        $sql = "INSERT INTO gaccess (sessionid, ipUser, dateaccess, levelacc, users_id)
        VALUES (:sessionid, :ipUser, :dateaccess, :levelacc, :users_id)";

        //Connetion

        $ins = $this->con->prepare($sql);

        if($ins->execute($values)){
            return array(
                "Session" => $fields[0]
            );
        }else{
            return false;
        }
    }
}