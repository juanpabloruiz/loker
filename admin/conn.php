<?php
session_start();

// Mostrar errores PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Renombrá este archivo a "conexion.php"
// y completá tus datos reales. Este archivo NO debe subirse al repositorio.
$conn = new mysqli('localhost', 'pablo', 'Soledad2025.', 'frani');
$conn->set_charset('utf8mb4');
