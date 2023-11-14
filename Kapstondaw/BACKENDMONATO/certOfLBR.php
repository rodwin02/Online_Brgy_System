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
                <a href="archives/ArchiveCertOfLBR.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <form action="" class="form-allCert">
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
                            <th style="display: none;">Date Requested</th>
                            <th>Document For</th>
                            <th>Status</th>
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
                            <td><?= $row['date_of_birth'] ?></td>
                            <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                            <td style="display: none;"><?= $row['date_requested'] ?></td>
                            <td><?= $row['documentFor'] ?></td>
                            <td>
                                <form action="./model/update_status/update_certoOfLBR.php" method="POST"
                                    class="form-allCert" id="statusForm">
                                    <select name="status" id="Status">
                                        <!-- <option class="Pending" value="Pending">Pending</option> -->
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

                                    <!-- <button type="submit" class="UpdateStatus">Update</button> -->
                                </form>
                            </td>
                            </td>
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
                                <a href="#" class="delete">Cancel</a>

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
                                            <a href="./model/remove/remove_certOfLBR.php?id=<?= $row['id']?>">Delete</a>
                                        </div>
                                    </div>
                                </div>
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

    <div class="modal-addlbr_forself">
        <form class="formlbr_forself" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Self</p>
                <img src="icons/close 1.png" class="closeForm_forself" alt="">
            </div>

            <div class="modal-layer-lbr-self">
                <div class="input-lbr-self">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname" placeholder="First Name">
                        <input type="text" name="applicant_mname" id="applicant_mname" placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname" placeholder="Last Name">
                        <input type="text" name="applicant_suffix" id="applicant_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="fatherName">Father Name:</label>
                    <div class="label111">
                        <input type="text" name="father_fname" id="father_fname" placeholder="First Name">
                        <input type="text" name="father_mname" id="father_mname" placeholder="Middle Name">
                        <input type="text" name="father_lname" id="father_lname" placeholder="Last Name">
                        <input type="text" name="father_suffix" id="father_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="motherName">Mother Name:</label>
                    <div class="label111">
                        <input type="text" name="mother_fname" id="mother_fname" placeholder="First Name">
                        <input type="text" name="mother_mname" id="mother_mname" placeholder="Middle Name">
                        <input type="text" name="mother_lname" id="mother_lname" placeholder="Last Name">
                        <input type="text" name="mother_suffix" id="mother_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob">
                </div>
                <div class="input-lbr-self">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street" placeholder="Street name">
                        <input type="text" name="subdivision" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Self">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>

    <div class="modal-addlbr_forsingleparent">
        <form class="formlbr_forsingleparent" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Single Parent</p>
                <img src="icons/close 1.png" class="closeForm_forsingleparent" alt="">
            </div>

            <div class="modal-layer-lbr-single-parent">
                <div class="input-lbr-single-parent">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname" placeholder="First Name">
                        <input type="text" name="requestor_mname" id="requestor_mname" placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname" placeholder="Last Name">
                        <input type="text" name="requestor_suffix" id="requestor_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="parentName">Parent Name:</label>
                    <div class="label111">
                        <input type="text" name="parent_fname" id="parent_fname" placeholder="First Name">
                        <input type="text" name="parent_mname" id="parent_mname" placeholder="Middle Name">
                        <input type="text" name="parent_lname" id="parent_lname" placeholder="Last Name">
                        <input type="text" name="parent_suffix" id="parent_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob">
                </div>
                <div class="input-lbr-single-parent">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street" placeholder="Street name">
                        <input type="text" name="subdivision" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
            </div>

            <input type="hidden" name="documentFor" value="Single Parent">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>


    <div class="modal-addlbr_fortheirchild">
        <form class="formlbr_fortheirchild" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Their Child</p>
                <img src="icons/close 1.png" class="closeForm_fortheirchild" alt="">
            </div>

            <div class="modal-layer-lbr-for-child">
                <div class="input-lbr-for-child">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname" placeholder="First Name">
                        <input type="text" name="requestor_mname" id="requestor_mname" placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname" placeholder="Last Name">
                        <input type="text" name="requestor_suffix" id="requestor_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="fatherName">Father Name:</label>
                    <div class="label111">
                        <input type="text" name="father_fname" id="father_fname" placeholder="First Name">
                        <input type="text" name="father_mname" id="father_mname" placeholder="Middle Name">
                        <input type="text" name="father_lname" id="father_lname" placeholder="Last Name">
                        <input type="text" name="father_suffix" id="father_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="motherName">Mother Name:</label>
                    <div class="label111">
                        <input type="text" name="mother_fname" id="mother_fname" placeholder="First Name">
                        <input type="text" name="mother_mname" id="mother_mname" placeholder="Middle Name">
                        <input type="text" name="mother_lname" id="mother_lname" placeholder="Last Name">
                        <input type="text" name="mother_suffix" id="mother_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob">
                </div>
                <div class="input-lbr-for-child">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street" placeholder="Street name">
                        <input type="text" name="subdivision" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Children">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>




    <script src="./js/jQuery-3.7.0.js"></script>
    <script src="./js/app.js"></script>
    <script>
    document.querySelectorAll('.form-allCert').forEach(function(form) {
        form.querySelector('select[name="status"]').addEventListener('change', function() {
            // Trigger form submission when an option is selected
            form.submit();
        });
    });
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

<script>
// DELETE RESIDENTS
const deleteLink = document.querySelectorAll('.delete');
const modalDelete = document.querySelectorAll('.modal-delete');
const closeButtonDelete = document.querySelectorAll('.close-delete');

deleteLink.forEach((del, index) => {
    del.addEventListener('click', (e) => {
        console.log("Delete link clicked")
        modalDelete[index].style.display = 'block';
    });

    closeButtonDelete[index].addEventListener('click', function() {
        modalDelete[index].style.display = 'none';
    });
})
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