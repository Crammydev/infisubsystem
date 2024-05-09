<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection function
function connection() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "infiniteeth";
    
    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

// Register function
function register() {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $fullname = $_POST['fullname'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    // Establish database connection
    $conn = connection();
    
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO patient (email, Password, `Full Name`, sex, age, address, contact) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $email, $password, $fullname, $sex, $age, $address, $contact);
    
    // Execute SQL statement
    if ($stmt->execute()) {
        echo "<script>alert('You are successfully registered');</script>"; // Display success message
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    register(); // Call the register function if the form is submitted
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('infiBG.jpg');
            /* Adjust the file extension if the image is not a .jpg */
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
            width: 100px;
            /* Adjust as needed */
            margin-right: 5px;
        }

        .navbar-brand {
            font-size: 20px;
            color: white !important;
        }

        .offcanvas-body {
            color: black
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
                            <a class="nav-link" href="login.php">Login</a>
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
    <form action="registration.php" method="post" onsubmit="return validateForm()" class="needs-validation" novalidate>
            <h2>Registration</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputFullName" class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" id="exampleInputFullName" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputSex" class="form-label">Sex</label>
                <select class="form-select" name="sex" id="exampleInputSex">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputAge" class="form-label">Age</label>
                <input type="number" name="age" class="form-control" id="exampleInputAge">
            </div>
            <div class="mb-3">
                <label for="exampleInputAddress" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="exampleInputAddress">
            </div>
            <div class="mb-3">
                <label for="exampleInputContact" class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control" id="exampleInputContact">
            </div>
            <button type="submit" name="btnRegister" class="btn btn-primary">Register</button>
            <a href="login.php" class="btn btn-danger">Login</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function validateForm() {
            var email = document.getElementById("exampleInputEmail1").value;
            var pass = document.getElementById("exampleInputPassword1").value;
            var fullname = document.getElementById("exampleInputFullName").value;

            if (email === "" || pass === "" || fullname === "") {
                alert("Please fill in all the fields");
                return false;
            }
            return true;
        }
    </script>

</body>

</html>
