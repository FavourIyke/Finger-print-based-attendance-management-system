<?php
		

	
	include 'include/global.php';
	include 'include/function.php';
	
	$data = getDeviceAcSn('E44A32B335C4283');
	
	echo $data[0]['ac'].$data[0]['sn'];


?>