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
  $check = "SELECT id FROM tblresidents WHERE `firstname`='$fname'";
	$nat= $conn->query($check)->fetch_assoc();
	if($nat['id'] == $id || $nat <= 0){
		if(!empty($id)){

			if(!empty($age) && !empty($fname)){

				$query = "UPDATE tblresidents SET `firstname`='$fname',`middlename`='$mname', `lastname`='$lname', `age`='$age',`gender`='$gender', `house-no`='$houseNo', `street`='$street',`subdivision`='$subdivision', `date-of-birth`='$dbirth',`place-of-birth`='$pbirth', `civil-status`='$cstatus', `occupation`='$occupation', `email`='$email', `contact-no`='$contact', `voter-status`='$vstatus', `identified`='$identified', `sector`='$sector', `citizenship`='$citizenship', `household-no`='$householdNo', `osy`='$osy', `pwd`='$pwd', `mother-firstname`='$mfname',`mother-middlename`='$mmname',`mother-lastname`='$mlname',`mother-age`='$mage', `mother-house-no`='$mhouseNo', `mother-street`='$mstreet', `mother-subdivision`='$msubdivision',`mother-household-head`='$mhouseholdNo', `father-firstname`='$ffname', `father-lastname`='$flname',`father-middlename`='$fmname', `father-age`='$fage',`father-house-no`='$fhouseNo', `father-street`='$fstreet',`father-subdivision`='$fsubdivision', `father-household-head`='$fhouseholdNo' 
				WHERE id=$id;";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}
			}else if(!empty($age) && empty($fname)){

				$query = "UPDATE tblresidents SET `firstname`='$fname',`middlename`='$mname', `lastname`='$lname', `age`='$age',`gender`='$gender', `house-no`='$houseNo', `street`='$street',`subdivision`='$subdivision', `date-of-birth`='$dbirth',`place-of-birth`='$pbirth', `civil-status`='$cstatus', `occupation`='$occupation', `email`='$email', `contact-no`='$contact', `voter-status`='$vstatus', `identified`='$identified', `sector`='$sector', `citizenship`='$citizenship', `household-no`='$householdNo', `osy`='$osy', `pwd`='$pwd', `mother-firstname`='$mfname',`mother-middlename`='$mmname',`mother-lastname`='$mlname',`mother-age`='$mage', `mother-house-no`='$mhouseNo', `mother-street`='$mstreet', `mother-subdivision`='$msubdivision',`mother-household-head`='$mhouseholdNo', `father-firstname`='$ffname', `father-lastname`='$flname',`father-middlename`='$fmname', `father-age`='$fage',`father-house-no`='$fhouseNo', `father-street`='$fstreet',`father-subdivision`='$fsubdivision', `father-household-head`='$fhouseholdNo' 
				WHERE id=$id;";
				
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}

			}else if(empty($age) && !empty($fname)){

				$query = "UPDATE tblresidents SET `firstname`='$fname',`middlename`='$mname', `lastname`='$lname', `age`='$age',`gender`='$gender', `house-no`='$houseNo', `street`='$street',`subdivision`='$subdivision', `date-of-birth`='$dbirth',`place-of-birth`='$pbirth', `civil-status`='$cstatus', `occupation`='$occupation', `email`='$email', `contact-no`='$contact', `voter-status`='$vstatus', `identified`='$identified', `sector`='$sector', `citizenship`='$citizenship', `household-no`='$householdNo', `osy`='$osy', `pwd`='$pwd', `mother-firstname`='$mfname',`mother-middlename`='$mmname',`mother-lastname`='$mlname',`mother-age`='$mage', `mother-house-no`='$mhouseNo', `mother-street`='$mstreet', `mother-subdivision`='$msubdivision',`mother-household-head`='$mhouseholdNo', `father-firstname`='$ffname', `father-lastname`='$flname',`father-middlename`='$fmname', `father-age`='$fage',`father-house-no`='$fhouseNo', `father-street`='$fstreet',`father-subdivision`='$fsubdivision', `father-household-head`='$fhouseholdNo' 
				WHERE id=$id;";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!!';
					$_SESSION['success'] = 'success';

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$_SESSION['message'] = 'Resident Information has been updated!!';
						$_SESSION['success'] = 'success';
					}
				}

			}else{
        
				$query = "UPDATE tblresidents SET `firstname`='$fname',`middlename`='$mname', `lastname`='$lname', `age`='$age',`gender`='$gender', `house-no`='$houseNo', `street`='$street',`subdivision`='$subdivision', `date-of-birth`='$dbirth',`place-of-birth`='$pbirth', `civil-status`='$cstatus', `occupation`='$occupation', `email`='$email', `contact-no`='$contact', `voter-status`='$vstatus', `identified`='$identified', `sector`='$sector', `citizenship`='$citizenship', `household-no`='$householdNo', `osy`='$osy', `pwd`='$pwd', `mother-firstname`='$mfname',`mother-middlename`='$mmname',`mother-lastname`='$mlname',`mother-age`='$mage', `mother-house-no`='$mhouseNo', `mother-street`='$mstreet', `mother-subdivision`='$msubdivision',`mother-household-head`='$mhouseholdNo', `father-firstname`='$ffname', `father-lastname`='$flname',`father-middlename`='$fmname', `father-age`='$fage',`father-house-no`='$fhouseNo', `father-street`='$fstreet',`father-subdivision`='$fsubdivision', `father-household-head`='$fhouseholdNo' 
				WHERE id=$id;";
				
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}
			}

		}else{

			$_SESSION['message'] = 'Please complete the form!';
			$_SESSION['success'] = 'danger';
		}
	}else{
		$_SESSION['message'] = 'invalid';
		$_SESSION['success'] = 'danger';
	}

	if(isset($_POST['idForm'])) {
    header("Location: ../idForm.php");
	}
	else if($_POST['brgyClearance']) {
    header("Location: ../brgyClearance.php");
	} 
	else if($_POST['endorsementCert']) {
    header("Location: ../endorsmentCert.php");
	}
	else if($_POST['certOfIndigency']) {
    header("Location: ../certOfIndigency.php");
	}
	else if($_POST['certOfLBR']) {
    header("Location: ../certOfLBR.php");
	}
	else if($_POST['awareness']) {
    header("Location: ../awareness.php");
	}else {
    header("Location: ../residentInfo.php");
	}

	$conn->close();
