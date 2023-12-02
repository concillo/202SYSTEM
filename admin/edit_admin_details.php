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
        <title>IT LIBRARY MANAGEMENT SYSTEM</title>
   </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">LIBRARY MANAGEMENT SYSTEM </a>
                   
                   
        <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
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
    }  .btn-primary {
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
        
</style>


<div class="span9">
    <div class="module">
        <div class="module-head">
            <h3>Update Details</h3>
        </div>
        <div class="module-body">
            <?php 
            $rollno = $_SESSION['RollNo'];
            $sql = "SELECT * FROM LMS.user WHERE RollNo='$rollno'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $name = $row['Name'];
            $email = $row['EmailId'];
            $mobno = $row['MobNo'];
            $filename = $row['pp'];

            echo '<i>';
            echo '<h1 class="card-title"><center>' . $name . '</center></h1>';
            echo '<br>';
            
            // Check if $filename is not empty before displaying the image
            if (!empty($filename)) {
                echo '<img src="' . $filename . '" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 200px; max-height: 200px; border: 2px solid #ddd; border-radius: 50%;">';
            } else {
                // Display a default image or a placeholder if $filename is empty
                echo '<img src="upload/default.jpg" alt="Default Profile Picture" class="img-fluid rounded-circle" style="max-width: 200px; max-height: 200px; border: 2px solid #ddd; border-radius: 50%;">';
            }

            echo '<br>';
            echo '<p><b>Email ID: </b>' . $email . '</p>';
            echo '<br>';
            echo '<p><b>Mobile number: </b>' . $mobno . '</p>';
            echo '</i>';
            ?>

            <form class="form-horizontal row-fluid" action="edit_admin_details.php?id=<?php echo $rollno ?>" method="post" enctype="multipart/form-data">
                <div class="control-group">
                    <label class="control-label" for="Name"><b>Name:</b></label>
                    <div class="controls">
                        <input type="text" id="Name" name="Name" value="<?php echo $name ?>" class="span8" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="EmailId"><b>Email Id:</b></label>
                    <div class="controls">
                        <input type="text" id="EmailId" name="EmailId" value="<?php echo $email ?>" class="span8" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="MobNo"><b>Mobile Number:</b></label>
                    <div class="controls">
                        <input type="text" id="MobNo" name="MobNo" value="<?php echo $mobno ?>" class="span8" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="Password"><b>New Password:</b></label>
                    <div class="controls">
                        <input type="password" id="Password" name="Password" value="<?php echo $pswd ?>" class="span8" required>
                    </div>
                </div>   

                <div class="control-group">
                    <label class="control-label" for="pp"><b>Profile Picture:</b></label>
                    <div class="controls">
                        <input type="file" id="pp" name="pp" accept="upload/*">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="submit" class="btn-primary"><center>Update Details</center></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

                    
                
       
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2023 Library Management System </b>All rights reserved.
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

<?php
if(isset($_POST['submit']))
{
    $rollno = $_GET['id'];
    $name=$_POST['Name'];
    $email=$_POST['EmailId'];
    $mobno=$_POST['MobNo'];
    $pswd=$_POST['Password'];

/* RIZZA MAE LEONOR - TASK*/

    $targetDirectory = "../upload/";
    $targetFile = $targetDirectory . basename($_FILES["pp"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["pp"]["tmp_name"]);
    if ($check === false) {
        echo "<script type='text/javascript'>alert('File is not an image.')</script>";
        $uploadOk = 0;
    } else {
        // Allow certain file formats
        if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            $uploadOk = 0;
        }
    }

    // Move uploaded file if validation passed
    if ($uploadOk == 1 && move_uploaded_file($_FILES["pp"]["tmp_name"], $targetFile)) {
        $filename = basename($_FILES["pp"]["name"]); // Extracting just the file name
        $targetFile = $targetDirectory . $filename; // Creating the target file path



        
$sql="update LMS.user set Name='$name', EmailId='$email', MobNo='$mobno', Password='$pswd', pp='$filename' where RollNo='$rollno'";



if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=index.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}
?>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
}} ?>