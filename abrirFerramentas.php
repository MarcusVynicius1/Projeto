<?php

include_once 'conexao.php';

//Selecionar documentos do usuario através do id
$query_select = "SELECT nome, link FROM ferramenta";
$result_select = $conn->prepare($query_select);

if ($result_select->execute()) {
	//Coletar os nomes dos documentos
	$dados = $result_select->fetchAll(PDO::FETCH_ASSOC);
	foreach ($dados as $row => $valor) {
		//Formulário para imprimir os "links" dos documentos e os botões de apagar
		echo '<form action="removerFerramenta.php"  method=POST>';
		echo '<li style="text-align: left;">';
		echo '<a href="'.$valor['link'].'">' . $valor['nome']. '</a>';
		echo '<input value="'.$valor['nome'].'" type="text" hidden="hidden" id="nome" name="nome" />';
		echo '<input type="submit" style="margin-left: 20px;" value="Apagar" name="apagar"> </li> </form>';
	}
} else {
    $_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Erro ao salvar os dados</p>";
    header("Location: modificarFerramenta.php");
}

