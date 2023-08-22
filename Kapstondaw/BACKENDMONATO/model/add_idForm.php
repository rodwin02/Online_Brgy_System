<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $firstname         = $conn->real_escape_string($_POST['firstname']);
    $middlename         = $conn->real_escape_string($_POST['middlename']);
    $lastname         = $conn->real_escape_string($_POST['lastname']);
    $address         = $conn->real_escape_string($_POST['address']);
    $pob         = $conn->real_escape_string($_POST['pob']);
    $birthDate         = $conn->real_escape_string($_POST['birthDate']);
    $civilStatus         = $conn->real_escape_string($_POST['civilStatus']);
    $contact         = $conn->real_escape_string($_POST['contact']);
    $documentFor      = $conn->real_escape_string($_POST['documentFor']);
    $purpose          = $conn->real_escape_string($_POST['purpose']);
    // $dateRequested    = $conn->real_escape_string($_POST['dateRequested']);

    if(!empty($firstname) && !empty($documentFor) && !empty($purpose)){

        $insert  = "INSERT INTO tbl_idform (`firstname`, `middlename`, `lastname`, `address`, `place-of-birth`, `birth-date`, `civil-status`, `contact-number`, `documentFor`, `purpose`) 
                    VALUES ('$firstname', '$middlename', '$lastname', '$address', '$pob', '$birthDate', '$civilStatus', '$contact', '$documentFor', '$purpose')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Identification form added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../idForm.php");

	$conn->close();