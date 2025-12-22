<?php
include('conn.php');
include('functions.php');

$name = $_POST['name'] ?? '';

$stmt = $conn->prepare("INSERT INTO cats (name) VALUES (?)");
$stmt->bind_param('s', $name);
$stmt->execute();
$stmt->close();

header('Location: ../');