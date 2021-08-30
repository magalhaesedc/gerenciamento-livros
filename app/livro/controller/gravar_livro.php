<?php 

session_start();

include_once '../../login/controller/verifica.php';

$gravar_livro = filter_input(INPUT_POST, 'gravar-livro', FILTER_SANITIZE_STRING);

if($gravar_livro){

	require '../Livros.class.php';

	$isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
	$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
	$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
	$edicao = filter_input(INPUT_POST, 'edicao', FILTER_SANITIZE_NUMBER_INT);
	$editora = filter_input(INPUT_POST, 'editora', FILTER_SANITIZE_STRING);
	$data_cadastro = new DateTime();
	$ano_publicacao = filter_input(INPUT_POST, 'ano-publicacao', FILTER_SANITIZE_NUMBER_INT);
	$email_usuario = $_SESSION['email'];

	$livro = new Livro();

	try{

		$livro->cadastrar($isbn, $titulo, $autor, $edicao, $editora, $data_cadastro->format('d/m/Y'), $ano_publicacao, $email_usuario, $pdo);

		$_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
								   Livro cadastrado com sucesso!
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>";

		header("Location: ../view/cadastrar_livro.php");

	}catch(Exception $e){

		$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								   Erro ao cadastrar livro!
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>";

		header("Location: ../view/cadastrar_livro.php");
	}
}
?>