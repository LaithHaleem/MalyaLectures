<?php 
    
    include('../config.php');
     
    $sql = "SELECT * FROM category";
    
    $query = mysqli_query($con, $sql);

?>
<div class="titlecontent">
	<h3>المحاضرات</h3>
</div>
<div id="contentplace">
<div class="lecturesadmin">
  <div class="searchcat">
  	<select id="searchcat">
  	    <option selected>اختر المادة</option>
  		<?php 
          
          while($row = mysqli_fetch_assoc($query)) {

          	echo "<option value='$row[id_cat]' >".$row['ar_cat']."</option>";
          }
  		?>
  	</select>
  </div>
  <div id="lecplace"></div>
</div>
</div>
<script>
	
    $(function() {

        $('#searchcat').on('change', function() {

             var cat = $(this).val();

             $.ajax({
                  url: 'getlec.php',
                  method: 'GET',
                  data: {cat: cat},
                  success: function (data) {
                  	$('#lecplace').html(data);
                  }
             })
        });

    });
</script>