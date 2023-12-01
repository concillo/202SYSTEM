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
        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
   </head>
    <body>
       
        <style>
    body { font-family: 'Roboto', sans-serif;
        background: url('images/book.jpg') no-repeat;
        background-size: cover;
        background-position: center;
       padding:30px;
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


                    
    <div class="span9">
        <form class="form-horizontal row-fluid" action="book.php" method="post">
            <div class="control-group">
                <label class="control-label" for="Search"><b>Search:</b></label>
                    <div class="controls">
                        <input type="text" id="title" name="title" placeholder="Enter Name/ID of Book" class="span8" required>
                            <button type="submit" name="submit"class="btn">Search</button>
                                </div>

    <?php
            if(isset($_POST['submit']))
                {$s=$_POST['title'];
                $sql="SELECT * FROM LMS.book WHERE BookId='$s' OR Title LIKE '%$s%' ORDER BY BookId ASC";
                     }
                else
                    $sql="SELECT * FROM LMS.book ORDER BY BookId ASC";

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
                <th>Book id</th>
                <th>Book name</th>
                <th>Availability</th>
                <th></th>
                </tr>
                </thead>
                <tbody>
    <?php
                            
        //$result=$conn->query($sql);
        while($row=$result->fetch_assoc())
        {
        $bookid=$row['BookId'];
        $name=$row['Title'];
        $avail=$row['Availability'];
                            
                           
    ?>
                                    <tr>
            <td><?php echo $bookid ?></td>
            <td><?php echo $name ?></td>
            <td><b><?php echo $avail ?></b></td>
            <td><center>
            <a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-primary">Details</a>
                                            <a href="edit_book_details.php?id=<?php echo $bookid; ?>" class="btn btn-success">Edit</a>
                                        </center></td>
                                    </tr>
                               <?php }} ?>
                               </tbody>
                                </table>
                            </div>
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