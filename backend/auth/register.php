<?php
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);

$passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);

$db->users->insertOne([
    'nombre' => $data['nombre'],
    'email' => $data['email'],
    'password' => $passwordHash,
    'rol' => $data['rol'] ?? 'usuario',
    'created_at' => new MongoDB\BSON\UTCDateTime()
]);

echo json_encode(['status' => 'ok']);
?>