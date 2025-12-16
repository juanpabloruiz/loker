<?php
require('conn.php');
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

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
