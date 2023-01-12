<?php

$host = "127.0.0.1";
$user = "root";
$pass = "root";
$dbname = "teste";
$port = "3306";
try{
    
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //echo "Conexão com banco de dados realizado com sucesso.";
}catch(PDOException $erro){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerando " . $erro->getMessage();
}
?>
