<?php

   require('database_conn.php');
   $sql = "SELECT * FROM area
         WHERE city_idcity LIKE '%".$_GET['id']."%'"; 
   $result = mysqli_query($conn,$sql);
   $area_arr = [];
   while($row = mysqli_fetch_assoc($result)){
        $area_arr[$row['idarea']] = $row['name'];
   }
   echo json_encode($area_arr);
?>