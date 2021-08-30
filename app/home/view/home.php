<?php 

session_start();

require '../../login/controller/verifica.php';

if(!isset($_SESSION['email']) && empty($_SESSION['email'])){


	$_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							   Acesso não autorizado!
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>"; 

	header("Location: ../../../index.php");

}else{

	require_once '../../livro/Livros.class.php';
	
	$livro = new Livro();

	$lista_livros = $livro->listar($pdo);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Início - Sistema de Gerenciamento de Livro</title>
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

			<a class="navbar-brand h1 mb-0" href="#">Gerenciamento de Livros</a>
				
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite" aria-controls="navbarSite" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSite">
	    		<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Início</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../../livro/view/cadastrar_livro.php">Cadastrar Livro</a>
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


	<!-- Table Listar -->

	<div class="container py-3 mb-5">

	    <div class="p-3 pb-md-4 mx-auto text-center">
	      <h2 class="display-5 fw-normal">Livros</h2>
	      <?php 
			if(isset($_SESSION['mensagem'])){
				echo $_SESSION['mensagem'];
				unset($_SESSION['mensagem']);
			}
	     ?>

	     <?php 
			if(count($lista_livros) < 1){
				echo "<div class='alert alert-dark' role='alert'>
					  Nenhum livro cadastrado!
					</div>";
				}
	     ?>
	    </div>
	    <table class="table table-striped table-responsive-lg">
		  <thead>
		    <tr>
		      <th scope="col">Título</th>
		      <th scope="col">Autor(es)</th>
		      <th scope="col">Editora</th>
		      <th scope="col">Ano Publicação</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		    

		      <?php 

		      	if(count($lista_livros) > 0){

		      		foreach ($lista_livros as $livro) { ?>
					
					<tr>
						<th scope='row'>
							<?php echo $livro['titulo']; ?> 
						</th>
						<td>
							<?php echo $livro['autor']; ?>       
						</td>
						<td>
						    <?php echo $livro['editora']; ?> 
						</td>
						<td>
							<?php echo $livro['ano_publicacao']; ?>
						</td>
						<td class='btn-group btn-group-sm'>
					      	<a class='btn btn-info'
					      		
					      		<?php if($administrador || $_SESSION['email'] == $livro['email_usuario']){ ?>
					      		href='../../livro/view/editar_livro.php?isbn=<?php echo $livro['isbn']; ?>'>
					      		<?php }else{ ?>
					      		href='#' data-toggle='modal' data-target='#modal-permissao-alterar'>
					      		<?php } ?>

					      		<i class='fa fa-edit'></i> 
					      		Editar

						    </a>
						    <a class='btn btn-danger'

						    	<?php if($administrador || $_SESSION['email'] == $livro['email_usuario']){ ?>
						    	href='../../livro/controller/excluir_livro.php?isbn=<?php echo $livro['isbn']; ?>' data-confirm='Tem certeza que deseja excluir o livro selecionado?'>
					      		<?php }else{ ?>
					      		href='#' data-toggle='modal' data-target='#modal-permissao-excluir'>
					      		<?php } ?>

					      		<i class='fa fa-trash'></i> 
					      		Excluir
					      	</a>
					      	<?php if($administrador){ ?>
					      	<a class='btn btn-success' data-toggle='modal' data-target='#modal-detalhes<?php echo $livro['isbn']; ?>' href='#'>
					      		<i class='fa fa-list'></i> 
					      		Detalhar
					      	</a>
					      	<?php } ?>
					    </td>
					</tr>

					<div class='modal fade' id='modal-detalhes<?php echo $livro['isbn']; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
						<div class='modal-dialog' role='document'>
							<div class='modal-content'>
								<div class='modal-header text-center'>
									<h5 class="modal-title w-100" id='modal-detalhes'><?php echo $livro['titulo']; ?></h5>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								</div>
								<div class='modal-body'>
									<div>
										<div class="row pl-3">
											<strong>ISBN: </strong><p class="pl-2"><?php echo $livro['isbn']; ?></p>
										</div>
										<div class="row pl-3">
											<strong>Autor(es):</strong><p class="pl-2"><?php echo $livro['autor']; ?></p>
										</div>
										<div class="row pl-3">
											<strong>Editora:</strong><p class="pl-2"><?php echo $livro['editora']; ?></p>
										</div>
										<div class="row pl-3">
											<strong>Ano Publicação:</strong><p class="pl-2"><?php echo $livro['ano_publicacao']; ?></p>
										</div>
										<div class="row pl-3">
											<strong>Edição:</strong><p class="pl-2"><?php echo $livro['edicao']; ?></p>
										</div>
									</div>
									<div class='border-top pt-2'>
										<div class="row pl-3">
											<strong>Data do Cadastro:</strong>
											<p class="pl-2">

												<?php

													echo date('d/m/Y', strtotime($livro['data_cadastro']));
													
												?>
											</p>
										</div>
										<div class="row pl-3">
											<strong>Usuário Responsável:</strong>
											<p class="pl-2">
												<?php 

													require_once '../../usuario/Usuarios.class.php';
	
													$usuario = new Usuario();

													echo $usuario->recuperar_nome($livro['email_usuario'], $pdo);

												?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php }} ?>
		  </tbody>
		</table>

		<!-- Modal de Permissão de Edição -->
		<div class='modal fade' id='modal-permissao-alterar' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
			<div class='modal-dialog' role='document'>
				<div class='modal-content'>
					<div class='modal-header text-center bg-danger'>
						<h5 class="modal-title w-100 text-light font-weight-bold">PERMISSÃO NEGADA</h5>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					</div>
					<div class='modal-body'>
						<p>Você não tem permissão de alterar esse livro.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- FIM Modal de Permissão de Edição -->

		<!-- Modal de Permissão de Exlusão -->
		<div class='modal fade' id='modal-permissao-excluir' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
			<div class='modal-dialog' role='document'>
				<div class='modal-content'>
					<div class='modal-header text-center bg-danger'>
						<h5 class="modal-title w-100 text-light font-weight-bold">PERMISSÃO NEGADA</h5>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					</div>
					<div class='modal-body'>
						<p>Você não tem permissão de excluir esse livro.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- FIM Modal de Permissão de Exlusão -->

	<!-- Fim Table Listar -->

  <script src="../../../js/jquery.min.js"></script>
  <script src="../../../js/popper.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/main.js"></script>
  <script src="../../../js/modal.js"></script>
 
</body>
</html>