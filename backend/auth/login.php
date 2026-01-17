<?php
session_start();
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);
$user = $db->users->findOne(['email' => $data['email']]);

if ($user && password_verify($data['password'], $user['password'])) {
    $_SESSION['user_id'] = (string)$user['_id'];
    $_SESSION['rol'] = $user['rol'];
    echo json_encode(['status' => 'ok']);
} else {
    http_response_code(401);
}
?>