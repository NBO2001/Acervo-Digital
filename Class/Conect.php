<?php
require_once "Interface/ConectBase.php";

class Conect implements ConectBase{
    private $servername;
    private $username;
    private $password;
    private $base;

    //Special methods

    function Conect()
    {
        $this->setServername("localhost");
        $this->setBase("syscon");
        $this->setUsername("natanphp");
        $this->setPassword("123n");
        
    }
    function setServername($servername)
    {
        $this->servername = $servername;
    }
    function getServername()
    {
        return $this->servername;
    }
    function setUsername($username)
    {
        $this->username = $username;
    }
    function getUsername()
    {
        return $this->username;
    }
    function setPassword($passwd)
    {
        $this->password = $passwd;
    }
    function getPassword()
    {
        return $this->password;
    }
    function setBase($base){
        $this->base = $base;
    }
    function getBase()
    {
        return $this->base;
    }
    function bsConect(){
        try{
            $con = new PDO("mysql:host=".$this->getServername().";dbname=".$this->getBase()."", $this->getUsername(), $this->getPassword());
            return $con;
        }catch(PDOException $e){
            die("Erro Contacte o adm");
        }
    }

}