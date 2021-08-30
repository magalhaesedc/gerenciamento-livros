<?php

session_start();

if (isset($_POST['email']) || !empty($_POST['email']) || isset($_POST['senha']) || !empty($_POST['senha'])){

	require '../../../conexao.php';
	require '../../usuario/Usuarios.class.php';


	$usuario = new Usuario();

	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);


	if($usuario->login($email, MD5($senha), $pdo)){

		if(isset($_SESSION['email'])){

			header("Location: ../../home/view/home.php");

		}else{

			$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							   Email e/ou senha estão incorretos!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>"; 

			header("Location: ../view/login.php");

		}

	}else{

		$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							   Email e/ou senha estão incorretos!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>"; 

		header("Location: ../view/login.php");
	}

}else{

	$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							   Email e/ou senha estão incorretos!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>"; 

	header("Location: ../view/login.php");
}

?>