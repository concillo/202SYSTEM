<?php
ob_start();
require('dbconn.php');
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LIBRARY MANAGEMENT SYSTEM</title>
       
    </head>
    <body>
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f0f5f9; /* Light pastel blue background */
        padding-top: 60px;
    }


    .module {
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #d3d3d3; /* Light pastel gray border around modules */
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .module-head {
        background-color: #a7c0cd; /* Pastel blue module header */
        color: #ffffff;
        padding: 10px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .module-body {
        padding: 10px;
    }

    .form-horizontal .control-label {
        width: 150px;
    }

    .footer {
        text-align: center;
        padding: 30px;
        background-color: #a7c0cd; /* Pastel blue footer background */
        color: #ffffff;
        position: fixed;
        bottom: 0;
        width: 100%;
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
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();

                                $name=$row['Name'];
                                $category=$row['Category'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                $pswd=$row['Password'];
                                $filename = $row['pp'];

                                ?>    
                    			
                                <form class="form-horizontal row-fluid" action="edit_student_details.php?id=<?php echo $rollno ?>" method="post" enctype="multipart/form-data">

                                    <div class="control-group">
                                        <label class="control-label" for="Name"><b>Name:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Name" name="Name" value= "<?php echo $name?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                            <label class="control-label" for="Category"><b>Category:</b></label>
                                            <div class="controls">
                                                <select name = "Category" tabindex="1" value="SC" data-placeholder="Select Category" class="span6">
                                                    <option value="<?php echo $category?>"><?php echo $category ?> </option>
                                                    <option value="Student">Student</option>
                                                    <option value="Staff">Staff</option>
                                                   
                                                </select>
                                            </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="EmailId"><b>Email Id:</b></label>
                                        <div class="controls">
                                            <input type="text" id="EmailId" name="EmailId" value= "<?php echo $email?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="MobNo"><b>Mobile Number:</b></label>
                                        <div class="controls">
                                            <input type="text" id="MobNo" name="MobNo" value= "<?php echo $mobno?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="Password"><b>New Password:</b></label>
                                        <div class="controls">
                                            <input type="password" id="Password" name="Password"  value= "<?php echo $pswd?>" class="span8" required>
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
                                                <button type="submit" name="submit"class="btn-primary"><center>Update Details</center></button>
                                            </div>
                                        </div>                                                                     

                                </form>
                    		           
                        </div>
                        </div> 	
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
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
if (isset($_POST['submit'])) {
    // Other form field values

    // Handle profile picture upload
    $targetDir = "../upload/"; // Set your target directory
    $filename = basename($_FILES["pp"]["name"]);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if a file is selected
    if (!empty($_FILES["pp"]["tmp_name"])) {
        // Allow certain file formats
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (in_array($fileType, $allowedTypes)) {
            move_uploaded_file($_FILES["pp"]["tmp_name"], $targetFilePath);
        }
    }

    // Other form field values

    // Update the database with the new profile picture filename
    $sql1 = "UPDATE LMS.user SET Name='$name', Category='$category', EmailId='$email', MobNo='$mobno', Password='$pswd', pp='$filename' WHERE RollNo='$rollno'";

    // Rest of your code


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