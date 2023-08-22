<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$province 	= $conn->real_escape_string($_POST['province_name']);
	$brgy 		= $conn->real_escape_string($_POST['b_name']);
	$town 		= $conn->real_escape_string($_POST['town_name']);
	$number 	= $conn->real_escape_string($_POST['tel_no']);
	$city_logo 	= $_FILES['municipality_logo']['name'];
	$brgy_logo 	= $_FILES['barangay_logo']['name'];

	// change city_logo name
	$newC = date('dmYHis').str_replace(" ", "", $city_logo);
	// change brgy_logo name
	$newB = date('dmYHis').str_replace(" ", "", $brgy_logo);

	// image file directory
  	$target = "../uploads/".basename($newC);
	  // image file directory
  	$target1 = "../uploads/".basename($newB);

	if(!empty($brgy) && !empty($town)){

		if(!empty($city_logo) && !empty($brgy_logo)){

			$query = "UPDATE brgy_information SET province_name='$province', brgy_name='$brgy', municipality_logo='$newC', town_name='$town', `tel_no`='$number', brgy_logo='$newB' WHERE id=1";

			if($conn->query($query) === true){

				$_SESSION['message'] = 'Barangay Info has been updated!';
				$_SESSION['success'] = 'success';

				if(move_uploaded_file($_FILES['municipality_logo']['tmp_name'], $target)){

					$_SESSION['message'] = 'Barangay Info has been updated!';
					$_SESSION['success'] = 'success';
				}

				if(move_uploaded_file($_FILES['barangay_logo']['tmp_name'], $target1)){

					$_SESSION['message'] = 'Barangay Info has been updated!';
					$_SESSION['success'] = 'success';
				}
			}
		}else if(!empty($city_logo) && empty($brgy_logo)){

			$query = "UPDATE brgy_information SET province_name='$province', brgy_name='$brgy', municipality_logo='$newC', town_name='$town', `tel_no`='$number' WHERE id=1";

			if($conn->query($query) === true){

				$_SESSION['message'] = 'Barangay Info has been updated!';
				$_SESSION['success'] = 'success';

				if(move_uploaded_file($_FILES['municipality_logo']['tmp_name'], $target)){

					$_SESSION['message'] = 'Barangay Info has been updated!';
					$_SESSION['success'] = 'success';
				}
			}

		}else if(empty($city_logo) && !empty($brgy_logo)){

		$query = "UPDATE brgy_information SET province_name='$province', brgy_name='$brgy', town_name='$town', `tel_no`='$number', brgy_logo='$newB' WHERE id=1";

			if($conn->query($query) === true){

				$_SESSION['message'] = 'Barangay Info has been updated!';
				$_SESSION['success'] = 'success';

				if(move_uploaded_file($_FILES['barangay_logo']['tmp_name'], $target1)){

					$_SESSION['message'] = 'Barangay Info has been updated!';
					$_SESSION['success'] = 'success';
				}
			}

		}else {
	    	$query = "UPDATE brgy_information SET province_name='$province', brgy_name='$brgy', town_name='$town', `tel_no`='$number' WHERE id=1";

			if($conn->query($query) === true){

				$_SESSION['message'] = 'Barangay Info has been updated!';
				$_SESSION['success'] = 'success';

			}
        }

	}else{

		$_SESSION['message'] = 'Please complete the form!';
		$_SESSION['success'] = 'danger';
	}

	if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

	$conn->close();

