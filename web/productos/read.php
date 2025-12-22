<?php require('conn.php'); ?>


<div class="row">
    <div class="col-md-6">
        <form method="POST" action="admin/insert_cat.php" class="d-flex flex-column flex-md-row gap-2 mb-3">
            <input type="text" name="name" class="form-control" placeholder="Categoría">
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

<?php require('new.php'); ?>

<table class="table table-hover">
    <tr>
        <th>Código</th>
        <th>Producto</th>
        <th>Costo</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Categoría</th>
        <th>Fecha</th>
    </tr>
    <?php
    $sql = "SELECT p.*, c.name AS category FROM posts p LEFT JOIN cats c ON c.id = p.cat";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()):
    ?>
        <tr onclick="window.location='?edit=<?= $row['id'] ?>';" style="cursor:pointer;">
            <td><?= $row['code'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['cost'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['stock'] ?></td>
            <td><?= $row['category'] ?></td>
            <td><?= date('d/m/y | H:i', strtotime($row['created'])) ?></td>
        </tr>
    <?php endwhile; ?>
</table>