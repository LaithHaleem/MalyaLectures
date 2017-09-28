<!-- Header Start -->
<?php
 include('config.php');
 $pathcss = 'css';
 $pathuser = "user";
 require_once('includes/header.php');
 //Log out
 if(isset($_GET['logout'])) {

 	header("Location: logout.php");
 	session_destroy();

 }

 if(isset($_GET['cat']) && isset($_GET['lec']))  {

  $catid = $_GET['cat'];
  $lecid = $_GET['lec'];

  $sql = "SELECT * FROM lectures INNER JOIN category ON category.id_cat = lectures.cat_id WHERE lectures.id_lec = '$lecid' AND category.id_cat = '$catid'";

  $reclec = mysqli_query($con, $sql);
  $rowlec = mysqli_fetch_assoc($reclec);

 }else {
 	header("Location: index.php");
 }

 ?>
<!-- Header End -->

<!-- Category Path Start -->
	<div class="catpath">
	  <div class="container">
	    <div class="pathGrp">
	      <span class="cat">
	        <a href="index.php" class="homepage">المواد</a>
	        /
	      </span>
	      <span class="catname">
	      <?php echo "<a href='lectures.php?cat=".$rowlec['cat_id']."'>". $rowlec['ar_cat'] ."</a>";  ?>
	      /
	      </span>
	      <span class="lectnum">
	      محاضرة رقم: <?php echo $rowlec['id_lec'];
	      echo mysqli_error($con); ?>
	      </span>
	    </div>
	  </div>
	</div>
<!-- Category Path End -->

<!-- Category Lecture Box Start -->
    <div class="lectureBox">
       <div class="container">
          <div class="lecture">
	    	<div class="titleLecture">
	    		<h3><?php echo $rowlec['title_lec']; ?></h3>
	    		<span class="timePosting">
	    		<span>
                <?php
			    $date = $rowlec['date_lec'];
			    $en_day = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
			    $ar_day = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
			    $format = date('D', strtotime($date)); // The Current Day
			    $arb_day = str_replace($en_day, $ar_day, $format);
			    echo $arb_day . ' |';
                ?>
	    		</span>
	    		<span><?php echo $rowlec['date_lec']; ?></span>
	    	</div>
	    	<div class="descLecture">
	    	   <p class="textlecture">
	    		 <?php echo $rowlec['desc_lec']; ?>
	    	   </p>
	    	</div>
	    	<div class="imglecture">
	    		<?php 

	    		  $sqlimg = "SELECT * FROM images WHERE lec_id = '$lecid'";

	    		  $recimg = mysqli_query($con, $sqlimg);
                  
                  while($rowimg = mysqli_fetch_assoc($recimg)) {

                    echo "<img src='images/". $rowimg['lec_id'] . '/' . $rowimg['img_name'] ."'>";

                  }

	    		?>
	    	</div>
          </div>
       </div>
    </div>
<!-- Category Lecture Box End -->

<!-- Footer Start -->
<?php
 $pathasset = 'asset';
 $pathjs = 'js';
 require_once('includes/footer.php') ?>
<!-- Footer End -->