<?php 

 include('fb_process.php');

 $username = $_SESSION['username'];

 $sql = "SELECT * FROM users WHERE u_username = '$username'";

 $query = mysqli_query($con, $sql);

 $record = mysqli_fetch_assoc($query);

 if($record['u_username'] == $username) {

    $_SESSION['username'] = $record['u_username'];
    header("Location: user/index.php");

 }else {
 	session_destroy();
 	session_unset();
 	header("Location: index.php");
 }

?>