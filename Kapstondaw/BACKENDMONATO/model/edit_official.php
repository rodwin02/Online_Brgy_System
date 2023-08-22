<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
    $id 	= $conn->real_escape_string($_POST['official_id']);
	$name 	= $conn->real_escape_string($_POST['fullname']);
	$chair 	= $conn->real_escape_string($_POST['chairmanship']);
    $pos 	= $conn->real_escape_string($_POST['position']);
	$start 	= $conn->real_escape_string($_POST['term-start']);
    $end 	= $conn->real_escape_string($_POST['term-end']);
	$status = $conn->real_escape_string($_POST['status']);

	if(!empty($id)){

		if($status !== 'Inactive') {
		$query 		= "UPDATE tblofficials SET `name`='$name', `chairmanship`='$chair', `position`='$pos', termstart='$start', termend='$end', `status`='$status' WHERE id=$id;";	
		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Brgy official has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Something went wrong!';
			$_SESSION['success'] = 'danger';
		}
	} else { 
		$query  = "INSERT INTO officials_archive (`name`, `chairmanship`, `position`, termstart, termend, `status`) VALUES ('$name', '$chair','$pos', '$start','$end', '$status')";
		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Brgy official has been saved to archive!';
			$_SESSION['success'] = 'success';

			$delete = $conn->prepare("DELETE FROM tblofficials WHERE id = ?");
			$delete->bind_param("i", $id);
			$delete->execute();

		}else{

			$_SESSION['message'] = 'Something went wrong!';
			$_SESSION['success'] = 'danger';
		}
	}

	}else{
		$_SESSION['message'] = 'No Brgy Official ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../barangayOfficials.php");

	$conn->close();