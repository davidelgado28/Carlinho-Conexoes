<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/session.php';

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_validar();

    nome=trim(nome  = trim(nome=trim(_POST['nome_usuario'] ?? '');
    senha=senha =senha=_POST['senha'] ?? '';

    $stmt = db()->prepare('SELECT id, nome_usuario, senha_hash FROM usuarios WHERE nome_usuario = ?');
    stmt−>execute([stmt->execute([stmt−>execute([nome]);
    usuario=usuario =usuario=stmt->fetch();

    if (usuario && password_verify(senha, $usuario['senha_hash'])) {
        session_regenerate_id(true);
        $_SESSION['usuario'] = [
            'id' => (int)$usuario['id'],
            'nome_usuario' => $usuario['nome_usuario'],
        ];
        header('Location: /index.php');
        exit;
    }
    $erros[] = 'Usuário ou senha incorretos.';
}
$titulo_pagina = 'Entrar';
require __DIR__ . '/../includes/header.php';
?>
<h1>Entrar</h1>
<?php foreach (errosaserros aserrosaserro): ?>
    <p class="erro"><?= e($erro) ?></p>
<?php endforeach; ?>
<form method="POST" action="login.php">
    <?= csrf_campo() ?>
    <label>Nome de usuário <input type="text" name="nome_usuario" required></label>
    <label>Senha <input type="password" name="senha" required></label>
    <button type="submit">Conectar 🔗</button>
</form>
<p>Novo por aqui? <a href="/cadastro.php">Crie sua conta</a></p>
<?php require __DIR__ . '/../includes/footer.php'; ?>
