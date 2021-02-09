<?php

echo md5("Jutal364");
/*
$servername = "localhost";
$database = "access";
$username = "natanphp";
$password = "123n";

// Create connection

//$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

//if (!$conn) {

  //  die("Connection failed: " . mysqli_connect_error());

//}
//echo "Connected successfully";
//mysqli_close($conn);

try {
    $conn = new PDO("mysql:host=localhost;dbname=aula", $username, $password);
    echo "Conectado a $dbname em $host com sucesso.";
} catch (PDOException $pe) {
    die("Não foi possível se conectar ao banco de dados $dbname :" . $pe->getMessage());
}

$eleitor = $conn->prepare("SELECT * FROM access");
        $eleitor->execute();
        $eleitor_resultado = $eleitor->fetchAll(PDO::FETCH_ASSOC);
print_r($eleitor_resultado);*/
?>
