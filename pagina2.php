<header>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,minimum-scale=1">  
        <link rel="stylesheet" type="text/css" href="portal1.css">
        <title>VSPLab</title>
       
    </head>
    <body>
        <!--input value="Sim" type="text" hidden="hidden" id="LoginFeito" />-->
        <?php
            session_start();
            if(isset($_SESSION['id']) and (isset($_SESSION['nome']))){
                echo '<input value="Sim" type="text" hidden="hidden" id="LoginFeito" />';
                echo '<input value="'.$_SESSION['nome'].'" type="text" hidden="hidden" id="nome" />';
            }else{
                echo '<input value="Nao" type="text" hidden="hidden" id="LoginFeito" />';
            }
            ?> 
        <header id="cabecalho"> 
        <div id="botao1">			
        </div>		
        <div id="botao2">            
        </div>  
            <a href="index.php"><h1 id="titulo">VSPLab</h1></a>
            <div>
                <a> <img id="logoIff" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg/1200px-Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg.png" alt=""></a>
            </div>          
        </header>
        <br><br><br><br><br><br><br><br>      
        <div>
        <form method="get">
            <button class="divBotao1" type="submit" name="tipo" value="1">
                Levantamento de Requisitos
            </button>
            <button class="divBotao" type="submit" name="tipo" value="2">
                Análise de Requisitos
            </button>   
            <button class="divBotao" type="submit" name="tipo" value="3">
                Implementação
            </button>
            <button class="divBotao" type="submit" name="tipo" value="4">
                Teste
            </button>
            <button class="divBotao" type="submit" name="tipo" value="5">
                Manutenção
            </button>                    
        </form>
        <button class="divBotao2" type="button"><a style="text-decoration: none; color: rgb(0, 146, 12); padding: 15px 15px 20px 15px ;" href="criarProjeto.php">Criar Projeto</a></button>
        </div>
        <br><br>
        <div class="container">
            <div id="div1">
                <div><h2>Para que serve?</h2><hr></div>
                <br>
                <?php
                echo '<p id="pDivs">';
                    if(!isset($_GET['tipo'])){
                        echo 'O Levantamento de Requisitos serve para...';
                    }elseif($_GET['tipo']==1){
                        echo 'O Levantamento de Requisitos serve para...';
                    }elseif($_GET['tipo']==2){
                        echo 'A Análise de Requisitos serve para...';
                    }elseif($_GET['tipo']==3){
                        echo 'A etapa de Implementação é importante para...';
                    }elseif($_GET['tipo']==4){
                        echo 'A Realização de Testes serve para...';
                    }elseif($_GET['tipo']==5){
                        echo 'A Realização de manutenção serve para...';
                    }
                    echo '</p>';
                ?>
            </div>
            <div id="div2">
                <div>
                <h2>Artigos</h2>
                    <?php 
                    if(isset($_SESSION['id'])){
                     if($_SESSION['adm']){
                    echo '<button id="botaoAdd"><a href="modificarArtigos.php">Modificar</a></button>';
                    }}
                    ?>
                    <hr></div>
                <br>
                <div id="pDivs2">
                    <ul>
                        <?php
                        include("imprimirArtigos.php");
                        ?>
                        <br>
                    </ul>
                    <div id="first"></div>
                </div>
            </div>
            <div id="div3">
                <div><h2>Ferramentas</h2><hr></div><br>
                 <?php 
                    if(isset($_SESSION['id'])){
                     if($_SESSION['adm']){
                        echo '<button id="botaoAdd2" type="button"><a href="modificarFerramenta.php">Modificar</a></button>';
                    }}
                    ?>
                <br>          
                 <div id="pDivs3">
                    <ul>
                    <?php
                        include("imprimirFerramentas.php");
                        ?>
                        <br>
                    </ul>
                 </div>
        </div> 
        </div> 
    
        <br>
    
        <div class="form-popup" id="myForm">
            <form action="/action_page.php" id="login-usuario-form" class="form-container">
            <span id="msgAlertErroLogin"></span>
              <h1>Login</h1>
          
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" id="email" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="senha" id="senha" required>
          
              <button type="submit" id="login-usuario-btn" class="btn">Login</button>
              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
          </div>
          <div><br><br></div>

      
        <script src="portal1.js"></script>
    </body>
        <!--Created by Marcus Vynícius and José Augusto-->
    </html>