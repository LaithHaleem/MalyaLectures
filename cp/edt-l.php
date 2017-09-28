<?php 

 include('../config.php');

 if(isset($_GET['edlec'])) {
 	$lecid = $_GET['edlec'];

 	$sqled = "SELECT * FROM lectures WHERE id_lec = '$lecid'";
 	$recorded = mysqli_query($con, $sqled);
 	$result = mysqli_fetch_assoc($recorded);

 }
?>
<div class="success"></div>
<div class="addLecture">
	<div class="groupinputs">
	    <form action="" method="POST" enctype="multipart/form-data" id="frm">
		<p>
		<input type="text" name="lecturename" id="lecname"
		value="<?php echo $result['title_lec']; ?>" placeholder="عنوان المحاضرة">
		</p>
		<p>
		<select id="selec" name="lecturecat" disabled>
		    <?php 
				$sqlcat = "SELECT * FROM category WHERE id_cat = '$result[cat_id]'";
				$qucat  = mysqli_query($con, $sqlcat);
 				$recordcat = mysqli_fetch_assoc($qucat);

 				echo "<option selected>". $recordcat['ar_cat'] ."</option>";
 				

		    ?>
		</select>
		</p>
		<p>
		<textarea name="lecturecontent" placeholder="نص المحاضرة" id="leccon"
		><?php echo $result['desc_lec']; ?></textarea>
		</p>
		<p>
		    <span class="filecover">
		    	<input type="file" id="fileinp" name="lectureimage[]" multiple onchange="showval()">
				<button class="fileBtn">اختر صورة</button>
				<input type="text" id="showvalue" class="showvalue" value="" >
		    </span>
		</p>
		<p>
		<input type="submit" name="submit" id="edlecBtn" value="نشر">
		<input type="button" id="cancleBtn" 
		value="الغاء" data-lec="<?php echo 'cat='.$recordcat['id_cat'] . '&lec=' . $result['id_lec']; ?>">
		</p>
		<input id="hidden" type="hidden" name="hidden" value="<?php echo $lecid; ?>">
		</form>
	</div>
</div>
<script src='../asset/jquery-3.2.1.min.js'></script>
<script>

	$(function() {
		$('#frm').on('submit', function(e) {
			e.preventDefault();

			var $this = $(this);

        if($('#lecname').val() != '') {

	       $.ajax({
	         url: 'edlec.php',
	         method: 'POST',
	         data: new FormData(this),
	         processData: false,
			 contentType: false,
			 beforeSend: function() {
	         	var load = '';
	         	load += '<div style="padding: 10px; font-family:\'Droid\'; font-size: 14px; background: #2980b9; margin-top: 10px; border-right: 4px solid #236fa0; color: #FFFFFF;" >جاري النشر ...</div>';
	            $($($this[0]).parents()[1]).html(load);
	         },
	         success: function(data) {
				var html = '';
				html += data;
	            $($($this[0]).parents()[1]).html(html);
	           // 
	         }
	       })

	   }
        
	});

	$('#cancleBtn').on('click', function() {

   		var $this = $(this);
   		var datalec = $this.data('lec');
 
		$.ajax({
			url: 'cancleedit.php?'+datalec,
	        method: 'GET',
	        data: {},
	        processData: false,
			contentType: false,
			success: function(data) {
			
				$($($this[0]).parents()[4]).html(data);

			}
		})
	});


});

</script>
