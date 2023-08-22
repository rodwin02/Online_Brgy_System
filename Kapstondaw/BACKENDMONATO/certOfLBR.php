<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_certoflbr";
$result = $conn->query($query);

$certoflbr = array();
while($row = $result->fetch_assoc()) {
  $certoflbr[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Late Birth Registration</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="modal.css ?<?php echo time(); ?>">
    <script src="sidebar.js"></script>

</head>

<body>
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
            <a href="restore" class="restore">Restore</a>
            <a href="request.php" class="request">Requested Documents</a>
        </div>
    </div>

    <div class="home_residents">
        <div class="first_layer">
            <p>Certificate of Late Birth Registration</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="add" id="addlbr_forself">+ Forself</a>
                <a href="#" class="add" id="addlbr_forsingleparent">+ Single parent</a>
                <a href="#" class="add" id="addlbr_fortheirchild">+ Their child</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Name of Applicant</th>
                        <th>Name of Requestor</th>
                        <th>Name of Parent</th>
                        <th>Name of Father</th>
                        <th>Name of Mother</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Date Requested</th>
                        <th>Document For</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($certoflbr)) { ?>
                    <?php $no=1; foreach($certoflbr as $row): ?>
                    <tr>
                        <td><?= $row['name-of-applicant'] ?></td>
                        <td><?= $row['name-of-requestor'] ?></td>
                        <td><?= $row['name-of-parent'] ?></td>
                        <td><?= $row['name-of-father'] ?></td>
                        <td><?= $row['name-of-mother'] ?></td>
                        <td><?= $row['date-of-birth'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['date-requested'] ?></td>
                        <td><?= $row['documentFor'] ?></td>
                        <td>
                            <?php if($row['documentFor'] === 'self') { ?>
                            <a href="./generate/certOfLBR_generate_forself.php?id=<?= $row['id'] ?>"
                                class="print">Print</a>
                            <?php }
                elseif ($row['documentFor'] === 'children') { ?>
                            <a href="./generate/certOfLBR_generate_fortheirchild.php?id=<?= $row['id'] ?>"
                                class="print">Print</a>
                            <?php } else {?>
                            <a href="./generate/certOfLBR_generate_forsingleparent.php?id=<?= $row['id'] ?>"
                                class="print">Print</a>
                            <?php } ?>
                            <a href="./model/remove_certOfLBR.php?id=<?= $row['id'] ?>" class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-addlbr_forself">
        <form class="formlbr_forself" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Self</p>
                <img src="icons/close 1.png" class="closeForm_forself" alt="">
            </div>

            <div class="modal-layer1">
                <label for="applicant">Name of Applicant:</label>
                <input type="text" id="applicant" name="applicant">

                <label for="father">Name of Father:</label>
                <input type="text" id="father" name="father">

                <label for="mother">Name of Mother:</label>
                <input type="text" id="mother" name="mother">

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address">

            </div>
            <input type="hidden" name="documentFor" value="self">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>

    <div class="modal-addlbr_forsingleparent">
        <form class="formlbr_forsingleparent" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Single Parent</p>
                <img src="icons/close 1.png" class="closeForm_forsingleparent" alt="">
            </div>

            <div class="modal-layer1">
                <label for="requestor">Name of Requestor:</label>
                <input type="text" id="requestor" name="requestor">

                <label for="parent">Name of Parent:</label>
                <input type="text" id="parent" name="parent">

                <label for="father/mother">Name of Father/Mother:</label>
                <input type="text" id="father/mother" name="father-or-mother">

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob">

                <label for="address">Address:</label>
                <input type="text" id="address1" name="address">

            </div>
            <input type="hidden" name="documentFor" value="single parent">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>


    <div class="modal-addlbr_fortheirchild">
        <form class="formlbr_fortheirchild" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Their Child</p>
                <img src="icons/close 1.png" class="closeForm_fortheirchild" alt="">
            </div>

            <div class="modal-layer1">
                <label for="requestor1">Name of Requestor:</label>
                <input type="text" id="requestor1" name="requestor">

                <label for="father1">Name of Father:</label>
                <input type="text" id="father1" name="father">

                <label for="mother1">Name of Mother:</label>
                <input type="text" id="mother1" name="mother">

                <label for="dob1">Date of Birth:</label>
                <input type="date" id="dob1" name="dob">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address">

            </div>
            <input type="hidden" name="documentFor" value="children">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>

    <!-- UPDATE INFO -->
    <div class="modal-b-info">
        <form class="form-b-info" action="">
            <div class="header-cont">
                <p>Update Barangay Information</p>
                <img src="icons/close 1.png" class="closemo" alt="">
            </div>

            <div class="input-cont">
                <div class="left-cont">
                    <label for="province_name">Province Name:</label>
                    <input type="text" name="province_name" id="province_name">

                    <label for="b_name">Barangay Name:</label>
                    <input type="text" name="b_name" id="b_name">

                    <label for="municipality_logo">Municipality Logo:</label>
                    <img id="preview" alt="Preview">
                    <input type="file" name="municipality_logo">
                </div>

                <div class="right-cont">
                    <label for="town_name">Town Name:</label>
                    <input type="text" name="town_name" id="town_name">

                    <label for="tel_no">Tel No.:</label>
                    <input type="text" name="tel_no" id="tel_no">

                    <label for="barangay_logo">Barangay Logo:</label>
                    <img id="preview" alt="Preview">
                    <input type="file" name="barangay_logo" id="barangay_logo">
                </div>
            </div>
            <input class="UpdateInfo" type="submit" value="Update">
        </form>
    </div>


    <script src="./js/jQuery-3.7.0.js"></script>
    <script src="./js/app.js"></script>
    <script>
    const addlbrLink = document.getElementById('addlbr_forself');
    const modaladdlbr = document.querySelector('.modal-addlbr_forself');
    const closeForm = document.querySelector('.closeForm_forself');

    addlbrLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdlbr.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaladdlbr.style.display = 'none';
    });

    const addlbrLink1 = document.getElementById('addlbr_forsingleparent');
    const modaladdlbr1 = document.querySelector('.modal-addlbr_forsingleparent');
    const closeForm1 = document.querySelector('.closeForm_forsingleparent');

    addlbrLink1.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdlbr1.style.display = 'block';
    });

    closeForm1.addEventListener('click', function() {
        modaladdlbr1.style.display = 'none';
    });

    const addlbrLink2 = document.getElementById('addlbr_fortheirchild');
    const modaladdlbr2 = document.querySelector('.modal-addlbr_fortheirchild');
    const closeForm2 = document.querySelector('.closeForm_fortheirchild');

    addlbrLink2.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdlbr2.style.display = 'block';
    });

    closeForm2.addEventListener('click', function() {
        modaladdlbr2.style.display = 'none';
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
</body>

</html>