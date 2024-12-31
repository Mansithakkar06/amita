<?php
   $servername="localhost:3307";
   $username="root";
   $password="";
   $database="mydb";
   
   $conn=mysqli_connect($servername,$username,$password,$database);
   if(!$conn)
   {
	   die("Sorry we failed the connect.".mysqli_connect_error());
   }
   /*else
   {
	   echo "Connection was Successful<br>";
   }*/
?>