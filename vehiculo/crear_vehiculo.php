<?php
include '../conexion.php';

try {

    $statement = $mbd->prepare("INSERT INTO vehiculos (idcliente, nombre, especificaciones, fechaventa ,fechafabricacion, nrodellantas, peso, correofabricante) 
    VALUES (:idcliente, :nombre, :especificaciones, :fechaventa	,:fechafabricacion, :nrodellantas, :peso, :correofabricante)");

    $statement->bindParam(':idcliente', $idcliente);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':especificaciones', $especificaciones);
    $statement->bindParam(':fechaventa', $fechaventa);
    $statement->bindParam(':fechafabricacion', $fechafabricacion);
    $statement->bindParam(':nrodellantas', $nrodellantas);
    $statement->bindParam(':peso', $peso);
    $statement->bindParam(':correofabricante', $correofabricante);

    $idcliente = $_POST['idcliente'];
    $nombre = $_POST['nombre'];
    $especificaciones = $_POST['especificaciones'];
    $fechaventa	 = $_POST['fechaventa'];
    $fechafabricacion	 = $_POST['fechafabricacion'];
    $nrodellantas = $_POST['nrodellantas'];
    $peso = $_POST['peso'];
    $correofabricante = $_POST['correofabricante'];

    $statement->execute();
    $_POST['id'] = $mbd->lastInsertId();

    $statement = $mbd->prepare("SELECT * FROM clientes WHERE id = ". $_POST['idcliente']);
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    $_POST['data_fk'] = $data;

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($_POST);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}