<?php

namespace Entities\MySQL\users;

use Entities\MySQL\Conection;
use PDO;

class Select extends Conection
{
    function consultUsers(array $cred)
    {
        $user = $cred[0];
        $pass = $cred[1];
        
        $this->openCon();

        $sql = "SELECT id,levelaccess,situation,passuser FROM users WHERE lname LIKE '$user' LIMIT 1";

        $sel = $this->con->prepare($sql);

        $sel->execute();

        $resul = $sel->fetchAll(PDO::FETCH_ASSOC);

        if($resul[0]['situation'] AND password_verify($pass, $resul[0]['passuser']))
        {
            return array(
                "Identificador" =>  $resul[0]['id'],
                "Access"        =>  $resul[0]['levelaccess']
            );
        }else{
            return false;
        }
    }
    
}