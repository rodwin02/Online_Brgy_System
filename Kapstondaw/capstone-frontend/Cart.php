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

    <?php 
if(isset($_SESSION['message'])) 
{ ?>
    <div class="active-success">
        <div class="container">
            <h2><?php echo $_SESSION['message']; ?></h2>
        </div>
    </div>
    <?php unset($_SESSION['message']);
} ?> <div class="cart">

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
                <li><a href="./model/logout.php?username=<?= $_SESSION['username']  ?>">Logout</a></li>
                <?php } else {?>
                <li class="login" id="login">Login</li>
                <?php } ?>
            </ul>
        </div>
        <div class="main-cart">
            <h1>Requested Status</h1>
            <div class="table-container">
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
                            <td>
                                <?php     
                            if (isset($row['applicant_fname'])) {
                                if ($row['source'] === 'tbl_idform') {
                                    echo "Identification";
                                } elseif ($row['source'] === 'tbl_brgyclearance') {
                                    echo "Barangay Clearance";
                                }
                                elseif ($row['source'] === 'tbl_ecertificate') {
                                    echo "Endorsement Certificate";
                                }
                                elseif ($row['source'] === 'tbl_certoflbr') {
                                    echo "Certificate of Late Birth";
                                }
                                elseif ($row['source'] === 'tbl_certofindigency') {
                                    echo "Certificate of Indigency";
                                }
                            }
                            ?>
                            </td>
                            <td>
                                <?= $row['date_requested'] ?></td>
                            <td>
                                <?php if($row['status'] === "Pending") {?>
                                <span class="pending"><?= $row['status']?></span>
                                <?php } else if($row['status'] === "For Pick-up") {?>
                                <span class="pick-up"><?= $row['status']?></span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if ($row['source'] === 'tbl_idform') { ?>
                                <a href="./model/cancel/cancel_idform.php?id=<?= $row['id'] ?>">Cancel</a>
                                <?php } elseif ($row['source'] === 'tbl_brgyclearance') { ?>
                                <a href="./model/cancel/cancel_brgyClearance.php?id=<?= $row['id'] ?>">Cancel</a>
                                <?php }
                                elseif ($row['source'] === 'tbl_ecertificate') { ?>
                                <a href="./model/cancel/cancel_endorsement.php?id=<?= $row['id'] ?>">Cancel</a>
                                <?php }
                                elseif ($row['source'] === 'tbl_certoflbr') { ?>
                                <a href="./model/cancel/cancel_certOfLbr.php?id=<?= $row['id'] ?>">Cancel</a>
                                <?php }
                                elseif ($row['source'] === 'tbl_certofindigency') { ?>
                                <a href="./model/cancel/cancel_certOfIndigency.php?id=<?= $row['id'] ?>">Cancel</a>
                                <?php }
                                ?>
                            </td>
                        </tr>
                        <?php  endforeach  ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src=" ./js//jQuery-3-7-0"></script>
    <script src="./js//app.js"></script>
</body>

</html>