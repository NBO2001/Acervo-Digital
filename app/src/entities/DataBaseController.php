<?php

namespace Entities;

require_once "../app/config/Config.php";

class DataBaseController{

    public function execute(String $fieldModel, Array $options = []){
        
        $findUni = explode("@", $fieldModel);

        $strRetorn = $findUni[1]."@".$findUni[2];

        $searchClass = "Entities\\".DATABASE."\\$findUni[0]";
        
        if(class_exists($searchClass))
        {
            if(method_exists($searchClass, "sqlExec"))
            {
                return call_user_func_array([
                    new $searchClass,
                    'sqlExec'
                ],[$strRetorn,$options]);
            }
        }
        else
        {
            //Inplementar erro
            echo "Controller não encontrado";
        }
        
    }
}