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
      color:darkgrey;
  }
  
  </style>
  
    
<div class="span9">
<form class="form-horizontal row-fluid" action="student.php" method="post">
    <div class="control-group" style="margin-left: 1000px; margin-right: 10px;">
        <div class="controls custom-controls">
            <input type="text" id="title" name="title" placeholder="Enter Name/Roll No of Student" class="span8" style="width: 60%; padding: 10px;" required>
            <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px;">Search</button>
        </div>
    </div>
</form>
                                    <br>
                                    <?php




                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select record.BookId,RollNo,Title,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where (Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId) and (RollNo='$s' or record.BookId='$s' or Title like '%$s%')ORDER BY Date_of_Issue ASC";
                                        }
                                    else
                                        $sql="select record.BookId,RollNo,Title,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId ORDER BY Date_of_Issue ASC ";
                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Roll No</th>  
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                      <th>Dues</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                <?php

                            

                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $rollno=$row['RollNo'];
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $issuedate=$row['Date_of_Issue'];
                                $duedate=$row['Due_Date'];
                                $dues=$row['x'];
                            
                            ?>

                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $issuedate ?></td>
                                      <td><?php echo $duedate ?></td>
                                      <td><?php if($dues > 0)
                                                  echo "<font color='red'>".$dues."</font>";
                                                else
                                                  echo "<font color='green'>0</font>";
                                              ?>
                                    </tr>
                            <?php
                        
                        
                        }} ?>
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