<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY MANAGEMENT SYSTEM</title>
    <a href="javascript:history.back()" class="position">Back</a>
</head>

<body>
    <style>
         .position {
            padding: 10px 12px;
            font-size: 14px;
            cursor: pointer;
            background-color: #5bc0de;
            color: #fff;
            border: 1px solid #46b8da;
            border-radius: 4px;
            
        }

        .position:hover {
            background-color: #46b8da;
        }
        body {font-family: 'Roboto', sans-serif;
            background: url('images/book.jpg') no-repeat;
            background-size: cover;
            background-position: center;
            font-family: 'Roboto', sans-serif;
            margin-top:50px;
           
        }

        .wrapper {
            display: flex;
        }

        .container {
            width:50%;
            padding-right: 10px;
            padding-left: 10px;
            margin-right: auto;
            margin-left: auto;
        }

        

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .btn-container {
            display: flex;
            justify-content: space-around; /* Updated to space around the buttons */
            margin-bottom: 20px;
        }

        .span3 {
            flex: 0 0 30%; /* Adjust the width as needed */
            text-align: center; /* Center the content horizontally */
            padding:10px;
            margin-top:1px;
        }

        .btn {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding:30px;
           
        }

        .btn img {
            width: 150px;
            border-radius:%; /* Make the image circular */
            margin-bottom: 20px; /* Add some space between the image and text */
        }
        

        .btn:hover {
            background-color: #46b8da;
        }
        
        .footer {
            text-align: center;
            padding:50px;
         color: #black;
        }
    </style>

    <div class="btn-container">
        <div class="span3">
            <a href="issue_requests.php" class="btn btn-info">
                <img width="100px" src="images/issue.png" alt="Issue Requests">
                <p>Issue Requests</p>
            </a>
        </div>

        <div class="span3">
            <a href="renew_requests.php" class="btn btn-info">
                <img width="100px" src="images/renew.png" alt="Renew Request">
                <p>Renew Request</p>
            </a>
        </div>

        <div class="span3">
            <a href="return_requests.php" class="btn btn-info">
                <img width="100px" src="images/return.png" alt="Return Requests">
                <p>Return Requests</p>
            </a>
        </div>
    </div>
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
 