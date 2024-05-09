<?php
session_start(); // Start the session

include('../connection/connection.php');

// Check if the login form is submitted
if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Establish database connection
    $con = connection();

    // Prepare SQL statement to fetch user with matching email and password
    $sqlLogin = "SELECT * FROM `patient` WHERE `email` = ? AND `Password` = ?";
    $stmt = $con->prepare($sqlLogin);
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there is a matching user
    if ($result->num_rows > 0) {
        // User found, set session variable and redirect to dashboard
        $_SESSION['UserLogin'] = $email;
        header('Location: dashboard.php');
        exit(); // Ensure script execution stops after redirection
    } else {
        // No matching user found, display error message
        echo "<script> alert('Invalid email or password.') </script>";
    }

    // Close database connection and statement
    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       body {
            background-image: url('infiBG.jpg'); /* Adjust the file extension if the image is not a .jpg */
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
        }
        .container {
            width: 500px;
        }

        form {
            margin-top: 150px;
            width: 500px;
            background-color: beige;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Updated styles */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: lightblue;
        }
        
        .navbar-brand img {
            width: 100px; /* Adjust as needed */
            margin-right: 5px;
        }

        .navbar-brand {
            font-size: 20px;
            color: white !important;
        }
        .offcanvas-body{
          color:black
        }
        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-toggler {
            color: white !important;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: #191970; color: white;">
    <div class="container-fluid">
        <!-- Logo on the left side -->
        <a class="navbar-brand" href="#">
            <img src="logooo-removebg-preview.png" alt="Logo" class="d-inline-block align-top">
        </a>
        <!-- Navbar toggler on the right side -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-white"></span>
        </button>
        <div class="offcanvas offcanvas-end bg-black" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
            <div class="offcanvas-header">
                <h1 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Infiniteeth</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-top: 30px;">
                    <!-- Align right and slightly down -->
                    <li class="nav-item" style="margin-right: 65px;">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item" style="margin-right: 65px;">
                        <a class="nav-link" href="registration.php">Registration</a>
                    </li>
                    <li class="nav-item dropdown" style="margin-right: 65px;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>

    <div class="container">
        <form action="" method="post">
            <h2>Login</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="text" name="pass" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="btnLogin" class="btn btn-primary">Login</button>
            <a href="registration.php" class="btn btn-danger">Back</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>
