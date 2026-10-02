<?php require_once __DIR__ . '/session.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titulo_pagina ?? 'Carlinho-Conexões') ?></title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
<header class="topo">
    <a href="/index.php" class="logo">🔗 Carlinho-Conexões</a>
    <nav>
        <?php if ($u = usuario_logado()): ?>
            <a href="/perfil.php?id=<?= (int)$u['id'] ?>">Meu perfil</a>
            <a href="/logout.php">Sair</a>
        <?php else: ?>
            <a href="/login.php">Entrar</a>
            <a href="/cadastro.php">Criar conta</a>
        <?php endif; ?>
    </nav>
</header>
<main class="conteudo">
