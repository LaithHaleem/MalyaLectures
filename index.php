  <!-- Header Start -->
  <?php

   include('config.php');
  
   if(isset($_GET['logout'])) {

     header("Location: logout.php");
     
   }

   $pathcss = 'css';
   $pathuser = "user";
   require_once('includes/header.php');

    $sqlcat = "SELECT * FROM category";
    $qucat  = mysqli_query($con, $sqlcat);

   ?>
  <!-- Header End -->

  <!-- Contents Started -->
    <div class="contents">
      <div class="container">
         <div class="row">

         <?php 
            while($row = mysqli_fetch_assoc($qucat)) {

               echo "
                  <div class='contBox'>
                    <div class='cont text-center'>
                      <div class='imgBox'>
                        <img src='". $row['img_cat'] ."' alt='". $row['en_cat'] ." Image'>
                      </div>
                      <div class='titleBox'>
                        <h3>" . $row['ar_cat'] . "</h3>
                      </div>
                      <div class='goBox'>
                        <a href='lectures.php?cat=".$row['id_cat']."' class='goBtn'>ادخل</a>
                      </div>
                    </div>
                  </div>
               ";

            }
         ?>
         </div>
      </div>
    </div>
  <!-- Contents End -->

  <!-- Footer Start -->
  <?php
   $pathasset = 'asset';
   $pathjs = 'js';
   require_once('includes/footer.php'); ?>
  <!-- Footer End -->