CREATE DATABASE IF NOT EXISTS carlinho_conexoes;
USE carlinho_conexoes;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(50) NOT NULL,
    foto_perfil VARCHAR(255),
    senha_hash VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    imagem_url VARCHAR(255) NOT NULL,
    legenda TEXT,
    curtidas INT DEFAULT 0,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

INSERT INTO usuarios (nome_usuario, foto_perfil, senha_hash) 
VALUES ('carlinho_admin', 'https://api.dicebear.com/7.x/avataaars/svg?seed=carlinho', 'senha_falsa_123');
