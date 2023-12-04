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
         color:darkgrey;
        }
        
</style>


    <div class="span9">
                        <div class="content">

                        <div class="module">
                            <div class="module-head" >
                                <h3>Book Details</h3>
                            </div>
                            <div class="module-body" size="   font-size: 10px;">
                        <?php
                            $x=$_GET['id'];
                            $sql="select * from LMS.book where BookId='$x'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();    
                            
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $publisher=$row['Publisher'];
                                $year=$row['Year'];
                                $avail=$row['Availability'];

                                echo "<b>Book ID:</b> ".$bookid."<br><br>";
                                echo "<b>Title:</b> ".$name."<br><br>";
                                $sql1="select * from LMS.author where BookId='$bookid'";
                                $result=$conn->query($sql1);
                                
                                echo "<b>Author:</b> ";
                                while($row1=$result->fetch_assoc())
                                {
                                    echo $row1['Author']."&nbsp;";
                                }
                                echo "<br><br>";
                                echo "<b>Publisher:</b> ".$publisher."<br><br>";
                                echo "<b>Year:</b> ".$year."<br><br>";
                                echo "<b>Availability:</b> ".$avail."<br><br>";

                                
                        
                           
                            ?>
                            </div>
                            </div>                 
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; @copyright LMS by Concillo Group FDS @A.Y.2023-2024 </b>All rights reserved.
            </div>
        </div>
        
  
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>