<?php
header('Content-Type: application/json; charset=utf-8');
include 'config.php';

$sql = "SELECT id, name, description, price, image FROM products ORDER BY id ASC";
$result = $conn->query($sql);
$products = array();
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

echo json_encode($products, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
