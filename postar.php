<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagem_url = $_POST['imagem_url'] ?? '';
    $legenda = $_POST['legenda'] ?? '';
    $usuario_id = 1; 

    if (!empty($imagem_url)) {
        $stmt = $pdo->prepare("INSERT INTO posts (usuario_id, imagem_url, legenda) VALUES (?, ?, ?)");
        $stmt->execute([$usuario_id, $imagem_url, $legenda]);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Postagem - Carlinho Conexões</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo Carlinho Conexões" class="logo">
    </header>

    <main>
        <div class="form-container">
            <form action="postar.php" method="POST">
                <div class="form-group">
                    <label for="imagem_url">URL da ImagemExterna:</label>
                    <input type="url" id="imagem_url" name="imagem_url" placeholder="https://exemplo.com/imagem.jpg" required>
                </div>
                <div class="form-group">
                    <label for="legenda">Legenda:</label>
                    <textarea id="legenda" name="legenda" rows="3" placeholder="O que está acontecendo?"></textarea>
                </div>
                <button type="submit" class="btn-submit">Compartilhar</button>
            </form>
            <br>
            <a href="index.php" style="color: #0095f6; text-decoration: none; font-size: 14px;">< Voltar ao Feed</a>
        </div>
    </main>
</body>
</html>
