  <?php 
    
    include('../config.php');


   if(isset($_GET['cat'])) {
  
    $cat = $_GET['cat'];

    $sqlget = "SELECT * FROM lectures INNER JOIN category ON lectures.cat_id = category.id_cat WHERE category.id_cat = '$cat'";
    
    $query = mysqli_query($con, $sqlget);

	    if($query) {
	 
	        while($row = mysqli_fetch_assoc($query)) {

		    $date = $row['date_lec'];
		    $en_day = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
		    $ar_day = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
		    $format = date('D', strtotime($date)); // The Current Day
		    $arb_day = str_replace($en_day, $ar_day, $format);

         echo "<div class='lectgroupadmin'>
            <div class='parentgr'>
					  <a href='../lec.php?cat=". $row['cat_id'] ."&lec=". $row['id_lec'] ."' class='lect'>
				  		 <div class='time'>
  			   		 <span class='wd'>". $arb_day ."</span>
 			  		 <span class='dt'>". $row['date_lec'] ."</span>
					 </div> 
			      	 <div class='titLect'>
			         <h4>". $row['title_lec'] ."</h4>
			      	 </div>
				   </a>
			 	   <div class='btnsCtrl'>
			   			<button class='delec' data-lec='". $row['id_lec'] ."'>حذف</button>
			   			<button class='edlec' data-lec='". $row['id_lec'] ."'>تعديل</button>
			 		  </div>
            <div class='edlecplace'></div>
		 		   </div>
           </div>";


	        }  


	    }else {

        echo "عذرا هناك خطأ ما";

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
