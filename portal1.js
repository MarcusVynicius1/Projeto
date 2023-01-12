function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
  
const loginForm = document.getElementById("login-usuario-form");
const msgAlertErroLogin = document.getElementById("msgAlertErroLogin");


loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    if (document.getElementById("email").value === "") {
        msgAlertErroLogin.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>";
    } else if (document.getElementById("senha").value === "") {
        msgAlertErroLogin.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>";
    } else {
        const dadosForm = new FormData(loginForm);

        const dados = await fetch("login.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if(resposta['erro']){
            msgAlertErroLogin.innerHTML = resposta['msg']
        }else{
			window.location.reload();
            loginForm.reset();
			document.getElementById("myForm").style.display = "none";
        }
    }
});

window.onload = function (){
	var logado = document.getElementById("LoginFeito").value
    //var logado = "Sim";
	if(logado === "Sim"){
		document.getElementById("botao1").innerHTML = "<h4 style='position: absolute;font-size: 18px; margin-top: 2.5%; width: 88%; text-align: right;'> Bem vindo " + document.getElementById("nome").value + "</h4>"
		document.getElementById("botao2").innerHTML = "<a href='sair.php'><button class='button2'>Sair</button></a>"
        document.getElementById("botaoAdd").style.display = "block";
        document.getElementById("botaoAdd2").style.display = "block";
	}
	if(logado === "Nao"){     
		document.getElementById("botao1").innerHTML = "<div id='dados-usuario'>" + "<button class='button' onclick='openForm()'>Logar</button>" + "</div>"
		document.getElementById("botao2").innerHTML = "<a href='cadastro.html'><button class='button2'>Cadastra-se</button></a>"
        document.getElementById("botaoAdd").style.display = "none";
        document.getElementById("botaoAdd2").style.display = "none";
	}   
}

function MostrarArq(){

    if(document.getElementById("mostrarArq").style.display === "block"){
        document.getElementById("mostrarArq").style.display = "none";
        document.getElementById("botaoArq").textContent = "Mostrar Arquivos"
        
    } else {
        document.getElementById("mostrarArq").style.display = "block";
        document.getElementById("botaoArq").textContent = "Esconder Arquivos"
    }
    
}


function MostrarFerramenta(){

    if(document.getElementById("mostrarFerramenta").style.display === "block"){
        document.getElementById("mostrarFerramenta").style.display = "none";
        document.getElementById("botaoFerramenta").textContent = "Mostrar Ferramentas"

    } else {
        document.getElementById("mostrarFerramenta").style.display = "block";
        document.getElementById("botaoFerramenta").textContent = "Esconder Ferramentas"
    }

}