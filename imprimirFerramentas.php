<?php

include_once 'conexao.php';

if(isset($_COOKIE['escolha'])){
    $_SESSION['ImprimirTipoArquivo'] = $_COOKIE['escolha'];
}

if(empty($_SESSION['ImprimirTipoArquivo'])||!isset($_SESSION['ImprimirTipoArquivo'])){
    $_SESSION['ImprimirTipoArquivo']=1;
}

if($_SESSION['ImprimirTipoArquivo']==1||$_SESSION['ImprimirTipoArquivo']==2||$_SESSION['ImprimirTipoArquivo']==3||
$_SESSION['ImprimirTipoArquivo']==4||$_SESSION['ImprimirTipoArquivo']==5){
    if($_SESSION['ImprimirTipoArquivo']==1){
        $query_select = "SELECT nome, link FROM ferramenta WHERE TipoLR = 1";
    }elseif($_SESSION['ImprimirTipoArquivo']==2){
        $query_select = "SELECT nome, link FROM ferramenta WHERE TipoAR = 1";
    }elseif($_SESSION['ImprimirTipoArquivo']==3){
        $query_select = "SELECT nome, link FROM ferramenta WHERE TipoI = 1";
    }elseif($_SESSION['ImprimirTipoArquivo']==4){
        $query_select = "SELECT nome, link FROM ferramenta WHERE TipoT = 1";
    }elseif($_SESSION['ImprimirTipoArquivo']==5){
        $query_select = "SELECT nome, link FROM ferramenta WHERE TipoM = 1";
    }
    $result_select = $conn->prepare($query_select);
    
    if ($result_select->execute()) {
        //Coletar os nomes dos ferramentas
        $dados = $result_select->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $row => $valor) {
            echo '<li><a href="'.$valor['link'].'">' . $valor['nome']. '</a></li><br>';
        }
    } else {
        echo "Nenhuma ferramenta disponível.";
    }
}else{
    echo "Erro!";
}