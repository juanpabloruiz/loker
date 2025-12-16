<form method="POST" action="insert.php" class="d-flex flex-column flex-md-row gap-2 mb-3">
    <input type="text" name="codigo" placeholder="Código" class="form-control">
    <input type="text" name="producto" placeholder="Producto" class="form-control">
    <input type="text" name="costo" placeholder="Costo" class="form-control">
    <input type="text" name="precio" placeholder="Precio" class="form-control">
    <input type="number" name="stock" placeholder="Stock" class="form-control">
    <select name="id_categoria" class="form-select" aria-label="Seleccionar categoría">
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
