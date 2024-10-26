<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
   
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h2>Register</h2>
        </div>
         
        <form method="post" action="register.php">
            <?php include('errors.php'); ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password_1">Password</label>
                <input type="password" name="password_1" class="form-control" id="password_1" required>
            </div>
            <div class="form-group">
                <label for="password_2">Confirm Password</label>
                <input type="password" name="password_2" class="form-control" id="password_2" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger" name="reg_user">Register</button>
            </div>
            <p>
                Already a member? <a href="login.php">login in</a>
            </p>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copyright Section</title>
    <style>
        .copyright_section {
            background-color: #f8f9fa; /* Light background color */
            padding: 20px 0; /* Padding for top and bottom */
            text-align: center; /* Center text alignment */
        }

        .copyright_text {
            margin: 0; /* Remove default margin */
            color: #6c757d; /* Gray text color */
        }

        .copyright_text a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }

        .copyright_text a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>

    <!-- copyright section start -->
    <footer class="copyright_section margin_top90" aria-label="Copyright section">
        <div class="container">
            <p class="copyright_text">
                2024 All Rights Reserved. Design by 
                <a href="https://html.design" aria-label="Visit Kingrice design website">Kingrice</a>
            </p>
        </div>
    </footer>
    <!-- copyright section end -->

</body>
</html>

