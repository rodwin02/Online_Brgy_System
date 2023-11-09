<?php 
	include '../../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if($id != ''){

		try {
			$select = $conn->prepare("SELECT * FROM tbl_idform WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$idForm = $select->get_result()->fetch_assoc();

            // ! broken
			// $insert = "INSERT INTO del_idform_archive(`firstname`, `middlename`, `lastname`, `address`, `place-of-birth`, `birth-date`, `civil-status`, `contact-number`, `documentFor`, `purpose`, `date-requested`) VALUES (
			// 	'{$idForm['firstname']}',
			// 	'{$idForm['middlename']}',
			// 	'{$idForm['lastname']}',
			// 	'{$idForm['address']}',
			// 	'{$idForm['place-of-birth']}',
			// 	'{$idForm['birth-date']}',
			// 	'{$idForm['civil-status']}',
			// 	'{$idForm['contact-number']}',
			// 	'{$idForm['documentFor']}',
			// 	'{$idForm['purpose']}',
			// 	'{$idForm['date-requested']}'
			// )";
			// $conn->query($insert);
	 
			$query 		= "DELETE FROM tbl_idform WHERE id = '$id'";
			
			$result 	= $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'idForm has been removed!';
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

		$_SESSION['message'] = 'Missing idForm ID!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../../Cart.php");
	$conn->close();