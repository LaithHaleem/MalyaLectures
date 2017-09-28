<!-- Header Start -->
<?php 

include('config.php');
$pathcss = "css";
$pathuser = "user";
require_once('includes/header.php');
   // Log out
   if(isset($_GET['logout'])) {
    
     header("Location: logout.php");

   }
   // Pagination Code Start
  $catid = $_GET['cat'];

   $per_page = 5;


   if(!isset($_GET['lmt']) || $_GET['lmt'] == 0) {
     $page = 1;
   }else {
    $page = $_GET['lmt'];
   }

   $start = ($page - 1)*$per_page;

// Pageination Code End

// Load Lectures Start
 if(isset($_GET['cat'])) {

   $sql = "SELECT * FROM lectures INNER JOIN category ON lectures.cat_id = category.id_cat WHERE category.id_cat = '$catid' ORDER BY lectures.id_lec DESC LIMIT $start, $per_page";

   $query = mysqli_query($con, $sql);
   $querycat = mysqli_query($con, $sql);
   $rcat = mysqli_fetch_assoc($querycat);

 }else {
  header("Location: index.php"); // if not fount cat get 
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
      <?php echo $rcat['ar_cat']; ?>
      </span>
    </div>
  </div>
</div>
<!-- Category Path End -->

<!-- Lectures Box Start -->
 <?php 

 
  while($row = mysqli_fetch_assoc($query)) {

    $date = $row['date_lec'];
    $en_day = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $ar_day = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $format = date('D', strtotime($date)); // The Current Day
    $arb_day = str_replace($en_day, $ar_day, $format);

   echo "
   <div class='lectBox'>
    <div class='container'>
      <a href='lec.php?cat=". $row['cat_id'] ."&lec=". $row['id_lec'] ."' class='lect'>
        <div class='time'>
          <span class='wd'>". $arb_day ."</span>
          <span class='dt'>". $row['date_lec'] ."</span>
        </div>
        <div class='titLect'>
          <h4>". $row['title_lec'] ."</h4>
        </div>
      </a>
    </div>
  </div>";

  }

 ?>
<!-- Lectures Box End -->

<!-- Pagination Strat -->
  <div class="pageBox text-center">
   <?php 
        $sqlpage = "SELECT * FROM lectures INNER JOIN category ON lectures.cat_id = category.id_cat WHERE category.id_cat = '$catid'";
         $pagePage = mysqli_query($con, $sqlpage);

         $totallec = mysqli_num_rows($pagePage);

        $linknum = ceil($totallec/$per_page);
   ?>
    <div class="nextBox">
         <?php

          if($page >= $linknum) {

            $pageN = $page - 1;

            if($_GET['lmt'] > 1) {

            echo "<a href='lectures.php?cat=". $catid ."&lmt=". $pageN ."' id='next'></a>";

            }

          }

         ?>
    </div>
    <div class="linksGrp">
 <?php

  for($i=1;$i<=$linknum;$i++) {

     $output = '';

     if($i == $page) {
       $output .="<a style='background: #e2e1e1' href='lectures.php?cat=". $catid ."&lmt=". $i ."' onclick='return false'>". $i ."</a>";
       echo $output;
     }else {
       $output .="<a href='lectures.php?cat=". $catid ."&lmt=". $i ."'>". $i ."</a>";
       echo $output;

     }

  }
  
 ?>

    </div>
    <div class="prevBox">
        <?php
          $pageP = $page + 1;

          if($page < $linknum) {
          echo "<a href='lectures.php?cat=". $catid ."&lmt=". $pageP ."' id='prev'></a>";

          }

         ?>
    </div>
  </div>
<!-- Pagination End -->

<!-- Footer Start -->
<?php 
$pathjs = 'js';
$pathasset = 'asset';
require_once('includes/footer.php') 
?>
<!-- Footer End -->