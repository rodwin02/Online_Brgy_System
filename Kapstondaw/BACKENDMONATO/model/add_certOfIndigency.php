<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $applicant_fname    = $conn->real_escape_string($_POST['applicant_fname']);
    $applicant_mname    = $conn->real_escape_string($_POST['applicant_mname']);
    $applicant_lname    = $conn->real_escape_string($_POST['applicant_lname']);
    $requestor_fname    = $conn->real_escape_string($_POST['requestor_fname']);
    $requestor_mname    = $conn->real_escape_string($_POST['requestor_mname']);
    $requestor_lname    = $conn->real_escape_string($_POST['requestor_lname']);
    $address      = $conn->real_escape_string($_POST['address']);
    $purpose      = $conn->real_escape_string($_POST['purpose']);
    $documentFor  = $conn->real_escape_string($_POST['documentFor']);

    if(!empty($applicant_fname) || !empty($requestor_fname) && !empty($applicant_lname) || !empty($requestor_lname) && !empty($address)&& !empty($purpose)){

        $insert  = "INSERT INTO tbl_certofindigency (`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `address`, `documentFor`, `purpose`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$requestor_fname', '$requestor_mname', '$requestor_lname', '$address', '$documentFor','$purpose')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Certificate of indigency added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../certOfIndigency.php");

	$conn->close();