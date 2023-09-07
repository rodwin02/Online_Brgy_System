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
 ?>