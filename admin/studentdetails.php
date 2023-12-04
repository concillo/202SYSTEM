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
    
    body {

background: url('images/book.jpg') no-repeat;
background-size: cover;
background-position: center;
padding:8px;
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
    }.btn-primary {
            background-color: #007bff; /* Set the primary button background color */
            color: #fff; /* Set the primary button text color */
        }

        .footer{
    text-align: center;
    padding: 80px;
    margin-top:100px;

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
        .module-body {
            background-color: #f8f8f8;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Style for the information displayed */
        .user-info {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        /* Style for the heading (Name, Category, etc.) */
        .info-heading {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 5px;
        }
        .content {
        flex-grow: 1;
        padding: 20px;

    }
  
    .module {
    
    border-collapse: collapse;
    margin-top: 2px;
    overflow-x: auto;
    padding:100px;
    text-align: center;
        
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
</style>

 <div class="module">
    <div class="module-head"><h3>Student Details</h3></div>
        <div class="module-body">
            <?php
                $rno=$_GET['id'];
                $sql="select * from LMS.user where RollNo='$rno'";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();    
                            
                $name=$row['Name'];
                $category=$row['Category'];
                $email=$row['EmailId'];
                $mobno=$row['MobNo'];

                echo "<b><u>Name:</u></b> ".$name."<br><br>";
                echo "<b><u>Category:</u></b> ".$category."<br><br>";
                echo "<b><u>Roll No:</u></b> ".$rno."<br><br>";
                echo "<b><u>Email Id:</u></b> ".$email."<br><br>";
                echo "<b><u>Mobile No:</u></b> ".$mobno."<br><br>"; 
            ?>               
                               </div>
                           </div>
                        </div>
                    

    <div class="footer"> <b class="copyright">&copy; LMS by Concillo Group FDS A.Y.2023-2024 </b>All rights reserved.</div>

    
        
  
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>