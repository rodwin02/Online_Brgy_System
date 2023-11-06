<?php
    $query = "SELECT * FROM brgy_information";
    $result = $conn->query($query);
	$row = $result->fetch_assoc();

	if($row){
		$province_name = $row['province_name'];
		$brgy_name 		= $row['brgy_name'];
		$municipality_logo 	= $row['municipality_logo'];
		$town_name	= $row['town_name'];
		$tel_no =  $row['tel_no'];
		$brgy_logo		= $row['brgy_logo'];
	}
	
if(isset($_SESSION['firstname']) && isset($_SESSION['middlename']) && isset($_SESSION['lastname'])) {
// $query1 = "SELECT * FROM tbl_idform AS idform
//           JOIN tbl_brgyclearance AS brgyclearance
//           WHERE idform.applicant_fname = '" . $_SESSION['firstname'] . "'
//           AND idform.applicant_mname = '" . $_SESSION['middlename'] . "'
//           AND idform.applicant_lname = '" . $_SESSION['lastname'] . "'";

$query1 = "SELECT tbl_idform.*, tbl_brgyclearance.* FROM tbl_idform JOIN tbl_brgyclearance";

$result1 = $conn->query($query1);

    // Initialize an array to store the results
$certs = array();

while ($row = $result1->fetch_assoc()) {
	$certs[] = $row;
}
}


?>