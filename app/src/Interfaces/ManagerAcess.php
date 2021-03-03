<?php

namespace Tools\Interfaces;

interface ManagerAcess{
    function VerifyAccess($con, $id); //Return true or false
}