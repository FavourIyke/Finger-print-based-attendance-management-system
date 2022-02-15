<?php
include 'include/global.php'; 
	function getDevice() {
		global $conn;

		$sql 	= 'SELECT * FROM asc_device ORDER BY device_name ASC';
		$result	= mysqli_query($conn, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}
	
	function getDeviceAcSn($vc) {
		global $conn;
		$sql 	= "SELECT * FROM asc_device WHERE vc ='".$vc."'";
		$result	= mysqli_query($conn, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}
	
	function getDeviceBySn($sn) {
		global $conn;
		$sql 	= "SELECT * FROM asc_device WHERE sn ='".$sn."'";
		$result	= mysqli_query($conn, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}

	function getUser() {
		global $conn;

		$sql 	= 'SELECT * FROM students ORDER BY log_time DESC';
		$result	= mysqli_query($conn, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'user_id'	=> $row['user_id'],
				'user_name'	=> $row['user_name'],
				'matric'	=> $row['matric'],
				'department'	=> $row['department'],
				'last_name'	=> $row['last_name']
			);

			$i++;

		}

		return $arr;

	}


	function getLecturers() {
		global $conn;

		$sql 	= 'SELECT * FROM users ORDER BY username ASC';
		$result	= mysqli_query($conn, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'email'	=> $row['email'],
				'username'	=> $row['username'],
				'course'	=> $row['course'],
				'department'	=> $row['department']
			);

			$i++;

		}

		return $arr;

	}

	function deviceCheckSn($sn) {
		global $conn;
		$sql 	= "SELECT count(sn) as ct FROM asc_device WHERE sn = '".$sn."'";
		$result	= mysqli_query($conn, $sql);
		$data 	= mysqli_fetch_array($result);

		if ($data['ct'] != '0' && $data['ct'] != '') {
			return "sn already exist!";
		} else {
			return 1;
		}

	}

	function checkUserName($user_name) {
		global $conn;
		$sql	= "SELECT user_name FROM students WHERE user_name = '".$user_name."'";
		$result	= mysqli_query($conn, $sql);
		$row	= mysqli_num_rows($result);

		if ($row>0) {
			return "Username exist!";
		} else {
			return "1";
		}

	}

	function getUserFinger($user_id) {
		global $conn;
		$sql 	= "SELECT * FROM asc_finger WHERE user_id= '".$user_id."' ";
		$result = mysqli_query($conn, $sql);
		$arr 	= array();
		$i	= 0;

		while($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'user_id'	=>$row['user_id'],
				"finger_id"	=>$row['finger_id'],
				"finger_data"	=>$row['finger_data']
				);
			$i++;

		}

		return $arr;

	}
	
	function getLog() {
		global $conn;

		$sql 	= 'SELECT * FROM attendance_log ORDER BY log_time DESC';
		$result	= mysqli_query($conn, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'log_time'		=> $row['log_time'],
				'user_name'		=> $row['user_name'],
				'matriculation'			=> $row['matriculation'],
				'status'		=> $row['status']
			);

			$i++;

		}

		return $arr;

	}
	
/*	function createLog($user_name, $time, $sn, $matric) {
		global $conn;
		$sq1 		= "INSERT INTO attendance_log SET user_name='".$user_name."', matriculation='".$matric."', data='".date('Y-m-d H:i:s', strtotime($time))." (PC Time) | ".$sn." (SN)"."' ";
		$result1	= mysqli_query($conn, $sq1);
		if ($result1) {
			return 1;				
		} else {
			return "Error insert log data!";
		}
		
	}
	*/

	function createLog($user_name) {
		global $conn;
		$sq1 		= "UPDATE attendance_log SET user_name='opop' WHERE user_id=49 ";
		$result1	= mysqli_query($conn, $sq1);
		if ($result1) {
			return 1;				
		} else {
			return "Error insert log data!";
		}
		
	}

?>