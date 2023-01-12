<!DOCTYPE html>
<html lang="pt-br">
<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: pagina2.php");
  }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,minimum-scale=1">
    <link rel="stylesheet" type="text/css" href="projeto.css">
    <title>VSPLab</title>
</head>
<body>
    <header id="cabecalho"> 
        <h1><a id="titulo" href="index.php"> VSPLab </a></h1>     
        <a id="logoIff"> <img id="logoIff" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg/1200px-Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg.png" alt=""></a> 
    </header>
    <br><br><br><br><br><br><br>
    <div id="divFora">
      <h2 style="text-align: center;">Sumário</h2>
    <div id="divDetalhes">
      <br>
      <details>
        <summary>Introdução</summary>
        <ul>
          <br>
          <li>
            Titulo
          </li>
          <br>
          <li>
            Escopo
          </li>
          <br>
          <li>
            Definição e Abreviações
          </li>
        </ul>
      </details>
      <br><br>
      <details>
        <summary>Descrição Geral</summary>
        <ul>
          <br>
          <li>
            Funções do Sistema
          </li>
          <br>
          <li>
            Stakeholders
          </li>        
        </ul>
      </details>
      <br><br>
        <details>
          <summary>Requisitos</summary>
          <ul>
            <br>
            <li>
              Requisitos Funcionais
            </li>
            <br>
            <li>
              Requisitos não Funcionais
            </li>
            <br>
            <li>
              Regra de Negócio
            </li>
          </ul>
        </details>
    </div>
    </div>
<div class="container">
  <button class="arrow-left control" aria-label="Previous image">◀</button>
  <button class="arrow-right control" aria-label="Next Image">▶</button>
  <div class="gallery-wrapper">
    <div class="gallery">
        <div class="item current-item" id="teste">
            <h1 style="text-align: center;">Introducao</h1>
            <textarea type="text" id="um" class="textarea" wrap="hard" cols="10"></textarea>
          </div>
          <div class="item current-item" id="teste">
            <h1 style="text-align: center;">Descrição Geral</h1>
            <textarea id="dois" class="textarea"></textarea>
          </div> <div class="item current-item" id="teste">
            <h1 style="text-align: center;">Requisitos</h1>
            <textarea id="tres" class="textarea"></textarea>
          </div> <div class="item current-item" id="teste">
            <h1 style="text-align: center;">Descrição dos Metodos Realizados para Levantar os Requisitos</h1>
            <textarea id="quatro" class="textarea"></textarea>
          </div>
    </div>
  </div>
  <button class="gerador" type="button" onclick="baixarPDF()">Gerar Documento</button>
  <br><br><br><br>
</div>

<br><br><br><br><br><br><br>
<div id="invi">
  <p id="gambi">
  </p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="criarProjeto.js"></script>
</body>
</html>

