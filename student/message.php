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
        font-family: 'Roboto', sans-serif;
        background: url('images/book.jpg') no-repeat;
        background-size: cover;
        background-position: center;
        margin: 0;
        padding:80px;
}

.wrapper {
    display: flex;
    width: 20px%;
}

.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: 60px;
    margin-left: auto;
}


.content {
    flex-grow: 1;
    padding: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #007bff;
    color: #fff;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #d4edda; /* Light green for better visibility on hover */
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

.footer {
    text-align: center;
  margin-top:450px;
    
    color: #black;
}
</style>

               
<div class="span9">
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
    <div class="container">
        <b class="copyright">&copy; 2023 Library Management System </b>All rights reserved.
    </div>
</div>

<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="scripts/common.js" type="text/javascript"></script>

</body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>
