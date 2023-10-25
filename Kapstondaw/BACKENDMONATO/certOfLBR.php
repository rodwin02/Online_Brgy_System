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
                        <td><?= $row['applicant_fname']. ' ' .$row['applicant_mname']. ' ' .$row['applicant_lname'] ?>
                        </td>
                        <td><?= $row['requestor_fname']. ' ' .$row['requestor_mname']. ' ' .$row['requestor_lname'] ?>
                        </td>
                        <td><?= $row['parent_fname']. ' ' .$row['parent_mname']. ' ' .$row['parent_lname'] ?></td>
                        <td><?= $row['father_fname']. ' ' .$row['father_mname']. ' ' .$row['father_lname']  ?></td>
                        <td><?= $row['mother_fname']. ' ' .$row['mother_mname']. ' ' .$row['mother_lname'] ?></td>
                        <td><?= $row['date-of-birth'] ?></td>
                        <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
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
                            <a href="./model/remove/remove_certOfLBR.php?id=<?= $row['id'] ?>" class="delete">Delete</a>
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
                <h3>Name of Applicant</h3>
                <label for="applicant_fname">Firstname:</label>
                <input type="text" id="applicant_fname" name="applicant_fname">

                <label for="applicant_mname">Middlename:</label>
                <input type="text" id="applicant_mname" name="applicant_mname">

                <label for="applicant_lname">Lastname:</label>
                <input type="text" id="applicant_lname" name="applicant_lname">

                <h3>Name of Father</h3>
                <label for="father_fname">Firstname:</label>
                <input type="text" id="father_fname" name="father_fname">

                <label for="father_mname">Middlename:</label>
                <input type="text" id="father_mname" name="father_mname">

                <label for="father_lname">Lastname:</label>
                <input type="text" id="father_lname" name="father_lname">

                <h3>Name of Mother</h3>
                <label for="mother_fname">Firstname:</label>
                <input type="text" id="mother_fname" name="mother_fname">

                <label for="mother_mname">Middlename:</label>
                <input type="text" id="mother_mname" name="mother_mname">

                <label for="mother_lname">Lastname:</label>
                <input type="text" id="mother_lname" name="mother_lname">

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
                <h3>Name of Requestors</h3>
                <label for="requestor_fname">Firstname:</label>
                <input type="text" id="requestor_fname" name="requestor_fname">

                <label for="requestor_mname">Middlename:</label>
                <input type="text" id="requestor_mname" name="requestor_mname">

                <label for="requestor_lname">Lastname:</label>
                <input type="text" id="requestor_lname" name="requestor_lname">

                <h3>Name of Parent</h3>
                <label for="parent_fname">Firstname:</label>
                <input type="text" id="parent_fname" name="parent_fname">

                <label for="parent_mname">Middlename:</label>
                <input type="text" id="parent_mname" name="parent_mname">

                <label for="parent_lname">Lastname:</label>
                <input type="text" id="parent_lname" name="parent_lname">

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
                <h3>Name of Requestors</h3>
                <label for="requestor_fname">Firstname:</label>
                <input type="text" id="requestor_fname" name="requestor_fname">

                <label for="requestor_mname">Middlename:</label>
                <input type="text" id="requestor_mname" name="requestor_mname">

                <label for="requestor_lname">Lastname:</label>
                <input type="text" id="requestor_lname" name="requestor_lname">

                <h3>Name of Father</h3>
                <label for="father_fname">Firstname:</label>
                <input type="text" id="father_fname" name="father_fname">

                <label for="father_mname">Middlename:</label>
                <input type="text" id="father_mname" name="father_mname">

                <label for="father_lname">Lastname:</label>
                <input type="text" id="father_lname" name="father_lname">

                <h3>Name of Mother</h3>
                <label for="mother_fname">Firstname:</label>
                <input type="text" id="mother_fname" name="mother_fname">

                <label for="mother_mname">Middlename:</label>
                <input type="text" id="mother_mname" name="mother_mname">

                <label for="mother_lname">Lastname:</label>
                <input type="text" id="mother_lname" name="mother_lname">

                <label for="dob1">Date of Birth:</label>
                <input type="date" id="dob1" name="dob">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address">

            </div>
            <input type="hidden" name="documentFor" value="children">
            <input type="submit" id="submit" value="Add">
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
    </script>
</body>

</html>