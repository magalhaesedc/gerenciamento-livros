<?php 

session_start();

include_once '../../login/controller/verifica.php';
require '../Livros.class.php';

$livro = new Livro();

$isbn = filter_input(INPUT_GET, 'isbn', FILTER_SANITIZE_STRING);

try{

	$livro->excluir($isbn, $pdo);

	$_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
							   Livro exlcuído com sucesso!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>";

	header("Location: ../../home/view/home.php");

}catch(Exception $e){

	//echo 'Exceção capturada: ',  $e->getMessage(), "\n";

	$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							   Erro ao excluir livro!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>";

	header("Location: ../../home/view/home.php");
}

?>