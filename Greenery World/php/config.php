<?php
$servername = "localhost";
$username = "root";  // Change to your MySQL username
$password = "";      // Change to your MySQL password
$dbname = "greenery_world";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>