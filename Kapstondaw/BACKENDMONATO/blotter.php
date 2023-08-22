<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tblblotter";
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
    <title>Blotter Reports</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
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
            <p>Blotter</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="addBlotter" id="addBlotter">+ Blotter</a>
            </div>
        </div>

        <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>"
            role="alert">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Complainant</th>
                        <th>Respondent</th>
                        <th>Victim(s)</th>
                        <th>Blotter/Incident</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $row['complainant']?></td>
                        <td><?= $row['respondent']?></td>
                        <td><?= $row['victim'] ?></td>
                        <td><?= $row['type'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editBlotter" onclick="editBlotter(this)"
                                data-id="<?= $row['id'] ?>" data-complainant="<?= $row['complainant'] ?>"
                                data-respondent="<?= $row['respondent'] ?>" data-victim="<?= $row['victim'] ?>"
                                data-type="<?= $row['type'] ?>" data-location="<?= $row['location'] ?>"
                                data-date="<?= $row['date'] ?>" data-time="<?= $row['time'] ?>"
                                data-details="<?= $row['details'] ?>" data-status="<?= $row['status'] ?>">Edit</a>
                            <a href="./model/print_blotter.php?id=<?= $row['id']?>" class="print">Print</a>
                            <a href="./model/remove_blotter.php?id=<?= $row['id']?>" class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
                <!-- Add more rows here -->
            </table>

            <!-- <div class="pagination">
        <button class="previous" onclick="showPreviousTable()">&lt; Previous</button>
        <span id="pageNumber">1</span>
        <button class="next" onclick="showNextTable()">Next &gt;</button>
      </div> -->
        </div>
    </div>

    <!-- START ADD Blotter -->
    <div class="modal-AddBlotter">
        <form class="form2Blotter" action="./model/add_blotter.php" method="POST">
            <div class="title-cont">
                <p>Blotter Form</p>
                <img src="icons/close 1.png" class="closeBtnAdd" alt="">
            </div>

            <div class="hanggang-apatBlotter">
                <div class="unang-layerBlotter">
                    <label for="complainant">Complainant</label>
                    <input id="complanantBlotter" type="text" name="complainant" required>

                    <label for="respondent">Repondent</label>
                    <input id="respondenttBlotter" type="text" name="respondent" required>

                </div>

                <div class="pangalawang-layerBlotter">
                    <label for="time">Time</label>
                    <input id="timeBlotter" type="time" name="time" required>

                    <label for="type">Type</label>
                    <select id="typeBlotter" name="type" required>
                        <option value="">Select Type</option>
                        <option value="amicable">Amicable</option>
                        <option value="incident">Incident</option>
                    </select>
                </div>

                <div class="pangatlong-layerBlotter">
                    <label for="victim">Victim</label>
                    <input id="victimBlotter" type="text" name="victim" required>

                    <label for="location">Location</label>
                    <input id="locationBlotter" type="text" name="location" required>
                </div>

                <div class="pangapat-layerBlotter">
                    <label for="date">Date</label>
                    <input id="dateBlotter" type="date" name="date" required>

                    <label for="status">Status</label>
                    <select id="statusBlotter" name="status" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="scheduled">Scheduled</option>
                    </select>
                </div>
            </div>

            <div class="panglima-layerBlotter">
                <label class="detailstext" for="occupation">Details:</label>
                <textarea id="detailsBlotter" name="details" cols="4" rows="50" required></textarea>
            </div>

            <input class="submitBlotter" type="submit" value="Create">
        </form>
    </div>
    <!-- END ADD Blotter -->





    <!-- START EDIT Blotter -->
    <div class="modal-editBlotter">
        <form class="form2Blotter" action="./model/edit_blotter.php" method="POST">
            <div class="title-cont">
                <p>Blotter Form</p>
                <img src="icons/close 1.png" class="closeBtnEdit" alt="">
            </div>

            <div class="hanggang-apatBlotter">
                <div class="unang-layerBlotter">
                    <label for="complainant">Complainant</label>
                    <input id="complanantBlotter1" type="text" name="complainant" required>

                    <label for="respondent">Repondent</label>
                    <input id="respondenttBlotter1" type="text" name="respondent" required>

                </div>

                <div class="pangalawang-layerBlotter">
                    <label for="time">Time</label>
                    <input id="timeBlotter1" step="any" type="time" name="time" required>

                    <label for="type">Type</label>
                    <select id="typeBlotter1" name="type" required>
                        <option value="">Select Type</option>
                        <option value="amicable">Amicable</option>
                        <option value="incident">Incident</option>
                    </select>
                </div>

                <div class="pangatlong-layerBlotter">
                    <label for="victim">Victim</label>
                    <input id="victimBlotter1" type="text" name="victim" required>

                    <label for="location">Location</label>
                    <input id="locationBlotter1" type="text" name="location" required>
                </div>

                <div class="pangapat-layerBlotter">
                    <label for="date">Date</label>
                    <input id="dateBlotter1" type="date" name="date" required>

                    <label for="status">Status</label>
                    <select id="statusBlotter1" name="status" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="settled">Settled</option>
                    </select>
                </div>
            </div>

            <div class="panglima-layerBlotter">
                <label class="detailstext" for="occupation">Details:</label>
                <textarea id="detailsBlotter1" name="details" cols="4" rows="50" required></textarea>
            </div>

            <input type="hidden" name="blotter_id" id="blotter_id">
            <input class="submitBlotter" type="submit" value="Create">
        </form>
    </div>
    <!-- END EDIT Blotter -->

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
    const addBlotterLink = document.getElementById('addBlotter');
    const modal = document.querySelector('.modal-AddBlotter');
    const closeButton = document.querySelector('.closeBtnAdd');

    addBlotterLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // editblotter
    const editBlotterLink = document.querySelectorAll('.edit');
    const modalEdit = document.querySelector('.modal-editBlotter');
    const closeButtonEdit = document.querySelector('.closeBtnEdit');


    editBlotterLink.forEach(edit => {
        edit.addEventListener("click", (e) => {
            e.preventDefault();
            modalEdit.style.display = 'block'
        })
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
</body>

</html>