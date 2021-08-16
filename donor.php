<!DOCTYPE html>
<html>
<head>
	<title>Food Bees</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/
	font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sustyle.css">
		 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- jQuery library -->
	
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
				<a href="" class="logo"><img src="image/logo.png" height="50"  style="margin-bottom: 28px;"></a>
				<nav>
					<ul>
						<li class="active"><a href="index.html">HOME</a></li>
						<li><a class="nav-link" href="index.html">SERVICES</a></li>
						<li><a class="nav-link" href="index.html">FEATURES</a></li>
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

							<div class="wrap" style="box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px deepskyblue;">
		<h2>Donor Sign Up</h2>
		<form method="post" enctype="multipart/form-data">
			<input type="text" placeholder="First Name" name="f_name">
			<input type="text" placeholder="Last Name" name="l_name">
			<input type="email" placeholder="Email" name="email">
			<input type="number" placeholder="Phone" name="phone" id="phone">
			<br>
			<label>Upload Image</label>
			<input type="file" name="img" required="required">
			<br>
			<label style="color: white;">Upload Your NID(National Identinty Card) PDF*<a style="text-decoration-line: none;" href="" data-toggle="tooltip" title="If you don't have PDF file of NID, Please collect it from Election Commision Website"> &nbsp;&nbsp;&nbsp; <i style="color: red;" class="fa fa-question-circle" aria-hidden="true"></i></a></label>
			<input type="file" name="nid" required="required">
			<input type="submit" name="submit" value="Submit">

		</form>
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type="text/javascript">

</script>
	</div>
<?php

include_once('connection.php');

if(isset($_POST['submit'])){

  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $p_check = strlen($phone);
  $b = $_FILES['nid'];
  $imagePath = "image/";
  $uniquesavename=time().uniqid(rand()) . '.jpg';
  $destFile = $imagePath . $uniquesavename;
  $filename = $_FILES["img"]["tmp_name"];
  list($width, $height) = getimagesize( $filename);       
  

  $nidpath = "nid/";
  $unique=time().uniqid(rand()) . '.pdf';
  $dest = $nidpath . $unique;
  $file = $_FILES["nid"]["tmp_name"];
  list($width, $height) = getimagesize( $file);       

  $pdf = $b['name'];
  $con = explode(".", $pdf);
  $ext = $con[1];
  
  $check  = "SELECT email,phone FROM donor WHERE email = '$email' or phone = '$phone' ";
  $rim = mysqli_query($conn,$check);

   if(empty($f_name) || empty($l_name) || empty($email) || empty($phone) || $p_check !=11 )
  {
                echo"<script>swal({
                    title: 'Fill Up All Field or Check Correct Phone Number',
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
    $sql = "INSERT INTO donor(f_name,l_name,email,phone,image,nid)
                                VALUES('$f_name','$l_name','$email','$phone','$uniquesavename','$unique')";
         
         move_uploaded_file($filename,$destFile);
         move_uploaded_file($file,$dest);

                $res = mysqli_query($conn,$sql);              
                echo"<script>swal({
                    title: 'Information Added Successfully',
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