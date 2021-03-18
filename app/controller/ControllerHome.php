<?php

namespace Control;

session_start();

use Core\Controller;
use Model\ValidateSession;

class ControllerHome extends Controller
{

    function screenLogin()
    {
        echo $this->load('sreenLogin');
    }
    function screenIni()
    {
        if(isset($_SESSION['sessionuser']))
        {
            $model = new ValidateSession;
            if($model->valSession($_SESSION['sessionuser']))
            {
                echo $this->load('sreenInicial');
            }
            else
            {
                unset($_SESSION['sessionuser']);
                header("Location:login");
            }
            
        }
        else
        {
            header("Location:login");
        }
        
    }
}