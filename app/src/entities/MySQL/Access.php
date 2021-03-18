<?php

namespace Entities\MySQL;

class Access{

    function __construct()
    {
       // echo "Hello";
    }

    function sqlExec(String $field, Array $opition = []){
        
        $separation = explode("@",$field);

        
        $classDataBase = "Entities\\".DATABASE."\\access\\".$separation[0];

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