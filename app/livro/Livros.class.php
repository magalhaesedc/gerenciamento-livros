<?php 

class Livro{
	
	public function cadastrar($isbn, $titulo, $autor, $edicao, $editora, $data_cadastro, $ano_publicacao, $email_usuario, $pdo){

		$sql = "INSERT INTO livro (isbn, titulo, autor, edicao, editora, data_cadastro, ano_publicacao, email_usuario) VALUES (:isbn, :titulo, :autor, :edicao, :editora, :data_cadastro, :ano_publicacao, :email_usuario)";

		$sql = $pdo->prepare($sql);

		$sql->bindValue("isbn", $isbn);
		$sql->bindValue("titulo", $titulo);
		$sql->bindValue("autor", $autor);
		$sql->bindValue("edicao", $edicao);
		$sql->bindValue("editora", $editora);
		$sql->bindValue("data_cadastro", $data_cadastro);
		$sql->bindValue("ano_publicacao", $ano_publicacao);
		$sql->bindValue("email_usuario", $email_usuario);
		
		return $sql->execute();
	}

	public function listar($pdo){

		$livros = array();

		$sql = "SELECT isbn, titulo, autor, edicao, editora, ano_publicacao, data_cadastro, email_usuario FROM livro ORDER BY titulo";

		$sql = $pdo->prepare($sql);

		$sql->execute();

		if($sql->rowCount() > 0){
			
			$livros = $sql->fetchAll();
		}

		return $livros;
	}

	public function recuperar($isbn, $pdo){

		$livro = array();

		$sql = "SELECT isbn, titulo, autor, edicao, editora, ano_publicacao FROM livro WHERE isbn = :isbn";

		$sql = $pdo->prepare($sql);

		$sql->bindValue("isbn", $isbn);

		$sql->execute();

		if($sql->rowCount() > 0){
			
			$livro = $sql->fetch();
		}

		return $livro;
	}

	public function alterar($isbn, $titulo, $autor, $edicao, $editora, $ano_publicacao, $pdo){

		$sql = "UPDATE livro SET titulo = :titulo, autor = :autor, edicao = :edicao, editora = :editora, ano_publicacao = :ano_publicacao WHERE isbn = :isbn";

		$sql = $pdo->prepare($sql);

		$sql->bindValue("isbn", $isbn);
		$sql->bindValue("titulo", $titulo);
		$sql->bindValue("autor", $autor);
		$sql->bindValue("edicao", $edicao);
		$sql->bindValue("editora", $editora);
		$sql->bindValue("ano_publicacao", $ano_publicacao);
		
		return $sql->execute();
	}

	public function excluir($isbn, $pdo){

		$sql = "DELETE FROM livro WHERE isbn = :isbn";

		$sql = $pdo->prepare($sql);

		$sql->bindValue("isbn", $isbn);
		
		return $sql->execute();
	}
}