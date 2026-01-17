<?php
session_start();
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);

$db->citas->insertOne([
    'user_id' => $_SESSION['user_id'],
    'mascota' => $data['mascota'],
    'servicio' => $data['servicio'],
    'fecha' => $data['fecha'],
    'estado' => 'activa'
]);

echo json_encode(['status' => 'cita creada']);
?>