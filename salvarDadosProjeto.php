<?php

header('Content-Type: application/json');

$aResult = array();

if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['functionname']) {
        case 'salvar':
           if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 4) ) {
               $aResult['error'] = 'Error in arguments!';
           }
           else {
               $aResult['result'] = salvar(($_POST['arguments'][0]), ($_POST['arguments'][1]), ($_POST['arguments'][2]), ($_POST['arguments'][3]));
           }
           break;

        default:
           $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
           break;
    }

}


echo json_encode($aResult);

function salvar($t1,$t2,$t3,$t4){
    include_once "conexao.php";
    session_start();
    $query_usuario = "INSERT INTO projeto (introducao, descricao_geral, requisitos, descricao_metodos_LR, idusuario) 
                        VALUES(:intro, :desc_g, :req, :desc_m, :id_u)";
		$result_usuario = $conn->prepare($query_usuario);
		$result_usuario->execute(array(
			':intro' => $t1,
			':desc_g' => $t2,
			':req' => $t3,
			':desc_m' => $t4,
			':id_u' =>$_SESSION['id']
		));
}

?>