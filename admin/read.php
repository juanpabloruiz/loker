<?php
require('conn.php');
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>


<div class="row">
    <div class="col-md-6">
        <form method="POST" action="insertar_categoria.php" class="d-flex flex-column flex-md-row gap-2 mb-3">
            <input type="text" name="nombre" class="form-control" placeholder="Categoría">
            <input type="submit" value="Agregar categoría" class="btn btn-primary">
        </form>
        <?php
        $sentencia = $conn->prepare("SELECT * FROM cats");
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        ?>
        <ul>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <li><?= $row['name'] ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>

<table class="table table-hover">
    <tr>
        <th>Código</th>
        <th>Producto</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['code'] ?></td>
            <td><?= $row['name'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>