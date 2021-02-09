<?php
$servername = "localhost";
$database = "syscon";
$username = "natanphp";
$password = "123n";

/*try {
    $conn = new PDO("mysql:host=".$servername.";dbname=".$database."", $username, $password);
    echo "Conectado a $database em $host com sucesso.";
} catch (PDOException $pe) {
    die("Não foi possível se conectar ao banco de dados $database :" . $pe->getMessage());
}*/

$con = new PDO("mysql:host=".$servername.";dbname=".$database."", $username, $password);
?>