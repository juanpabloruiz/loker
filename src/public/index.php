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
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>

<body>

    <header class="py-3 px-5 bg-primary text-white">
        <h1>
            <i class="fa-solid fa-sack-dollar"></i>Loker
        </h1>
    </header>

    <main class="container my-3">

        <table class="table table-hover table-bordered">

            <tr class="table-dark">
                <th class="text-center">CODIGO</th>
                <th class="text-center">PRODUCTO</th>
                <th class="text-center">COSTO</th>
                <th class="text-center">PRECIO</th>
                <th class="text-center">STOCK</th>
                <th class="text-center">FECHA</th>
            </tr>

            <?php while ($fila = $resultado->fetch_assoc()): ?>

                <tr>
                    <td><?= $fila['codigo'] ?></td>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['costo'] ?></td>
                    <td><?= $fila['precio'] ?></td>
                    <td><?= $fila['cantidad'] ?></td>
                    <td><?= date('d-m-y ⏰ H:i', strtotime($fila['fecha'])) ?></td>
                </tr>

            <?php endwhile; ?>

        </table>

    </main>

</body>

</html>