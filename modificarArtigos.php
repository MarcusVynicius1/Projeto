<!DOCTYPE html>
<html lang="pt-br">
<?php
  session_start();
  if(!isset($_SESSION['id']) or !$_SESSION['adm']){
    header("Location: pagina2.php");
  }
?>
<head>   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="portal2.css">
    <title>Enviar Artigos</title>
</head>
<body class="fundo">
  <header id="cabecalho"> 
    <h1><a id="titulo" href="index.php"> VSPLab </a></h1>     
</header>
<a id="logoIff"> <img id="logoIff" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg/1200px-Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg.png" alt=""></a> 
    <div id="blocoEnviarArquivo">
        <?php
          echo "<h1 style='margin-left: -30px;'>Bem-vindo ".$_SESSION['nome']."</h1>";
        ?>
        <button id="botaoArq" type="button" onclick="MostrarArq()">Mostrar Arquivos</button>
        <div id="mostrarArq">Arquivos existentes
          <hr>  
          <ul>
            <li style="text-align: left;">
            <?php
		           include("downloadArtigo.php");
            ?>
            </li>
          </ul>
        </div>
    <form method="post" action="uploadArtigo.php" enctype="multipart/form-data">
        <div class="arquivo">
          <label id="nomeArtigo">Nome Do Artigo</label>
          <input class="nomeArtigo" type="text" name="titulo" placeholder="Nome do Artigo">
        </div>
        <div style="text-align: left; margin-left: 45px;">
          <h3 style="text-align: left;">
            Em qual(ais) tema(s) o artigo se encaixa?
          </h3>
          <input type="checkbox" id="Tipo1" name="Tipo1" value="Levantamento de Requisitos">
          <label for="Tipo">Levantamento de Requisitos</label><br>
          <input type="checkbox" id="Tipo2" name="Tipo2" value="Analise de Requisitos">
          <label for="Tipo2">Analise de Requisitos</label><br>
          <input type="checkbox" id="Tipo3" name="Tipo3" value="Implementação">
          <label for="vehicle3">Implementação</label><br>
          <input type="checkbox" id="Tipo4" name="Tipo4" value="Testes">
          <label for="vehicle2">Testes</label><br>
          <input type="checkbox" id="Tipo5" name="Tipo5" value="Manutenção">
          <label for="vehicle3">Manutenção</label>
        </div>
        <div class="arquivo">
          <label id="descricao">Descrição sobre o Artigo</label>
          <br><br>
          <textarea id="textarea" wrap="hard" name="descricao" minlength="2" rows="5" cols="33" placeholder="Descrição"></textarea>           
        </div>
        <div class="arquivo">
          <label id="arquivo">Selecione o Arquivo</label>
          <input type="file" name="documento" accept="application/pdf" placeholder="Escolher arquivo">
        </div>
        <footer>
          <button name="EnviarDocumento" id="enviar" type="submit" value="Salvar">Enviar Tudo</button>
        </footer>
      </form>  
    <?php
      if(isset($_SESSION['msgArquivo'])){
          echo $_SESSION['msgArquivo'];
          unset($_SESSION['msgArquivo']);
      }
    ?>
    </div>
</body>
<script src="portal1.js"></script>
</html>
