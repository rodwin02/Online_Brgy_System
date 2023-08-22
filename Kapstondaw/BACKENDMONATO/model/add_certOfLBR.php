<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $applicant      = $conn->real_escape_string($_POST['applicant']);
    $requestor      = $conn->real_escape_string($_POST['requestor']);
    $father         = $conn->real_escape_string($_POST['father']);
    $mother 	      = $conn->real_escape_string($_POST['mother']);
    $form 	        = $conn->real_escape_string($_POST['father-or-mother']);
    $birthDate 	    = $conn->real_escape_string($_POST['dob']);
    $address 	      = $conn->real_escape_string($_POST['address']);
    $documentFor    = $conn->real_escape_string($_POST['documentFor']);

    if(!empty($applicant) || $requestor && !empty($birthDate) && !empty($address)){

        $insert  = "INSERT INTO tbl_certoflbr (`name-of-applicant`, `name-of-requestor`, `name-of-father`, `name-of-mother`, `mother-or-father`, `date-of-birth`, `address`, `documentFor`) 
                    VALUES ('$applicant', '$requestor', '$father','$mother', '$form','$birthDate', '$address', '$documentFor')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Late birth registration added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../certOfLBR.php");

	$conn->close();