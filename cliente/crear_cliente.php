<?php
include '../conexion.php';

try {

    $statement = $mbd->prepare("INSERT INTO clientes (nombre, correo, telefono) VALUES (:nombre, :correo, :telefono)");
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':correo', $correo);
    $statement->bindParam(':edad', $telefono);

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['edad'];  

    $statement->execute();
    $_POST['id'] = $mbd->lastInsertId();
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($_POST);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'Error: ' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}