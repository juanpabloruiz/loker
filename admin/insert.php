<?php
include('conn.php');
include('functions.php');

$code = $_POST['code'] ?? '';
$name = $_POST['name'] ?? '';
$cost  = number($_POST['cost'] ?? 0);
$price = number($_POST['price'] ?? 0);
$stock = $_POST['stock'] ?? 0;
$cat = $_POST['cat'] ?? 0;

$stmt = $conn->prepare("INSERT INTO posts (code, name, cost, price, stock, cat) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssddis', $code, $name, $cost, $price, $stock, $cat);
$stmt->execute();
$stmt->close();

header('Location: ../');
