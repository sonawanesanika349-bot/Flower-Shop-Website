<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password_raw = $_POST['password'] ?? '';

    // Basic validation (you can expand)
    if (empty($username) || empty($email) || empty($password_raw)) {
        echo "Please fill in all fields.";
        exit;
    }

    $password = password_hash($password_raw, PASSWORD_DEFAULT);

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $email, $password);
    if ($stmt->execute()) {
        echo "Registration successful! <a href='../login.html'>Login here</a>";
    } else {
        // Handle duplicate username/email gracefully
        if ($conn->errno === 1062) {
            echo "Username or email already exists.";
        } else {
            echo "Error: " . htmlspecialchars($conn->error);
        }
    }
    $stmt->close();
}
$conn->close();
?>