<?php

namespace Tools;

class Functions{
    static function vbSumbit(string $name)
    {
        if(isset($_REQUEST[$name]))
        {
            return 1;
        }
        else
        {
            return 0;
        }

    }
    static function filterInput(string $name){
        $inp = filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
        $inp = trim($inp);
        return $inp;
    }
    static function dataCrypt(string $name)
    {
        $name = Functions::filterInput($name);
        $name = crypt($name, KEY);
        return $name;
    }
}