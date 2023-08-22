<?php
include '../server/server.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    exit("Failed to upload file.\n");
}

$inputFileName = $target_file;

if (!file_exists($inputFileName)) {
    exit("Could not find .xlsx file.\n");
}

try {
    $spreadsheet = IOFactory::load($inputFileName);
} catch (Exception $e) {
    exit("Error loading file: " . $e->getMessage() . "\n");
}

$data = $spreadsheet->getActiveSheet()->toArray();
array_shift($data);

foreach ($data as $key => $row) {
    $firstname        = $row[0];
    $middlename       = $row[1];
    $lastname         = $row[2];
    $age              = $row[3];
    $gender           = $row[4];
    $houseNo          = $row[5];
    $street           = $row[6];
    $subdivision      = $row[7];
    $dob              = $row[8];
    $pob              = $row[9];
    $civil_status     = $row[10];
    $occupation       = $row[11];
    $email            = $row[12];
    $contactNo        = $row[13];
    $voter_status     = $row[14];
    $identified       = $row[15];
    $sector           = $row[16];
    $citizenship      = $row[17];
    $householdNo      = $row[18];
    $osy              = $row[19];
    $pwd              = $row[20];

    $m_firstname      = $row[21];
    $m_middlename     = $row[22];
    $m_lastname       = $row[23];
    $m_age            = $row[24];
    $m_houseNo        = $row[25];
    $m_street         = $row[26];
    $m_subdivision    = $row[27];
    $m_householdHead  = $row[28];

    $f_firstname      = $row[29];
    $f_lastname       = $row[30];
    $f_middlename     = $row[31];
    $f_age            = $row[32];
    $f_houseNo        = $row[33];
    $f_street         = $row[34];
    $f_subdivision    = $row[35];
    $f_householdHead  = $row[36];

    $query_check = "SELECT * FROM tblresidents WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname'";

    $result = $conn->query($query_check);


    if($result->num_rows == 0) {
        $query = "INSERT INTO tblresidents (`firstname`, `middlename`, `lastname`, `age`, `gender`, `house-no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `civil-status`, `occupation`, `email`, `contact-no`, `voter-status`, `identified`, `sector`, `citizenship`, `household-no`, `osy`, `pwd`, `mother-firstname`, `mother-middlename`, `mother-lastname`, `mother-age`, `mother-house-no`, `mother-street`, `mother-subdivision`, `mother-household-head`, `father-firstname`, `father-lastname`, `father-middlename`, `father-age`, `father-house-no`, `father-street`, `father-subdivision`, `father-household-head`) 
             VALUES ('$firstname', '$middlename', '$lastname', '$age', '$gender', '$houseNo', '$street', '$subdivision', '$dob', '$pob', '$civil_status', '$occupation', '$email', '$contactNo', '$voter_status', '$identified', '$sector', '$citizenship', '$householdNo', '$osy', '$pwd', '$m_firstname', '$m_middlename', '$m_lastname', '$m_age', '$m_houseNo', '$m_street', '$m_subdivision', '$m_householdHead', '$f_firstname', '$f_lastname', '$f_middlename', '$f_age', '$f_houseNo', '$f_street', '$f_subdivision', '$f_householdHead')";

        if($conn->query($query) === true){
            $_SESSION['message'] = 'Resident Information has been saved!';
            $_SESSION['success'] = 'success';
        }
    }
}
    header("Location: ../residentInfo.php");

$conn->close();
?>
