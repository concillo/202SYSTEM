<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <title>LIBRARY MANAGEMENT SYSTEM</title>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background: url('images/books.jpg') no-repeat;
        background-size: cover;
        background-position: center;
       }

    .dashboard-container
         {

        display: flex;
        }


    .sidebar {
            font-family: 'Roboto','sans-serif';
            font-weight: bold;
            font-size: 20px;
            color: black;
            width: 350px;
            padding: 3px;
            height: 100vh;
            position: fixed;
            margin-top:5px;
        }

    .sidebar ul li {
            list-style-type: none;
            padding: 10px 0;
        }

    .sidebar ul li a {
            color: white;
            text-decoration: none;
            width: 30px;
            height: 30px;
        }

    .sidebar ul li a:hover {
    
        background: skyblue;
        padding: 10px;
        color: black;
        
    }
    .main-content {
            margin-left: 200px;
            padding: 20px;
        }

.see-more-button {
            text-align: right;
            margin-top: 500px;
        }

        .see-more-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .see-more-button a:hover {
            background-color: #0056b3;
        }

        
        .footer {
            text-align: center;
            color:white;
            
            margin-top:100px;
        }
        .image-container {
        padding: 1%;
        margin: 5px;
        text-align: center;
    }
    .cointainer{
        text-align:center;
    }
.head{
    color: white;
  margin-left:50px;
}
    </style>

</head>
<body>
<h1 class="head" >Library Management System</h1>
<div class="sidebar">
        
        <ul>
            <li><a style=" background: skyblue;padding: 10px; color:black;" href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="message.php">Message</a></li>
            <li><a href="student.php">Manage Students</a></li>
            <li><a href="book.php">All Books</a></li>
            <li><a href="addbook.php">Add Books</a></li>
            <li><a href="issue_requests.php">Issue/Return Requests</a></li>
            <li><a href="recommendations.php">Book Recommendations</a></li>
            <li><a href="current.php">Currently Issued Books</a></li>
            <li><a href="aclogs.php">Activity Logs</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>


<?php
$images = [
    'images/10-9.jpg',
    // Add more image paths as needed
];

foreach ($images as $image) {
    echo '<div class="image-container">';
    echo '<img src="' . $image . '" alt="" width="500">'; // Adjust the width as needed
    echo '</div>';
}
?>


    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; LMS by Concillo Group FDS A.Y.2023-2024 </b>All rights reserved.
        </div>
    </div>
    




        
     
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>

