<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="portal3.css">
    <title>Cadastramento</title>
</head>
<body style="background-color:rgb(237, 232, 226)">
    <header id="cabecalho"> 
        <h1><a id="titulo" href="index.php"> VSPLab </a></h1>     
    </header>
    <a id="logoIff"> <img id="logoIff" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg/1200px-Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg.png" alt=""></a>
    <br><br><br><br><br><br>
    <h3 style="margin-left: 22em">O seu cadastro foi realizado com sucesso, <a style="color: blue;" href="index.php">Clique aqui</a> para voltar a página inicial.</h3>
</body>
</html>

<?php
	include_once "conexao.php";
$token = htmlspecialchars(addslashes($_GET['token']));
if (!empty($token)) {
	
		//$query_usuario = "INSERT INTO usuario (nome, email, senha, adm) VALUES(:nome, :email, :senha, :adm)";
		$query_usuario = "UPDATE usuario SET cadastrado = '1' WHERE email = :email AND cadastrado = 0";
		$result_usuario = $conn->prepare($query_usuario);
		$result_usuario->execute(array(
			':email' => $token
		));
}
?>