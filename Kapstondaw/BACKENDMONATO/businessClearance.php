<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_businessClearance";
$result = $conn->query($query);

$businessClearance = array();
while($row = $result->fetch_assoc()) {
$businessClearance[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Clearance</title>
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
            <p>Business Clearance</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="add" id="addClearance">+ Clearance</a>
                <a href="#" class="add" id="addClosure">+ Closure</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Business Name</th>
                        <th>Business Owner's Name</th>
                        <th>Business Address</th>
                        <th>Date Applied</th>
                        <th>Document For</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($businessClearance)) { ?>
                    <?php $no=1; foreach($businessClearance as $row): ?>
                    <tr>
                        <td><?= $row['business_name'] ?></td>
                        <td><?= $row['business_owner_fname']. ' ' .$row['business_owner_mname']. ' ' .$row['business_owner_lname'] ?>
                        </td>
                        <td><?= $row['business_address'] ?></td>
                        <td><?= $row['date_applied'] ?></td>
                        <td><?= $row['documentFor'] ?></td>
                        <td>
                            <a href="./generate/businessClearance_generate.php?id=<?= $row['id'] ?>"
                                class="print">Print</a>
                            <!-- <?php if($row['documentFor'] === 'clearance') { ?>
                            <a href="./generate/businessClearance_generate_forself.php?id=<?= $row['id'] ?>"
                                class="print">Print</a>
                            <?php } else {?>
                            <a href="./generate/businessClosure_generate_forsingleparent.php?id=<?= $row['id'] ?>"
                                class="print">Print</a>
                            <?php } ?> -->
                            <a href="#" class="edit">Edit</a>
                            <a href="./model/remove/remove_businessClearance.php?id=<?= $row['id'] ?>"
                                class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-addClearance">
        <form class="formaddClearance" action="./model/add_businessClearance.php" method="post">
            <div class="title-cont-modal">
                <p>Clearance</p>
                <img src="icons/close 1.png" class="closeClearance" alt="">
            </div>

            <div class="modal-layer1">
                <label for="businessName">Business Name:</label>
                <input type="text" id="businessName" name="businessName">

                <h3>Business Owner's Name</h3>
                <label for="owner_fname">Firstname:</label>
                <input type="text" id="owner_fname" name="owner_fname">

                <label for="owner_mname">Middlename:</label>
                <input type="text" id="owner_mname" name="owner_mname">

                <label for="owner_lname">Lastname:</label>
                <input type="text" id="owner_lname" name="owner_lname">

                <label for="businessAddress">Business Address:</label>
                <input type="text" id="businessAddress" name="businessAddress">

                <label for="dateApplied">Date Applied:</label>
                <input type="date" id="dateApplied" name="dateApplied">

                <label for="documentFor">Document For:</label>
                <input type="text" id="documentFor" name="documentFor">
            </div>
            <input type="submit" id="submit" value="Add">
        </form>
    </div>


    <div class="modal-addClosure">
        <form class="formaddClosure" action="">
            <div class="title-cont-modal">
                <p>Closure</p>
                <img src="icons/close 1.png" class="closeClosure" alt="">
            </div>

            <div class="modal-layer1">
                <label for="businessName">Business Name:</label>
                <input type="text" id="businessName">

                <h3>Business Owner's Name</h3>
                <label for="owner_fname">Firstname:</label>
                <input type="text" id="owner_fname" name="owner_fname">

                <label for="owner_mname">Middlename:</label>
                <input type="text" id="owner_mname" name="owner_mname">

                <label for="owner_lname">Lastname:</label>
                <input type="text" id="owner_lname" name="owner_lname">

                <label for="businessAddress">Business Address:</label>
                <input type="text" id="businessAddress">

                <label for="dateClosure">Date Closure:</label>
                <input type="text" id="dateClosure">

                <label for="documentFor">Document For:</label>
                <input type="text" id="documentFor1" value="Closure">
            </div>
            <input type="submit" id="submit" value="Add">
        </form>
    </div>


    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>


</body>

</html>

<script>
const addClearanceLink = document.getElementById('addClearance');
const modaladdClearance = document.querySelector('.modal-addClearance');
const closeClearance = document.querySelector('.closeClearance');

addClearanceLink.addEventListener('click', function(event) {
    event.preventDefault();
    modaladdClearance.style.display = 'block';
});

closeClearance.addEventListener('click', function() {
    modaladdClearance.style.display = 'none';
});

const addClosureLink = document.getElementById('addClosure');
const modaladdClosure = document.querySelector('.modal-addClosure');
const closeClosure = document.querySelector('.closeClosure');

addClosureLink.addEventListener('click', function(event) {
    event.preventDefault();
    modaladdClosure.style.display = 'block';
});

closeClosure.addEventListener('click', function() {
    modaladdClosure.style.display = 'none';
});
</script>