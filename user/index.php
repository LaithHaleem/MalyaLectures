<!-- Header Start -->
<?php
//Include Connect File
include('../config.php');

if(isset($_GET['logout'])) {
   header('Location: ../logout.php');
}

$pathcss = "../css";
$pathuser = "../user";

require_once('../includes/header.php');

   if(!$_SESSION['username']) {
      header("location: ../index.php");
   }


  $userget = $_SESSION['username'];
  $sqlget = "SELECT * FROM users WHERE u_username = '$userget'";
  $queryget = mysqli_query($con, $sqlget);
  $fetch = mysqli_fetch_assoc($queryget);
?>
<!-- Header End -->
<!-- Profile Start -->
   <div class="profileBox">
   	 <div class="container">
   	 	<div class="profile text-center">
   	 		<div class="profImgBox">
        <form action="pic.php" method="POST" id="frmpic">
   	 		<input type="file" name="picture" class="picform trig">
        </form>
         <?php

         $pathimg = 'images/'. $userget .'/'. $fetch['image'];
         
         if(file_exists($pathimg)) {
            echo "<img id='userImg' src='images/$userget/$fetch[image]'>";
         }else {
            echo "<img id='userImg' src='$fetch[image]'>";
         }

        ?>
   	</div>
<?php

  if(isset($_POST) && !empty($_POST)) {
    
    $u_sission = $_SESSION['username'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $pass1 = md5($_POST['password1']);
    
    if($pass1 == $fetch['u_password'] && $pass1 != '') {

      $name = mysqli_escape_string($con, preg_replace('/(?:<|&lt;).*?(?:>|&gt;)/', 'No Name', $name));
      $name = mysqli_escape_string($con, $name);
      $username = mysqli_escape_string($con, trim($username));
      $pass1 = mysqli_escape_string($con, $pass1);
       
       $sqlup = "UPDATE users SET u_name = '$name', u_username = '$username', u_password = '$pass1' WHERE u_username = '$u_sission'";

       $query = mysqli_query($con, $sqlup);

       if($query) {

         $_SESSION['username'] = $username;
        }


   }

}

?>
   	 		<div class="studentName">
   	 			<h2><?php echo $fetch['u_name']; ?></h2>
   	 		</div>
   	 	</div>
   	 </div>
   </div>
   <?php if(isset($_POST['submit'])) { if($pass1 != $fetch['u_password'] || $pass1 == '') { ?>
<div class='alert al-error' style="padding: 12px;width: 62%;background: #e74c3c;margin: 0 auto 10px;font-family: 'Droid'; font-size: 15px; border-right: 5px solid #c1392b; color: #FFFFFF;">كلمة السر التي ادخلتها غير صحيحة</div>
  <?php } } ?>
<?php if(isset($_POST['submit'])) { if(isset($query)) { ?>
<div class='alert al-error' style="padding: 12px;width: 62%;background: #30bf6d;margin: 0 auto 10px;font-family: 'Droid'; font-size: 15px; border-right: 5px solid #259253; color: #FFFFFF;">تم تحديث البيانات الشخصية بنجاح</div>
  <?php } } ?>
   <div class="contProfile">
   	 <div class="container">
   	 	<div class="contentsuser">
   	 		<div class="navsCtrl">
               <div class="edituserBtn active" onclick="getPage('edituser.php', '.edituserBtn')">الاعدادات</div>
   	 			<div class="lecturesuserBtn" onclick="getPage('lecturesuser.php', '.lecturesuserBtn')">المحاضرات</div>
               <?php if($fetch['u_level'] > 1) { ?>
               <a href="../cp">لوحة التحكم</a>
               <?php } ?>
   	 		</div>
   	 		<div class="rankuser">
                  <?php if($fetch['u_level'] == 1) {
                        echo '<span>مستخدم</span>';
                     }elseif($fetch['u_level'] == 2) {
                        echo '<span style="color: blue">مشرف</span>';
                     }elseif($fetch['u_level'] == 3) {
                        echo '<span style="color: green">مدير</span>';
                     }elseif($fetch['u_level'] == 4) {
                        echo '<span style="color: red; font-weight: bold">مالك</span>';
                     } ?>
   	 			<span> :نوع الحساب</span>
   	 		</div>
            <div class="dashcontents" id="dashcontents">
                  <div class="edituser">
                 <form action="profile.php" method="POST" class="form">
                    <p><input type="text" name="name" id="name" value="<?php echo $fetch['u_name']; ?>" placeholder="الاسم الكامل"></p>
                    <p><input type="text" name="username" id="username" value="<?php echo $fetch['u_username']; ?>" placeholder="الاسم المستعار"></p>
                    <p><input type="password" name="password1" id="pass1" placeholder="كلمة السر"></p>
                    <p><button class="editBtn" name="submit" id="editBtn">تعديل</button></p>
                 </form>
               </div>
            </div>
   	 	</div>
   	 </div>
   </div>
<!-- Profile End -->

<!-- Footer Start -->
<?php 
$pathasset = '../asset';
$pathjs = 'js';
require_once('../includes/footer.php') ?>
<!-- Footer End -->