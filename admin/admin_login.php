<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kingrice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL to get admin details by email
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $admin['password'])) {
            // Set session for the admin
            $_SESSION['admin_email'] = $admin['email'];

            // Redirect to admin panel
            header("Location: admin_panel.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Admin not found!";
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Login</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <?php if (isset($login_error)) { ?>
                <div class="alert alert-danger"><?php echo $login_error; ?></div>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
   
