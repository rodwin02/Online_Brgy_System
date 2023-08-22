<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tblresidents";
$result = $conn->query($query);

$residents = array();
while($row = $result->fetch_assoc()) {
  $residents[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Information</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js"></script>

</head>

<body>

    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/import_residents.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>

    <!-- HEADER -->
    <div class="container">
        <div class="layer1">Barangay Zone IV Dasmarinas Cavite
        </div>
        <div class="layer2">
            <img src="vector/Vector 1.png" alt="">
        </div>
    </div>

    <!-- SIDE BAR -->
    <div class="sidebar">
        <div class="slayer1">
            <img class="vector-side" src="vector/layerside.png" alt="">
            <img class="db-icon" src="icons/dashboard-icon.png" alt=""></img>
            <img class="bo-icon" src="icons/B_Officials-iocn.png" alt=""></img>
            <img class="ri-icon" src="icons/residents-icon.png" alt=""></img>
            <img class="cc-icon" src="icons/certificate-icon.png" alt=""></img>
            <img class="rs-icon" src="icons/blotter-icon.png" alt=""></img>
            <img class="um-icon" src="icons/user-icon.png" alt=""></img>
            <img class="cm-icon" src="icons/content-icon.png" alt=""></img>
            </img>
        </div>

        <div class="slayer2">
            <a class="db" href="dashboard.php">Dashboard</a>
            <a class="bo" href="barangayOfficials.php">Barangay Officials</a>
            <a class="ri" href="residentInfo.php">Residents Information</a>
            <a class="cc" href="#">Certificate/Clearance</a>
            <a href="idForm.php" class="idform">Identification Form</a>
            <a href="brgyClearance.php" class="b-clearance">Barangay Clearance</a>
            <a href="endorsmentCert.php" class="e-certificate">E-Certificate</a>
            <a href="certOfIndigency.php" class="c-indigency">Cetificate of Indigency</a>
            <a href="certOfLBR.php" class="c-latebirth">Certificate Of LBR</a>
            <a href="businessClearance.php" class="bb-clearance">Business Clearance</a>
            <a class="rs" href="#">Reports</a>
            <a href="blotter.php" class="blotter1">Blotter records</a>
            <a href="complain.php" class="complain1">Complain records</a>
            <a href="awareness.php" class="awareness1">Awereness</a>
            <a class="um" href="#">User Management</a>
            <a href="users.php" class="users">Users</a>
            <a class="cm" href="#">Content Management</a>
            <a href="#" class="b-information" id="b-info">Barangay Information</a>
            <a href="announcement.php" class="announcement">Announcement</a>
            <a href="backup" class="backup">Backup</a>
            <a href="#" class="restore restoreBtn">Restore</a>
            <a href="request.php" class="request">Requested Documents</a>
        </div>
    </div>

    <div class="home_residents">
        <div class="first_layer">
            <p>Resident Information</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input class="searchBar" type="text" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="add" id="add">+ Resident</a>
                <a href="./model/export_residents_csv.php" class="exportCVS">+ Export CVS</a>
                <button class="importBtn">+ Import</button>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Street</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= $row['age']?></td>
                        <td><?= $row['date-of-birth'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['civil-status'] ?></td>
                        <td><?= $row['street'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editResidents" onclick="editResident(this)"
                                data-id="<?= $row['id'] ?>" data-fname="<?= $row['firstname'] ?>"
                                data-mname="<?= $row['middlename'] ?>" data-lname="<?= $row['lastname'] ?>"
                                data-age="<?= $row['age'] ?>" data-gender="<?= $row['gender'] ?>"
                                data-houseNo="<?= $row['house-no'] ?>" data-street="<?= $row['street'] ?>"
                                data-subdivision="<?= $row['subdivision'] ?>" data-dbirth="<?= $row['date-of-birth'] ?>"
                                data-pbirth="<?= $row['place-of-birth'] ?>" data-cstatus="<?= $row['civil-status'] ?>"
                                data-occupation="<?= $row['occupation'] ?>" data-email="<?= $row['email'] ?>"
                                data-contactNo="<?= $row['contact-no'] ?>" data-vstatus="<?= $row['voter-status'] ?>"
                                data-identified="<?= $row['identified'] ?>" data-sector="<?= $row['sector'] ?>"
                                data-citizenship="<?= $row['citizenship'] ?>"
                                data-householdNo="<?= $row['household-no'] ?>" data-osy="<?= $row['osy'] ?>"
                                data-pwd="<?= $row['pwd'] ?>" data-mfname="<?= $row['mother-firstname'] ?>"
                                data-mmname="<?= $row['mother-middlename'] ?>"
                                data-mlname="<?= $row['mother-lastname'] ?>" data-mage="<?= $row['mother-age'] ?>"
                                data-mhouseNo="<?= $row['mother-house-no'] ?>"
                                data-mstreet="<?= $row['mother-street'] ?>"
                                data-msubdivision="<?= $row['mother-subdivision'] ?>"
                                data-mhouseholdNo="<?= $row['mother-household-head'] ?>"
                                data-ffname="<?= $row['father-firstname'] ?>"
                                data-fmname="<?= $row['father-middlename'] ?>"
                                data-flname="<?= $row['father-lastname'] ?>" data-fage="<?= $row['father-age'] ?>"
                                data-fhouseNo="<?= $row['father-house-no'] ?>"
                                data-fstreet="<?= $row['father-street'] ?>"
                                data-fsubdivision="<?= $row['father-subdivision'] ?>"
                                data-fhouseholdNo="<?= $row['father-household-head'] ?>">Edit</a>
                            <a href="./model/print_resident.php" class="print">Print</a>
                            <a href="#" class="accountBtn" onclick="createAccount(this)"
                                data-fname="<?= $row['firstname'] ?>" data-mname="<?= $row['middlename'] ?>"
                                data-lname="<?= $row['lastname'] ?>" data-age="<?= $row['age'] ?>"
                                data-gender="<?= $row['gender'] ?>" data-street="<?= $row['street'] ?>"
                                data-cstatus="<?= $row['civil-status'] ?>" data-dbirth="<?= $row['date-of-birth'] ?>"
                                data-email="<?= $row['email'] ?>">Account</a>
                            <a href="./model/remove_resident.php?id=<?= $row['id'] ?>" class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
                <!-- Add more rows here -->
            </table>
        </div>
    </div>










    <!-- START ADD RESIDENTS -->
    <div class="modal-AddResidents">
        <form class="form1" action="./model/add_resident.php" method="POST">
            <div class="title-cont">
                <p>New Resident Registration Form</p>
                <img src="icons/close 1.png" class="closeBtnAdd" alt="">
            </div>
            <div class="unang-layer">
                <div class="input-wrapper">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname1" name="firstname" required>
                </div>

                <div class="input-wrapper">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" id="middlename1" name="middlename" required>
                </div>

                <div class="input-wrapper">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname1" name="lastname" required>
                </div>

                <div class="input-wrapper">
                    <label for="age">Age:</label>
                    <input type="number" id="age1" name="age" required>
                </div>

                <div class="input-wrapper">
                    <label for="gender">Gender:</label>
                    <select id="gender1" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="pangalawang-layer">
                <div class="input-wrapper1">
                    <label for="address">Address:</label><br>
                    <div class="address-cont">
                        <!-- <label for="house-no">House No.:</label> -->
                        <input type="text" id="house-no1" name="house-no" placeholder="House no." required><br>

                        <!-- <label for="street">Street:</label> -->
                        <input type="text" id="street1" name="street" placeholder="Street" required><br>

                        <!-- <label for="subdivision">Subdivision:</label> -->
                        <input type="text" id="subdivision1" name="subdivision" placeholder="Subdivision" required>
                    </div>
                </div>

                <div class="input-wrapper1">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob1" name="dob" required>
                </div>

                <div class="input-wrapper1">
                    <label for="place-of-birth">Place of Birth:</label>
                    <input type="text" id="place-of-birth1" name="place-of-birth" required>
                </div>

                <div class="input-wrapper1">
                    <label for="civil-status">Civil Status:</label>
                    <select id="civil-status1" name="civil-status" required>
                        <option value="">Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
            </div>

            <div class="pangatlong-layer">
                <div class="input-wrapper">
                    <label for="occupation">Occupation:</label>
                    <input type="text" id="occupation1" name="occupation" required>
                </div>

                <div class="input-wrapper">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email1" name="email" required>
                </div>

                <div class="input-wrapper">
                    <label for="contact-no">Contact No.:</label>
                    <input type="tel" id="contact-no1" name="contact-no" required>
                </div>

                <div class="input-wrapper">
                    <label for="voter-status">Voter Status:</label>
                    <select id="voter-status1" name="voter-status" required>
                        <option value="">Select Voter Status</option>
                        <option value="voter">Voter</option>
                        <option value="non-voter">Non-voter</option>
                    </select>
                </div>

                <div class="input-wrapper">
                    <label for="identified">Identified as:</label>
                    <select id="identified1" name="identified" required>
                        <option value="">Select Sector</option>
                        <option value="Positive">Positive</option>
                        <option value="Negative">Negative</option>
                    </select>
                </div>
            </div>

            <div class="pangapat-layer">
                <div class="input-wrapper">
                    <label for="sector">Sector:</label>
                    <select id="sector1" name="sector" required>
                        <option value="">Select Sector</option>
                        <option value="Student">Student</option>
                        <option value="Senior Citizen">Senior Citizen</option>
                    </select>
                </div>

                <div class="input-wrapper">
                    <label for="citizenship">Citizenship:</label>
                    <input type="text" id="citizenship1" name="citizenship" required>
                </div>

                <div class="input-wrapper">
                    <label for="household-no">Household No.:</label>
                    <input type="text" id="household-no1" name="household-no" required>
                </div>

                <div class="checkbox-cont">
                    <div class="input-wrapper">
                        <div class="check1">
                            <input type="checkbox" id="out-of-school-youth1" value="OSY" name="out-of-school-youth">
                            <label for="out-of-school-youth">Out of School Youth:</label>
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <div class="check2">
                            <input type="checkbox" id="person-with-disability1" value="PWD"
                                name="person-with-disability">
                            <label for="person-with-disability">Person with Disability:</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of div -->

            <div class="parent-info">
                <h3>Parents Information</h3>
                <p>Mother</p>
                <div class="mother-cont">
                    <div class="input-wrapper">
                        <label for="mother-firstname">First Name:</label>
                        <input type="text" id="mother-firstname1" name="mother-firstname" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="mother-middlename">Middle Name:</label>
                        <input type="text" id="mother-middlename1" name="mother-middlename" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="mother-lastname">Last Name:</label>
                        <input type="text" id="mother-lastname1" name="mother-lastname" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="mother-age">Age:</label>
                        <input type="number" id="mother-age1" name="mother-age" required>
                    </div>
                </div>
                <!-- mother-cont end -->

                <div class="mother-cont2">
                    <div class="input-wrapper">
                        <label for="mother-address">Address:</label><br>
                        <div class="address-cont">
                            <input type="text" id="mother-house-no1" name="mother-house-no" placeholder="House No."
                                required><br>
                            <input type="text" id="mother-street1" name="mother-street" placeholder="Street"
                                required><br>
                            <input type="text" id="mother-subdivision1" name="mother-subdivision"
                                placeholder="Subdivision" required>
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <div class="checkbox-household">
                            <input type="checkbox" id="mother-household-head1" value="household-head"
                                name="mhousehold-head">
                            <label for="household-head">Household Head</label>
                        </div>
                    </div>
                    <!-- checkboxhousehold end -->
                </div>
                <!-- mother-cont2 end -->


                <p>Father</p>
                <div class="father-cont">
                    <div class="input-wrapper">
                        <label for="father-firstname">First Name:</label>
                        <input type="text" id="father-firstname1" name="father-firstname" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="father-middlename">Middle Name:</label>
                        <input type="text" id="father-middlename1" name="father-middlename" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="father-lastname">Last Name:</label>
                        <input type="text" id="father-lastname1" name="father-lastname" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="father-age">Age:</label>
                        <input type="number" id="father-age1" name="father-age" required>
                    </div>
                </div>
                <!-- father-cont end -->

                <div class="father-cont2">
                    <div class="input-wrapper">
                        <label for="father-address">Address:</label><br>
                        <div class="address-cont">
                            <input type="text" id="father-house-no1" name="father-house-no" placeholder="House No."
                                required><br>
                            <input type="text" id="father-street1" name="father-street" placeholder="Street"
                                required><br>
                            <input type="text" id="father-subdivision1" name="father-subdivision"
                                placeholder="Subdivision" required>
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <div class="checkbox-household1">
                            <input type="checkbox" id="father-household-head1" value="household-head"
                                name="fhousehold-head">
                            <label for="household-head1">Household Head</label>
                        </div>
                    </div>
                    <!-- checkboxhousehold end -->
                </div>
                <!-- father-cont2 end -->


            </div>
            <!-- End of parent div -->
            <!-- END ADD RESIDENTS -->
            <input class="submit" type="submit" value="Create">
        </form>

    </div>








    <!-- START EDIT RESIDENTS -->
    <div class="modal-editResidents">
        <form class="form1" action="./model/edit_resident.php" method="POST">
            <div class="title-cont">
                <p>Edit Resident Registration Form</p>
                <img src="icons/close 1.png" class="closeBtnEdit" alt="">
            </div>
            <div class="unang-layer">
                <div class="input-wrapper">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>

                <div class="input-wrapper">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" id="middlename" name="middlename" required>
                </div>

                <div class="input-wrapper">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>

                <div class="input-wrapper">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>

                <div class="input-wrapper">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="pangalawang-layer">
                <div class="input-wrapper1">
                    <label for="address">Address:</label><br>
                    <div class="address-cont">
                        <!-- <label for="house-no">House No.:</label> -->
                        <input type="text" id="house-no" name="house-no" placeholder="House no." required><br>

                        <!-- <label for="street">Street:</label> -->
                        <input type="text" id="street" name="street" placeholder="Street" required><br>

                        <!-- <label for="subdivision">Subdivision:</label> -->
                        <input type="text" id="subdivision" name="subdivision" placeholder="Subdivision" required>
                    </div>
                </div>

                <div class="input-wrapper1">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="input-wrapper1">
                    <label for="place-of-birth">Place of Birth:</label>
                    <input type="text" id="place-of-birth" name="place-of-birth" required>
                </div>

                <div class="input-wrapper1">
                    <label for="civil-status">Civil Status:</label>
                    <select id="civil-status" name="civil-status" required>
                        <option value="">Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
            </div>

            <div class="pangatlong-layer">
                <div class="input-wrapper">
                    <label for="occupation">Occupation:</label>
                    <input type="text" id="occupation" name="occupation" required>
                </div>

                <div class="input-wrapper">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-wrapper">
                    <label for="contact-no">Contact No.:</label>
                    <input type="tel" id="contact-no" name="contact-no" required>
                </div>

                <div class="input-wrapper">
                    <label for="voter-status">Voter Status:</label>
                    <select id="voter-status" name="voter-status" required>
                        <option value="">Select Voter Status</option>
                        <option value="voter">Voter</option>
                        <option value="non-voter">Non-voter</option>
                    </select>
                </div>

                <div class="input-wrapper">
                    <label for="identified">Identified as:</label>
                    <select id="identified" name="identified" required>
                        <option value="">Select Sector</option>
                        <option value="Positive">Positive</option>
                        <option value="Negative">Negative</option>
                    </select>
                </div>
            </div>

            <div class="pangapat-layer">
                <div class="input-wrapper">
                    <label for="sector">Sector:</label>
                    <select id="sector" name="sector" required>
                        <option value="">Select Sector</option>
                        <option value="Student">Student</option>
                        <option value="Senior Citizen">Senior Citizen</option>
                    </select>
                </div>

                <div class="input-wrapper">
                    <label for="citizenship">Citizenship:</label>
                    <input type="text" id="citizenship" name="citizenship" required>
                </div>

                <div class="input-wrapper">
                    <label for="household-no">Household No.:</label>
                    <input type="text" id="household-no" name="household-no" required>
                </div>

                <div class="checkbox-cont">
                    <div class="input-wrapper">
                        <div class="check1">
                            <input type="checkbox" id="out-of-school-youth" value="OSY" name="out-of-school-youth">
                            <label for="out-of-school-youth">Out of School Youth:</label>
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <div class="check2">
                            <input type="checkbox" id="person-with-disability" value="PWD"
                                name="person-with-disability">
                            <label for="person-with-disability">Person with Disability:</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of div -->

            <div class="parent-info">
                <h3>Parents Information</h3>
                <p>Mother</p>
                <div class="mother-cont">
                    <div class="input-wrapper">
                        <label for="mother-firstname">First Name:</label>
                        <input type="text" id="mother-firstname" name="mother-firstname" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="mother-middlename">Middle Name:</label>
                        <input type="text" id="mother-middlename" name="mother-middlename" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="mother-lastname">Last Name:</label>
                        <input type="text" id="mother-lastname" name="mother-lastname" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="mother-age">Age:</label>
                        <input type="number" id="mother-age" name="mother-age" required>
                    </div>
                </div>
                <!-- mother-cont end -->

                <div class="mother-cont2">
                    <div class="input-wrapper">
                        <label for="mother-address">Address:</label><br>
                        <div class="address-cont">
                            <input type="text" id="mother-house-no" name="mother-house-no" placeholder="House No."
                                required><br>
                            <input type="text" id="mother-street" name="mother-street" placeholder="Street"
                                required><br>
                            <input type="text" id="mother-subdivision" name="mother-subdivision"
                                placeholder="Subdivision" required>
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <div class="checkbox-household">
                            <input type="checkbox" id="mother-household-head" value="household-head"
                                name="mhousehold-head">
                            <label for="mother-household-head">Household Head</label>
                        </div>
                    </div>
                    <!-- checkboxhousehold end -->
                </div>
                <!-- mother-cont2 end -->


                <p>Father</p>
                <div class="father-cont">
                    <div class="input-wrapper">
                        <label for="father-firstname">First Name:</label>
                        <input type="text" id="father-firstname" name="father-firstname" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="father-middlename">Middle Name:</label>
                        <input type="text" id="father-middlename" name="father-middlename" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="father-lastname">Last Name:</label>
                        <input type="text" id="father-lastname" name="father-lastname" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="father-age">Age:</label>
                        <input type="number" id="father-age" name="father-age" required>
                    </div>
                </div>
                <!-- father-cont end -->

                <div class="father-cont2">
                    <div class="input-wrapper">
                        <label for="father-address">Address:</label><br>
                        <div class="address-cont">
                            <input type="text" id="father-house-no" name="father-house-no" placeholder="House No."
                                required><br>
                            <input type="text" id="father-street" name="father-street" placeholder="Street"
                                required><br>
                            <input type="text" id="father-subdivision" name="father-subdivision"
                                placeholder="Subdivision" required>
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <div class="checkbox-household1">
                            <input type="checkbox" id="father-household-head" value="household-head"
                                name="fhousehold-head">
                            <label for="father-household-head1">Household Head</label>
                        </div>
                    </div>
                    <!-- checkboxhousehold end -->
                </div>
                <!-- father-cont2 end -->


            </div>
            <!-- End of parent div -->
            <!-- END EDIT RESIDENTS -->
            <input type="hidden" name="id" id="id">
            <input class="submit" type="submit" value="Create">
        </form>

    </div>


    <!-- UPDATE INFO -->
    <div class="modal-b-info">
        <form class="form-b-info" action="./model/update_brgy_information.php" enctype="multipart/form-data"
            method="post">
            <div class="header-cont">
                <p>Update Barangay Information</p>
                <img src="icons/close 1.png" class="closemo" alt="">
            </div>

            <div class="input-cont">
                <div class="left-cont">
                    <label for="province_name">Province Name:</label>
                    <input type="text" name="province_name" id="province_name" value="<?=$province_name ?>">

                    <label for="b_name">Barangay Name:</label>
                    <input type="text" name="b_name" id="b_name" value="<?= $brgy_name ?>">

                    <label for="municipality_logo">Municipality Logo:</label>
                    <img src="uploads/<?= $municipality_logo ?>" id="preview" alt="<?= $municipality_logo ?>">
                    <input type="file" name="municipality_logo">
                </div>

                <div class="right-cont">
                    <label for="town_name">Town Name:</label>
                    <input type="text" name="town_name" id="town_name" value="<?= $town_name ?>">

                    <label for="tel_no">Tel No.:</label>
                    <input type="text" name="tel_no" id="tel_no" value="<?= $tel_no ?>">

                    <label for="barangay_logo">Barangay Logo:</label>
                    <img src="uploads/<?= $brgy_logo ?>" id="preview" alt="<?= $brgy_logo ?>">
                    <input type="file" name="barangay_logo" id="barangay_logo">
                </div>
            </div>
            <input class="UpdateInfo" type="submit" value="Update">
        </form>
    </div>

</body>

</html>

<script src="./js//jQuery-3.7.0.js"></script>
<script src="./js//app.js"></script>
<script>
// ADD RESIDENTSw
const addLink = document.getElementById('add');
const modalAdd = document.querySelector('.modal-AddResidents');
const closeButtonAdd = document.querySelector('.closeBtnAdd');

addLink.addEventListener('click', function(event) {
    event.preventDefault();
    modalAdd.style.display = 'block';
});

closeButtonAdd.addEventListener('click', function() {
    modalAdd.style.display = 'none';
});


const editResidentsLink = document.querySelectorAll('.edit');
const modalEdit = document.querySelector('.modal-editResidents');
const closeButtonEdit = document.querySelector('.closeBtnEdit');

// EDIT RESIDENTS
editResidentsLink.forEach(edit => {
    edit.addEventListener('click', function(event) {
        event.preventDefault();
        modalEdit.style.display = 'block';
        console.log("log")
    });
})

closeButtonEdit.addEventListener('click', function() {
    modalEdit.style.display = 'none';
});

//js update info
const bInfo = document.getElementById('b-info');
const modalInfo = document.querySelector('.modal-b-info');
const closemo = document.querySelector('.closemo');

bInfo.addEventListener('click', function(event) {
    event.preventDefault();
    modalInfo.style.display = 'block';
});

closemo.addEventListener('click', function() {
    modalInfo.style.display = 'none';
});
</script>