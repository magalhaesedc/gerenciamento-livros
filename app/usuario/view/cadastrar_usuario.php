<?php 

	session_start();

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Cadastrar Usuário - Sistema de Gerenciamento de Livro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="../../../css/style.css">

		<link rel="shortcut icon" href="../../../images/favicon.png" />

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="d-flex">
		      		<div class="w-100">
		      			<h3 class="mb-4">Preencha seus dados</h3>
		      		</div>
		      	</div>

		      	<?php

	      			if(isset($_SESSION['mensagem'])){
								echo $_SESSION['mensagem'];
								unset($_SESSION['mensagem']);
							}
							
		      	?>

						<form class="login-form" action="../controller/gravar_usuario.php" method="POST">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" name="nome" class="form-control rounded-left" placeholder="Nome" required>
		      		</div>
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-envelope"></span></div>
		      			<input type="email" name="email" class="form-control rounded-left" placeholder="E-mail" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" name="senha" class="form-control rounded-left" placeholder="Senha" required>
	            </div>
	            <div class="form-group d-flex align-items-center">
								<div class="w-100 d-flex justify-content-end">
		            	<input type="submit" class="btn btn-primary rounded submit" name="gravar-usuario" value="Cadastrar"></input>
	            	</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../../../js/jquery.min.js"></script>
  <script src="../../../js/popper.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/main.js"></script>

	</body>
</html>