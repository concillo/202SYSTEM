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
  

    .content {
        flex-grow: 1;
        padding: 30px;
    }

      

        .module {
         
    border-collapse: collapse;
overflow-x: auto;
 
  margin-top:30px;
margin-bottom:30px;
margin-right:100px;
margin-left:100px;
        
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
            margin-top: 10px;
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
        .btn {
            padding: 10px 12px;
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
        

     .footer{
    text-align:center;
    color:darkgrey;
    margin-top:30px;
      }
</style>


                    
<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>ADD BOOK</h3>
</div>
    <div class="module-body"><br >
        <form class="form-horizontal row-fluid" action="addbook.php" method="post">
            <div class="control-group">
                <label class="control-label" for="Title"><b>Book Title</b></label>
                    <div class="controls">
                        <input type="text" id="title" name="title" placeholder="Title" class="span8" required>
    </div>
</div>
    <div class="control-group">
        <label class="control-label" for="Author"><b>Author</b></label>
            <div class="controls">
                <input type="text" id="author1" name="author1" class="span8" required>
                <input type="text" id="author2" name="author2" class="span8">
                <input type="text" id="author3" name="author3" class="span8">
    </div>
</div>
        <div class="control-group">
            <label class="control-label" for="Publisher"><b>Publisher</b></label>
                <div class="controls">
                <input type="text" id="publisher" name="publisher" placeholder="Publisher" class="span8" required>
    </div>
</div>
        <div class="control-group">
            <label class="control-label" for="Year"><b>Year</b></label>
                <div class="controls">
                    <input type="text" id="year" name="year" placeholder="Year" class="span8" required>
    </div>
</div>
        <div class="control-group">
            <label class="control-label" for="Availability"><b>Number of Copies</b></label>
                <div class="controls">
                    <input type="text" id="availability" name="availability" placeholder="Number of Copies" class="span8" required>
    </div>
</div>
                                        

        <div class="control-group">
            <div class="controls" >
                <button type="submit" name="submit"class="btn">Add Book</button>
    </div>
</div>
                             
</div>
</div>
   



<div class="footer">
       <b class="copyright">&copy; LMS by Concillo Group FDS A.Y.2023-2024 </b>All rights reserved.
</div>
   

    
<?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $author1=$_POST['author1'];
    $author2=$_POST['author2'];
    $author3=$_POST['author3'];
    $publisher=$_POST['publisher'];
    $year=$_POST['year'];
    $availability=$_POST['availability'];

$sql1="insert into LMS.book (Title,Publisher,Year,Availability) values ('$title','$publisher','$year','$availability')";

if($conn->query($sql1) === TRUE){
$sql2="select max(BookId) as x from LMS.book";
$result=$conn->query($sql2);
$row=$result->fetch_assoc();
$x=$row['x'];
$sql3="insert into LMS.author values ('$x','$author1')";
$result=$conn->query($sql3);
if(!empty($author2))
{ $sql4="insert into LMS.author values('$x','$author2')";
  $result=$conn->query($sql4);}
if(!empty($author3))
{ $sql5="insert into LMS.author values('$x','$author3')";
  $result=$conn->query($sql5);}

echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>