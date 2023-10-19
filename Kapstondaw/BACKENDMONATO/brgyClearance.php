<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_brgyClearance";
$result = $conn->query($query);

$brgyClearance = array();
while($row = $result->fetch_assoc()) {
  $brgyClearance[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Clearance</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">

    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="modal.css ?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include "./sidebar.php" ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Barangay Clearance</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="add" id="addbrgyClearance">+ Clearance</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Purpose</th>
                        <th>Date of Issue</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($brgyClearance)) { ?>
                    <?php $no=1; foreach($brgyClearance as $row): ?>
                    <tr>
                        <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['date-of-birth'] ?></td>
                        <td><?= $row['place-of-birth'] ?></td>
                        <td><?= $row['purpose'] ?></td>
                        <td><?= $row['date-issue'] ?></td>

                        <td>
                            <a class="edit" href="">Edit</a>
                            <a class="print" href="./generate/brgyClearance_generate.php?id=<?= $row['id'] ?>">Print</a>
                            <a href="./model/remove/remove_brgyClearance.php?id=<?= $row['id'] ?>"
                                class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-addBrgyClearance">
        <form class="formBrgyClearance" action="./model/add_brgyClearance.php" method="post">
            <div class="title-cont-modal">
                <p>Barangay Clearance</p>
                <img src="icons/close 1.png" class="closeForm" alt="">
            </div>

            <div class="modal-layer1">
                <label for="firstname">Firstname:</label>
                <input type="text" id="firstname" name="firstname">

                <label for="middlename">Middlename:</label>
                <input type="text" id="middlename" name="middlename">

                <label for="lastname">Lastname:</label>
                <input type="text" id="lastname" name="lastname">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address">

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob">

                <label for="pob">Place of Birth:</label>
                <input type="text" id="pob" name="pob">

                <label for="purpose">Purpose:</label>
                <input type="text" id="purpose" name="purpose">

                <label for="dateInput">Date Issue:</label>
                <input type="date" id="dateInput" name="dateInput">
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
    const addbrgyClearanceLink = document.getElementById('addbrgyClearance');
    const modaladdBrgyClearance = document.querySelector('.modal-addBrgyClearance');
    const closeForm = document.querySelector('.closeForm');

    addbrgyClearanceLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdBrgyClearance.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaladdBrgyClearance.style.display = 'none';
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