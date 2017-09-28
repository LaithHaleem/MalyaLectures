<?php 
 $pathjs;
 $pathasset;
?>
  <!-- CopyRights Start -->
    <div class="copyBox text-center">
      <div class="container">
        <p class="copy">جميع الحقوق محفوضة &copy; 2018 | برمجة وتصميم <a href="#">ليث حليم</a></p>
      </div>
    </div>
  <!-- CopyRights End -->
<script src="<?php echo $pathasset; ?>/jquery-3.2.1.min.js"></script>
<script src="<?php echo $pathjs; ?>/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="<?php echo $pathjs; ?>/profile.js"></script>
<script src="<?php echo $pathjs; ?>/cpanel.js"></script>
<script>

var reg = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i; 

if(!reg.test(navigator.userAgent) ) {

	$(function() {

		$('html').niceScroll({
			cursorcolor: '#3498db',
			cursorwidth: '6px',
			cursorborder: "none",
			scrollspeed: 40, 
    		cursorborderradius: "2px",
		});

		$('.cpanelBox').niceScroll({
			cursorcolor: '#222',
			cursorwidth: '6px',
			cursorborder: "none",
			scrollspeed: 40, 
    		cursorborderradius: "2px",
		});

	}); 
 
}
</script>
</body>
</html>