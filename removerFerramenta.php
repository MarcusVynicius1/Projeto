<?php

include_once 'conexao.php';

//Deletar documento do bando de dados
$query_delete = "DELETE FROM ferramenta WHERE nome = :nome";
$result_delete = $conn->prepare($query_delete);
$result_delete->bindParam(':nome', $_POST['nome']);

if ($result_delete->execute()) {
	//Deletar arquivo na pasta
	unlink('documentos/'.$_POST['nome']);
	$_SESSION['msgArquivo'] = "<p style='color:green;position:absolute;margin-left:55px;'>Dados salvo com sucesso.</p>";
	header("Location: modificarFerramenta.php");
} else {
    $_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Erro ao salvar os dados</p>";
    header("Location: modificarFerramenta.php");
}


