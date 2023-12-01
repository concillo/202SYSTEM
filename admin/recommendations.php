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
        <link rel="stylesheet" href="path/to/your/bootstrap/css/bootstrap.min.css">
        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
    </head>

    <body>

        <style>
           body { font-family: 'Roboto', sans-serif;
        background: url('images/book.jpg') no-repeat;
        background-size: cover;
        background-position: center;
       padding:80px;
    }

    .wrapper {
        display: flex;
    }

 

    .content {
        flex-grow: 1;
        padding: 20px;
    }
        
    .table {
        width: 100%;
            border-collapse: collapse;
            margin-top: 2px;
            overflow-x: auto;
          margin-top:30px;
        }

        .table th,
        .table td {
            border: 1px solid #5cb85c;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #5cb85c;
            color: #fff;
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
            margin-top:40px;
        
            

        }

        .btn:hover {
            background-color: #46b8da;
        }

        .footer {
            text-align: center;
            padding: 30px;
            margin-top:150px;
            color: #black;
        }



        .span9 {
       
        margin-top:60px;
        margin-bottom:50px;
    }

.control-label{
    margin-top:100px;
    margin-bottom:500px;
}
        </style>

        <div class="wrapper">
            <div class="sidebar">
               
            </div>
            <div class="content">
                <h1>Recommendations</h1>


                <table class="table">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Description</th>
                            <th>Recommended By</th>
                        </tr>
                    </thead>
                    <tbody>
                                    <?php
                            $sql="select * from LMS.recommendations ORDER BY RollNo ASC";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookname=$row['Book_Name'];
                                $description=$row['Description'];
                                $rollno=$row['RollNo'];
                            ?><tr>
                            <td><?php echo $bookname ?></td>
                            <td><?php echo $description ?></td>
                            <td><b><?php echo strtoupper($rollno) ?></b></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <center>
                <a href="addbook.php" class="btn btn-success">Add a Book</a>
            </center>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <b class="text-light">&copy; 2023 Library Management System </b>All rights reserved.
        </div>
    </div>

    <!-- Your script includes here -->
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="scripts/common.js" type="text/javascript"></script>

</body>

</html>

<?php } else {
echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>