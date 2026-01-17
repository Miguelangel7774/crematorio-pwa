<?php
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);

$db->citas->updateOne(
    ['_id' => new MongoDB\BSON\ObjectId($data['id'])],
    ['$set' => ['estado' => 'cancelada']]
);
?>