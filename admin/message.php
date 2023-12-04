
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        padding:8px;
    }

    .content {
        flex-grow: 1;
        padding: 20px;

    }
  
    .module {
   background-color:white;
    border-collapse: collapse;
    margin-top: 2px;
    overflow-x: auto;
    margin-top:30px;
    margin-right: 200px;
    margin-left:200px;
        
        }

        .module-head {
            background-color:purple;
            background-size: cover;
            background-position: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align:center;
        }

        .module-head h3 {
            margin: 0;
        }

        .module-body {
            padding: 10px;
            
        }

        .form-horizontal .control-group {
            margin-bottom: 15px;
        }

        .form-horizontal .control-label {
            width: 150px;
            display: inline-block;
            font-weight: bold;
        }
        

        .form-horizontal .controls {
            margin-top:5px;
            margin-left: 150px;
        
        }

        .form-horizontal input.span8 {
            width: 30%;
            height:35px;
            background:white;
            text-align:center;
        }
        .form-horizontal button {
            background-color:blue;
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 85%;
        }

        .form-horizontal button:hover {
            background-color: #45a049;
        }
        .footer{
            text-align: center;
         margin-top:300px;
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
    <label class="control-label" for="ReceiverRollNo"><b>Receiver Roll No:</b></label>
    <div class="controls">
        <select id="ReceiverRollNo" name="ReceiverRollNo" class="form-control" required>
            <!-- Add the following option for default or empty selection -->
            <option value="" selected disabled>Select Receiver Roll No</option>

            <?php
            // Your database connection and query to fetch roll numbers
            $sql = "SELECT RollNo FROM user";
            $result = $conn->query($sql);

            // Loop through the result set and generate options
            while ($row = $result->fetch_assoc()) {
                $rollNo = $row['RollNo'];
                echo "<option value=\"$rollNo\">$rollNo</option>";
            }
            ?>
        </select>
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
          
            <div class="footer">
        <div class="container">
            <b class="copyright">&copy; LMS by Concillo Group FDS A.Y.2023-2024 </b>All rights reserved.
        </div>
    </div>
    
        
    
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