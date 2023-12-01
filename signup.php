<?php
    require('dbconn.php');
?>
<?php
if (isset($_POST['signup'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $mobno = $_POST['PhoneNumber'];
    $rollno = $_POST['RollNo'];
    $category = $_POST['Category'];
    $pp = $_POST['Category'];
    $type = 'User';

    $targetDirectory = "upload/";
    $targetFile = $targetDirectory . basename($_FILES["pp"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["pp"]["tmp_name"]);
    if ($check === false) {
        echo "<script type='text/javascript'>alert('File is not an image.')</script>";
        $uploadOk = 0;
    } else {
        // Allow certain file formats
        if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            $uploadOk = 0;
        }
    }

    // Move uploaded file if validation passed
    if ($uploadOk == 1 && move_uploaded_file($_FILES["pp"]["tmp_name"], $targetFile)) {
        $filename = basename($_FILES["pp"]["name"]); // Extracting just the file name
        $targetFile = $targetDirectory . $filename; // Creating the target file path

        $sql = "INSERT INTO LMS.user (Name, Type, Category, RollNo, EmailId, MobNo, Password, pp) 
                VALUES ('$name', '$type', '$category', '$rollno', '$email', '$mobno', '$password', '$filename')";



        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('Registration Successful')</script>";
        } else {
            echo "<script type='text/javascript'>alert('User Exists')</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords"
        content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <!-- //Fonts -->

    <style>
        body {
            background: url('images/Front.png') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }
        .container {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    margin: 50px auto; /* Center the container horizontally */
    max-width: 400px; /* Limit container width for responsiveness */
}

.register {
    text-align: center;
    padding: 20px;
}

/* Style for form inputs */
.container input[type="text"],
.container input[type="password"],
.container input[type="file"],
.container select {
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Adjust styles for submit button */
.container input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    cursor: pointer;
}

/* Responsive adjustments */
@media screen and (max-width: 480px) {
    .container {
        margin: 20px auto;
        padding: 10px;
    }
}

    </style>
</head>

<body>
    <div class="container">
        <div class="register">
            <h2>Sign Up</h2>
            <form action="signup.php" method="post" enctype="multipart/form-data">
                <input type="text" Name="Name" placeholder="Name" required>
                <input type="text" Name="Email" placeholder="Email" required>
                <input type="password" Name="Password" placeholder="Password" required>
                <input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
                <input type="text" Name="RollNo" placeholder="Student ID" required="">
                <input type="file" name="pp" accept="image/*" required>

                <select name="Category" id="Category">
                    <option value="Student">Student</option>
                    <option value="Staff">Staff</option>
                </select>
        </div>

        <div class="send-button">
            <input type="submit" name="signup" value="Sign Up">
        </div>
            
        </form>

        <div class="clear">
            <p class="para-2">Already have account
                <a href="index.php"> Sign In </a>
            </p>
        </div>

    </div>



    </body>
</html>
