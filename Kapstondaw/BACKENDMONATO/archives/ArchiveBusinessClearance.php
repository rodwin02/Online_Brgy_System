<?php include '../server/server.php'?>
<?php
$query =  "SELECT * FROM del_businessclearance_archive";
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
    <title>Archives Business Clearance</title>
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
            <p>Archives Business Clearance</p>
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
                        <th>Business Name</th>
                        <th>Business Owner's Name</th>
                        <th>Business Address</th>
                        <th>Date Applied</th>
                        <th>Document For</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($businessClearance)) {?>
                    <?php $no=1; foreach($businessClearance as $row): ?>
                    <tr>
                        <td><?= $row['business-name']?></td>
                        <td><?= $row['business-owner-fname']. " ". $row['business-owner-mname']. " ". $row['business-owner-lname']?>
                        </td>
                        <td><?= $row['business-address']?></td>
                        <td><?= $row['date-applied']?></td>
                        <td><?= $row['documentFor']?></td>
                    </tr>
                    <?php $no++; endforeach  ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>