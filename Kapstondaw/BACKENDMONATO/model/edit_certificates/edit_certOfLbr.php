<?php
include('../../server/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $id = $conn->real_escape_string($_POST['id']);
    $applicant_fname = $conn->real_escape_string(isset($_POST['applicant_fname']) ? $_POST['applicant_fname'] : "");
    $applicant_mname = $conn->real_escape_string(isset($_POST['applicant_mname']) ? $_POST['applicant_mname'] : "");
    $applicant_lname = $conn->real_escape_string(isset($_POST['applicant_lname']) ? $_POST['applicant_lname'] : "");
    $applicant_suffix = $conn->real_escape_string(isset($_POST['applicant_suffix']) ? $_POST['applicant_suffix'] : "");
    
    $requestor_fname = $conn->real_escape_string($_POST['requestor_fname']);
    $requestor_mname = $conn->real_escape_string($_POST['requestor_mname']);
    $requestor_lname = $conn->real_escape_string($_POST['requestor_lname']);
    $requestor_suffix = $conn->real_escape_string($_POST['requestor_suffix']);
    
    $parent_fname = $conn->real_escape_string($_POST['parent_fname']);
    $parent_mname = $conn->real_escape_string($_POST['parent_mname']);
    $parent_lname = $conn->real_escape_string($_POST['parent_lname']);
    $parent_suffix = $conn->real_escape_string($_POST['parent_suffix']);

    $father_fname = $conn->real_escape_string($_POST['father_fname']);
    $father_mname = $conn->real_escape_string($_POST['father_mname']);
    $father_lname = $conn->real_escape_string($_POST['father_lname']);
    $father_suffix = $conn->real_escape_string($_POST['father_suffix']);

    $mother_fname = $conn->real_escape_string($_POST['mother_fname']);
    $mother_mname = $conn->real_escape_string($_POST['mother_mname']);
    $mother_lname = $conn->real_escape_string($_POST['mother_lname']);
    $mother_suffix = $conn->real_escape_string($_POST['mother_suffix']);

    $dob = $conn->real_escape_string($_POST['dob']);
    
    $house_no = $conn->real_escape_string($_POST['house_no']);
    $street = $conn->real_escape_string($_POST['street']);
    $subdivision = $conn->real_escape_string($_POST['subdivision']);
    
    $documentFor = $conn->real_escape_string($_POST['documentFor']);
    $date_requested = $conn->real_escape_string($_POST['date_requested']);


    // Construct the SQL UPDATE query
    $update_query = "UPDATE tbl_certoflbr
                     SET `applicant_fname` = '$applicant_fname',
                         `applicant_mname`='$applicant_mname',`applicant_lname`='$applicant_lname',`applicant_suffix`='$applicant_suffix',`requestor_fname`='$requestor_fname',`requestor_mname`='$requestor_mname',`requestor_lname`='$requestor_lname',`requestor_suffix`='$requestor_suffix',
                         `parent_fname`='$parent_fname',`parent_mname`='$parent_mname',`parent_lname`='$parent_lname',`parent_suffix`='$parent_suffix',
                         `father_fname`='$father_fname',`father_mname`='$father_mname',`father_lname`='$father_lname',`father_suffix`='$father_suffix',
                         `mother_fname`='$mother_fname',`mother_mname`='$mother_mname',`mother_lname`='$mother_lname',`mother_suffix`='$mother_suffix',
                         `date_of_birth`='$dob',
                         `house_no`='$house_no',`street`='$street',`subdivision`='$subdivision',`documentFor`='$documentFor',`date_requested`='$date_requested'
                     WHERE id = '$id'";

    // Execute the query
    $result = $conn->query($update_query);

    if ($result === true) {
        $_SESSION['message'] = 'Certificate of Late Birth updated successfully!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating record: ' . $conn->error;
        $_SESSION['success'] = 'danger';
    }

    // Redirect to the appropriate page (adjust the path accordingly)
    header("Location: ../../certOfLBR.php");
    exit();
}

$conn->close();
?>