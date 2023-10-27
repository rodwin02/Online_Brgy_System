<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseHold</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>
</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/import_residents.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Household Records</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input class="searchBar" type="text" placeholder=" Enter text here">
                <a href="#">Sort & Filter </a>
            </div>
            <div class="add-cont">
              
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Street</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= calculateAge($row['date-of-birth'])?></td>
                        <td><?= $row['date-of-birth'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['civil-status'] ?></td>
                        <td><?= $row['street'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editResidents" onclick="editResident(this)"
                                data-id="<?= $row['id'] ?>" data-fname="<?= $row['firstname'] ?>"
                                data-mname="<?= $row['middlename'] ?>" data-lname="<?= $row['lastname'] ?>"
                                data-age="<?= $row['age'] ?>" data-gender="<?= $row['gender'] ?>"
                                data-houseNo="<?= $row['house-no'] ?>" data-street="<?= $row['street'] ?>"
                                data-subdivision="<?= $row['subdivision'] ?>" data-dbirth="<?= $row['date-of-birth'] ?>"
                                data-pbirth="<?= $row['place-of-birth'] ?>" data-cstatus="<?= $row['civil-status'] ?>"
                                data-occupation="<?= $row['occupation'] ?>" data-email="<?= $row['email'] ?>"
                                data-contactNo="<?= $row['contact-no'] ?>" data-vstatus="<?= $row['voter-status'] ?>"
                                data-identified="<?= $row['identified'] ?>" data-sector="<?= $row['sector'] ?>"
                                data-citizenship="<?= $row['citizenship'] ?>"
                                data-householdNo="<?= $row['household-no'] ?>" data-osy="<?= $row['osy'] ?>"
                                data-pwd="<?= $row['pwd'] ?>" data-mfname="<?= $row['mother-firstname'] ?>"
                                data-mmname="<?= $row['mother-middlename'] ?>"
                                data-mlname="<?= $row['mother-lastname'] ?>" data-mage="<?= $row['mother-age'] ?>"
                                data-mhouseNo="<?= $row['mother-house-no'] ?>"
                                data-mstreet="<?= $row['mother-street'] ?>"
                                data-msubdivision="<?= $row['mother-subdivision'] ?>"
                                data-mhouseholdNo="<?= $row['mother-household-head'] ?>"
                                data-ffname="<?= $row['father-firstname'] ?>"
                                data-fmname="<?= $row['father-middlename'] ?>"
                                data-flname="<?= $row['father-lastname'] ?>" data-fage="<?= $row['father-age'] ?>"
                                data-fhouseNo="<?= $row['father-house-no'] ?>"
                                data-fstreet="<?= $row['father-street'] ?>"
                                data-fsubdivision="<?= $row['father-subdivision'] ?>"
                                data-fhouseholdNo="<?= $row['father-household-head'] ?>">Edit</a>
                            <?php 
                                $userExists = false;
                                foreach($users as $user) {
                                    if ($user['firstname'] === $row['firstname'] && $user['lastname'] === $row['lastname']) {
                                        $userExists = true;
                                        break;
                                    }
                                }
                            ?>
                            <?php if(!$userExists) { ?>
                            <a href="#" class="accountBtn" onclick="createAccount(this)"
                                data-fname="<?= $row['firstname'] ?>" data-mname="<?= $row['middlename'] ?>"
                                data-lname="<?= $row['lastname'] ?>" data-age="<?= $row['age'] ?>"
                                data-gender="<?= $row['gender'] ?>" data-street="<?= $row['street'] ?>"
                                data-cstatus="<?= $row['civil-status'] ?>" data-dbirth="<?= $row['date-of-birth'] ?>"
                                data-email="<?= $row['email'] ?>">Account</a>
                            <?php } ?>
                            <a href="#" class="delete delete-archive" id="delete-archive">Delete</a>

                            <div class="modal-delete">
                                <div class="form-delete">
                                    <div class="delete-cont">
                                        <p>Delete</p>
                                        <img src="icons/close 1.png" alt="" class="close-delete">
                                    </div>
                                    <div class="delete-description">
                                        <p>Deleting this will remove all data
                                            and cannot be undone.</p>
                                    </div>
                                    <div class="delete-submit">
                                        <a href="./model/remove/remove_resident.php?id=<?= $row['id']?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php $no++; endforeach ?>
                    <?php } ?>
            </table>
            <div class="pagination">
                <button id="prevBtn">Previous</button>
                <div id="pageNumbers" class="page-numbers"></div>
                <button id="nextBtn">Next</button>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    // JavaScript code to handle pagination
    const table = document.getElementById('table');
    const rows = table.querySelectorAll('tbody tr');
    const totalRows = rows.length;
    const rowsPerPage = 10;
    let currentPage = 1;

    function showRows(page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        rows.forEach((row, index) => {
            if (index >= start && index < end) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function updatePaginationButtons() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const pageNumbers = document.getElementById('pageNumbers');

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === Math.ceil(totalRows / rowsPerPage);

        pageNumbers.textContent = currentPage;
    }

    // Initial setup
    showRows(currentPage);
    updatePaginationButtons();

    // Previous button click event
    document.getElementById('prevBtn').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            showRows(currentPage);
            updatePaginationButtons();
        }
    });

    // Next button click event
    document.getElementById('nextBtn').addEventListener('click', () => {
        if (currentPage < Math.ceil(totalRows / rowsPerPage)) {
            currentPage++;
            showRows(currentPage);
            updatePaginationButtons();
        }
    });
</script>