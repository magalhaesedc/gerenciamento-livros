<?php 

session_start();

$gravar_usuario = filter_input(INPUT_POST, 'gravar-usuario', FILTER_SANITIZE_STRING);

if($gravar_usuario){

	require '../../../conexao.php';
	require '../Usuarios.class.php';

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

	$usuario = new Usuario();

	try{

		$mensagem = $usuario->cadastrar($nome, $email, $senha, $pdo);

		if($mensagem == 'E-mail já existe'){

			$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								   E-mail já existe!
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>";

			header("Location: ../view/cadastrar_usuario.php");

		}


		if($mensagem == 'Erro as cadastrar usuário'){

			$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								   Erro as cadastrar usuário
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>";

			header("Location: ../view/cadastrar_usuario.php");

		}

		if($mensagem == 'Usuário cadastrado com sucesso'){

			$_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
								   Usuário cadastrado com sucesso!
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>";

			header("Location: ../../login/view/login.php");

		}


	}catch(Exception $e){

		$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								   Erro ao cadastrar usuário!
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>";

		header("Location: ../../usuario/view/cadastrar_usuario.php");
	}
}

?>