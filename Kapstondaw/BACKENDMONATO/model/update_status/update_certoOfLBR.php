<?php
include '../../server/server.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$id = $conn->real_escape_string($_POST['id']);
$status = $conn->real_escape_string($_POST['status']);


if (!empty($status)) {
    $query = "UPDATE tbl_certoflbr SET status='$status' WHERE id='$id'";

    if ($conn->query($query) === true) {
        $_SESSION['message'] = 'Certificate of Late Birth Registration status has been updated!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating Certificate Late Birth Registration status: ' . $conn->error;
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Please complete the form!';
    $_SESSION['success'] = 'danger';
}

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

$conn->close();
?>