<?php
  
  include('config.php');
  session_start();

  if(isset($_POST) && !empty($_POST)) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_escape_string($con, trim($username));
    $password = mysqli_escape_string($con, md5($password));

    $sqllog = "SELECT * FROM users WHERE u_username = '$username' AND u_password = '$password'";

    $query = mysqli_query($con, $sqllog);

    $result = mysqli_fetch_assoc($query);

    if($result['u_username'] == $username && $result['u_password'] == $password) {
      
      $_SESSION['username'] = $username;

      echo 1;

    }else{
      echo "<span>المعلومات ناقصة او غير صحيحة حاول مجددا!</span>";
    }

  }


?>