<?php
 session_start();
 include('../config.php');
 $user = $_SESSION['username'];
 // Check the level of users
 $sqlcheck = "SELECT * FROM users WHERE u_level = 3";
 $query = mysqli_query($con, $sqlcheck);
?>
<div class="titlecontent">
	<h3>المدراء</h3>
</div>
<div id="contentplace">
<div class="managerspanel">
	<div class="row">
<?php while($record = mysqli_fetch_assoc($query)) {
		
		echo "
		<div class='manager text-center'>
		    <a href='#'>
		    " ?>
	         <?php
	         $pathimg = '../user/images/'. $user .'/'. $record['image'];
	         
	         if(file_exists($pathimg)) {
	            echo "<img id='userImg' src='../user/images/$user/$record[image]'>";
	         }else {
	            echo "<img id='userImg' src='$record[image]'>";
	         }
	        ?>
			<?php echo "<h4>". $record['u_name'] ."</h4>
			<span style='font-weight: bold; color: #E22211'>مدير</span>
			</a>
			<button data-user='" . $record['id'] . "' class='manprofile'>ازالة</button>
		</div> ";

 		} ?>
	</div>
</div>
</div>
<script>
$('.manprofile').on('click', function() {
 
	  var $this = $(this);
	  var dg = $this.data('user');
	  $.ajax({
	    url: 'del-m.php',
	    method: 'GET',
	    data: {dg: dg},
	    success: function(data) {

	      if(data == '1') {

	        $this[0].closest("div").remove();

	      }else {
	        
	        window.location.href = '../logout.php';

	      }

	    }

	 })
 });
</script>