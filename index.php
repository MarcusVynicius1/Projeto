<header>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,minimum-scale=1">
    <link rel="stylesheet" type="text/css" href="paginaInicial.css">
    <title>VSPLab</title>
</head>
<body>
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
        <h1 id="titulo">VSPLab</h1>
        <div>
            <a> <img id="logoIff" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg/1200px-Instituto_Federal_Fluminense_-_Marca_Vertical_2015.svg.png" alt=""></a>
        </div>          
    </header>
    <br><br><br><br><br><br><br>
    <div id="divFrase"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis pellentesque lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus efficitur ultricies orci sed commodo. Donec ornare purus quis ante interdum ornare. Curabitur tortor justo, porta nec rhoncus eu, aliquam in augue. Proin gravida, augue nec feugiat sodales, nisl erat interdum mauris, vitae fermentum leo dui laoreet metus. Suspendisse hendrerit risus ac augue egestas aliquet. Nam rutrum nibh tellus, sit amet congue leo laoreet pretium. Curabitur ultrices neque orci, eget elementum felis euismod sed. Fusce faucibus, ante a faucibus rhoncus, velit dui lobortis elit, eget maximus magna ipsum vel odio. Fusce laoreet ipsum eu augue porttitor dapibus. In hac habitasse platea dictumst. In sed consectetur risus, ac semper nisl. Quisque non mollis massa. Aenean eu nibh convallis, imperdiet mi sed, tempor mi.

        Nullam urna velit, placerat lobortis lacinia sit amet, lobortis ut velit. Donec bibendum, arcu et condimentum viverra, magna nunc vulputate urna, ut scelerisque libero eros ut ex. Curabitur ac lacinia purus. Mauris ut ipsum purus. Aliquam pulvinar neque ante, tempor varius elit tempor vel. Quisque eu venenatis tellus. Morbi tincidunt venenatis placerat. Vestibulum et fringilla purus. Maecenas hendrerit sagittis justo id fringilla. Curabitur eget massa hendrerit orci semper porttitor et quis sapien. Maecenas eu facilisis arcu.
        
        Integer orci quam, congue non sollicitudin ac, luctus a est. Aenean et iaculis enim. Pellentesque semper, leo sed maximus finibus, magna odio consequat dolor, id ullamcorper lorem turpis eleifend neque. Nullam sollicitudin varius nisl ac auctor. Etiam volutpat lectus in justo pretium, ac interdum nulla condimentum. Cras ac sagittis risus. Mauris at consectetur nisl. Phasellus rutrum arcu non ultrices mollis. Praesent ut efficitur sem. Duis eget turpis vel lorem posuere gravida eleifend vel nibh. Morbi tincidunt, justo non vulputate luctus, dui tellus tristique turpis, sed elementum neque dui id tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed hendrerit, libero vel blandit feugiat, lectus tellus suscipit enim, in fringilla velit mi in lectus. Maecenas convallis sit amet turpis in mattis.
        
        Praesent molestie libero in imperdiet aliquet. Nunc mauris urna, elementum sed ullamcorper id, fringilla sit amet velit. Nulla rhoncus, orci quis dignissim euismod, diam magna volutpat orci, sit amet viverra enim ante in felis. Nulla ac suscipit nulla. Proin at nisi ac augue porttitor tincidunt eu a dolor. Praesent at commodo augue, eget tempor urna. Vestibulum non nisi nec magna tincidunt auctor. Maecenas convallis odio in diam condimentum ornare. Aliquam tempus, nisi ut lobortis auctor, leo dolor suscipit lorem, in mattis lectus neque id lectus. Maecenas tincidunt ultrices orci viverra posuere. Vestibulum pulvinar odio libero, nec tincidunt orci maximus at. Maecenas quis ligula a eros ultrices viverra sit amet ac tellus. Aenean pharetra, nisl non lobortis placerat, orci magna eleifend erat, quis dignissim augue justo ut erat. Vestibulum sed erat augue. Cras accumsan ultrices mollis. Nullam pulvinar dui sed nisi blandit, sed interdum purus pulvinar.
        
        Etiam ut sodales augue. In urna arcu, finibus sed elit vitae, volutpat sollicitudin elit. Aliquam bibendum, risus ac iaculis finibus, sapien felis tempor dui, et feugiat leo dolor in augue. Cras in libero vitae quam dapibus commodo. Sed felis nunc, commodo quis mollis in, iaculis sit amet nisl. Nulla a magna rhoncus, laoreet dolor in, aliquet nunc. Morbi pellentesque, ipsum id molestie eleifend, nisi lectus posuere felis, in iaculis neque lectus a erat. Etiam ac faucibus libero, in egestas magna. Maecenas libero nunc, efficitur non dapibus ut, hendrerit quis nulla.
        
        Nam scelerisque efficitur scelerisque. Pellentesque at erat urna. Aenean magna massa, congue ut ex nec, ullamcorper bibendum orci. Morbi vel tellus sapien. Aenean molestie neque eu enim faucibus, non ultrices orci aliquam. Cras efficitur libero leo, eget rutrum ex semper at. Nulla a cursus turpis. Nulla egestas orci velit. Vivamus in erat ante. Nam in tempor ipsum, et dapibus neque. Duis vestibulum gravida ex ac malesuada.
        
        In ac ex nec est aliquet malesuada. Proin sed leo magna. Nunc eu lectus fringilla, aliquam sem quis, consequat nulla. Quisque pellentesque egestas sapien, fringilla hendrerit magna lobortis vel. Nunc tincidunt feugiat pretium. Sed rhoncus elit eu sapien ullamcorper pulvinar. Nam aliquet lorem et felis posuere, et gravida turpis laoreet. Morbi lobortis augue eget lacus dapibus, eget commodo libero fermentum. Sed facilisis est sed nibh molestie euismod.
        
        Fusce augue nisi, interdum a ultrices vel, auctor id lorem. Donec turpis magna, scelerisque et risus quis, dapibus aliquet turpis. Sed tempor volutpat nibh, quis sollicitudin orci facilisis et. In hac habitasse platea dictumst. Maecenas commodo fringilla tellus, a ornare sem iaculis vitae. Morbi sodales cursus nulla, et malesuada sem convallis ut. Morbi vitae cursus erat. Ut eget erat ac ex feugiat pharetra. Aenean lobortis lacinia leo sit amet efficitur. Mauris tempus magna nec imperdiet vestibulum. Vestibulum malesuada nunc eget laoreet rutrum. Curabitur dignissim volutpat porttitor.
        
        </p></div><br>

        <button class="botaoAbrir"><a style="text-decoration: none; color: black;" href="pagina2.php">Abrir Laboratório Virtual</a></button>

















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
</html>