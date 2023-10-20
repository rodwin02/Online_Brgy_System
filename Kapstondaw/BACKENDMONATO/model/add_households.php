<?php

// Include your database connection code if you have one
include '../server/server.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get all the values from the form
    $lastNames       = $_POST['lastName'];
    $firstNames      = $_POST['firstName'];
    $middleNames     = $_POST['middleName'];
    $ext             = $_POST['ext'];
    $noVal           = $_POST['no'];
    $street          = $_POST['streetName'];
    $subdiName       = $_POST['subdiName'];
    $dateBirth       = $_POST['dateBirth'];
    $placeBirth      = $_POST['placeBirth'];
    $sex             = $_POST['sex'];
    $civilStatus     = $_POST['civilStatus'];
    $citizenship     = $_POST['citizenship'];
    $occupation      = $_POST['occupational'];
    $householdHead   = isset($_POST['householdHead'][$i]) ? $_POST['householdHead'][$i] : 'no';
    //... continue for other fields

    // Assuming you've already established a connection to your database named $conn

    $success = true;

    $stmt = $conn->prepare("INSERT INTO tbl_households (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `citizenship`, `household_head`, `ext`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    for ($i = 0; $i < count($lastNames); $i++) {

        // Bind the parameters
        $stmt->bind_param("ssssssssssssss", $firstNames[$i], $middleNames[$i], $lastNames[$i], $sex[$i], $noVal[$i], $street[$i], $subdiName[$i], $dateBirth[$i], $placeBirth[$i], $civilStatus[$i], $occupation[$i], $citizenship[$i], $householdHead[$i], $ext[$i]);

        // Execute the statement
        if (!$stmt->execute()) {
            $success = false;
            break;
        }
    }

    $stmt->close();

    if ($success) {
        header("Location: ../residentInfo.php");
    } else {
        header("Location: ../addResidents.php");
    }
    exit; // Important to prevent further execution of the script

}

?>
