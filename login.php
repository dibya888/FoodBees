<!DOCTYPE html>
<html>
<head>
	<title>Food Bees</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/
	font-awesome.min.css">
	<link rel="stylesheet" href="css/sistyle.css">
		 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

	<!-- jQuery library -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/caroufredsel.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
	<style type="text/css">
		header
{
	
	height: 112px;
	line-height: 112px;
	z-index: 1;
	width: 100%;

}

.secondary
{
	background-color: black;
	box-shadow: 0px 0px 17px 0px;
	transition: all 0.5s ease-in;
}

ul
{
	list-style: none;
}

ul li
{
	display: inline-block;
}

header nav
{
	float: right;
}

.logo img{
	margin-top: 10px;
}

header nav ul li a
{
	padding-right: 30px;
	font-weight: Bold;
	color: white;
	transition: all 0.5s ease-in;
}

header nav ul li a:hover
{
	text-decoration: none;
	color: red;
}

body{
	font-family: 'Lato', sans-serif !important; 
	 background: url(image/login.jpg) no-repeat center center fixed;
   background-size: 100% 100%;
   height: 100%;
   position: absolute;
   width: 100%;
}







	</style>

</head>
<body>

	<?php
        include_once("connection.php");
        
   
          session_start();

	
        
        if(isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
           
            
            $sql = "SELECT id,username,password FROM admin
                           WHERE username='$user'";
            
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            $record = mysqli_fetch_assoc($res); 
            $hash = $record['password'];
            if(password_verify($pass, $hash)){
                $_SESSION['user_name']=$record['username'];
                $_SESSION['user_id']=$record['id'];
              
               
                header('location: admindash.php');
            }
            
            else{
               echo"<script>swal({
                    title: 'Username or Password is Incorrect',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                });</script>";
            }
            
        }
        
        
        
        
        ?>
	
	<header style="background-color: black;">
		<div class="container">
			<div class="row">
				<a href="" class="logo"><img src="image/logo.png" height="50"  style="margin-bottom: 28px;"></a>
				<nav>
					<ul>
						<li class="active"><a href="index.html">HOME</a></li>
						<li><a class="nav-link" href="#intro">SERVICES</a></li>
						<li><a class="nav-link" href="#feature">FEATURES</a></li>
						<!-- <li><a class="nav-link" href="#testimonial">ABOUT US</a></li> -->
						<li class="dropdown">
        <a style="text-decoration-line: none;" class="dropdown-toggle" data-toggle="dropdown" href="#">ABOUT US
        <span class="caret"></span></a>
        <ul class="dropdown-menu" style="line-height: 2; background-color: black;">
          <li><a style="font-weight: bold; color: deepskyblue;" href="team.html">Our Team</a></li>
          <li><a style="font-weight: bold; color: deepskyblue;" href="goal.html">Our Goals</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a style="text-decoration-line: none;" class="dropdown-toggle" data-toggle="dropdown" href="#">REGISTRATION
        <span class="caret"></span></a>
        <ul class="dropdown-menu" style="line-height: 2; background-color: black;">
          <li><a style="font-weight: bold; color: deepskyblue;" href="donor.php">Registration for Donor</a></li>
          <li><a style="font-weight: bold; color: deepskyblue;" href="volunteer.php">Registration for Volunteer</a></li>
        </ul>
      </li>
						<li><a class="nav-link" href="index.html">CONTACT US</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div class="container">
		
		<div class="row">
			<form method="post" style="magin-top: 3%; box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px deepskyblue;">
							
	<div class="login-box">
	<h1>Login</h1>
	<div class="textbox">
		<i class="fa fa-user" aria-hidden="true"></i>
		<input type="text" placeholder="Username" name="username" value="" required="">
	</div>
	<div class="textbox">
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input type="password" placeholder="Password" name="password" value="" required="">
	</div>

	<input class="btn1" type="submit" name="submit" value="Sign In">
</div>
								
							
						</form>
	</div>
</div>


</body>
</html>