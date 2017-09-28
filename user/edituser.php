<?php 
 
  session_start();
  include('../config.php');

  if(isset($_SESSION['username'])) {
    
    $unget = $_SESSION['username'];
    $sqlget = "SELECT * FROM users WHERE u_username = '$unget'";
    $queryget = mysqli_query($con, $sqlget);
    $info = mysqli_fetch_assoc($queryget);


  }

?>
<div class="edituser">
  <form action="index.php" method="POST" class="form">
     <p><input type="text" name="name" id="name" value="<?php echo $info['u_name']; ?>" placeholder="الاسم الكامل"></p>
     <p><input type="text" name="username" id="username" value="<?php echo $info['u_username']; ?>" placeholder="الاسم المستعار"></p>
     <p><input type="password" name="password1" id="pass1" placeholder="كلمة السر"></p>
     <p><button class="editBtn" id="editBtn">تعديل</button></p>
  </form>
</div>