<?php
include_once "conexao.php";

//Rotina de tratamento dos emails não confirmados

$query_usuario = "DELETE FROM usuario WHERE localtime() - DataHoraCadastro >= 10000 and cadastrado=0";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->execute();

?>