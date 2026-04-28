<?php 

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');

    if($db->connect_errno) {
        echo "Error no se pudo conectar a la base de datos";
        exit;
    }

    $db->set_charset('utf8mb4');

    return $db;
}
