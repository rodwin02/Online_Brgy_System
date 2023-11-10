<?php include '../server/server.php'?>
<?php
$query = "SELECT * FROM del_idform_archive";
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
    <title>Archives ID Form</title>
    <link rel="stylesheet" href="../style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="../style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="../style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar2.js ?<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="../sidenav.css">
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar2.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Archives ID Form</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>

        </div>

        <?php include '../template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Requestor</th>
                        <th>Address</th>
                        <th>Place of Birth</th>
                        <th>Birth Date</th>
                        <th>Civil Status</th>
                        <th>Contact Number</th>
                        <th>Document For</th>
                        <th>Purpose</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($idForm)) { ?>
                    <?php $no=1; foreach($idForm as $row): ?>
                    <tr>
                        <td><?= $row['applicant_fname'] ?> <?= $row['applicant_mname'] ?> <?= $row['applicant_lname'] ?>
                        </td>
                        <td><?= $row['requestor_fname'] ?> <?= $row['requestor_mname'] ?> <?= $row['requestor_lname'] ?>
                        </td>
                        <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                        <td><?= $row['place_of_birth'] ?></td>
                        <td><?= $row['birth_date'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['contact_number'] ?></td>
                        <td><?= $row['documentFor'] ?></td>
                        <td><?= $row['purpose'] ?></td>
                        <td><?= $row['date_requested'] ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>