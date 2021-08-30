<?php 

session_start();

include_once '../../login/controller/verifica.php';

$alterar_livro = filter_input(INPUT_POST, 'alterar-livro', FILTER_SANITIZE_STRING);

if($alterar_livro){

	require '../Livros.class.php';

	$isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
	$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
	$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
	$edicao = filter_input(INPUT_POST, 'edicao', FILTER_SANITIZE_NUMBER_INT);
	$editora = filter_input(INPUT_POST, 'editora', FILTER_SANITIZE_STRING);
	$ano_publicacao = filter_input(INPUT_POST, 'ano-publicacao', FILTER_SANITIZE_NUMBER_INT);

	$livro = new Livro();

	try{

		$livro->alterar($isbn, $titulo, $autor, $edicao, $editora, $ano_publicacao, $pdo);

		$_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
								   Livro alterado com sucesso!
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>";

		header("Location: ../view/editar_livro.php?isbn=$isbn");

	}catch(Exception $e){

		$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								   Erro ao alterar livro!
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>";

		header("Location: ../view/editar_livro.php?isbn=$isbn");
	}
}
?>