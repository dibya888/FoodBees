<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="css/signup.css" rel="stylesheet">
  <style type="text/css">
    .sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
  </style>
</head>
<body>
  <?php
    session_start();
   
    $username = $_SESSION['user_name'];
    
    if($username == true){
        
    }
    
    else{
        header("location: login.php");
    }

?>

<div class="sidebar">
  <a class="" href="admindash.php">Donor List</a>
  <a href="volunteer_list.php">Volunteer List</a>
  <a href="changepassword.php">Password Change</a>
  <a href="logout.php">Logout</a>
</div>

<div class="content">
  <br>
  <br>
  <h2 style="text-align: center;">Password Change</h2>
  <div class="container">
    <div class="row">
       <div class="col-md-5" style="margin: 0 auto;">
         <form method="post" action="" style="border: 2px solid deepskyblue; padding: 20px 20px;">
            <div class="form-group">
              <label class="form-control-placeholder" for="username">New Userame</label>
        <input type="text" name="username" id="username" class="form-control" required>
      </div>
      <div class="form-group">
        <label class="form-control-placeholder" for="password">New Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>
             <div class="bt" style="text-align: center;">
                <button type="submit" name="sub" class="btn btn-success" >Update</button>  
             </div>
             </form>
       </div>
    </div>
    
  </div>
</div>

<?php
        include_once("connection.php");
        
        
        if(isset($_POST['sub'])){
            $user = $_POST['username'];
            $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $userid = $_SESSION['user_id'];
            
            $sql = "Update admin SET username='$user',password='$pass' WHERE id='$userid'";
            
            $res = mysqli_query($conn,$sql);
            echo"<script>swal({
                    title: 'Username or Password Changed Successfully',
                    text: 'Thank You',
                    icon: 'success',
                    timer: 3000,
                    button: false,
                });</script>";
    
            
        }
        
        
        
        
        ?>
</body>
</html>