<?php 
  
   include('../config.php');
   
   global $con;

 
if(isset($_POST) && !empty($_POST)) {

  $catnamear = $_POST['catnamear'];
  $catnameen = $_POST['catnameen'];

  if(isset($_FILES) && !empty($_FILES)) {
 

     $imgcat_name = explode('.', $_FILES['catimage']['name']);
     $imgcat_tmp = $_FILES['catimage']['tmp_name'];
     $new_catnameimg = $catnameen . '.' . $imgcat_name[1];
     $pathimgcat = "imgcat/" . $new_catnameimg;
     if(move_uploaded_file($imgcat_tmp, $pathimgcat)) {

        $sqlcat = "INSERT INTO category(en_cat, ar_cat, img_cat) 
        VALUES ('$catnameen', '$catnamear', 'cp/$pathimgcat')";
        $qu = mysqli_query($con, $sqlcat);

        if($qu) {

          echo '<div style="padding: 10px; font-family:\'Droid\'; font-size: 14px; background: #269e59; margin-top: 10px; border-right: 4px solid #318052; color: #FFFFFF;" >تمت اضافة المحاضرة بنجاح</div>';

        }else {
          
          echo mysqli_error($con);

        }

     }


  }



} 

?>