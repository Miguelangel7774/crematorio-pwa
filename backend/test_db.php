<?php
require 'config/db.php';

$colecciones = $db->listCollections();

foreach ($colecciones as $col) {
    echo $col->getName() . "<br>";
}
