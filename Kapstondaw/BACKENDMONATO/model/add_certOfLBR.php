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

    $parent_fname    = $conn->real_escape_string($_POST['parent_fname']);
    $parent_mname    = $conn->real_escape_string($_POST['parent_mname']);
    $parent_lname    = $conn->real_escape_string($_POST['parent_lname']);

    $mother_fname    = $conn->real_escape_string($_POST['mother_fname']);
    $mother_mname    = $conn->real_escape_string($_POST['mother_mname']);
    $mother_lname    = $conn->real_escape_string($_POST['mother_lname']);

    $father_fname    = $conn->real_escape_string($_POST['father_fname']);
    $father_mname    = $conn->real_escape_string($_POST['father_mname']);
    $father_lname    = $conn->real_escape_string($_POST['father_lname']);

    $birthDate 	    = $conn->real_escape_string($_POST['dob']);
    $address 	      = $conn->real_escape_string($_POST['address']);
    $documentFor    = $conn->real_escape_string($_POST['documentFor']);

    if(!empty($applicant_fname) || !empty($requestor_fname) && !empty($applicant_lname) || !empty($requestor_lname)  && !empty($birthDate) && !empty($address)){

        $insert  = "INSERT INTO tbl_certoflbr (`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `parent_fname`, `parent_mname`, `parent_lname`, `father_fname`, `father_mname`, `father_lname`, `mother_fname`, `mother_mname`, `mother_lname`, `date-of-birth`, `address`, `documentFor`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$requestor_fname', '$requestor_mname', '$requestor_lname', '$parent_fname', '$parent_mname', '$parent_lname', '$father_fname', '$father_mname', '$father_lname', '$mother_fname', '$mother_mname', '$mother_lname', '$birthDate', '$address', '$documentFor')";
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