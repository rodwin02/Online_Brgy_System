<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_brgyClearance";
$result = $conn->query($query);

$brgyClearance = array();
while($row = $result->fetch_assoc()) {
  $brgyClearance[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Clearance</title>
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
            <p>Barangay Clearance</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="add" id="addbrgyClearance">+ Clearance</a>
                <a href="archives/ArchivebrgyClearance.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <form action="" class="form-allCert">
            <div class="third_layer">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th>Place of Birth</th>
                            <th>Purpose</th>
                            <th>Date of Issue</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($brgyClearance)) { ?>
                        <?php $no=1; foreach($brgyClearance as $row): ?>
                        <tr>
                            <td><?= $row['applicant_fname'] ?> <?= $row['applicant_mname'] ?>
                                <?= $row['applicant_lname'] ?>
                            </td>
                            <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                            <td><?= $row['date-of-birth'] ?></td>
                            <td><?= $row['place-of-birth'] ?></td>
                            <td><?= $row['purpose'] ?></td>
                            <td><?= $row['date_requested'] ?></td>
                            <td>
                                <form action="./model/update_status/update_brgyClearance.php" method="POST"
                                    class="form-allCert" id="statusForm">
                                    <select name="status" id="Status">
                                        <option class="Pending" value="Pending"
                                            <?php echo ($row['status'] === 'Pending') ? 'selected' : ''; ?>>Pending
                                        </option>
                                        <option class="For_Pick_up" value="For Pick-up"
                                            <?php echo ($row['status'] === 'For Pick-up') ? 'selected' : ''; ?>>For
                                            Pick-up
                                        </option>
                                        <option class="Completed" value="Completed"
                                            <?php echo ($row['status'] === 'Completed') ? 'selected' : ''; ?>>Completed
                                        </option>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $row['id']?>">
                                    <input type="hidden" name="dateRequested" value="<?= $row['date_requested']?>">

                                </form>
                            </td>
                            </td>
                            <td>
                                <a class="edit" href="">Edit</a>
                                <a class="print"
                                    href="./generate/brgyClearance_generate.php?id=<?= $row['id'] ?>">Print</a>
                                <a href="./model/remove/remove_brgyClearance.php?id=<?= $row['id'] ?>"
                                    class="delete">Cancel</a>
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
        </form>
    </div>

    <div class="modal-addBrgyClearance">
        <form class="formBrgyClearance" action="./model/add_brgyClearance.php" method="post">
            <div class="title-cont-modal">
                <p>Barangay Clearance</p>
                <img src="icons/close 1.png" class="closeForm" alt="">
            </div>

            <div class="modal-layer-brgyClearance">
                <div class="input-brgy-clearance">
                    <label for="fullname">Fullname:</label>
                    <input type="text" id="fullname" placeholder="Full name">
                </div>
                <div class="input-brgy-clearance">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" id="house_no" placeholder="Houseno.">
                        <input type="text" id="street" placeholder="Street name">
                        <input type="text" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-brgy-clearance">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" id="birth_date">
                </div>
                <div class="input-brgy-clearance">
                    <label for="place_of_birth">Place of Birth:</label>
                    <input type="text" id="place_of_birth">
                </div>
                <div class="input-brgy-clearance">
                    <label for="purpose">Purpose:</label>
                    <input type="text" id="purpose" name="purpose">
                </div>

            </div>
            <input type="submit" id="submit" value="Add">
        </form>
    </div>






    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    document.querySelectorAll('.form-allCert').forEach(function(form) {
        form.querySelector('select[name="status"]').addEventListener('change', function() {
            // Trigger form submission when an option is selected
            form.submit();
        });
    });
    const addbrgyClearanceLink = document.getElementById('addbrgyClearance');
    const modaladdBrgyClearance = document.querySelector('.modal-addBrgyClearance');
    const closeForm = document.querySelector('.closeForm');

    addbrgyClearanceLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdBrgyClearance.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaladdBrgyClearance.style.display = 'none';
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