<?php
require_once __DIR__ . '/../config/conexion.php';

$nombre = $_POST['nombre'] ?? '';

$sentencia = $conexion->prepare("INSERT INTO categorias (nombre) VALUES (?)");
$sentencia->bind_param('s', $nombre);
$sentencia->execute();
$sentencia->close();

header('Location: ./');
