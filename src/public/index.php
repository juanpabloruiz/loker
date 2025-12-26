<?php

require('conexion.php');
require('funciones.php');

$sentencia = $conexion->prepare("SELECT * FROM productos");
$sentencia->execute();
$resultado = $sentencia->get_result();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= titulo(); ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" hrf="fontawesome/css/all.min.css">
</head>

<body>

    <main class="container my-3">

        <table class="table table-hover">

            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Fecha</th>
            </tr>

            <?php while ($fila = $resultado->fetch_assoc()): ?>

                <tr>
                    <td><?= $fila['codigo'] ?></td>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['costo'] ?></td>
                    <td><?= $fila['precio'] ?></td>
                    <td><?= $fila['cantidad'] ?></td>
                    <td><?= $fila['fecha'] ?></td>
                </tr>

            <?php endwhile; ?>

        </table>

    </main>

</body>

</html>