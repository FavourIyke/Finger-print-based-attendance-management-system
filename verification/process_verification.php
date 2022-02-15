<?php
		
	include 'include/global.php';
	include 'include/function.php';
	
	$user_id	= $data[0];
	
	if (1 == 1) {
		
		$log = createLog($user_id);
		
		if ($log == 1) {
		
			echo $base_path."messages.php?user_name=$user_name&time=$time";
		
		} else {
		
			echo $base_path."messages.php?msg=$log";
			
		}
	
	} else {
		
		$msg = "Parameter invalid..";
		
		echo $base_path."messages.php?msg=$msg";
		
	}

?>