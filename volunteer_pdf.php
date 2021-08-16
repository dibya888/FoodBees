<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Dash</title>
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
  <h2 style="text-align: center;">Donor NID</h2>
  

        <?php
        


       include_once("connection.php");

         
        $sql = "SELECT * FROM volunteer WHERE id = '{$_GET['id']}' ";
        $rim = mysqli_query($conn,$sql);
      
         $result = mysqli_fetch_assoc($rim);

        ?>
        <div style="text-align: center;">
          <embed src="nid/<?php echo $result['nid'] ?>" width="800px" height="800px" />
        </div>
          
        <?php
      


     ?>
    
</div>
</body>
</html>