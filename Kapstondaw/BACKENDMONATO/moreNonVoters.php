<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Non Voters</title>
    <link rel="stylesheet" href="moreInfo.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <script src="sidebar.js"></script>
</head>

<body>

    <!-- HEADER -->
    <div class="container">
        <div class="layer1">
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
            <a href="./backup/backup.php" class="backup">Backup</a>
            <a href="restore" class="restore">Restore</a>
            <a href="request.php" class="request">Requested Documents</a>
        </div>
    </div>

    <div class="home_residents">
        <div class="first_layer">
            <p>Total Non Voters</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
        </div>

        <div class="third_layer">
            <div class="NonVoters">
                <div class="text-cont">
                    <p class="text">All Non-Voters</p>
                    <p class="number">15,000</p>
                </div>
                <img src="icons/people.png" alt="">
            </div>
        </div>

        <div class="fourth_layer">
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
                            <?php 
                                $userExists = false;
                                foreach($users as $user) {
                                    if ($user['firstname'] === $row['firstname'] && $user['lastname'] === $row['lastname']) {
                                        $userExists = true;
                                        break;
                                    }
                                }
                            ?>
                            <?php if(!$userExists) { ?>
                            <a href="#" class="accountBtn" onclick="createAccount(this)"
                                data-fname="<?= $row['firstname'] ?>" data-mname="<?= $row['middlename'] ?>"
                                data-lname="<?= $row['lastname'] ?>" data-age="<?= $row['age'] ?>"
                                data-gender="<?= $row['gender'] ?>" data-street="<?= $row['street'] ?>"
                                data-cstatus="<?= $row['civil-status'] ?>" data-dbirth="<?= $row['date-of-birth'] ?>"
                                data-email="<?= $row['email'] ?>">Account</a>
                            <?php } ?>
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
</body>

</html>