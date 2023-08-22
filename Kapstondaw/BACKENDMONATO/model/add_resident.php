<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}

  $id = $conn->real_escape_string($_POST['id']);
  $fname = $conn->real_escape_string($_POST['firstname']);
  $mname = $conn->real_escape_string($_POST['middlename']);
  $lname = $conn->real_escape_string($_POST['lastname']);
  $age = $conn->real_escape_string($_POST['age']);
  $gender = $conn->real_escape_string($_POST['gender']);
  $houseNo = $conn->real_escape_string($_POST['house-no']);
  $street = $conn->real_escape_string($_POST['street']);
  $subdivision = $conn->real_escape_string($_POST['subdivision']);
  $dbirth = $conn->real_escape_string($_POST['dob']);
  $pbirth = $conn->real_escape_string($_POST['place-of-birth']);
  $cstatus = $conn->real_escape_string($_POST['civil-status']);
  $occupation = $conn->real_escape_string($_POST['occupation']);
  $email = $conn->real_escape_string($_POST['email']);
  $contact = $conn->real_escape_string($_POST['contact-no']);
  $vstatus = $conn->real_escape_string($_POST['voter-status']);
  $identified = $conn->real_escape_string($_POST['identified']);
  $sector = $conn->real_escape_string($_POST['sector']);
  $citizenship = $conn->real_escape_string($_POST['citizenship']);
  $householdNo = $conn->real_escape_string($_POST['household-no']);
  $osy = $conn->real_escape_string($_POST['out-of-school-youth']);
  $pwd = $conn->real_escape_string($_POST['person-with-disability']);
  
  $mfname = $conn->real_escape_string($_POST['mother-firstname']);
  $mmname = $conn->real_escape_string($_POST['mother-middlename']);
  $mlname = $conn->real_escape_string($_POST['mother-lastname']);
  $mage = $conn->real_escape_string($_POST['mother-age']);
  $mhouseNo = $conn->real_escape_string($_POST['mother-house-no']);
  $mstreet = $conn->real_escape_string($_POST['mother-street']);
  $msubdivision = $conn->real_escape_string($_POST['mother-subdivision']);
  $mhouseholdNo = $conn->real_escape_string($_POST['mhousehold-head']);

  $ffname = $conn->real_escape_string($_POST['father-firstname']);
  $fmname = $conn->real_escape_string($_POST['father-middlename']);
  $flname = $conn->real_escape_string($_POST['father-lastname']);
  $fage = $conn->real_escape_string($_POST['father-age']);
  $fhouseNo = $conn->real_escape_string($_POST['father-house-no']);
  $fstreet = $conn->real_escape_string($_POST['father-street']);
  $fsubdivision = $conn->real_escape_string($_POST['father-subdivision']);
  $fhouseholdNo = $conn->real_escape_string($_POST['fhousehold-head']);

	// change profile2 name

	  // image file directory
	$check = "SELECT id FROM tblresidents WHERE `firstname`='$fname' AND `middlename`='$mname' AND `lastname`='$lname'";
	$nat = $conn->query($check)->num_rows;	

	if($nat == 0){
		if(!empty($fname)){

			if(!empty($age) && !empty($fname)){

				$query = "INSERT INTO tblresidents (`firstname`, `middlename`, `lastname`, `age`, `gender`, `house-no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `civil-status`, `occupation`, `email`, `contact-no`, `voter-status`, `identified`, `sector`, `citizenship`, `household-no`, `osy`, `pwd`, `mother-firstname`, `mother-middlename`, `mother-lastname`, `mother-age`, `mother-house-no`, `mother-street`, `mother-subdivision`, `mother-household-head`, `father-firstname`, `father-middlename`, `father-lastname`, `father-age`, `father-house-no`, `father-street`, `father-subdivision`, `father-household-head`) 
        VALUES ('$fname', '$mname', '$lname', $age, '$gender', '$houseNo', '$street', '$subdivision', '$dbirth', '$pbirth', '$cstatus', '$occupation', '$email', '$contact', '$vstatus', '$identified', '$sector', '$citizenship', '$householdNo', '$osy', '$pwd', '$mfname', '$mmname', '$mlname', $mage, '$mhouseNo', '$mstreet', '$msubdivision', '$mhouseholdNo', '$ffname', '$fmname', '$flname', $fage, '$fhouseNo', '$fstreet', '$fsubdivision', '$fhouseholdNo')";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been saved!';
					$_SESSION['success'] = 'success';
				}
			}else if(!empty($age) && empty($fname)){

				$query = "INSERT INTO tblresidents (`firstname`, `middlename`, `lastname`, `age`, `gender`, `house-no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `civil-status`, `occupation`, `email`, `contact-no`, `voter-status`, `identified`, `sector`, `citizenship`, `household-no`, `osy`, `pwd`, `mother-firstname`, `mother-middlename`, `mother-lastname`, `mother-age`, `mother-house-no`, `mother-street`, `mother-subdivision`, `mother-household-head`, `father-firstname`, `father-middlename`, `father-lastname`, `father-age`, `father-house-no`, `father-street`, `father-subdivision`, `father-household-head`) 
        VALUES ('$fname', '$mname', '$lname', $age, '$gender', '$houseNo', '$street', '$subdivision', '$dbirth', '$pbirth', '$cstatus', '$occupation', '$email', '$contact', '$vstatus', '$identified', '$sector', '$citizenship', '$householdNo', '$osy', '$pwd', '$mfname', '$mmname', '$mlname', $mage, '$mhouseNo', '$mstreet', '$msubdivision', '$mhouseholdNo', '$ffname', '$fmname', '$flname', $fage, '$fhouseNo', '$fstreet', '$fsubdivision', '$fhouseholdNo')";
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been saved!';
					$_SESSION['success'] = 'success';
				}

			}else if(empty($age) && !empty($fname)){

				$query = "INSERT INTO tblresidents (`firstname`, `middlename`, `lastname`, `age`, `gender`, `house-no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `civil-status`, `occupation`, `email`, `contact-no`, `voter-status`, `identified`, `sector`, `citizenship`, `household-no`, `osy`, `pwd`, `mother-firstname`, `mother-middlename`, `mother-lastname`, `mother-age`, `mother-house-no`, `mother-street`, `mother-subdivision`, `mother-household-head`, `father-firstname`, `father-middlename`, `father-lastname`, `father-age`, `father-house-no`, `father-street`, `father-subdivision`, `father-household-head`) 
        VALUES ('$fname', '$mname', '$lname', $age, '$gender', '$houseNo', '$street', '$subdivision', '$dbirth', '$pbirth', '$cstatus', '$occupation', '$email', '$contact', '$vstatus', '$identified', '$sector', '$citizenship', '$householdNo', '$osy', '$pwd', '$mfname', '$mmname', '$mlname', $mage, '$mhouseNo', '$mstreet', '$msubdivision', '$mhouseholdNo', '$ffname', '$fmname', '$flname', $fage, '$fhouseNo', '$fstreet', '$fsubdivision', '$fhouseholdNo')";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been saved!';
					$_SESSION['success'] = 'success';

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$_SESSION['message'] = 'Resident Information has been saved!';
						$_SESSION['success'] = 'success';
					}
				}

			}else{
				$query = "INSERT INTO tblresidents (`firstname`, `middlename`, `lastname`, `age`, `gender`, `house-no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `civil-status`, `occupation`, `email`, `contact-no`, `voter-status`, `identified`, `sector`, `citizenship`, `household-no`, `osy`, `pwd`, `mother-firstname`, `mother-middlename`, `mother-lastname`, `mother-age`, `mother-house-no`, `mother-street`, `mother-subdivision`, `mother-household-head`, `father-firstname`, `father-middlename`, `father-lastname`, `father-age`, `father-house-no`, `father-street`, `father-subdivision`, `father-household-head`) 
        VALUES ('$fname', '$mname', '$lname', $age, '$gender', '$houseNo', '$street', '$subdivision', '$dbirth', '$pbirth', '$cstatus', '$occupation', '$email', '$contact', '$vstatus', '$identified', '$sector', '$citizenship', '$householdNo', '$osy', '$pwd', '$mfname', '$mmname', '$mlname', $mage, '$mhouseNo', '$mstreet', '$msubdivision', '$mhouseholdNo', '$ffname', '$fmname', '$flname', $fage, '$fhouseNo', '$fstreet', '$fsubdivision', '$fhouseholdNo')";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been saved!';
					$_SESSION['success'] = 'success';
				}
			}

		}else{

			$_SESSION['message'] = 'Please complete the form!';
			$_SESSION['success'] = 'danger';
		}
	}else{
		$_SESSION['message'] = 'invalid!';
		$_SESSION['success'] = 'danger';
	}
     header("Location: ../residentInfo.php");

	$conn->close();

