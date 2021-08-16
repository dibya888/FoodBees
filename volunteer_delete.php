<?php
        


       include_once("connection.php");

      
        $check = "SELECT nid  FROM volunteer WHERE id = '{$_GET['id']}'";
        $query =   $rim = mysqli_query($conn,$check);
        $res = mysqli_fetch_assoc($query);
        $nid = $res['nid'];
         
        $sql = "DELETE  FROM volunteer WHERE id = '{$_GET['id']}' ";
        $rim = mysqli_query($conn,$sql);
        unlink("nid/".$nid);
         
         if($rim){
            echo '<script>window.location.href = "volunteer_list.php";</script>';
         }
        
        

     ?>