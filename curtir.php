<?php
require 'db.php';

header('Content-Type: application/json');

if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    $stmt = $pdo->prepare("UPDATE posts SET curtidas = curtidas + 1 WHERE id = ?");
    
    if ($stmt->execute([$id])) {
        $stmtBusca = $pdo->prepare("SELECT curtidas FROM posts WHERE id = ?");
        $stmtBusca->execute([$id]);
        $novas_curtidas = $stmtBusca->fetchColumn();

        echo json_encode(['sucesso' => true, 'novas_curtidas' => $novas_curtidas]);
        exit;
    }
}

echo json_encode(['sucesso' => false]);
?>
