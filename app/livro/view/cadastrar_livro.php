<?php 

session_start();

require '../../login/controller/verifica.php';

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

	header("Location: ../../../index.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Livro - Sistema de Gerenciamento de Livro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Edson Magalhaes da Costa"/>
	<meta name="description" content="Sistema para gerenciamento de livros"/>
	<meta name="keywords" content="gerenciamento, livro, php, postgress, sistema">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../../css/style.css">

	<link rel="shortcut icon" href="../../../images/favicon.png" />
	
</head>
<body>
	<!-- Início NavBar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		
		<div class="container">

			<a class="navbar-brand h1 mb-0" href="../../home/view/home.php">Gerenciamento de Livros</a>
				
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite" aria-controls="navbarSite" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSite">
	    		<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="../../home/view/home.php">Início</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Cadastrar Livro</a>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto" style="cursor: pointer;">
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" id="navDrop" data-toggle="dropdown">
			        	<?php echo $nome_usuario; ?><i class="ml-3 fa fa-user"></i>
			        </a>
			        <div class="dropdown-menu dropdown-menu-right dropdown-default">
			          <a class="dropdown-item" href="../../login/controller/logout.php">Sair</a>
			        </div>
			      </li>
			    </ul>
			</div>
		</div>
	</nav>
	<!-- Fim NavBar -->

	<!-- Form Cadastrar -->

	<div class="container py-3 w-75 mb-5">	
	    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
	      <h2 class="display-5 fw-normal">Cadastrar Livro</h2>
	    </div>

	    <?php 
			if(isset($_SESSION['mensagem'])){
				echo $_SESSION['mensagem'];
				unset($_SESSION['mensagem']);
			}
	     ?>

	    <form class="needs-validated" method="POST" action="../controller/gravar_livro.php">

			<div class="form-group">
			    <label for="isbn">ISBN</label>
			    <input required type="text" maxlength="28" class="form-control" id="isbn" name="isbn" aria-describedby="emailHelp" placeholder="Digite o ISBN do livro">
			</div>
			<div class="form-group">
			    <label for="titulo">Título</label>
			    <input required type="text" maxlength="78" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do livro">
			</div>
			<div class="form-group">
			    <label for="autor">Autor(es)</label>
			    <input required type="text" maxlength="78" class="form-control" id="autor" name="autor" placeholder="Digite o nome do(s) autor(es) do livro, separado por virgula">
			</div>
			<div class="form-group">
			    <label for="edicao">Edição</label>
			    <input required type="number" class="form-control" id="edicao" name="edicao" placeholder="Digite a edição do livro" min="1">
			</div>
			<div class="form-group">
			    <label for="editora">Editora</label>
			    <input required type="text" maxlength="48" class="form-control" id="editora" name="editora" placeholder="Digite a editora do livro">
			</div>
			<div class="form-group">
			    <label for="ano-publicacao">Ano de Publicação</label>
			    <input required type="number" class="form-control" id="ano-publicacao" name="ano-publicacao" placeholder="Digite o ano de publicação do livro" min="1000">
			</div>
			<input type="submit" class="btn btn-primary" value="Salvar" name="gravar-livro"></button>
		</form>
	</div>

	<!-- Fim Form Cadastrar -->

  <script src="../../../js/jquery.min.js"></script>
  <script src="../../../js/popper.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/main.js"></script>
 
</body>
</html>