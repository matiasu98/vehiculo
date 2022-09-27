<?php
try {
    $mbd = new PDO('mysql:host=localhost;dbname=concesionario', 'root', 'admin');
} catch (PDOException $e) {
    print "Error de conexión con la base de datos!:  <br/>";
    die();
}
