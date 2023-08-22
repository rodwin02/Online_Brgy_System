<?php
require_once '../server/server.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    }
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$userType = trim($_POST['usertype-user'] ?? '');

$firstname = trim($_POST['res_firstname'] ?? '');
$middlename = trim($_POST['res_middlename'] ?? '');
$lastname = trim($_POST['res_lastname'] ?? '');
$age = trim($_POST['res_age'] ?? '');
$gender = trim($_POST['res_gender'] ?? '');
$cstatus = trim($_POST['res_cstatus'] ?? '');
$street = trim($_POST['res_street'] ?? '');
$dbirth = trim($_POST['res_dbirth'] ?? '');
$email = trim($_POST['res_email'] ?? '');


if ($username === '' || $password === '' || $userType === '') {
    setMessageAndRedirect('Please fill up the form completely!', 'danger', '../users.php');
}

// Hash the password using bcrypt
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

$query = $conn->prepare("SELECT * FROM tbl_users WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();

$result = $query->get_result();

if ($result->num_rows > 0) {
    setMessageAndRedirect('Please enter a unique username!', 'danger', '../users.php');
}

$insert = $conn->prepare("INSERT INTO tbl_users (username, password, role, firstname, middlename, lastname, age, gender, civil_status, street, date_of_birth, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$insert->bind_param("ssssssssssss", $username, $passwordHashed, $userType, $firstname, $middlename, $lastname, $age, $gender, $cstatus, $street, $dbirth, $email);

if ($insert->execute()) {
    setMessageAndRedirect('User added!', 'success', '../users.php');
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