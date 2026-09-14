<?php
require 'db.php';

$sql = "SELECT p.id, p.imagem_url, p.legenda, p.curtidas, u.nome_usuario, u.foto_perfil 
        FROM posts p 
        JOIN usuarios u ON p.usuario_id = u.id 
        ORDER BY p.data_criacao DESC";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carlinho Conexões</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <img src="logo.png" alt="Logo Carlinho Conexões" class="logo">
    </header>

    <main>
        <?php foreach ($posts as $post): ?>
            <article class="post-card">
                <div class="post-header">
                    <img src="<?= htmlspecialchars($post['foto_perfil']) ?>" alt="Foto de <?= htmlspecialchars($post['nome_usuario']) ?>">
                    <span><?= htmlspecialchars($post['nome_usuario']) ?></span>
                </div>
                
                <img src="<?= htmlspecialchars($post['imagem_url']) ?>" alt="Postagem" class="post-image">
                
                <div class="post-footer">
                    <button class="btn-curtir" data-id="<?= $post['id'] ?>">
                        <span class="icone-coracao">&#10084;</span>
                    </button>
                    <span class="contador-curtidas"><?= $post['curtidas'] ?> curtidas</span>
                    <p class="post-legenda">
                        <strong><?= htmlspecialchars($post['nome_usuario']) ?></strong> 
                        <?= htmlspecialchars($post['legenda']) ?>
                    </p>
                </div>
            </article>
        <?php endforeach; ?>
    </main>
    <a href="postar.php" class="btn-flutuante">+ Nova Conexão</a>
    <script src="script.js"></script>
</body>
</html>
