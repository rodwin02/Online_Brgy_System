<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_idform";
$result = $conn->query($query);

$idForm = array();
while($row = $result->fetch_assoc()) {
  $idForm[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Form</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="modal.css ?<?php echo time(); ?>">

    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>


</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>ID Form</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="add" id="addIdForm">+ ID Form</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Place of Birth</th>
                        <th>Birth Date</th>
                        <th>Civil Status</th>
                        <th>Contact Number</th>
                        <th>Document For</th>
                        <th>Purpose</th>
                        <th>Date Requested</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($idForm)) { ?>
                    <?php $no=1; foreach($idForm as $row): ?>
                    <tr>
                        <td><?= $row['firstname'] ?> <?= $row['middlename']?> <?= $row['lastname']?></td>
                        <td><?= $row['address']?></td>
                        <td><?= $row['place-of-birth']?></td>
                        <td><?= $row['birth-date']?></td>
                        <td><?= $row['civil-status']?></td>
                        <td><?= $row['contact-number']?></td>
                        <td><?= $row['documentFor'] ?></td>
                        <td><?= $row['purpose'] ?></td>
                        <td><?= $row['date-requested'] ?></td>
                        <td>
                            <?php if($row['documentFor'] === 'Self') { ?>
                            <a href="./generate/idForm_generate.php?id=<?= $row['id'] ?>" class="print">Print</a>
                            <?php } 
                    else { ?>
                            <a href="./generate/idForm_generate.php?id=<?= $row['id'] ?>" class="print">Print</a>
                            <?php } ?>
                            <a href="./model/remove/remove_idForm.php?id=<?= $row['id'] ?>" class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-addIdForm">
        <form class="formIdForm" action="./model/add_idForm.php" method="post">
            <div class="title-cont-modal">
                <p>ID Form</p>
                <img src="icons/close 1.png" class="closeIdForm" alt="">
            </div>

            <div class="modal-layer1">
                <label for="fullname">Firstname:</label>
                <input type="text" id="firstname" name="firstname">

                <label for="middlename">Middlename:</label>
                <input type="text" id="middlename" name="middlename">

                <label for="lastname">Lastname:</label>
                <input type="text" id="lastname" name="lastname">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address">

                <label for="pob">Place of Birth:</label>
                <input type="text" id="pob" name="pob">

                <label for="birthDate">Birth Date:</label>
                <input type="text" id="birthDate" name="birthDate">

                <label for="civilStatus">Civil Status:</label>
                <input type="text" id="civilStatus" name="civilStatus">

                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact">

                <label for="documentFor">Document For:</label>
                <select name="documentFor" id="documentFor">
                    <option value="Self">Forself</option>
                    <option value="Someone">Forsomeone</option>
                </select>

                <label for="purpose">Purpose:</label>
                <input type="text" id="purpose" name="purpose">

                <label for="dateRequest">Date Requested:</label>
                <input type="date" id="dateRequest" name="dateRequested">

            </div>
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



    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    const addIdFormLink = document.getElementById('addIdForm');
    const modaladd = document.querySelector('.modal-addIdForm');
    const closeIdForm = document.querySelector('.closeIdForm');

    addIdFormLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaladd.style.display = 'block';
    });

    closeIdForm.addEventListener('click', function() {
        modaladd.style.display = 'none';
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