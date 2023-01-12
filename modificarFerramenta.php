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
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,minimum-scale=1">
    <link rel="stylesheet" type="text/css" href="portal4.css">
    <title>Enviar Ferramenta</title>
</head>
<body class="fundo">
  <header id="cabecalho"> 
    <h1><a id="titulo" href="index.php"> VSPLab </a></h1>     
    <a id="logoIff"> <img id="logoIff" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg/1200px-Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg.png" alt=""></a> 
</header>
    <div id="blocoEnviarFerramenta">
        <?php
          echo "<h1 style='margin-left: -30px;'>Bem-vindo ".$_SESSION['nome']."</h1>";
        ?>   
        <button id="botaoFerramenta" type="button" onclick="MostrarFerramenta()">Mostrar Ferramentas </button>
      <div id="mostrarFerramenta">Ferramentas existentes
        <hr>  
        <ul>
          <li style="text-align: left;">
          <?php
		           include("abrirFerramentas.php");
            ?>
          </li>
        </ul>
      </div>
    <form method="post" action="uploadFerramenta.php" enctype="multipart/form-data">
        <div class="arquivo">
            <br>
          <label id="nomeFerramenta">Nome Da Ferramenta</label>
          <input class="nomeFerramenta" type="text" name="nome" placeholder="Nome da Ferramenta">
        </div>
        <div style="text-align: left; margin-left: 45px;">
          <h3 style="text-align: left;">
            Em qual(ais) tema(s) a ferramenta se encaixa?
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
        <div class="ferramenta">
          <label id="descricao">Descrição sobre a ferramenta</label>
          <br><br>
          <textarea id="textarea" wrap="hard" name="descricao" minlength="2" rows="10" cols="100" placeholder="Descrição"></textarea>           
        </div>
        <div>
            <br>
            <label id="link">Link da ferramenta</label>
            <br><br>
            <label><textarea id="textarea" wrap="hard" name="link" minlength="2" rows="10" cols="100" placeholder="Link da ferramenta"></textarea></label>
            <br>
            <button name="EnviarDocumento" id="enviar" type="submit" value="Salvar">Enviar Tudo</button>
      <?php
      if(isset($_SESSION['msgArquivo'])){
          echo $_SESSION['msgArquivo'];
          unset($_SESSION['msgArquivo']);
      }
    ?>
        </div>           
        </div>       
      </form>  
    </div>
</body>
<script src="portal1.js"></script>
</html>