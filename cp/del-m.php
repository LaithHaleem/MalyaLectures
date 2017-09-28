<?php 

  session_start();

  include("../config.php");
 
  if(isset($_GET['dg']) && !empty($_GET['dg'])) {

  	  if(isset($_SESSION['username'])) {

  	  	    $user = $_SESSION['username'];
  	  	    $sql = "SELECT * FROM users WHERE u_username = '$user'";
  	  	    $query = mysqli_query($con, $sql);
  	  	    $record = mysqli_fetch_assoc($query);

	         $dg = $_GET['dg'];
	         $sqldel = "UPDATE users SET u_level = 1 WHERE id = '$dg'";
	         $querydel = mysqli_query($con, $sqldel);

           if($querydel) {

             if($record['id'] === $dg) {
               
               echo 0;

             }else {
               echo 1;

             }

           }  

 
  	  }

  }

?>