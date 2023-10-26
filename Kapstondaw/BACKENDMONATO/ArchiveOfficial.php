<?php include "./server/server.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Officials</title>
    <link rel="stylesheet" href="style2.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>
</head>
<body> 
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_officials">
        <div class="left_officials">
            <div class="first_layer">
                  <p>Barangay Officials</p>
                  <a href="#">Logout</a>
            </div>

            <a href="barangayOfficials.php" class="backContainer">
                <img src="icons/back.png" alt="">
                <p>Go Back</p>
            </a>

            <div class="second_layer">
                <div class="text-cont">
                    <p>Archives</p>
                </div>
                <div class="modal-cont">
                   
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
                <table>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Chairmanship</th>
                            <th>Position</th>
                            <th>Term Start</th>
                            <th>Term End</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php if(!empty($official)) { ?>
                    <?php foreach($official as $row): ?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['position'] ?></td>
                        <td><?= $row['termstart'] ?></td>
                        <td><?= $row['termend'] ?></td>
                        <td class="status"><?= $row['status'] ?></td>
                        <td class="actions">
                            <span class="edit" id="editOfficials" onclick="editOfficial(this)"
                                data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>"
                                data-chair="<?= $row['chair_id'] ?>" data-pos="<?= $row['pos_id'] ?>"
                                data-start="<?= $row['termstart'] ?>" data-end="<?= $row['termend'] ?>"
                                data-status="<?= $row['status'] ?>">Edit</span>
                            <!-- <a href="./model/remove/remove_official.php?id=<?= $row['id'] ?>" class="delete">Delete</a> -->
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php }?>
                    <!-- Add more rows here -->
                    <!-- Add more rows here -->
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>