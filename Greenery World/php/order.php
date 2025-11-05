<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $flower_type = $_POST['flower_type'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];  // Calculate or pass from form

    $sql = "INSERT INTO orders (user_id, flower_type, quantity, total_price) VALUES ('$user_id', '$flower_type', '$quantity', '$total_price')";
    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>