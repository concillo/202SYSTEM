
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
        <a href="javascript:history.back()" class="btn btn-secondary" >Back</a>
   </head>
    <body>

<style>
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
    body {
        font-family: 'Roboto', sans-serif;
        background: url('images/book.jpg') no-repeat;
        background-size: cover;
        background-position: center;
        padding:50px;
    }

    .content {
        flex-grow: 1;
        padding: 20px;

    }
    .module {
           
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            margin:100px;
            margin-top: 4px;
        }

        .module-head {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align:center;
        }

        .module-body {
            padding: 10px;
            
        }

        .form-horizontal .control-group {
            margin-bottom: 10px;
            margin-top:15px;
        }

        .form-horizontal label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .form-horizontal .controls {
            margin-right: 120px;
            text-align: right;
        }

        .form-horizontal input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 5px solid #ccc;
            border-radius: 4px;
        }

        .form-horizontal button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-horizontal button:hover {
            background-color: #45a049;
        }
        .footer{
            text-align: center;
            padding: 30px;
        }
 
        
</style>

        <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Send a message</h3>
                            </div>
                            <div class="module-body">

                                    <br >

                                    <form class="form-horizontal row-fluid" action="message.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Rollno"><b>Receiver Roll No:</b></label>
                                            <div class="controls">
                                                <input type="text" id="RollNo" name="RollNo" placeholder="RollNo" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Message"><b>Message:</b></label>
                                            <div class="controls">
                                                <input type="text" id="Message" name="Message" placeholder="Enter Message" class="span8" required>
                                            </div>
                                            <hr>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Add Message</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
     
                        
                        
                    </div><!--/.content-->
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
if(isset($_POST['submit']))
{
    $rollno=$_POST['RollNo'];
    $message=$_POST['Message'];

$sql1="insert into LMS.message (RollNo,Msg,Date,Time) values ('$rollno','$message',curdate(),curtime())";

if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
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
} ?>