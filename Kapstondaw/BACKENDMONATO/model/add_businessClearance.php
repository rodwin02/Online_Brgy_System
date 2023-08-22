<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $businessName = $conn->real_escape_string($_POST['businessName']);
    $ownerName 	  = $conn->real_escape_string($_POST['businessOwnerName']);
    $address 	    = $conn->real_escape_string($_POST['businessAddress']);
    $dateApplied  = $conn->real_escape_string($_POST['dateApplied']);
    $documentFor 	= $conn->real_escape_string($_POST['documentFor']);

    if(!empty($businessName) && !empty($ownerName) && !empty($address) && !empty($dateApplied) && !empty($documentFor)){

        $insert  = "INSERT INTO tbl_businessClearance (`business-name`, `business-owner-name`, `business-address`, `date-applied`, `documentFor`) 
                    VALUES ('$businessName', '$ownerName','$address', '$dateApplied','$documentFor')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Business added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../businessClearance.php");

	$conn->close();