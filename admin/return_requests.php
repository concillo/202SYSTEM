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
        <a href="index.php" class="btn btn-secondary">Back</a>
   </head>
    
        <style>

body {

background: url('images/book.jpg') no-repeat;
background-size: cover;
background-position: center;
padding:8px;
}


.span9 {
margin-top:30px;
margin-bottom:30px;
margin-right:100px;
margin-left:100px;
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

}

</style>
    
                    <div class="span9">
                        <center>
                        <a href="issue_requests.php" class="btn btn-info">Issue Requests</a>
                        <a href="renew_requests.php" class="btn btn-info">Renew Request</a>
                        <a href="return_requests.php" class="btn btn-info">Return Requests</a>
                        </center>
                        <h1><i>Return Requests</i></h1>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Roll Number</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Dues</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                          $sql = "SELECT return.BookId, return.RollNo, Title, DATEDIFF(CURDATE(), Due_Date) AS x 
                          FROM LMS.return
                          INNER JOIN LMS.book ON return.BookId = book.BookId
                          INNER JOIN LMS.record ON return.BookId = record.BookId AND return.RollNo = record.RollNo
                          ORDER BY return.RollNo ASC";
                  
                  $result = $conn->query($sql);
                  
                  while ($row = $result->fetch_assoc()) {
                      $bookid = $row['BookId'];
                      $rollno = $row['RollNo'];
                      $name = $row['Title'];
                      $dues = $row['x'];
                  
                           
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php 
                                      if($dues > 0)
                                          echo $dues;
                                          else
                                          echo 0; ?></td>
                                      <td><center>
                                                                                
                                        <a href="acceptreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>&id3=<?php echo $dues ?>" class="btn btn-success">Accept</a>
                                         
                                        <!--a href="rejectreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>" class="btn btn-danger">Reject</a-->
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
            <div class="footer">
        <div class="container">
            <b class="copyright">&copy; LMS by Concillo Group FDS A.Y.2023-2024 </b>All rights reserved.
        </div>
    </div>
    
    
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>