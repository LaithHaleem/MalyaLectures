<?php
  session_start();
  $pathcss;
  $pathuser;
 
    include('fb_config.php');

  $redirectUrl = 'http://localhost/college/fb_login.php';
  $premissions = ['email'];
  $loginUrl = $helper->getLoginUrl($redirectUrl, $premissions);

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>محاضرات قسم المالية والمصرفية المرحلة الثالثة - 2017-2018</title>
  <link rel="stylesheet" type="text/css" href="css/profile.css">
  <link rel="stylesheet" type="text/css" href="css/cpanel.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathcss; ?>/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathcss; ?>/error.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathcss; ?>/register.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathcss; ?>/lectures.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathcss; ?>/lec.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pathcss; ?>/styles.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathcss; ?>/res.css">
  <link rel="icon" type="image/ico" href="ficon.ico" size="16x16">
</head>
<body>
  <!-- Header Started -->
    <div class="header">
       <div class="container">
          <div class="row">
          	<div class="logo">
          		<h2><a href="http://<?php echo $_SERVER['SERVER_NAME']?>">محاضرات قسم المالية</a></h2>
          	</div>
          	<div class="ctrl">
          		<div class="row-btns">
                <?php if(isset($_SESSION['username'])) { 
                     
                     $user = $_SESSION['username'];
                ?>
                <a href="?logout" class="exit">خروج</a>
                <a href="<?php echo $pathuser ?>/"><?php echo $user; ?></a>
                <?php }else { ?>
          			<a href="register">تسجيل</a>
                <a href="#" id="logBtn">دخول</a>
                <?php } ?>
          		</div>
          	</div>
          </div>
       </div>
       <form action="" method="POST" class="logfrm" id="logFrm">
         <div class="iptGrp">
           <input type="text" name="username" id="user" placeholder="Username">
           <input type="password" name="password" id="pass" placeholder="Password">
           <input type="submit" name="submit" id="subBtn" value="ادخل">
           <a href="<?php echo $loginUrl; ?>" class="fb_login">سجل الدخول بواسطة فيس بوك</a>
           <div id="error"></div>
         </div>
       </form>
    </div>