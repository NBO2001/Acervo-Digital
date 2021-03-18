<?php

namespace Model;

use Entities\DataBaseController;

class ValidateSession{

    function valSession(String $userSession)
    {
        $dbController = new DataBaseController;

        return $dbController->execute('Access@Select@verifySession',[$userSession]);
    }

}