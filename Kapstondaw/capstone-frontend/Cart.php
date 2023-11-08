<?php include "./server/server.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./scss/styles.css?<?php echo time()?>">

</head>

<body>
    <?php include "./model/fetch_brgy_information.php" ?>
    <div class="cart">

        <div class="announcementHeader">
            <div class="layer1">
                <div class="logo">
                    <img src="./assets/brgy-logo.png" alt="brgy-logo" />
                </div>
                <div class="brgy">
                    <span>Republic of the Philippines</span>
                    <h2>Zone IV Dasmariñas Cavite</h2>
                </div>
            </div>

            <ul class="sub-menu">
                <li><a href="./main.php#">Home</a></li>
                <li><a href="./main.php#about">About</a></li>
                <li><a href="./main.php#services">Services</a></li>
                <li><a href="./main.php#announcement">Announcement</a></li>
                <li>Contact us!</li>
                <?php if(isset($_SESSION['username'])) { ?>
                <li><a href="#">Cart</a></li>
                <li><?php echo $_SESSION['username'];?></li>
                <li><a href="../BACKENDMONATO/model/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></li>
                <?php } else {?>
                <li class="login" id="login">Login</li>
                <?php } ?>
            </ul>
        </div>
        <div class="main-cart">
            <h1>Requested Status</h1>
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Requestor name</td>
                        <td>Description</td>
                        <td>Requested Date</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($certs)) {?>
                    <?php foreach($certs as $row) : ?>
                    <tr>
                        <td><?= $row['applicant_fname']. " ". $row['applicant_mname']. " ". $row['applicant_lname'] ?>
                        </td>
                        <td>
                            <?php  if(isset($row['requestor_fname'])) {
                             echo $row['requestor_fname']. " ". $row['requestor_mname']. " ". $row['requestor_lname']; }?>
                        </td>
                        <td>Des</td>
                        <td></td>
                        <td><span>Complete</span></td>
                        <td>Cancel</td>
                    </tr>
                    <?php  endforeach  ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>