<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Include the file containing the database connection function and fetchUserData function
include 'your_database_functions.php';

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




$email = "safi@gmail.com"; // Set the email to fetch data for

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
            background-image: url('infiBG.jpg'); /* Adjust the file extension if the image is not a .jpg */
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
        }
        .container {
            margin-top: 100px;
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            background-color: beige;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            text-align: left;
        }
        .edit-button {
            display: block;
            width: 100%;
            max-width: 150px;
            margin: 0 auto;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>User Profile</h1>
    <table>
        <tr>
            <th>Email</th>
            <td><?php echo $userData['email']; ?></td>
            <td><button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editEmailModal">Edit</button></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo $userData['Password']; ?></td>
            <td><button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editPasswordModal">Edit</button></td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td><?php echo $userData['Full Name']; ?></td>
            <td><button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editFullNameModal">Edit</button></td>
        </tr>
        <tr>
            <th>Sex</th>
            <td><?php echo $userData['sex']; ?></td>
            <td><button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editSexModal">Edit</button></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><?php echo $userData['age']; ?></td>
            <td><button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editAgeModal">Edit</button></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $userData['address']; ?></td>
            <td><button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editAddressModal">Edit</button></td>
        </tr>
        <tr>
            <th>Contact</th>
            <td><?php echo $userData['contact']; ?></td>
            <td><button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
        </tr>
    </table>
</div>

<!-- Modal for editing email -->
<div class="modal fade" id="editEmailModal" tabindex="-1" aria-labelledby="editEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmailModalLabel">Edit Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your form for editing email here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Repeat similar modal structures for other fields (Password, Full Name, etc.) -->

<!-- JavaScript and Bootstrap scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
