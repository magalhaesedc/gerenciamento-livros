CREATE TABLE IF NOT EXISTS usuario(
	nome VARCHAR(80) NOT NULL,
	email VARCHAR(120) NOT NULL PRIMARY KEY,
	senha varchar(255),
	administrador BOOLEAN NOT NULL DEFAULT FALSE
);


CREATE TABLE IF NOT EXISTS livro(
	isbn VARCHAR(30) NULL PRIMARY KEY,
	titulo VARCHAR(80) NOT NULL,
	autor VARCHAR(80) NOT NULL,
	edicao SMALLINT NOT NULL,
	editora VARCHAR(50) NOT NULL,
	ano_publicacao INTEGER NOT NULL,
	data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	email_usuario VARCHAR(120) NOT NULL,
	FOREIGN KEY (email_usuario) REFERENCES usuario (email)
);



INSERT INTO

usuario (nome, email, senha, administrador)

VALUES

('Usuário Administrador', 'admin@email.com', MD5('123'), TRUE),
('Usuário Cliente', 'cliente@email.com', MD5('123'), FALSE);



INSERT INTO 

livro (isbn, titulo, autor, edicao, editora, ano_publicacao, data_cadastro, email_usuario)

VALUES 

('6556250465', 'Guia Prático de Implementação da LGPD', 'Daniel Donda', 1, 'Labrador', 2020, '2021-08-28', 'cliente@email.com'),   
('8535933964', 'Uma terra prometida', 'Barack Obama', 1, 'Companhia', 2020, '2021-08-28', 'admin@email.com'),
('8543004799', 'Java: Como Programar 2', 'Paul Deitel, Harvey Deitel', 10, 'Pearson', 2016, '2021-08-28', 'cliente@email.com'),
('854520034', 'O poder da ação', 'Paulo Vieira', 23, 'Gente', 2015, '2021-08-28', 'admin@email.com'),
('8576082675', 'Código limpo: Habilidades práticas', 'Robert C. Martin', 1, 'Alta Books', 2009, '2021-08-28', 'admin@email.com'),
('8595083274', 'Do Mil ao Milhão. Sem Cortar o Cafezinho', 'Thiago Nigro', 1, 'HarperCollins', 2018, '2021-08-28', 'admin@email.com');