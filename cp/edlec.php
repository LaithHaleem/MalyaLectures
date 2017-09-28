<?php 
  
   include('../config.php');
   
   global $con;

 
if(isset($_POST) && !empty($_POST)) {

	$lecturename = $_POST['lecturename'];
	$lecturecat = $_POST['lecturecat'];
	$lecturecontent = $_POST['lecturecontent'];
  $hiddeninp = $_POST['hidden'];

	$sqlup = "UPDATE lectures SET title_lec = '$lecturename', desc_lec = '$lecturecontent' WHERE id_lec = '$hiddeninp'";

	$query = mysqli_query($con, $sqlup);

	if($query) {
		$lec_id = mysqli_insert_id($con);
    echo '<div style="padding: 10px; font-family:\'Droid\'; font-size: 14px; background: #269e59; margin-top: 10px; border-right: 4px solid #318052; color: #FFFFFF;" >تمت اضافة المحاضرة بنجاح</div>';
	}else {
		echo mysqli_error($con);
	}



 if(is_array($_FILES) && !empty($_FILES))   
 {  
      foreach ($_FILES['lectureimage']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['lectureimage']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif");  
           if(in_array(@$file_name[1], $allowed_ext))  
           {  
                $new_name = rand() . '.' . $file_name[1];  
                $sourcePath = $_FILES['lectureimage']['tmp_name'][$name];  
                $targetPath = "../images/".$new_name;  
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                    
                	   $sql = "UPDATE images SET img_name = '$new_name' WHERE lec_id = (SELECT id_lec FROM lectures WHERE id_lec = $hiddeninp)";
                	   $qu = mysqli_query($con, $sql);

                     if(!$qu) {

                          echo '<div style="padding: 10px; font-family:\'Droid\'; font-size: 14px; background: #E22211; margin-top: 10px; border-right: 4px solid #b72316; color: #FFFFFF;" >عذرا هذه المحاضرة ليس فيها صورة</div>';

                     }

                }                 
           }            
      }
 
 }


} 

?>