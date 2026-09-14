<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagem_url = trim($_POST['imagem_url']);
    $legenda = trim($_POST['legenda']);
    
    if (!empty($imagem_url)) {
        $novoPost = [
            'id' => time(), 
            'nome_usuario' => 'carlinho_admin',
            'foto_perfil' => 'https://via.placeholder.com/150/333333/FFFFFF?text=Admin',
            'imagem_url' => $imagem_url,
            'legenda' => $legenda,
            'curtidas' => 0,
            'data_criacao' => date('Y-m-d H:i:s')
        ];

        $arquivo = 'posts.json';
        $posts = file_exists($arquivo) ? json_decode(file_get_contents($arquivo), true) : [];
        array_unshift($posts, $novoPost);
        file_put_contents($arquivo, json_encode($posts, JSON_PRETTY_PRINT));
        
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
