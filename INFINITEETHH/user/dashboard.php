<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       body {
            background-image: url('infiBG.jpg'); /* Adjust the file extension if the image is not a .jpg */
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
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
        /* Add custom CSS here */
        .custom-button {
            background-color: darkblue;
            border: none;
            color: beige;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .custom-button:hover {
            background-color: #001F3F;
        }
        .custom-button img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .button-container {
            background-color: beige;
            padding: 20px;
            border-radius: 10px;
            margin-top: 170px; /* Adjusted margin top */
            max-width: 500px; /* Added max-width */
            margin-left: auto; /* Center the button container horizontally */
            margin-right: auto;
            align-items: flex-start;
        }
        .button-row {
            display: flex;
            flex-direction: column; /* Stacking buttons vertically */
            
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
    <div class="button-container">
        <div class="button-row">
            <a href="profile.php" class="custom-button">
                <img src="manage patientlogo.jpg" alt="Icon"> PROFILE
            </a>
        </div>
        <div class="button-row">
            <a href="dentist.php" class="custom-button">
                <img src="dentisticon.png" alt="Icon"> DENTISTS
            </a>
        </div>
        <div class="button-row">
            <a href="appointment.php" class="custom-button">
                <img src="appointment-icon-30.png" alt="Icon"> CREATE APPOINTMENT
            </a>
        </div>
        <div class="button-row">
            <a href="record.php" class="custom-button">
                <img src="statistics-icon-10-removebg-preview.png" alt="Icon"> RECORDS/HISTORY
            </a>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>
