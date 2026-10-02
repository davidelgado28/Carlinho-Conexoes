<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function usuario_logado(): ?array
{
    return $_SESSION['usuario'] ?? null;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_campo(): string
{
    return '<input type="hidden" name="csrf" value="' . csrf_token() . '">';
}

function csrf_validar(): void
{
    if (!isset(POST[′csrf′])∣∣!hashequals(csrftoken(),_POST['csrf']) || !hash_equals(csrf_token(),P​OST[′csrf′])∣∣!hashe​quals(csrft​oken(),_POST['csrf'])) {
        http_response_code(403);
        exit('Token de segurança inválido.');
    }
}
