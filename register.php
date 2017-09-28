<!-- Header Start -->
<?php 

 // Get Connect File 
 include('config.php');
 
 // Get External Css File
 $pathcss = "css";
 require_once('includes/header.php');
 require_once('fb_config.php');

 // Check if Session found 
 if(isset($_SESSION['username'])) {
    header("Location: index.php");
 }

  $redirectUrl = 'http://localhost/college/fb_register.php';
  $premissions = ['email'];
  $loginUrl = $helper->getLoginUrl($redirectUrl, $premissions);

?>

<!-- Header End -->

<!-- Resgiter Strart -->

<div class="registerBox">
    <?php 
      
       // Check if The Request is Found

       if(isset($_POST['submit']) && !empty($_POST)) {
          
          $u_name = mysqli_escape_string($con, preg_replace('/(?:<|&lt;).*?(?:>|&gt;)/', 'No Name', $_POST['name']));
          $u_username = mysqli_escape_string($con, trim($_POST['username']));
          $u_password1 = mysqli_escape_string($con, md5($_POST['password1']));
          $u_password2 = mysqli_escape_string($con, md5($_POST['password2']));
          
          // Check Valid Username
          $sqlget = "SELECT * FROM users WHERE u_username = '$u_username'";
          $queryget = mysqli_query($con, $sqlget);
          $result = mysqli_fetch_assoc($queryget);
          $defaultImg = 'http://localhost/college/user/images/default.png';

          // Check If The Username Input is Valid

          if(preg_match("/^[a-zA-Z0-9]+$/", $u_username) == 1) {

          // Check if The Passwords is Equal

          if($u_password2 == $u_password1) {

              if($u_username != $result['u_username']) {
                  $sql = "
                  INSERT INTO 
                  users
                  (u_name, u_username, u_password, u_level, image)
                   VALUES
                   ('$u_name', '$u_username', '$u_password2', 1, '$defaultImg')";

                   $query = mysqli_query($con, $sql);

                   if($query) {

                    $_SESSION['username'] = $u_username;
                    header("Refresh:2; url=user/#/".$u_username);
                   }

              }

          }

       }

   }

    ?>
	<div class="container">
		<div class="register">
    <div class="alert">
       <?php if(isset($_POST['submit'])) { if(isset($query)) { ?>
       <div class="alert al-success">تم التسجيل بنجاح جاري تحويلك الى صفحتك الشخصية</div>
       <?php }else { ?>
              <div class="alert al-error">هناك خطأ في عملية التسجيل يرجى اعادة المحاولة</div>
        <?php } } ?>

       <?php 
             if(isset($_POST['submit']) && !empty($_POST)) {
            if($_POST['name'] == '' || $_POST['username'] == '' ||
            $_POST['password1'] == '' || $_POST['password2'] == '') 
        { ?> <div class="alert al-error">جميع الحقول مطلوبة يرجى اعادة المحاولة</div>
        <?php } } 
        
        if(isset($_POST['submit'])) { if($u_username == $result['u_username']) {
        ?>
            <div class="alert al-error">الاسم المستعار مسجل مسبقا اختر واحدا مختلف</div>
        <?php } } ?>
      </div>
      <form action="register.php" method="POST">
			 <h2 class="titleregister">تسجيل حساب جديد</h2>
		     <p><input type="text" id="name" name="name" placeholder="الاسم الكامل"></p>
		     <p><input type="text" id="username" name="username" placeholder="الاسم المستعار  (يجب ان يتكون من حروف او ارقام انكليزية)"></p>
		     <p><input type="password" id="password1" name="password1" placeholder="كلمة السر"></p>
		     <p><input type="password" id="password2" name="password2" placeholder="اعد كلمة السر"></p>
		     <p><button class="submit" name="submit">تسجيل</button></p>
		    </form>
        <div class="line">
          <span>او</span>
        </div>
        <div class="socialRegister">
          <a href="<?php echo $loginUrl; ?>" class="facebook">التسجيل بواسطة فيس بوك</a>
        </div>
		</div>
	</div>
</div>

<!-- Regsiter End -->

<!-- Footer Start -->
<?php
 $pathasset = 'asset';
 $pathjs = 'js';
 require_once('includes/footer.php') ?>
<!-- Footer End -->