<?php
require_once '../server/server.php';
include './functions/sendUserAccount.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    }
}

$resUsername = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$userType = trim($_POST['usertype-user'] ?? '');

$firstname = trim($_POST['res_firstname'] ?? '');
$middlename = trim($_POST['res_middlename'] ?? '');
$lastname = trim($_POST['res_lastname'] ?? '');
$age = trim($_POST['res_age'] ?? '');
$gender = trim($_POST['res_gender'] ?? '');
$cstatus = trim($_POST['res_cstatus'] ?? '');
$street = trim($_POST['res_street'] ?? '');
$houseNo = trim($_POST['res_houseNo'] ?? '');
$subdivision = trim($_POST['res_subdivision'] ?? '');
$dbirth = trim($_POST['res_dbirth'] ?? '');
$email = $_POST['email'] ?? '';


if ($username === '' || $password === '' || $userType === '') {
    setMessageAndRedirect('Please fill up the form completely!', 'danger', '../users.php');
}

// Hash the password using bcrypt
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

$query = $conn->prepare("SELECT * FROM tbl_users WHERE firstname = ? AND middlename = ? AND lastname = ?");
$query->bind_param("sss", $firstname, $middlename, $lastname);
$query->execute();

$result = $query->get_result();

if ($result->num_rows > 0) {
    setMessageAndRedirect('Please enter a unique username!', 'danger', '../users.php');
}
if(!empty($email)) {
insertUser($conn, $resUsername, $passwordHashed, $firstname, $middlename, $lastname, $gender, $cstatus, $street, $dbirth, $email, $userType, $age, $subdivision, $houseNo);
    
} else {
$insert = $conn->prepare("INSERT INTO tbl_users (username, password, role, firstname, middlename, lastname, age, gender, civil_status, street, house_no, subdivision, date_of_birth, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$insert->bind_param("ssssssssssssss", $resUsername, $passwordHashed, $userType, $firstname, $middlename, $lastname, $age, $gender, $cstatus, $street, $houseNo, $subdivision, $dbirth, $email);
}



if ($insert->execute()) {
    setMessageAndRedirect('User added!', 'success', '../users.php');
    if(!empty($email)) {
        include "./sendAccount.php";
    }
} else {
    setMessageAndRedirect('Something went wrong!', 'danger', '../users.php');
}

$conn->close();

function setMessageAndRedirect($message, $status, $location) {
    $_SESSION['message'] = $message;
    $_SESSION['success'] = $status;
    header("Location: $location");
    exit();
}