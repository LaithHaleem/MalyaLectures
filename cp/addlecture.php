<?php include('../config.php') ?>
<div class="titlecontent">
	<h3>اضافة محاضرة</h3>
</div>
<div id="contentplace">
<div class="addLecture">
	<div class="groupinputs">
	    <form action="" method="POST" enctype="multipart/form-data" id="frm">
		<p>
		<input type="text" name="lecturename" id="lecname" placeholder="عنوان المحاضرة">
		</p>
		<p>
		<select id="selec" name="lecturecat">
			<option value="0" selected>اختر مادة</option>
		    <?php 
				$sqlcat = "SELECT * FROM category";
				$qucat  = mysqli_query($con, $sqlcat);
 				while($recordcat = mysqli_fetch_assoc($qucat)) {

 					echo "<option value='". $recordcat['id_cat'] ."'>". $recordcat['ar_cat'] ."</option>";
 				}

		    ?>
		</select>
		</p>
		<p>
		<textarea name="lecturecontent" placeholder="نص المحاضرة" id="leccon"></textarea>
		</p>
		<p>
		    <span class="filecover">
		    	<input type="file" id="fileinp" name="lectureimage[]" multiple onchange="showval()">
				<button class="fileBtn">اختر صورة</button>
				<input type="text" id="showvalue" class="showvalue" value="" >
		    </span>
		</p>
		<p>
		<input type="submit" name="submit" id="addlec" value="نشر">
		</p>
		</form>
	</div>
</div>
</div>
<script src='../asset/jquery-3.2.1.min.js'></script>
<script>

	$(function() {
		$('#frm').on('submit', function(e) {
			e.preventDefault();

        if($('#lecname').val() != '' && $('#selec').val() != "0") {

	       $.ajax({
	         url: 'addlecjax.php',
	         method: 'POST',
	         data: new FormData(this),
	         processData: false,
			 contentType: false,
	         success: function(data) {
				var html = '';
				html += data;
	            $('#contentplace').html(html)
	         },
	         beforeSend: function() {
	         	var load = '';
	         	load += '<div style="padding: 10px; font-family:\'Droid\'; font-size: 14px; background: #2980b9; margin-top: 10px; border-right: 4px solid #236fa0; color: #FFFFFF;" >جاري النشر ...</div>';
	            $('#contentplace').html(load)
	         }
	       })

	   }
        
	});


});

</script>