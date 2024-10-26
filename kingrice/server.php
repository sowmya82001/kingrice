<?php
session_start();

// initializing variables
$email = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'kingrice');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // check the database to make sure 
    // a user does not already exist with the same email
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors
    if (count($errors) == 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT); // hash the password before saving

        $query = "INSERT INTO users (email, password) 
                  VALUES('$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: login.php');
        exit();
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    // Get email and password from POST request, escaping to prevent SQL injection
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password']; // do not escape the password here for verification

    // Validate email and password inputs
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // Proceed if no errors
    if (count($errors) == 0) {
        // Query to check for the user
        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $results = mysqli_query($db, $query);
        
        // Check for SQL errors
        if (!$results) {
            die('Query failed: ' . mysqli_error($db));
        }

        // If a matching user is found
        if (mysqli_num_rows($results) == 1) {
            $user = mysqli_fetch_assoc($results);
            // Verify the password
            if (password_verify($password, $user['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.html');
                exit(); // Ensure no further code is executed after header redirection
            } else {
                array_push($errors, "Wrong email/password combination");
            }
        } else {
            array_push($errors, "Wrong email/password combination");
        }
    }
}
?>