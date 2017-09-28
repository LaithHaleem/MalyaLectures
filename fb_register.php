<?php
 
 include('fb_process.php');

 $name = $_SESSION['userinfo']['first_name'].' '.$_SESSION['userinfo']['last_name'];
 $username = $_SESSION['username'];
 $image = $_SESSION['userinfo']['picture']['url'];

 $sqlget = "SELECT * FROM users WHERE u_username = '$username'";
 $queryget = mysqli_query($con, $sqlget);
 $record = mysqli_fetch_assoc($queryget);
 
 if($record['u_username'] != $username) {

 	$sql = "INSERT INTO users(u_name, u_username, u_level, image) 
         VALUES('$name', '$username', 1, '$image')";
 	$query = mysqli_query($con, $sql);

	if($query) {
	 
	 header("Location: user/index.php");
	 	
	}

}else {
 
     header("Location: user/index.php");

}

