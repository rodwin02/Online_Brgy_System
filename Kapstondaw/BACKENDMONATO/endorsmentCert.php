<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_ecertificate";
$result = $conn->query($query);

$ecertificate = array();
while($row = $result->fetch_assoc()) {
  $ecertificate[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endorsment Certificate</title>
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
            <p>Endorsment Certificate</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="add" id="addEcert_forself">+ Forself</a>
                <a href="#" class="add" id="addEcert_forsomeone">+ Forsomeone</a>
                <a href="archives/ArchiveEndorsementCert.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Name of Applicant</th>
                        <th>Name of Requestor</th>
                        <th>Address</th>
                        <th>Document For</th>
                        <th>Purpose</th>
                        <th>Date Requested</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($ecertificate)) { ?>
                    <?php $no=1; foreach($ecertificate as $row): ?>
                    <tr>
                        <td><?= $row['applicant_fname'] ?> <?= $row['applicant_mname'] ?> <?= $row['applicant_lname'] ?>
                        </td>
                        <td><?= $row['requestor_fname'] ?> <?= $row['requestor_mname'] ?> <?= $row['requestor_lname'] ?>
                        </td>
                        <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision']?></td>
                        <td><?= $row['documentFor'] ?></td>
                        <td><?= $row['purpose'] ?></td>
                        <td><?= $row['date-requested'] ?></td>
                        <td>
                            <?php if($row['documentFor'] === 'Self') { ?>
                            <a href="./generate/endorsementCert_generate_forselft.php?id=<?= $row['id']?>"
                                class="print">Print</a>
                            <?php } else {?>
                            <a href="./generate/endorsementCert_generate_forsomeone.php?id=<?= $row['id']?>"
                                class="print">Print</a>
                            <?php } ?>
                            <a href="./model/remove/remove_endorsementCert.php?id=<?= $row['id']?>"
                                class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pagination">
                <button id="prevBtn">Previous</button>
                <div id="pageNumbers" class="page-numbers"></div>
                <button id="nextBtn">Next</button>
            </div>
        </div>
    </div>

    <div class="modal-addEcert_forself">
        <form class="formEcert_forself" action="./model/add_endorsementCert.php" method="post">
            <div class="title-cont-modal">
                <p>For Self</p>
                <img src="icons/close 1.png" class="closeForm_forself" alt="">
            </div>

            <div class="modal-layer-endorsement-self">
                <div class="input-e-self">
                    <label for="applicantName">Applicant Name:</label>
                    <input type="text" id="applicantName" placeholder="Applicant Name">
                </div>
                <div class="input-e-self">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" id="house_no" placeholder="Houseno.">
                        <input type="text" id="street" placeholder="Street name">
                        <input type="text" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-e-self">
                     <label for="purpose">Purpose:</label>
                     <input type="text" id="purpose" name="purpose">
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Self">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>

    <div class="modal-addEcert_forsomeone">
        <form class="formEcert_forsomeone" action="./model/add_endorsementCert.php" method="post">
            <div class="title-cont-modal">
                <p>For Someone</p>
                <img src="icons/close 1.png" class="closeForm_forsomeone" alt="">
            </div>

            <div class="modal-layer-endorsement-someone">
                <div class="input-e-someone">
                    <label for="applicantName">Applicant Name:</label>
                    <input type="text" id="applicantName" placeholder="Applicant Name">
                </div>
                <div class="input-e-someone">
                    <label for="requestorName">Requestor Name:</label>
                    <input type="text" id="requestorName" placeholder="Requestor Name">
                </div>
                <div class="input-e-someone">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" id="house_no" placeholder="Houseno.">
                        <input type="text" id="street" placeholder="Street name">
                        <input type="text" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-e-someone">
                     <label for="purpose">Purpose:</label>
                     <input type="text" id="purpose" name="purpose">
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Someone">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>



    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    const addEcertLink = document.getElementById('addEcert_forself');
    const modaladdEcert = document.querySelector('.modal-addEcert_forself');
    const closeForm = document.querySelector('.closeForm_forself');

    addEcertLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdEcert.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaladdEcert.style.display = 'none';
    });

    const addEcertLink1 = document.getElementById('addEcert_forsomeone');
    const modaladdEcert1 = document.querySelector('.modal-addEcert_forsomeone');
    const closeForm1 = document.querySelector('.closeForm_forsomeone');

    addEcertLink1.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdEcert1.style.display = 'block';
    });

    closeForm1.addEventListener('click', function() {
        modaladdEcert1.style.display = 'none';
    });
    </script>

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
</script>