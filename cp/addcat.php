<?php include('../config.php') ?>
<div class="titlecontent">
	<h3>اضافة محاضرة</h3>
</div>
<div id="contentplace">
<div class="addLecture">
	<div class="groupinputs">
	    <form action="" method="POST" enctype="multipart/form-data" id="frm">
		<p>
		<input type="text" name="catnamear" id="addcatar" placeholder="اسم المدة">
		</p>
		<p>
		<input type="text" name="catnameen" id="addcaten" placeholder="الاسم الانجليزي">
		</p>
		<p style="margin-top: 7px">
		    <span class="filecover">
		    	<input type="file" id="fileinp" name="catimage" onchange="showval()">
				<button class="fileBtn">اختر صورة</button>
				<input type="text" id="showvalue" class="showvalue" value="" >
		    </span>
		</p>
		<p>
		<input type="submit" name="submit" id="addcat" value="اضافة">
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

        if($('#addcaten').val() != '' && $('#addcatar').val() != '') {

	       $.ajax({
	         url: 'addcatajax.php',
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
	         	load += '<div style="padding: 10px; font-family:\'Droid\'; font-size: 14px; background: #2980b9; margin-top: 10px; border-right: 4px solid #236fa0; color: #FFFFFF;" >جاري الاضافة ...</div>';
	            $('#contentplace').html(load)
	         }
	       })

	   }
        
	});


});

</script>