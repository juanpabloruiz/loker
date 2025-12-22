<?php

// Datos de ejemplo
$servidor = getenv('DB_HOST');
$base_de_datos = getenv('DB_NAME');
$usuario = getenv('DB_USER');
$clave = getenv('DB_PASS');

// Crear la conexión
$conexion = new mysqli($servidor, $base_de_datos, $usuario, $clave);

// Chequear errores
if ($conexion->connect_errno) {
    die("❌ Error de conexión ({$conexion->connect_errno}): {$conexion->connect_error}");
}

// Opcional: Forzar UTF-8 si usás acentos
$conexion->set_charset('utf8mb4');
