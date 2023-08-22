<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $fullname     = $conn->real_escape_string($_POST['fullname']);
    $address      = $conn->real_escape_string($_POST['address']);
    $dob          = $conn->real_escape_string($_POST['dob']);
    $pob          = $conn->real_escape_string($_POST['pob']);
    $purpose      = $conn->real_escape_string($_POST['purpose']);
    $dateInput    = $conn->real_escape_string($_POST['dateInput']);

    if(!empty($fullname) && !empty($address) && !empty($dob) && !empty($pob) && !empty($purpose) && !empty($dateInput)){

        $insert  = "INSERT INTO tbl_brgyclearance (`fullname`, `address`, `date-of-birth`, `place-of-birth`, `purpose`, `date-issue`) 
                    VALUES ('$fullname', '$address', '$dob', '$pob', '$purpose', '$dateInput')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Barangay clearance added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../brgyClearance.php");

	$conn->close();