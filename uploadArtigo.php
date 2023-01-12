<?php
session_start();
include_once 'conexao.php';
//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$EnviarDocumento = filter_input(INPUT_POST, 'EnviarDocumento', 513);
if ($EnviarDocumento) {
    //Receber os dados do formulário
    $nome_documento = $_FILES['documento']['name'];
    //Verifica se esse documento já foi enviado
	$query_select = "SELECT nome FROM documento WHERE nome = :nome";
	$result_select = $conn->prepare($query_select);
	$result_select->bindValue(':nome', $nome_documento);
	$result_select->execute();
	$result_select->fetchAll(PDO::FETCH_ASSOC);
	if ($result_select->rowCount() > 0) {
		$_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Esse arquivo já foi salvo.</p>";
		header("Location: modificarArtigos.php");
	} 
	else {
		//Verificar se foi selecionado algum arquivo
		if(empty($nome_documento)||empty($_POST['titulo'])||empty($_POST['descricao'])||(empty($_POST['Tipo1'])&&empty($_POST['Tipo2'])&&empty($_POST['Tipo3'])&&empty($_POST['Tipo4'])&&empty($_POST['Tipo5']))){
			$_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Preencha todos os campos.</p>";
			header("Location: modificarArtigos.php");
		}
		else {
			
			if($_POST['Tipo1']=="Levantamento de Requisitos"){
				$TipoLR = 1;
			}else{
				$TipoLR = 0;
			}
			if($_POST['Tipo2']=="Analise de Requisitos"){
				$TipoAR = 1;
			}else{
				$TipoAR = 0;
			}
			if($_POST['Tipo3']=="Implementação"){
				$TipoI = 1;
			}else{
				$TipoI = 0;
			}
			if($_POST['Tipo4']=="Testes"){
				$TipoT = 1;
			}else{
				$TipoT = 0;
			}
			if($_POST['Tipo5']=="Manutenção"){
				$TipoM = 1;
			}else{
				$TipoM = 0;
			}

			//Verificar se os dados foram inseridos com sucesso
			//Inserir no BD
			$query_insert = "INSERT INTO documento (nome, titulo, descricao, TipoLR, TipoAR, TipoI, TipoT, TipoM) 
											VALUES (:nome, :titulo, :descricao, :TipoLR, :TipoAR, :TipoI, :TipoT, :TipoM)";
			$result_insert = $conn->prepare($query_insert);
			$result_insert->bindParam(':nome', $nome_documento);
			$result_insert->bindParam(':titulo', $_POST['titulo']);
			$result_insert->bindParam(':descricao', $_POST['descricao']);
			$result_insert->bindParam(':TipoLR', $TipoLR);
			$result_insert->bindParam(':TipoAR', $TipoAR);
			$result_insert->bindParam(':TipoI', $TipoI);
			$result_insert->bindParam(':TipoT', $TipoT);
			$result_insert->bindParam(':TipoM', $TipoM);
			if ($result_insert->execute()) {
				//Recuperar último ID inserido no banco de dados
				//$ultimo_id = $conn->lastInsertId();

				//Diretório onde o arquivo vai ser salvo
				$diretorio = 'documentos/';

				//Criar a pasta do documento 
				mkdir($diretorio, 0755);
				
				if(move_uploaded_file($_FILES['documento']['tmp_name'], $diretorio.$nome_documento)){
					$_SESSION['msgArquivo'] = "<p style='color:green;position:absolute;margin-left:55px;'>Dados salvos com sucesso.</p>";
					header("Location: modificarArtigos.php");
				}else{
					$_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Erro ao realizar o upload da documento.</p>";
					header("Location: modificarArtigos.php");
				}        
			} else {
				$_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Erro ao salvar os dados.</p>";
				header("Location: modificarArtigos.php");
			}
		}
	}
} else {
    $_SESSION['msgArquivo'] = "<p style='color:red;position:absolute;margin-left:55px;'>Erro ao salvar os dados.</p>";
    header("Location: modificarArtigos.php");
}
echo  $_SESSION['msgArquivo'];
?>