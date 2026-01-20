<?php
session_start();
require 'C:\crematorio-pwa2026\crematorio-pwa/compass-connections-joson';

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['email'], $data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Datos inválidos']);
    exit;
}

$user = $db->users->findOne([
    'email' => $data['email']
]);

if ($user && password_verify($data['password'], $user['password'])) {
    $_SESSION['user_id'] = (string)$user['_id'];
    $_SESSION['rol'] = $user['rol'];
    echo json_encode(['status' => 'ok']);
} else {
    http_response_code(401);
    echo json_encode(['error' => 'Credenciales incorrectas']);
}
