<?php
include '../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if($id != ''){

		try {
		$select = $conn->prepare("SELECT * FROM tblresidents WHERE id = ?");
		$select->bind_param("s", $id);
		$select->execute();
		$resident = $select->get_result()->fetch_assoc();

		$check = $conn->prepare("SELECT 1 FROM residents_archive WHERE firstname = ? AND middlename = ? AND lastname = ?");
		$check->bind_param("sss", $resident['firstname'], $resident['middlename'], $resident['lastname']);
		$check->execute();
		$exists = $check->get_result()->fetch_assoc();

		if(!$exists) {

		$insert = "INSERT INTO residents_archive (`firstname`, `middlename`, `lastname`, `age`, `gender`, `house-no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `civil-status`, `occupation`, `email`, `contact-no`, `voter-status`, `identified`, `sector`, `citizenship`, `household-no`, `osy`, `pwd`, `mother-firstname`, `mother-middlename`, `mother-lastname`, `mother-age`, `mother-house-no`, `mother-street`, `mother-subdivision`, `mother-household-head`, `father-firstname`, `father-middlename`, `father-lastname`, `father-age`, `father-house-no`, `father-street`, `father-subdivision`, `father-household-head`) 
        VALUES (			
				'{$resident['firstname']}', 
				'{$resident['middlename']}',
				'{$resident['lastname']}',
				'{$resident['age']}',
				'{$resident['gender']}',
				'{$resident['house-no']}',
				'{$resident['street']}',
				'{$resident['subdivision']}',
				'{$resident['date-of-birth']}',
				'{$resident['place-of-birth']}',
				'{$resident['civil-status']}',
				'{$resident['occupation']}',
				'{$resident['email']}',
				'{$resident['contact-no']}',
				'{$resident['voter-status']}',
				'{$resident['identified']}',
				'{$resident['sector']}',
				'{$resident['citizenship']}',
				'{$resident['household-no']}',
				'{$resident['osy']}',
				'{$resident['pwd']}',
				
				'{$resident['mother-firstname']}',	
				'{$resident['mother-middlename']}',
				'{$resident['mother-lastname']}',
				'{$resident['mother-age']}',
				'{$resident['mother-house-no']}',
				'{$resident['mother-street']}',
				'{$resident['mother-subdivision']}',
				'{$resident['mother-household-head']}',

				'{$resident['father-firstname']}',
				'{$resident['father-middlename']}',
				'{$resident['father-lastname']}',
				'{$resident['father-age']}',
				'{$resident['father-house-no']}',
				'{$resident['father-street']}',
				'{$resident['father-subdivision']}',
				'{$resident['father-household-head']}')";
		$conn->query($insert);
		}
		
		$delete = $conn->prepare("DELETE FROM tblresidents WHERE id = ?");
		$delete->bind_param("s", $id);
		$delete->execute();
		
		$_SESSION['message'] = $exists ? 'Resident already archived!' : 'Resident has been removed!';
		$_SESSION['success'] = $exists ? 'warning' : 'danger';
		} catch (Exception $e) { 
				$_SESSION['message'] = 'An error occurred: ' . $e->getMessage();
			$_SESSION['success'] = 'danger';
		}
	}else{

		$_SESSION['message'] = 'Missing Resident ID!';
		$_SESSION['success'] = 'danger';
	}	

	header("Location: ../residentInfo.php");
	$conn->close();
 ?>