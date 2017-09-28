<?php 
 
  include('../config.php');
  include('../del-files.php');

  if(isset($_GET['delec']) && !empty($_GET['delec'])) {
 
    $lecid = $_GET['delec'];
    $pathdir = '../images/'. $lecid;

    $sql = "DELETE FROM lectures WHERE id_lec = '$lecid'";

    $query = mysqli_query($con, $sql);

    if($query) {
      rdir($pathdir);
    	echo 1;

    }else {

    	echo 0;

    }


  }

?>