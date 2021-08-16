<!DOCTYPE html>
<html>
<head>
	<title>Feed Poor</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/
	font-awesome.min.css">
	
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



/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}



	</style>

</head>
<body>
	<header style="background-color: black;">
		<div class="container">
			<div class="row">
				<a href="" class="logo"><img src="image/logo.png" height="60"></a>
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
          <li><a style="font-weight: bold; color: deepskyblue;" href="work.html">How We Work</a></li>
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
			<div class="col-md-6 col-md-offset-3" style="margin-top: 3%; box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px deepskyblue;">
				<form method="post" enctype="multipart/form-data">
							
								<h2 style="text-align: center;font-weight: bold;color: deepskyblue;">Want to be a Volunteer?</h2>
								<br>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Your Name" name="name">
									</div>
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Your Email Address" name="email">
									</div>
									<div class="form-group">
										<input type="number" class="form-control" placeholder="Your Phone Number" name="phone">
									</div>
						
							
									<div class="form-group">
										<textarea class="form-control" name="des" placeholder="Why you want to be a Volunteer?"></textarea>
									</div>
									<div class="form-group">
										<label style="color: white;">Upload Your NID(National Identinty Card) PDF* <a style="text-decoration-line: none;" href="" data-toggle="tooltip" title="If you don't have PDF file of NID, Please collect it from Election Commision Website"> &nbsp;&nbsp;&nbsp; <i style="color: red;" class="fa fa-question-circle" aria-hidden="true"></i></a></label>
										<input type="file" name="nid" style="color: white;" required="required">
									</div>
									<div class="form-group">
										<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
									</div>
								
							<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
						</form>
		</div>
	</div>
</div>
<?php

include_once('connection.php');

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $des = $_POST['des'];
  $b = $_FILES['nid'];
  $imagePath = "nid/";
  $uniquesavename=time().uniqid(rand()) . '.pdf';
  $destFile = $imagePath . $uniquesavename;
  $filename = $_FILES["nid"]["tmp_name"];
  list($width, $height) = getimagesize( $filename);       

  $pdf = $b['name'];
  $con = explode(".", $pdf);
  $ext = $con[1];

  $check  = "SELECT email,phone FROM volunteer WHERE email = '$email' or phone = '$phone' ";
  $rim = mysqli_query($conn,$check);

  
  
  if(empty($name) || empty($email) || empty($phone) || empty($des))
  {
                echo"<script>swal({
                    title: 'Fill Up All Field',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                });</script>";
            }
    else{

  if($ext != "pdf"){
  	echo"<script>swal({
                    title: 'Please Upload PDF File',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                });</script>";
  }
    elseif(mysqli_num_rows($rim)>0){
    	echo"<script>swal({
                    title: 'Email or Phone Already Exist',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                });</script>";
    }
            else{
				$sql = "INSERT INTO volunteer(name,email,phone,des,nid) VALUES('$name','$email','$phone','$des','$uniquesavename')";
				move_uploaded_file($filename,$destFile);
                $res = mysqli_query($conn,$sql);
               
              
                echo"<script>swal({
                    title: 'Your Information Added Successfully',
                    text: 'Thank You',
                    icon: 'success',
                    timer: 3000,
                    button: false,
                });</script>";
            }
}

}


?>
</body>
</html>