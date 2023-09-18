<?php 
	include '../../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if(!empty($id)){
		try {
			$select = $conn->prepare("SELECT * FROM tblawareness WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$awareness = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_awareness_archive(`name`, `date`, `time`, `location`, `details`, `status`) VALUES (
				'{$awareness['name']}',
				'{$awareness['date']}',
				'{$awareness['time']}',	
				'{$awareness['location']}',
				'{$awareness['details']}',	
				'{$awareness['status']}'	
			)";
			$conn->query($insert);
			
			$query = "DELETE FROM tblawareness WHERE id = '$id'";
			$result = $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'Awareness has been removed!';
				$_SESSION['success'] = 'danger';
				
			}else{
				$_SESSION['message'] = 'Something went wrong!';
				$_SESSION['success'] = 'danger';
			}
		} catch (Exception $e) { 
			$_SESSION['message'] = 'An error occurred: ' . $e->getMessage();
			$_SESSION['success'] = 'danger';
		}
	}else{

		$_SESSION['message'] = 'Missing Awareness ID!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../../awareness.php");
	$conn->close();