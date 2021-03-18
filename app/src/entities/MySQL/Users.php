<?php

namespace Entities\MySQL;

class Users{

    function sqlExec(String $field, Array $opition = []){
        
        $separation = explode("@",$field);

        
        $classDataBase = "Entities\\".DATABASE."\\users\\".$separation[0];

        if(class_exists($classDataBase))
        {

               if(method_exists($classDataBase, $separation[1]))
               {

                    return call_user_func_array([
                        new $classDataBase,
                        $separation[1]
                    ],[$opition]);
               }
               
               else
               {
                   echo "Nooo";
               }
        }else{
            echo $classDataBase;
        }

    }
}