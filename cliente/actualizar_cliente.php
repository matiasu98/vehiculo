<?php
include '../conexion.php';

try {

    $statement = $mbd->prepare("UPDATE clientes SET nombre = :nombre,  correo = :correo, telefono = :telefono WHERE id = :id");
    $statement->bindParam(':id', $id);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':correo', $correo);
    $statement->bindParam(':telefono', $telefono);

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $statement->execute();
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        "mensaje" => "Actualizacion éxitosa",
        "data" => [
            "id" => $id,
            "descripcion" => "DW"
        ]
    ]);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'Error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}
