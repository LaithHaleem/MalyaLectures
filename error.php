<!-- Header Start -->
<?php 

 // Get Connect File 
 include('config.php');
 
 // Get External Css File
 $pathcss = "css";
 require_once('includes/header.php');

?>
<!-- Header End -->

<div class="errorpageBox">
	<div class="container">
		<div class="imgBox">
			<img src="error.png" alt="404 error page">
		</div>
	</div>
</div>

<!-- Footer Start -->
<?php
 $pathasset = 'asset';
 $pathjs = 'js';
 require_once('includes/footer.php') ?>
<!-- Footer End -->