<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE user_id='$user_id'";
$result = $conn->query($sql);

echo "<h2>Your Orders</h2>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Order ID: " . $row['id'] . " - " . $row['flower_type'] . " - Quantity: " . $row['quantity'] . "<br>";
    }
} else {
    echo "No orders found.";
}
$conn->close();
?>