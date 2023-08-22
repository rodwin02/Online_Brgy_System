<?php

require("../server/server.php");

// get Users
$query = "SELECT `firstname`, `middlename`, `lastname`, `age`, `gender`, `house-no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `civil-status`, `occupation`, `email`, `contact-no`, `voter-status`, `identified`, `sector`, `citizenship`, `household-no`, `osy`, `pwd`, `mother-firstname`, `mother-middlename`, `mother-lastname`, `mother-age`, `mother-house-no`, `mother-street`, `mother-subdivision`, `mother-household-head`, `father-firstname`, `father-lastname`, `father-middlename`, `father-age`, `father-house-no`, `father-street`, `father-subdivision`, `father-household-head` FROM tblresidents";
if (!$result = $conn->query($query)) {
    exit($conn->error);
}

$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Residents.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('firstname', 'middlename', 'lastname', 'age', 'gender', 'house-no', 'street', 'subdivision', 'date-of-birth', 'place-of-birth', 'civil-status', 'occupation', 'email', 'contact-no', 'voter-status', 'identified', 'sector', 'citizenship', 'household-no', 'osy', 'pwd', 'mother-firstname', 'mother-middlename', 'mother-lastname', 'mother-age', 'mother-house-no', 'mother-street', 'mother-subdivision', 'mother-household-head', 'father-firstname', 'father-lastname', 'father-middlename', 'father-age', 'father-house-no', 'father-street', 'father-subdivision', 'father-household-head'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}


?>