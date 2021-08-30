<?php 

session_start(); 

if(isset($_SESSION) && !empty($_SESSION)){

	header("Location: app/home/view/home.php");

}else{

	$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							   Acesso não autorizado!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>";

	header("Location: app/login/view/login.php");

}

?>