<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tblawareness";
$result = $conn->query($query);

$awareness = array();
while($row = $result->fetch_assoc()) {
  $awareness[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awereness Report</title>
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
            <p>Awareness</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="addAwareness" id="addAwareness">+ Awareness</a>
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
                        <th>Details</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($awareness)) { ?>
                    <?php $no=1; foreach($awareness as $row): ?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['details']?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['time'] ?></td>
                        <td><?= $row['location'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editAwareness" onclick="editAwareness(this)"
                                data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>"
                                data-date="<?= $row['date'] ?>" data-time="<?= $row['time'] ?>"
                                data-location="<?= $row['location'] ?>" data-details="<?= $row['details'] ?>"
                                data-status="<?= $row['status'] ?>">Edit</a>
                            <a href="./model/print_awareness.php" class="print">Print</a>
                            <a href="./model/remove_awareness.php?id=<?= $row['id']?>" class="delete">Delete</a>
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

    <!-- ADD AWARENESS -->
    <div class="modal-AddAwareness">
        <form class="form2Awareness" action="./model/add_awareness.php" method="POST">
            <div class="title-cont">
                <p class="title-name">Awareness</p>
                <img src="icons/close 1.png" class="closeBtnAdd" alt="">
            </div>

            <div class="unang-layer-to">
                <!-- Dito nakalagay yung date,time, and location based dun sa nireport nya front end  -->
                <div class="unang-left">
                    <label for="name">Complainant:</label>
                    <input id="fullnameAwareness" type="text" name="name">

                    <label for="time">Time:</label>
                    <input id="timeAwareness" type="time" name="time">
                </div>
                <div class="unang-right">
                    <label for="date">Date:</label>
                    <input id="dateAwareness" type="date" name="date">

                    <label for="location">Location:</label>
                    <input id="locationAwareness" type="text" name="location">
                </div>
            </div>

            <div class="pangalawang-layer-to">
                <label class="detailstext1" for="occupation">Details:</label>
                <textarea id="detailAwareness" name="details_awareness" cols="100" rows="10" required></textarea>
            </div>

            <div class="pangatlong-layer-to">
                <label for="statusAwareness">Status</label>
                <select id="statusAwareness" name="status_awareness" required>
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="schedule">Schedule</option>
                </select>
            </div>

            <input class="submitAwareness" type="submit" value="Create">
        </form>
    </div>
    <!-- END ADD Awareness -->

    <!-- EDIT AWARENESS -->
    <div class="modal-editAwareness">
        <form class="form2Awareness" action="./model/edit_awareness.php" method="POST">
            <div class="title-cont">
                <p class="title-name">Awareness</p>
                <img src="icons/close 1.png" class="closeBtnEdit" alt="">
            </div>

            <div class="unang-layer-to">
                <!-- Dito nakalagay yung date,time, and location based dun sa nireport nya front end  -->
                <div class="unang-left">
                    <label for="name">Complainant:</label>
                    <input id="fullnameAwareness1" type="text" name="name">

                    <label for="time">Time:</label>
                    <input id="timeAwareness1" step="any" type="time" name="time">
                </div>
                <div class="unang-right">
                    <label for="date">Date:</label>
                    <input id="dateAwareness1" type="date" name="date">

                    <label for="location">Location:</label>
                    <input id="locationAwareness1" type="text" name="location">
                </div>
            </div>

            <div class="pangalawang-layer-to">
                <label class="detailstext1" for="occupation">Details:</label>
                <textarea id="detailAwareness1" name="details_awareness" cols="100" rows="10" required></textarea>
            </div>

            <div class="pangatlong-layer-to">
                <label for="statusAwareness">Status</label>
                <select id="statusAwareness1" name="statusAwareness" required>
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="schedule">Schedule</option>
                    <option value="settled">Settled</option>
                </select>
            </div>

            <input type="hidden" name="id" id="awareness_id">
            <input class="submitAwareness" name="awareness" type="submit" value="Create">
        </form>
    </div>
    <!-- END EDIT Awareness -->


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
    <script src="./js//app.js"></script>
    <script>
    const addAwarenessLink = document.getElementById('addAwareness');
    const modalAdd = document.querySelector('.modal-AddAwareness');
    const closeButtonAdd = document.querySelector('.closeBtnAdd');

    addAwarenessLink.addEventListener('click', function(event) {
        event.preventDefault();
        modalAdd.style.display = 'block';
    });

    closeButtonAdd.addEventListener('click', function() {
        modalAdd.style.display = 'none';
    });

    // editblotter
    const editAwarenessLink = document.querySelectorAll('.edit');
    const modalEdit = document.querySelector('.modal-editAwareness');
    const closeButtonEdit = document.querySelector('.closeBtnEdit');

    editAwarenessLink.forEach(edit => {
        edit.addEventListener("click", () => {
            modalEdit.style.display = "block"
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