<?php

namespace Entities\MySQL;

use PDO;
use PDOException;

require_once "../app/config/Config.php";

class Conection{

    private $host = HOST;
    private $userName = USERNAME;
    private $password = PASSWORD;
    private $dataBase = NAMEDATABASE;
    protected $con;


    function __construct()
    {
      $this->openCon();
    }
    
    function openCon(){
        $dsn = "mysql:host=localhost;dbname=syscon";
        $user = "natanphp";
        $passwd = "123n";

        try{

            $this->con = new PDO($dsn, $user, $passwd);

            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo ("Erro Contacte o adm". $e);
        }
    }
    function ts (){
        return $this->con;
    }

}