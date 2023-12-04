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
    <a href="index.php" class="btn btn-secondary">Back</a>
    <style>

        body {font-family: 'Roboto', sans-serif;
            background: url('images/book.jpg') no-repeat;
            background-size: cover;
            background-position: center;
            font-family: 'Roboto', sans-serif;
            padding:20px;
        }

        .wrapper {
            display: flex;
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        
        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .card-img-top {
            border-radius: 50%; /* Make the image circular */
            width: 100px;
            height: 100px;
            object-fit: cover; /* Maintain aspect ratio and cover the entire container */
            margin-bottom: 20px; /* Add some space below the image */
        }

        .card-body {
            text-align: center; /* Center the content horizontally */
        }

        .card-title {
            font-size: 24px;
            color: #007bff; /* Set the card title color */
            margin-bottom: 10px; /* Add some space below the title */
        }

        .card-text {
            font-size: 16px;
            line-height: 1.5; /* Adjust the line height for better readability */
        }

        .btn-primary {
            background-color: #007bff; /* Set the primary button background color */
            color: #fff; /* Set the primary button text color */
        }

        .footer {
            text-align: center;
            padding: 81px;
            
            color: #black;
        }

       .btn {
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            background-color: #5bc0de;
            color: #fff;
            border: 1px solid #46b8da;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #46b8da;
        }
        .footer{
            color:lightgrey;
            margin-top:250px;
            color:grey;
        }
    </style>
    
</head>

<body>
    <div class="span9">
    <center>
    <div class="card" style="width: 50%;">
        <?php
        $rollno = $_SESSION['RollNo'];
        $sql = "SELECT * FROM LMS.user WHERE RollNo='$rollno'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['Name'];
            $email = $row['EmailId'];
            $mobno = $row['MobNo'];
            $filename = $row['pp']; // Assuming 'pp' is the column name for the profile picture in your database
        ?>
            <img src="../upload/<?php echo $filename; ?>" class="img-fluid rounded-circle" style = "width: 250px; height: 250px; border-radius: 100%;">
            <div class="card-body">
                <i>
                    <h1 class="card-title"><?php echo $name; ?></h1>
                    <p class="card-text"><b>Email ID:</b> <?php echo $email; ?></p>
                    <p class="card-text"><b>Mobile number:</b> <?php echo $mobno; ?></p>
                </i>
            </div>
        <?php
        } else {
            echo "User not found.";
        }
        ?>
    </div>
    <br>
    <a href="edit_student_details.php" class="btn btn-primary">Edit Details</a>
</center>
            
    </div>

    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; LMS by Concillo Group FDS A.Y.2023-2024</b>All rights reserved.
        </div>
    </div>


</body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>
