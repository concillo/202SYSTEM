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
   </head>
    <body>
        <style>
    .navbar-inverse .navbar-nav .nav-link {
        color: #fff; /* Set text color for nav links */
    }

    .nav-user.dropdown .dropdown-toggle {
        background-color: transparent;
        border: none;
        color: #fff; /* Set text color for the dropdown toggle */
    }

    .nav-user.dropdown .dropdown-toggle:hover,
    .nav-user.dropdown .dropdown-toggle:focus {
        background-color: transparent; /* Keep background transparent on hover or focus */
        color: #fff; /* Set text color for the dropdown toggle on hover or focus */
    }

    .nav-user.dropdown .dropdown-menu {
        background-color: #343a40; /* Set background color for the dropdown menu */
    }

    .nav-user.dropdown .dropdown-menu a {
        color: #fff; /* Set text color for dropdown menu items */
    }

    .nav-user.dropdown .dropdown-menu a:hover {
        background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent white on hover */
        color: #fff; /* Set text color for dropdown menu items on hover */
    }

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
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

    .sidebar {
        background-color: #343a40;
        padding-top: 20px;
        padding-bottom: 20px;
        min-height: 100vh;
        color: #fff;
    }

    .sidebar a {
        color: #fff;
        text-decoration: none;
    }

    .sidebar a:hover {
        color: #f8f9fa;
    }

    .sidebar ul {
        list-style: none;
        padding-left: 0;
    }

    .sidebar li {
        padding: 8px 15px;
        border-bottom: 1px solid #495057;
    }

    .sidebar li.active {
        background-color: #007bff;
    }

    .sidebar li.active a {
        color: #f8f9fa;
    }

    .content {
        flex-grow: 1;
        padding: 20px;
    }
</style>

    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="findbook.php" class="btn-box big span4"><i class=" icon-search"></i><b>Find Book</b>
                                    </a><a href="findbookissue.php" class="btn-box big span4"><i class="icon-book"></i><b>Find Book Issue</b>
                                    </a><a href="finduser.php" class="btn-box big span4"><i class="icon-user"></i><b>Find User</b>
                                                                           </a>
                                </div>
                                </div>
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
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