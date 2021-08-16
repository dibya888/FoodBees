<?php
        


       include_once("connection.php");
       


        $check = "SELECT nid,image  FROM donor WHERE id = '{$_GET['id']}'";
        $query =   $rim = mysqli_query($conn,$check);
        $res = mysqli_fetch_assoc($query);
        $nid = $res['nid'];
        $image = $res['image'];
      

         
        $sql = "DELETE  FROM donor WHERE id = '{$_GET['id']}' ";
        $rim = mysqli_query($conn,$sql);
        unlink("nid/".$nid);
        unlink("image/".$image);
         
         if($rim){
            echo '<script>window.location.href = "admindash.php";</script>';
         }
        
        

     ?>