<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $applicant    = $conn->real_escape_string($_POST['applicant']);
    $requestor    = $conn->real_escape_string($_POST['requestor']);
    $address      = $conn->real_escape_string($_POST['address']);
    $purpose      = $conn->real_escape_string($_POST['purpose']);
    $documentFor  = $conn->real_escape_string($_POST['documentFor']);

    if(!empty($applicant) || !empty($requestor) && !empty($address)&& !empty($purpose)){

        $insert  = "INSERT INTO tbl_ecertificate (`name-of-applicant`, `name-of-requestor`, `address`, `documentFor`, `purpose`) 
                    VALUES ('$applicant', '$requestor', '$address', '$documentFor','$purpose')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Endorsement certificate requested successfully!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
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