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
        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
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
    
    border-collapse: collapse;
    margin-top: 2px;
    overflow-x: auto;
    margin-top:30px;
    margin-right: 200px;
    margin-left:200px;
        
        }

        .module-head {
            background-color:lightblue;
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
            background:lightgrey;
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
         color:grey;
        }
</style>

   <div class="module">
                            <div class="module-head">
                                <h3>Reccomend a Book</h3>
                            </div>
                            <div class="module-body">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="recommendations.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Title"><b>Book Title</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Title" class="span8" required>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="Description"><b>Description</b></label>
                                            <div class="controls">
                                                <input type="text" id="Description" name="Description" placeholder="Description" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Submit Recommendation</button>
                                            </div>
                                        </div>
                                   

                        
                        
                
         
      

<?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $Description=$_POST['Description'];
    $rollno=$_SESSION['RollNo'];

$sql1="insert into LMS.recommendations (Book_Name,Description,RollNo) values ('$title','$Description','$rollno')"; 



if($conn->query($sql1) === TRUE){


echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?> 
</div>
</div>
</div>
</div>
</div>
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