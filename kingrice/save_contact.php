<?php
// save_contact.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kingrice"; // Update with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare the SQL statement to include the `name`
$stmt = $conn->prepare("INSERT INTO contacts (name, phonenumber, email, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phone, $email, $message);

// Execute the statement and check for success
if ($stmt->execute()) {
    echo "Contact details saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
