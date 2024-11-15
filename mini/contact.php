<?php
// Database credentials
$host = 'localhost';
$dbname = 'farm_easy';
$username = 'root';  // Replace with your DB username if needed
$password = '';      // Add your DB password if applicable

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $mobile = htmlspecialchars($_POST['mobile']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Prepare SQL statement
        $sql = "INSERT INTO contact (name, mobile, email, message) 
                VALUES (:name, :mobile, :email, :message)";
        $stmt = $conn->prepare($sql);

        // Bind parameters to SQL query
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Thank you, your message has been sent!";
        } else {
            echo "Error inserting data.";
        }
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
