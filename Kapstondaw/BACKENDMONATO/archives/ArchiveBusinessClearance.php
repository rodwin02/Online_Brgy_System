<?php include '../server/server.php'?>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        <tr></tr>
                    </td>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>