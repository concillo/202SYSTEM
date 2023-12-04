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


.table {
width: 100%;
    border-collapse: collapse;
    margin-top: 2px;
    overflow-x: auto;
  margin-top:30px;
  padding:50px;
}

.table th,
.table td {
    border: 1px solid #5cb85c;
    padding: 12px;
    text-align: left;
    border-color: black
}

.table th {
    background-color:lightblue;
    background-size: cover;
    background-position: center;
    padding: 15px;
    border-bottom: 1px solid #ddd;
    text-align:center;
}

.table tbody tr:nth-child(even) {
    background-color: #d9edf7;
}

.table tbody tr:hover {
    background-color: #bce8f1;
}
.btn {
    padding: 8px 12px;
    font-size: 14px;
    cursor: pointer;
    background-color: #5bc0de;
    color: #fff;
    border: 1px solid #46b8da;
    border-radius: 4px;
    margin-right:50px;
    margin-top:50px;

    

}

.btn:hover {
    background-color: #46b8da;
}

.container {
width: 100%;
padding-right: 15px;
padding-left: 15px;
margin-right: auto;
margin-left: auto;
}
.header{
margin-top:50px;

}
.footer{
    text-align: center;
    padding: 80px;
    margin-top:100px;
    color:grey;
}

  
  </style>

    <table class="table" id="tables">
        <thead>
            <tr>
                <th>Notification</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rollno=$_SESSION['RollNo'];
            $sql="select * from LMS.message where RollNo='$rollno' order by Date DESC,Time DESC";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc())
            {
                $msg=$row['Msg'];
                $date=$row['Date'];
                $time=$row['Time'];
            ?>
            <tr>
                <td><?php echo $msg ?></td>
                <td><?php echo $date ?></td>
                <td><?php echo $time ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="footer">
      
      <b class="copyright">&copy; LMS by Concillo Group FDS A.Y.2023-2024 </b>All rights reserved.
  </div>
</div>

</body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>
