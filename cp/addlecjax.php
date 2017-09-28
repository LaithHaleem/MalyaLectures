<?php 
  
   include('../config.php');
   
   global $con;

 
if(isset($_POST) && !empty($_POST)) {

	$lecturename = $_POST['lecturename'];
	$lecturecat = $_POST['lecturecat'];
	$lecturecontent = $_POST['lecturecontent'];

	$sqlins = "INSERT INTO lectures (title_lec, desc_lec, date_lec, cat_id) 
	VALUES ('$lecturename', '$lecturecontent', CURRENT_DATE(), (SELECT id_cat FROM category WHERE id_cat = '$lecturecat'))";
	$query = mysqli_query($con, $sqlins);

	if($query) {
		$lec_id = mysqli_insert_id($con);
    echo '<div style="padding: 10px; font-family:\'Droid\'; font-size: 14px; background: #269e59; margin-top: 10px; border-right: 4px solid #318052; color: #FFFFFF;" >تمت اضافة المحاضرة بنجاح</div>';
	}else {
		echo mysqli_error($con);
	}



 if(is_array($_FILES) && !empty($_FILES)) {
     if(!file_exists('../images/'. $lec_id)) {
      mkdir('../images/'. $lec_id);
    }  
      foreach ($_FILES['lectureimage']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['lectureimage']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif");  
           if(in_array(@$file_name[1], $allowed_ext))  
           {  
                $new_name = rand() . '.' . $file_name[1];  
                $sourcePath = $_FILES['lectureimage']['tmp_name'][$name];  
                $targetPath = "../images/". $lec_id . '/' .$new_name;  
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                    
                	$sql = "INSERT INTO images (img_name, lec_id) VALUES('$new_name', '$lec_id')";
                	$qu = mysqli_query($con, $sql);



                }                 
           }            
      }
 
 }


} 

?>