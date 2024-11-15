<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $language = $_POST['language'];

    // Hashing the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Database connection (change details accordingly)
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "user_database";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data
    $sql = "INSERT INTO users (username, password, role, language) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $hashed_password, $role, $language);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
