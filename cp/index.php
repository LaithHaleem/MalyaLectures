<!-- Header Start -->
 <?php
 $pathcss = '../css';
 $pathuser = "../user";
 require_once('../includes/header.php');
 include('../config.php');

 if(isset($_GET['logout'])) {
   header('Location: ../logout.php');
}
 
 $user = $_SESSION['username'];
 // Check the level of users
 $sqlcheck = "SELECT * FROM users WHERE u_username = '$user'";
 $query = mysqli_query($con, $sqlcheck);
 $record = mysqli_fetch_assoc($query);
 if($record['u_level'] < 2) {
 	header("Location: ../index.php");
 }

  function cmem($select, $table, $val) {
  	global $con;
 	$sqlnumber = "SELECT COUNT($select) AS total FROM $table WHERE $select = $val";
 	$querynumber = mysqli_query($con, $sqlnumber);
 	$number = mysqli_fetch_assoc($querynumber);
 	echo $number['total'];
 }
 ?>
<!-- Header End -->

<!-- Cpanel Start -->
 
 <div class="cpanelBox">
 	<div class="cpanelList">
 		<div class="adminBox">
	         <?php
	         $pathimg = '../user/images/'. $user .'/'. $record['image'];
	         
	         if(file_exists($pathimg)) {
	            echo "<img id='userImg' src='../user/images/$user/$record[image]'>";
	         }else {
	            echo "<img id='userImg' src='$record[image]'>";
	         }
	        ?>
 			<h3 class="adminname">
 			<a href="<?php echo '../user/' ?>"><?php echo $record['u_name']; ?></a>
 			</h3>
 		</div>
 		<ul class="lists">
 			<li onclick="getPage('addlecture.php')">اضافة محاضرة</li>
 			<?php if($record['u_level'] > 2) { ?>
  			<li onclick="getPage('managerscp.php')">المدراء</li>
    		<li onclick="getPage('addcat.php')">اضافة مواد</li>
  			<?php } ?>
  			<li onclick="getPage('adminscp.php')">المشرفين</li>
  			<li onclick="getPage('userscp.php')">المستخدمين</li>
  			<li onclick="getPage('lectuerscp.php')">المحاضرات</li>
 			<?php if($record['u_level'] > 2) { ?>
  			<?php } ?>
 		</ul>
 	</div>
 </div>
<div class="cpcontents">
   <div class="maingroup">
		<div class="maininfo text-center">
			<div class="managers">
			<h2>
				<?php cmem('u_level', 'users', 3) ?>
			</h2>
			<p>مدير</p>
			</div>
			<div class="admins">
			<h2>
				<?php cmem('u_level', 'users', 2) ?>
			</h2>
			<p>مشرف</p>
			</div>
			<div class="users">
			<h2>
				<?php cmem('u_level', 'users', 1) ?>
			</h2>
			<p>مستخدم</p>
		</div>
	</div>
	</div>
	<div class="varcontent">
		<div class="mainparent" id="mainparent">
           <?php include('addlecture.php'); ?>
		</div>
	</div>
</div>
<!-- Cpanel End -->

<!-- Footer Start -->
 <?php 
 $pathasset = '../asset';
 $pathjs = 'js';
 require_once('../includes/footer.php');
 ?>
<!-- Footer End -->