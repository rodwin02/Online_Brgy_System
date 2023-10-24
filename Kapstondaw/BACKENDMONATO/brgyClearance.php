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
                        <td><?= $row['applicant_fname'] ?> <?= $row['applicant_mname'] ?> <?= $row['applicant_lname'] ?>
                        </td>
                        <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                        <td><?= $row['date-of-birth'] ?></td>
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
    </script>
</body>

</html>