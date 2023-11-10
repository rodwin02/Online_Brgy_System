<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $taxpayerName  = $conn->real_escape_string($_POST['taxpayerName']);
    $businessName 	= $conn->real_escape_string($_POST['businessName']);
    $businessAddress 	    = $conn->real_escape_string($_POST['businessAddress']);

    if(!empty($taxpayerName) && !empty($businessName) && !empty($businessAddress)){

        $insert  = "INSERT INTO tbl_business (`taxpayer_name`, `business_name`, `business_address`) 
        VALUES ('$taxpayerName', '$businessName','$businessAddress')";
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

    header("Location: ../business.php");

	$conn->close();