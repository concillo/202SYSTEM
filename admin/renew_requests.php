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
        <a href="index.php" class="btn btn-secondary">Back</a>
   </head>
    <body>
        <style>

    body {font-family: 'Roboto', sans-serif;
        background: url('../images/colors.jpg') no-repeat;
        background-size: cover;
        background-position: center;
       padding:50px;
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
          padding:50px;
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

        }
</style>

       <div class="span9">
                        <center>
                        <a href="issue_requests.php" class="btn btn-info">Issue Requests</a>
                        <a href="renew_requests.php" class="btn btn-info">Renew Request</a>
                        <a href="return_requests.php" class="btn btn-info">Return Requests</a>
                        </center>
                        <h1 class="header"><i>Renew Requests</i></h1>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Roll Number</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Renewals Left</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                           $sql = "SELECT * FROM LMS.record
                           INNER JOIN LMS.book ON record.BookId = book.BookId
                           INNER JOIN LMS.renew ON renew.BookId = book.BookId AND renew.RollNo = record.RollNo
                           ORDER BY record.RollNo ASC";
                   
                   $result = $conn->query($sql);
                   
                   while ($row = $result->fetch_assoc()) {
                       $bookid = $row['BookId'];
                       $rollno = $row['RollNo'];
                       $name = $row['Title'];
                       $renewals = $row['Renewals_left'];
                   
                           
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php echo $renewals ?></td>
                                      <td><center>
                                        <?php
                                        if($renewals > 0)
                                        {echo "<a href=\"acceptrenewal.php?id1=".$bookid."&id2=".$rollno."\" class=\"btn btn-success\">Accept</a>";}
                                         ?>
                                        <!--a href="rejectrenewal.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>" class="btn btn-danger">Reject</a-->
                                    </center></td>
                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span3-->
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
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>