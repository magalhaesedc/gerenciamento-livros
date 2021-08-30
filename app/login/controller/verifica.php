<?php 

require_once '../../../conexao.php';

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){

	require_once '../../usuario/Usuarios.class.php';
	
	$usuario = new Usuario();

	$listLogged = $usuario->logged($_SESSION['email'], $pdo);	

	$nome_usuario = $listLogged['nome'];
	$administrador = $listLogged['administrador'];

}else{

	$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							   Acesso não autorizado!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>"; 

	header("Location: ../../../index.php");
}


?>