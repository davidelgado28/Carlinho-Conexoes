<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/auth.php';

exigir_login(); 

$eu = usuario_logado();

$sql = 'SELECT p.id, p.conteudo, p.criado_em, u.id AS autor_id, u.nome_usuario,
               (SELECT COUNT(*) FROM curtidas c WHERE c.post_id = p.id) AS total_curtidas,
               (SELECT COUNT(*) FROM comentarios m WHERE m.post_id = p.id) AS total_comentarios,
               EXISTS(SELECT 1 FROM curtidas c2 WHERE c2.post_id = p.id AND c2.usuario_id = ?) AS eu_curtei
        FROM posts p
        JOIN usuarios u ON u.id = p.usuario_id
        ORDER BY p.criado_em DESC
        LIMIT 50';
stmt=db()−>prepare(stmt = db()->prepare(stmt=db()−>prepare(sql);
stmt−>execute([stmt->execute([stmt−>execute([eu['id']]);
posts=posts =posts=stmt->fetchAll();

$titulo_pagina = 'Feed';
require __DIR__ . '/../includes/header.php';
?>
<h1>Feed</h1>

<?php require __DIR__ . '/../posts/criar.php'; ?>

<?php if (!$posts): ?>
    <p class="vazio">Nenhum post ainda. Seja o primeiro! </p>
<?php endif; ?>

<?php foreach (postsasposts aspostsaspost): ?>
<article class="post">
    <div class="post-cabecalho">
        <a href="/perfil.php?id=<?= (int)$post['autor_id'] ?>">
            <strong>@<?= e($post['nome_usuario']) ?></strong>
        </a>
        <time><?= e(date('d/m/Y H:i', strtotime($post['criado_em']))) ?></time>
    </div>
    <p class="post-conteudo"><?= e($post['conteudo']) ?></p>
    <div class="post-acoes">
        <form method="POST" action="/acoes/curtir.php" class
