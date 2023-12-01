<!--Connect ni ngadtos database -->
<?php
	require('dbconn.php');
?>


<!DOCTYPE html>
<html>
<!-- Header-->
<head> <title>LIBRARY MANAGEMENT SYSTEM </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<!-- //Fonts -->
	<style>
        body {
            background: url('images/bg.png') no-repeat center center fixed;
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

h1 {
            text-align: center;
			color: white;
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
.footer{
            text-align: center;
            padding: 60px;
			color: white;
        }

    </style>

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>LIBRARY MANAGEMENT SYSTEM</h1>

	<div class="container">

		<div class="login">
			<h2>Sign In</h2>
			<form action="index.php" method="post">
				<input type="text" Name="RollNo" placeholder="Student ID" required="">
				<input type="password" Name="Password" placeholder="Password" required="">
				<div class="send-button">
					<input type="submit" name="signin"; value="Sign In">
				</div>
			</form>
			<div class="clear">
				<p class="para-2">Not have an account
			        <a href="signup.php"> Sign Up Here </a>
			    </p>
			</div>
		</div>
	</div>

	<div class="footer w3layouts agileits">
		<p> &copy; 2023 Library Member Login. All Rights Reserved </a></p>
	</div>

<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from LMS.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:student/index.php');


        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
}
   

}



?>

</body>
<!-- //Body -->

</html>
