<?php
session_start();
include_once 'conexao.php';
//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$EnviarDocumento = filter_input(INPUT_POST, 'EnviarDocumento', 513);
if ($EnviarDocumento) {
    //Verifica se essa ferramenta já foi enviada
	$query_select = "SELECT nome FROM ferramenta WHERE nome = :nome";
	$result_select = $conn->prepare($query_select);
	$result_select->bindValue(':nome', $_POST['nome']);
	$result_select->execute();
	$result_select->fetchAll(PDO::FETCH_ASSOC);
	if ($result_select->rowCount() > 0) {
		$_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Essa ferramenta já foi salva.</p>";
		header("Location: modificarFerramenta.php");
	} 
	else {
		//Verificar se tudo foi preenchido
		if(empty($_POST['nome'])||empty($_POST['link'])||empty($_POST['descricao'])||(empty($_POST['Tipo1'])&&empty($_POST['Tipo2'])&&empty($_POST['Tipo3'])&&empty($_POST['Tipo4'])&&empty($_POST['Tipo5']))){
			$_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Preencha todos os campos.</p>";
			header("Location: modificarFerramenta.php");
		}
		else {
			
			if(isset($_POST['Tipo1'])&&$_POST['Tipo1']=="Levantamento de Requisitos"){
				$TipoLR = 1;
			}else{
				$TipoLR = 0;
			}
			if(isset($_POST['Tipo2'])&&$_POST['Tipo2']=="Analise de Requisitos"){
				$TipoAR = 1;
			}else{
				$TipoAR = 0;
			}
			if(isset($_POST['Tipo3'])&&$_POST['Tipo3']=="Implementação"){
				$TipoI = 1;
			}else{
				$TipoI = 0;
			}
			if(isset($_POST['Tipo4'])&&$_POST['Tipo4']=="Testes"){
				$TipoT = 1;
			}else{
				$TipoT = 0;
			}
			if(isset($_POST['Tipo5'])&&$_POST['Tipo5']=="Manutenção"){
				$TipoM = 1;
			}else{
				$TipoM = 0;
			}

			//Verificar se os dados foram inseridos com sucesso
			//Inserir no BD
			$query_insert = "INSERT INTO ferramenta (nome, descricao, link, TipoLR, TipoAR, TipoI, TipoT, TipoM) 
											VALUES (:nome, :descricao, :link, :TipoLR, :TipoAR, :TipoI, :TipoT, :TipoM)";
			$result_insert = $conn->prepare($query_insert);
			$result_insert->bindParam(':nome', $_POST['nome']);
			$result_insert->bindParam(':descricao', $_POST['descricao']);
			$result_insert->bindParam(':link', $_POST['link']);
			$result_insert->bindParam(':TipoLR', $TipoLR);
			$result_insert->bindParam(':TipoAR', $TipoAR);
			$result_insert->bindParam(':TipoI', $TipoI);
			$result_insert->bindParam(':TipoT', $TipoT);
			$result_insert->bindParam(':TipoM', $TipoM);
			if ($result_insert->execute()) {
				//Recuperar último ID inserido no banco de dados
				//$ultimo_id = $conn->lastInsertId();

				$_SESSION['msgArquivo'] = "<p style='color:green;position:absolute;margin-left:55px;'>Dados salvos com sucesso.</p>";
					header("Location: modificarFerramenta.php");
     
			} else {
				$_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Erro ao salvar os dados.</p>";
				header("Location: modificarFerramenta.php");
			}
		}
	}
} else {
    $_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Erro ao salvar os dados.</p>";
    header("Location: modificarFerramenta.php");
}
echo  $_SESSION['msgArquivo'];
?>