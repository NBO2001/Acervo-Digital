<?php

namespace Entities\MySQL\access;

use Entities\MySQL\Conection;
use PDO;
use PDOException;


class Update extends Conection{
    
    public function changeStatus(Array $id)
    {
        
        $id = $id[0];
        
        if(empty($id)){

            return false;

        }

        $sql = "UPDATE gaccess SET statusse = '0' WHERE sessionid LIKE '$id'" ;

        $up = $this->con->prepare($sql);
        
        if($up->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}