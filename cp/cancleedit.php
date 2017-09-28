<?php 
  
  include('../config.php');

  if(isset($_GET['cat']) && isset($_GET['lec'])) {

    $lecid = $_GET['lec'];
    $catid = $_GET['cat'];

    $sqlget = "SELECT * FROM lectures WHERE id_lec = '$lecid' AND cat_id = '$catid'";

    $queryget = mysqli_query($con, $sqlget);

    $record = mysqli_fetch_assoc($queryget);

    if($queryget) {

	    $date = $record['date_lec'];
	    $en_day = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
	    $ar_day = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
	    $format = date('D', strtotime($date)); // The Current Day
	    $arb_day = str_replace($en_day, $ar_day, $format);

         echo "<a href='../lec.php?cat=". $record['cat_id'] ."&lec=". $record['id_lec'] ."' class='lect'>
				  		 <div class='time'>
  			   		 <span class='wd'>". $arb_day ."</span>
 			  		 <span class='dt'>". $record['date_lec'] ."</span>
					 </div> 
			      	 <div class='titLect'>
			         <h4>". $record['title_lec'] ."</h4>
			      	 </div>
				   </a>
			 	   <div class='btnsCtrl'>
			   			<button class='delec' data-lec='". $record['id_lec'] ."'>حذف</button>
			   			<button class='edlec' data-lec='". $record['id_lec'] ."'>تعديل</button>
			 		  </div>
            <div class='edlecplace'></div>";


    }
    


  }


?>
<script>
	
    $(function() {

        $('.delec').on('click', function() {
 			       var $this = $(this);
             var delec = $(this).data('lec');

             $.ajax({
                  url: 'del-l.php',
                  method: 'GET',
                  data: {delec: delec},
                  success: function (data) {
                  	if(data == 1) {

						$this[0].closest('.lectgroupadmin').remove();

                  	}else {

                  		alert('عفوا حدث خطأ يرجى اعادة المحاولة');
                  	}
                  	
                  }
             })
        });


        $('.edlec').on('click', function() {
       var $this = $(this);
             var edlec = $(this).data('lec');

             $.ajax({
                  url: 'edt-l.php',
                  method: 'GET',
                  data: {edlec: edlec},
                  success: function (data) {
                    
                    $($($this[0]).first().parents()[1]).html(data);

                  }
             })
        });

    });
</script>