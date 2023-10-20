<?php 
    include '../server/server.php';
    include './functions/autoGenerateUser.php';

    // if(!isset($_SESSION['username'])){
    //     header("Location: ../index.php");
    //     exit;
    // }

    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: ../residentInfo.php");
        exit;
    }


    $stmt = $conn->prepare("SELECT id FROM tblresidents WHERE firstname=? AND lastname=? AND date_of_birth=?");
    $stmt->bind_param("sss", $_POST['firstname'], $_POST['lastname'], $_POST['dob']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows == 0) {
        $stmtInsert = $conn->prepare("INSERT INTO tblresidents (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`,
        `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `email`, `contact_no`, `voter_status`,`citizenship`, `household_no`, `osy`, `pwd`, `household_head`, `ext`, `no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)");
        // Bind your parameters here
        $stmtInsert->bind_param("sssssssssssssssssssss", $_POST['firstname'], $_POST['middlename'], $_POST['lastname'],$_POST['sex'], $_POST['house-no'], $_POST['street'], $_POST['subdivision'], $_POST['dob'], $_POST['place-of-birth'], $_POST['civil-status'], $_POST['occupation'], $_POST['email'], $_POST['contact-no'], $_POST['voter-status'], $_POST['citizenship'], $_POST['household-no'], $_POST['out-of-school-youth'], $_POST['person-with-disability'], $_POST['household-head'], $_POST['ext'], $_POST['no']);
        $stmtInsert->execute();

        // Rest of your insert logic
        if($stmtInsert) {
        $_SESSION['message'] = 'Resident Information has been saved!';
        $_SESSION['success'] = 'success';
        } else {
        $_SESSION['message'] = 'Error';
        $_SESSION['success'] = 'danger';
        }

        // This line should be executed securely as well
        // function calculateAge($dob) {
        //     $today = new DateTime();
        //     $birthDate = new DateTime($dob);
        //     $interval = $today->diff($birthDate);
        //     return $interval->y;
        // }
        // $cacldbirth = calculateAge($_POST['dob']);

        // insertUser($conn, $username, $hashedPassword, $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['sex'], $_POST['civil-status'], $_POST['street'], $cacldbirth, $_POST['email']);

        // include './sendAccount.php';

    } else {
        $_SESSION['message'] = 'Resident Information already exists';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../residentInfo.php");
    $stmt->close();
    $conn->close();
?>

