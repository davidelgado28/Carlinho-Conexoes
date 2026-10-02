CREATE DATABASE IF NOT EXISTS carlinho_conexoes
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE carlinho_conexoes;

CREATE TABLE usuarios (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario  VARCHAR(30) NOT NULL UNIQUE,
    email         VARCHAR(100) NOT NULL UNIQUE,
    senha_hash    VARCHAR(255) NOT NULL,
    bio           VARCHAR(200) DEFAULT '',
    foto          VARCHAR(100) DEFAULT 'padrao.png',
    criado_em     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE posts (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    conteudo   TEXT NOT NULL,
    criado_em  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE curtidas (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    post_id    INT NOT NULL,
    criado_em  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unica_curtida (usuario_id, post_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE comentarios (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    post_id    INT NOT NULL,
    conteudo   TEXT NOT NULL,
    criado_em  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
) ENGINE=InnoDB;
