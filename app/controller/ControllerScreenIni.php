<?php

namespace Control;

session_start();

use Core\Controller;

use Tools\Functions;

use Model\ValidaUsers;

class ControllerScreenIni extends Controller
{
    function sreenLogin()
    {
        unset($_SESSION['sessionuser']);
        if(Functions::vbSumbit('button_submit'))
        {
            /**
             * Encrypt the password
             */
            $senha      = Functions::dataCrypt('password_user');

            $user_name  = Functions::dataCrypt('user_name');
            
            /**
             * Calls the validation model
             */
            $vf         = new ValidaUsers;
            
            $resu = $vf->verifyUse($user_name,$senha);
            
            /**
             * Add user session
             */
            if(isset($resu['Session'])):
                $_SESSION['sessionuser'] = $resu['Session'];
            endif;
            
            header("Location:home");

        }
        else
        {
            echo "Não TEm";
        }
    }
}