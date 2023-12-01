<?php
require('dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LIBRARY MANAGEMENT SYSTEM</title>
        
    </head>
    <body>
   
               
        <style>
   
        body {
            
            font-family: 'Roboto', sans-serif;
            background: url('images/books.jpg') no-repeat;
            background-size: cover;
            background-position: center;
             margin: 0;
            }

    .dashboard-container {
            display: flex;
        }

        .sidebar 
          {
        padding:0px;
        margin-top:0px;
        position: fixed;
        margin-left:10px;
        height:100%;
        width: 200px;
        padding-top: 10px;
        padding-bottom: 30px;
        color: #009;
         }

    .nav-link {
        color: #fff;
        display: flex;
        align-items: center;
        padding: 15px 20px;
        text-decoration: none;
        transition: background-color 0.3s;
        background-image: url('.png'); /* Replace with the path to your image */
        background-repeat: no-repeat;
        background-size: 20px 20px; /* Adjust the size of your image */
        background-position: 10px center; /* Adjust the position of your image */
      }

    .nav-link i {
        display: none; /* Hide the icon element if you want to remove it */
     }

    .nav-link:hover {
         background-color: #0011ff;
      }


        
    .main-content {
        flex-grow: 1;
        padding: 20px;
        margin-left: 250px; 
        margin-top: 50px;
     }

        @media (max-width: 768px) {
    .sidebar {
                display: none;
            }
    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 40px);
        padding-right: 15px;
        padding-left: 15px;
        overflow-y: auto;
        list-style: none; /* Remove the dots */
   }
    .main-content {
        width: 100%;
            }  
        }
    .footer{
        text-align: center;
        padding: 30px;
        margin-top:450px;
        color:white;
    }
    
</style>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="icon-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><i class="icon-inbox"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="message.php"><i class="icon-inbox"></i>Notification</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="book.php"><i class="icon-book"></i> All Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="history.php"><i class="icon-edit"></i> Previously Borrowed Books</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="current.php"><i class="icon-list"></i> Currently Issued Books</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="icon-list"></i>Logout</a>
                    </li>
                      <!-- Add other sidebar items here -->
                      </ul>
                </div>
                </nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
  

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