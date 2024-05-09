<?php
include '../connection/connection.php';

// Establish database connection
$conn = connection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO pendingappointments (Client_Name, Services, Dentist, Datetime, Status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $Client_Name, $Services, $Dentist, $Datetime, $Status);

    // Set parameters and execute
    $Client_Name = isset($_POST["Client_Name"]) ? $_POST["Client_Name"] : '';
    $Services = isset($_POST["services"]) ? $_POST["services"] : '';
    $Dentist = isset($_POST["dentist"]) ? $_POST["dentist"] : '';
    $Datetime = isset($_POST["Datetime"]) ? $_POST["Datetime"] : '';
    $Status = "Pending"; // Assuming 'Status' is set to 'Pending' by default

    if (empty($Client_Name) || empty($Services) || empty($Dentist) || empty($Datetime)) {
        echo "Error: Please fill in all the required fields.";
    } else {
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close statement
    $stmt->close();
}

// Check if delete request is received
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    // Prepare and execute deletion query
    $deleteStmt = $conn->prepare("DELETE FROM pendingappointments WHERE PendingID = ?");
    $deleteStmt->bind_param("i", $id);
    if ($deleteStmt->execute() === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    // Close statement
    $deleteStmt->close();
}

// Retrieve data from the database to display in the table
$result = $conn->query("SELECT PendingID, Client_Name, Services, Dentist, Datetime FROM pendingappointments");
$rows = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
$conn->close();
?>


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

        .container-box {
            background-color: beige;
            border-radius: 10px;
            padding: 20px;
            margin-top: 150px; /* Ayusin depende sa pangangailangan */
            position: relative; /* Added position relative */
        }

        .form-group {
            margin-bottom: 20px;
        }
        .modal {
            z-index: 1100; /* Ensure modal is above other elements */
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
                    <li class="nav-item" style="margin-right: 65px;">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
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
<form method="post" action="" id="appointmentForm">
    <div class="container text-center">
        <div class="row justify-content-center"> <!-- Center the form horizontally -->
            <div class="container-box" style="max-width: 500px;">
                <form method="post" action="submit_form.php">
                    <div class="mb-3 d-flex align-items-center">
                        <label for="fullname" class="form-label text-start me-3">Fullname</label>
                        <input type="text" class="form-control" id="Client_Name" name="Client_Name">
                    </div>
                    <div>
                        <legend class="form-label text-start">Services</legend>
                        <select class="form-select" aria-label="Default select example" name="services">
                            <option selected>Select Services</option>
                            <option value="Dental Implants">Dental Implants</option>
                            <option value="Root Canal and Filling">Root Canal and Filling</option>
                            <option value="Crowns and Bridges">Crowns and Bridges</option>
                            <option value="Tooth Extraction">Tooth Extraction</option>
                            <option value="Invisalign">Invisalign</option>
                            <option value="Teeth Whitening">Teeth Whitening</option>
                        </select>
                    </div>
                    <div>
                        <legend class="form-label text-start">Dentist</legend>
                        <select class="form-select" aria-label="Default select example" name="dentist">
                            <option selected>Select Dentist</option>
                            <option value="Dr. Cram Banzal">Dr. Cram Banzal</option>
                            <option value="Dr. Leigh Gegrimos">Dr. Leigh Gegrimos</option>
                            <option value="Dr. Leily Derramas">Dr. Leily Derramas</option>
                            <option value="Dr. Lovely Gallamos">Dr. Lovely Gallamos</option>
                            <option value="Dr. Justin Salvador">Dr. Justin Salvador</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputDate" class="form-label">Date and Time</label>
                        <input type="datetime-local" name="Datetime" class="form-control" id="Datetime" required step="any">
                    </div>
                    <!-- Modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Appoint</button>
                </form>
            </div>
        </div>
    </div>
</form>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Appointment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to appoint this schedule?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="confirmAppointment()">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container mt-5">
        <h2>Appointment Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Services</th>
                    <th>Dentist</th>
                    <th>Date and Time</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo $row['Client_Name']; ?></td>
                        <td><?php echo $row['Services']; ?></td>
                        <td><?php echo $row['Dentist']; ?></td>
                        <td><?php echo $row['Datetime']; ?></td>
                        <td> 
                            <a href="appointment.php?delete=<?php echo $row['PendingID'];?>" class="delete">DELETE</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function confirmAppointment() {
            alert("Schedule for your appointment has been confirmed!");
            document.getElementById("appointmentForm").submit();
        }
    </script>

</body>
</html>