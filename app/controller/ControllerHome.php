<?php

namespace Control;

session_start();

use Core\Controller;

class ControllerHome extends Controller
{

    function screenLogin()
    {
        echo $this->load('sreenLogin');
    }
    function screenIni()
    {
        if(isset($_SESSION['sessionuser'] ))
        {
            echo $this->load('sreenInicial');
        }
        else
        {
            header("Location:login");
        }
        
    }
}