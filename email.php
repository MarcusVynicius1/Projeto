<?php
	session_start();
	include_once "conexao.php";
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
	require 'vendor/autoload.php';

	$query_usuario = "SELECT nome, email, senha
                FROM usuario
                WHERE email=:email
                LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $result_usuario->execute();
	
	if(empty($_POST['nome'])||empty($_POST['email'])||empty($_POST['senha'])||empty($_POST['senhaConfirm'])){
		$mensagem = "<p style='color:red;'>Você precisa preencher todos os campos.</p>";
	}
	elseif($_POST['senha']!=$_POST['senhaConfirm']){
		$mensagem = "<p style='color:red;'>Senhas diferentes.</p>";
	}
	elseif(($result_usuario) and ($result_usuario->rowCount() != 0)){
		$mensagem = "<p style='color:red;'>Email já cadastrado ou aguardando confirmação.</p>";
	}
    else{   
		$nome = htmlspecialchars(addslashes($_POST['nome']));
		$email = htmlspecialchars(addslashes($_POST['email']));
		$senha = htmlspecialchars(addslashes($_POST['senha']));
		
		$query_usuario = "INSERT INTO usuario (nome, email, senha, adm, cadastrado, DataHoraCadastro) VALUES(:nome, :email, :senha, :adm, :cadastrado, localtime())";
		$result_usuario = $conn->prepare($query_usuario);
		$result_usuario->execute(array(
			':nome' => $nome,
			':email' => $email,
			':senha' => $senha,
			':adm' => 0,
			':cadastrado' =>0
		));
		
		$token = $email;
		
		$mail = new PHPMailer(true);
		
		try {
			
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'projetoiffvirtuallab@gmail.com';                     //SMTP username
			$mail->Password   = 'uyfwlszbuellcccz';                               //SMTP password
			$mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
				);
				
				//Recipients
				$mail->setFrom('projetoiffvirtuallab@gmail.com', 'VSPLab');
				$mail->addAddress($email, 'User');     //Add a recipient
				
				
				$link = $_SERVER['SERVER_ADDR'].'/Teste8/cadastroRealizado.php?token=';
				$mensagem = '<a href="'.$link.$token.'"> <b>Clique no aqui abaixo para confirmar.</b> </a>';
				
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Confirme seu cadastro';
			$mail->Body    = $mensagem;
			$mail->AltBody = $mensagem;
			
			$mail->send();
			//echo 'Message has been sent';
			$mensagem = "<p style='color:green;'>Um email de confirmação foi enviado.</p>";
		} catch (Exception $e) {
			$mensagem = "<p style='color:red;'>Email não encontrado.</p>";
			//echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
	if(isset($_POST['submit'])){
	  echo $mensagem;
	}
	?>
		
		