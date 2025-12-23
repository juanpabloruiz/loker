<?php

require('conexion.php');

$sentencia = $conexion->prepare("SELECT * FROM productos");
$sentencia->execute();
$resultado = $sentencia->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>Productos</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()): ?>

            <tr>
                <td><?= $fila['nombre'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>