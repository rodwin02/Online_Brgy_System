<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $applicant_fname    = $conn->real_escape_string($_POST['applicant_fname']);
    $applicant_mname    = $conn->real_escape_string($_POST['applicant_mname']);
    $applicant_lname    = $conn->real_escape_string($_POST['applicant_lname']);
    $requestor_fname    = $conn->real_escape_string($_POST['requestor_fname']);
    $requestor_mname    = $conn->real_escape_string($_POST['requestor_mname']);
    $requestor_lname    = $conn->real_escape_string($_POST['requestor_lname']);
    $applicant_houseNo      = $conn->real_escape_string($_POST['applicant_houseNo']);
    $applicant_street      = $conn->real_escape_string($_POST['applicant_street']);
    $applicant_subdivision      = $conn->real_escape_string($_POST['applicant_subdivision']);
    $applicant_dob      = $conn->real_escape_string($_POST['applicant_dob']);
    $applicant_pob      = $conn->real_escape_string($_POST['applicant_pob']);
    $applicant_civilStatus      = $conn->real_escape_string($_POST['applicant_civilStatus']);
    $contactNo      = $conn->real_escape_string($_POST['contactNo']);
    $documentFor  = $conn->real_escape_string($_POST['documentFor']);
    $purpose      = $conn->real_escape_string($_POST['purpose']);
    
    if(!empty($applicant_fname) || !empty($requestor_fname) && !empty($address)&& !empty($purpose)){

        $insert  = "INSERT INTO tbl_idform (`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `house_no`, `street`, `subdivision`, `place_of_birth`, `birth_date`, `civil_status`, `contact_number`, `documentFor`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$requestor_fname', '$requestor_mname', '$requestor_lname', '$applicant_houseNo', '$applicant_street', '$applicant_subdivision', '$applicant_pob', '$applicant_dob', '$applicant_civilStatus','$contactNo', '$documentFor')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Identification requested successfully!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong daw!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }
    } else {
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }
    header("Location: ../main.php");

	$conn->close();