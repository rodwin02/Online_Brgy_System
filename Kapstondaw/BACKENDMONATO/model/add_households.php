<?php
include '../server/server.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Assuming $conn is the connection to your database
    
    // Prepare the statement once for efficiency
    $stmt = $conn->prepare("INSERT INTO tbl_households (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `citizenship`, `household_head`, `ext`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $totalEntries = count($_POST['lastName']); // Assumes every other array has the same count

    for ($i = 0; $i < $totalEntries; $i++) {

        $householdHead = isset($_POST['householdHead'][$i+1]) && $_POST['householdHead'][$i+1] === 'yes' ? 'yes' : $_POST['firstName'][$i+1] . ' ' . $_POST['middleName'][$i+1] . ' ' . $_POST['lastName'][$i+1];


        if (!$stmt->bind_param("ssssssssssssss", 
            $_POST['firstName'][$i],
            $_POST['middleName'][$i], 
            $_POST['lastName'][$i],
            $_POST['sex'][$i], 
            $_POST['no'][$i], 
            $_POST['streetName'][$i], 
            $_POST['subdiName'][$i], 
            $_POST['dateBirth'][$i], 
            $_POST['placeBirth'][$i], 
            $_POST['civilStatus'][$i], 
            $_POST['occupational'][$i], 
            $_POST['citizenship'][$i], 
            // $_POST['householdHead'][$i], 
            $householdHead,
            $_POST['ext'][$i])) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        
        // Execute the statement
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
    }

    $stmt->close();
    header("Location: ../residentInfo.php");
    exit;
}
?>