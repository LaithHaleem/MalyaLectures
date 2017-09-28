<?php 

  session_start();

  include("../config.php");
  include("../del-files.php");

  if(isset($_GET['del']) && !empty($_GET['del'])) {

  	  if(isset($_SESSION['username'])) {

            //Query To Check The User That Will Delete it, He is Same A Session
  	  	    $user = $_SESSION['username'];
  	  	    $sql = "SELECT * FROM users WHERE u_username = '$user'";
  	  	    $query = mysqli_query($con, $sql);
  	  	    $record = mysqli_fetch_assoc($query);

            //Query For Get Path Of User Folder
	          $del = $_GET['del'];
            $sqlget = "SELECT * FROM users WHERE id = '$del'";
            $queryget = mysqli_query($con, $sqlget);
            $recordget = mysqli_fetch_assoc($queryget);
            $usernamepath = $recordget['u_username'];
            $pathdir = '../user/images/'.$usernamepath;

            //Query For Deleting User From Database
	          $sqldel = "DELETE FROM users WHERE id = '$del'";
	          $querydel = mysqli_query($con, $sqldel);

           if($querydel) {

             if($record['id'] === $del) {
               rdir($pathdir); // External Function To Remove Upon Path
               echo 0;

             }else {
               rdir($pathdir); // External Function To Remove Upon Path
               echo 1;

             }

           }  

 
  	  }

  }

?>