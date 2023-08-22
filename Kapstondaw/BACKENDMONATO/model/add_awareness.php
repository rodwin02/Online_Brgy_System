<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $name  = $conn->real_escape_string($_POST['name']);
    $date 	= $conn->real_escape_string($_POST['date']);
    $time 	      = $conn->real_escape_string($_POST['time']);
    $location 	    = $conn->real_escape_string($_POST['location']);
    $details 	  = $conn->real_escape_string($_POST['details_awareness']);
    $status 	    = $conn->real_escape_string($_POST['status_awareness']);

    if(!empty($name) && !empty($date) && !empty($location) && !empty($time) && !empty($details) && !empty($status)){

        $insert  = "INSERT INTO tblawareness (`name`, `date`, `time`, `location`, `details`,`status`) 
        VALUES ('$name', '$date','$time', '$location','$details','$status')";

        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Awareness added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../awareness.php");

	$conn->close();