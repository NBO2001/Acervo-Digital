<?php
//ControllerScreenIni
namespace Control;

session_start();

use Core\Controller;

use Tools\Functions;

use Model\ValidaUsers;

class ControllerScreenIni extends Controller
{
    function sreenLogin()
    {
        if(Functions::vbSumbit('button_submit'))
        {
            $senha      = Functions::dataCrypt('password_user');

            $user_name  = Functions::dataCrypt('user_name');
            
            $vf         = new ValidaUsers;

            $resu = $vf->verifyUse($user_name,$senha);

            $_SESSION['sessionuser'] = $resu['Session'];

            header("Location:home");

        }
        else
        {
            echo "Não TEm";
        }

        // foreach($_REQUEST as $linha)
        // {
        //     echo $linha;
        // }
    }
}