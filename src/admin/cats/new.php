<div class="row">
    <div class="col-md-6">
        <form method="POST" action="insert.php" class="d-flex flex-column flex-md-row gap-2 mb-3">
            <input type="text" name="nombre" class="form-control" placeholder="Categoría">
            <input type="submit" value="Agregar categoría" class="btn btn-primary">
        </form>
        <?php
        $sentencia = $conexion->prepare("SELECT * FROM categorias");
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        ?>
        <ul>
            <?php while ($campo = $resultado->fetch_assoc()): ?>
                <li><?= $campo['nombre'] ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>
