<?php 
	include '../server/server.php';
	include './functions/autoGenerateUser.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}


// $id = $conn->real_escape_string($_POST['id']);
$fname = $conn->real_escape_string($_POST['firstname']);
$mname = $conn->real_escape_string($_POST['middlename']);
$lname = $conn->real_escape_string($_POST['lastname']);
$sex = $conn->real_escape_string($_POST['sex']);
$houseNo = $conn->real_escape_string($_POST['house-no']);
$street = $conn->real_escape_string($_POST['street']);
$subdivision = $conn->real_escape_string($_POST['subdivision']);
$dbirth = $conn->real_escape_string($_POST['dob']);

function calculateAge($dob) {
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $interval = $today->diff($birthDate);
    return $interval->y;
}

$computedAge = calculateAge($dbirth);
$pbirth = $conn->real_escape_string($_POST['place-of-birth']);
$cstatus = $conn->real_escape_string($_POST['civil-status']);
$occupation = $conn->real_escape_string($_POST['occupation']);
$email = $conn->real_escape_string($_POST['email']);
$contact = $conn->real_escape_string(isset($_POST['contact-no']) ? $_POST['contact-no'] : "");
$vstatus = $conn->real_escape_string(isset($_POST['voter-status']) ? $_POST['voter-status'] : "");
$citizenship = $conn->real_escape_string($_POST['citizenship']);
$householdNo = $conn->real_escape_string(isset($_POST['household-no']) ? $_POST['household-no'] : "");
$osy = $conn->real_escape_string(isset($_POST['out-of-school-youth']) ? $_POST['out-of-school-youth'] : "");
$pwd = $conn->real_escape_string(isset($_POST['person-with-disability']) ? $_POST['person-with-disability'] : "");

$hHead = $conn->real_escape_string($_POST['household-head']);

$check = "SELECT id FROM tblresidents WHERE `firstname`='$fname' AND `lastname`='$lname' AND `date_of_birth`='$dbirth'";
$nat = $conn->query($check)->num_rows;

if($nat == 0){
$query = "INSERT INTO tblresidents (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`,
`subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `email`, `contact_no`, `voter_status`,`citizenship`, `household_no`, `osy`, `pwd`, `household_head`)
VALUES ('$fname', '$mname', '$lname', '$sex', '$houseNo', '$street', '$subdivision', '$dbirth', '$pbirth',
'$cstatus', '$occupation', '$email', '$contact', '$vstatus', '$citizenship', '$householdNo',
'$osy', '$pwd', '$hHead')";

insertUser($conn, $username, $hashedPassword, $fname, $mname, $lname, $sex, $cstatus, $street, $dbirth, $email);

if($conn->query($query) === true){

$_SESSION['message'] = 'Resident Information has been saved!';
$_SESSION['success'] = 'success';

include './sendAccount.php';

}
}else{
$_SESSION['message'] = 'Resident  Information already exists';
$_SESSION['success'] = 'danger';
}
header("Location: ../residentInfo.php");

$conn->close();