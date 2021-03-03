<?php

namespace Tools\ClassCons;

class UsersT{
    //Table name
    
    private $tablename;

    //Table field
    
    private $identify;
    private $levelaccess;
    private $situation;
    private $login;
    private $lpasswd;

    //Special methods

    function __construct()
    {
        $this->setTablename("users");
        $this->setIdentify("id");
        $this->setLogin("lname");
        $this->setLpasswd("passuser");
        $this->setLevelaccess("levelaccess");
        $this->setSituation("situation");
        
    }
    function getTablename()
    {
        return $this->tablename;
    }
    function setTablename($tbn)
    {
        $this->tablename = $tbn;
    }
    function getIdentify()
    {
        return $this->identify;
    }
    function setIdentify($id)
    {
        $this->identify = $id;
    }
    function getLevelaccess()
    {
        return $this->levelaccess;
    }
    function setLevelaccess($acc)
    {
        $this->levelaccess = $acc;
    }
    function getSituation()
    {
        return $this->situation;
    }
    function setSituation($sit)
    {
        $this->situation = $sit;
    }
    function getLogin()
    {
        return $this->login;
    }
    function setLogin($login)
    {
        $this->login = $login;
    }
    function getLpasswd()
    {
        return $this->lpasswd;
    }
    function setLpasswd($pass)
    {
        $this->lpasswd = $pass;
    }
}