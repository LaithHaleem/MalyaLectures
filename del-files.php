<?php 

  function rdir($path) { // Here path of folder that we need delete it
	
	if(is_dir($path)) {
		
		$fileCon = scandir($path);
		unset($fileCon[0], $fileCon[1]); // Delete . and .. folser
		
		foreach($fileCon as $con => $conPath) {
			$curentPath = $path . '/' . $conPath;
			$typeCon = filetype($curentPath);
			
			if($typeCon == "dir") {
				rdir($curentPath);
			}else {
				unlink($curentPath);
			}
			
			unset($fileCon[$con]);
		}
		
		rmdir($path);
		
	}
	  
  }

?>