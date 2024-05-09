<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: 100px;
            margin-left: 100px;
        }

        .paragraph-container {
            background-color: beige;
            padding: 30px;
            border-radius: 10px;
            margin-top: 200px;
            max-width: 170%;
        }

        .homeimg {
            margin-top: 200px; /* Adjust this value as needed */
    
        }

        .homeimg img {
            max-width: 145%;
            max-height: auto;
            border-radius: 10px;
        }

        /* Footer styles */
        .footer {
            background-color: #191970;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .footer img {
            width: 30px;
            height: 30px;
            margin: 0 10px;
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
    <div class="row">
        <div class="col-md-8">
            <div class="paragraph-container">
                <p class="h3">When it comes to your dental health, only the best will provide your desired treatment, which is why you should trust us with your smiles. We'll guide you through every stage of the next phase of your treatments. From your first consultation to a lifetime of maintenance. We believe that a beautiful smile is important to your quality of life. We will work with you to help achieve the best results possible in a fun and relaxed environment.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="homeimg">
                <img src="home img.jpg" alt="Image">
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Connect with us:</h5>
                <a href="#"><img src="facebook-logo.png" alt="Facebook"></a>
                <a href="#"><img src="instagram-logo.png" alt="Instagram"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Contact us: example@example.com</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
