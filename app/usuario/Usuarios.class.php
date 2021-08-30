<?php 

class Usuario{
	
	public function login($email, $senha, $pdo){

		$sql = "SELECT email, senha FROM usuario WHERE email = :email AND senha = :senha";

		$sql = $pdo->prepare($sql);

		$sql->bindValue("email", $email);
		$sql->bindValue("senha", $senha);
		$sql->execute();

		if($sql->rowCount() > 0){

			$resultado_consulta = $sql->fetch();

			$_SESSION['email'] = $resultado_consulta['email'];

			return true;

		}else{

			return false;
		}	
	}



	public function cadastrar($nome, $email, $senha, $pdo){

		$sql_verificar_email = "SELECT nome FROM usuario WHERE email = :email";
		$sql_verificar_email = $pdo->prepare($sql_verificar_email);
		$sql_verificar_email->bindValue("email", $email);
		$sql_verificar_email->execute();

		if($sql_verificar_email->rowCount() < 1){

			$sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, MD5(:senha))";

			$sql = $pdo->prepare($sql);

			$sql->bindValue("nome", $nome);
			$sql->bindValue("email", $email);
			$sql->bindValue("senha", $senha);
			
			if($sql->execute()){

				return "Usuário cadastrado com sucesso";

			}else{

				return "Erro as cadastrar usuário";
			}	

		}else{

			return "E-mail já existe";

		}
	}


	public function logged($email, $pdo){

		$dados_usuario = array();

		$sql = "SELECT nome, administrador FROM usuario WHERE email = :email";
		$sql = $pdo->prepare($sql);
		$sql->bindValue("email", $email);
		$sql->execute();

		if($sql->rowCount() > 0){
			
			$dados_usuario = $sql->fetch();

		}
		
		return $dados_usuario;
	}


	public function recuperar_nome($email, $pdo){

		$sql = "SELECT nome FROM usuario WHERE email = :email";
		$sql = $pdo->prepare($sql);
		$sql->bindValue("email", $email);
		$sql->execute();

		$dados_usuario = $sql->fetch();
		
		return $dados_usuario['nome'];
	}
}

?>