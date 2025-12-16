
<?php
        if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
            $id = (int)$_GET['edit'];
            $stmt = $conn->prepare("SELECT p.*, c.name AS category FROM posts p LEFT JOIN cats c ON c.id = p.cat WHERE p.id = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        ?>

            <form method="POST" action="update.php" class="d-flex flex-column flex-md-row gap-2 mb-3">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="text" name="code" value="<?= $row['code'] ?>" class="form-control">
                <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control">
                <input type="text" name="cost" value="<?= show_number($row['cost']) ?>" class="form-control">
                <input type="text" name="price" value="<?= show_number($row['price']) ?>" class="form-control">
                <input type="number" name="stock" value="<?= $row['stock'] ?>" class="form-control">
                <?php
                $sql = $conn->query("SELECT * FROM cats ORDER BY name ASC");
                $cats = $sql->fetch_all(MYSQLI_ASSOC);
                ?>
                <select name="id" class="form-select">
                    <option value="0">Categoría</option>
                    <?php foreach ($cats as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $row['cat'] ? 'selected' : '' ?>><?= $cat['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="submit" value="Actualizar" class="btn btn-primary">
            </form>
        <?php
        } else {
        ?>


<form method="POST" action="admin/insert.php" class="d-flex flex-column flex-md-row gap-2 mb-3">
    <input type="text" name="code" placeholder="Código" class="form-control">
    <input type="text" name="name" placeholder="Producto" class="form-control">
    <input type="text" name="cost" placeholder="Costo" class="form-control">
    <input type="text" name="price" placeholder="Precio" class="form-control">
    <input type="number" name="stock" placeholder="Stock" class="form-control">
    <select name="cat" class="form-select" aria-label="Seleccionar categoría">
        <option selected value="0">Categoría</option>
        <?php
        $sentencia = $conn->prepare("SELECT * FROM cats ORDER BY name ASC");
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        while ($campo = $resultado->fetch_assoc()) {
        ?>
            <option value="<?= $campo['id'] ?>"><?= $campo['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <input type="submit" value="Agregar" class="btn btn-primary">
</form>
        <?php
        }
        ?>