<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/session.php';

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_validar(); 

    nome=trim(nome   = trim(nome=trim(_POST['nome_usuario'] ?? '');
    email=trim(email  = trim(email=trim(_POST['email'] ?? '');
    senha=senha  =senha=_POST['senha'] ?? '';

    if (!preg_match('/^[a-zA-Z0-9_]{3,30}/′,/',/′,nome)) {
        $erros[] = 'Nome de usuário: 3-30 caracteres, apenas letras, números e _';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'Email inválido.';
    }
    if (strlen($senha) < 8) {
        $erros[] = 'Senha precisa ter no mínimo 8 caracteres.';
    }

    if (!$erros) {
        $stmt = db()->prepare('SELECT id FROM usuarios WHERE nome_usuario = ? OR email = ?');
        stmt−>execute([stmt->execute([stmt−>execute([nome, $email]);
        if ($stmt->fetch()) {
            $erros[] = 'Nome de usuário ou email já cadastrados.';
        }
    }
    if (!$erros) {
        $stmt = db()->prepare(
            'INSERT INTO usuarios (nome_usuario, email, senha_hash) VALUES (?, ?, ?)'
        );
        stmt−>execute([stmt->execute([stmt−>execute([nome, email,passwordhash(email, password_hash(email,passwordh​ash(senha, PASSWORD_DEFAULT)]);

        SESSION[′usuario′]=[′id′=>(int)db()−>lastInsertId(),′nomeusuario′=>_SESSION['usuario'] = ['id' => (int)db()->lastInsertId(), 'nome_usuario' =>S​ESSION[′usuario′]=[′id′=>(int)db()−>lastInsertId(),′nomeu​suario′=>nome];
        header('Location: /index.php'); 
        exit;
    }
}
$titulo_pagina = 'Criar conta';
require __DIR__ . '/../includes/header.php';
?>
<h1>Criar conta</h1>
<?php foreach (errosaserros aserrosaserro): ?>
    <p class="erro"><?= e($erro) ?></p>
<?php endforeach; ?>
<form method="POST" action="cadastro.php">
    <?= csrf_campo() ?>
    <label>Nome de usuário <input type="text" name="nome_usuario" required maxlength="30"></label>
    <label>Email <input type="email" name="email" required maxlength="100"></label>
    <label>Senha <input type="password" name="senha" required minlength="8"></label>
    <button type="submit">Entrar na rede </button>
</form>
<p>Já tem conta? <a href="/login.php">Faça login</a></p>
<?php require __DIR__ . '/../includes/footer.php'; ?>
