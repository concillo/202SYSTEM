<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">

<style>
    body {
            
        font-family: 'Roboto', sans-serif;
        background: url('images/books.jpg') no-repeat;
        background-size: cover;
        background-position: center;
         margin: 0;
        }

    .dashboard-container
         {

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









        /* Your existing book container styles */
        .book-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 5px;
            padding: 5px;
           
        }

        .book {
            border: 2px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin: 10px;
            width: 200px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .book img {
            max-width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .see-more-button {
            text-align: right;
            margin-top: 500px;
        }

        .see-more-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .see-more-button a:hover {
            background-color: #0056b3;
        }

        
        .footer {
            text-align: center;
            padding: 30px;
            color:white;
            
        }
    </style>

</head>
<body>
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
                        <a class="nav-link" href="message.php"><i class="icon-inbox"></i> Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student.php"><i class="icon-user"></i> Manage Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book.php"><i class="icon-book"></i> All Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addbook.php"><i class="icon-edit"></i> Add Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="requests.php"><i class="icon-tasks"></i> Issue/Return Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recommendations.php"><i class="icon-list"></i> Book Recommendations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="current.php"><i class="icon-list"></i> Currently Issued Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aclogs.php"><i class="icon-list"></i> Activity Logs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="icon-list"></i>Logout</a>
                    </li>
                      <!-- Add other sidebar items here -->
                      </ul>
                </div>
                </nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
  



                    <?php
// DISPLAYED HOME
$books = [
    [
        'title' => 'The Pragmatic Programmer',
        'author' => 'Andy Hunt',
        'genre' => 'Fiction',
        'year' => 1999,
        'image' => 'images/pragmatic.jpg', 
    ],
    [
        'title' => 'To Kill a Mockingbird',
        'author' => 'Harper Lee',
        'genre' => 'Fiction',
        'year' => 1960,
        'image' => 'images/kill.jpg', 
    ],
    [
        'title' => '1984',
        'author' => 'George Orwell',
        'genre' => 'Dystopian',
        'year' => 1949,
        'image' => 'images/1984.jpg',
    ],
    //kung ganahan pa nga mo display add lng
];

// Display books in a container
echo '<div class="book-container">';

foreach ($books as $book) {
    echo '<div class="book">';
    // Display the image
    echo '<img src="' . $book['image'] . '" alt="' . $book['title'] . '">';
    echo '<h2>' . $book['title'] . '</h2>';
    echo '<p><strong>Author:</strong> ' . $book['author'] . '</p>';
    echo '<p><strong>Genre:</strong> ' . $book['genre'] . '</p>';
    echo '<p><strong>Year:</strong> ' . $book['year'] . '</p>';
    echo '</div>';
}

// "See More" button linking to another PHP file
echo '<div class="see-more-button">';
echo '<a href="book.php">See More</a>';
echo '</div>';

echo '</div>';
?>




</main>
    </div>
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

