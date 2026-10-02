<?php

require_once __DIR__ . '/session.php';
require_once __DIR__ . '/../config/database.php';

function exigir_login(): void
{
    if (usuario_logado() === null) {
        header('Location: /login.php');
        exit;
    }
}
