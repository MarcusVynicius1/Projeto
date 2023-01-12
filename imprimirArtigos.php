<?php

include_once 'conexao.php';

$_SESSION['ImprimirTipoArquivo'] = filter_input(INPUT_GET, 'tipo', 513);

if(empty($_SESSION['ImprimirTipoArquivo'])||!isset($_SESSION['ImprimirTipoArquivo'])){
    $_SESSION['ImprimirTipoArquivo']=1;
}

if($_SESSION['ImprimirTipoArquivo']==1||$_SESSION['ImprimirTipoArquivo']==2||$_SESSION['ImprimirTipoArquivo']==3||
$_SESSION['ImprimirTipoArquivo']==4||$_SESSION['ImprimirTipoArquivo']==5){
    if($_SESSION['ImprimirTipoArquivo']==1){
        $query_select = "SELECT nome FROM documento WHERE TipoLR = 1";
    }elseif($_SESSION['ImprimirTipoArquivo']==2){
        $query_select = "SELECT nome FROM documento WHERE TipoAR = 1";
    }elseif($_SESSION['ImprimirTipoArquivo']==3){
        $query_select = "SELECT nome FROM documento WHERE TipoI = 1";
    }elseif($_SESSION['ImprimirTipoArquivo']==4){
        $query_select = "SELECT nome FROM documento WHERE TipoT = 1";
    }elseif($_SESSION['ImprimirTipoArquivo']==5){
        $query_select = "SELECT nome FROM documento WHERE TipoM = 1";
    }
    $result_select = $conn->prepare($query_select);
    
    if ($result_select->execute()) {
        //Coletar os nomes dos documentos
        $dados = $result_select->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $row => $valor) {
            echo '<li><a href="documentos/'.$valor['nome'].'">' . $valor['nome']. '</a></li><br>';
        }
    } else {
        echo "Nenhum artigo disponível.";
    }
}else{
    echo "Erro!";
}