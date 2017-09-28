<?php 
	
    $date = $row['date_lec'];
    $en_day = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $ar_day = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $format = date('D', strtotime($date)); // The Current Day
    $format;
    $arb_day = str_replace($en_day, $ar_day, $format);

?>