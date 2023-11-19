<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_households WHERE household_head='yes'";
$result = $conn->query($query);

$households = array();
while($row = $result->fetch_assoc()) {
  $households[] = $row;
}
function calculateAge($dob) {
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $interval = $today->diff($birthDate);
    return $interval->y;
}
?>
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
    <link rel="stylesheet" href="modal.css ?<?php echo time(); ?>">
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
            <p>Fullname Household</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input class="searchBar" type="text" placeholder=" Enter text here">
                <a href="#">Sort & Filter </a>
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
                        <th>Household Head</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($households)) { ?>
                    <?php $no=1; foreach($households as $row):?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= calculateAge($row['date_of_birth'])?></td>
                        <td><?= $row['date_of_birth'] ?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['street'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                        <input type="radio" name="household_head" value="<?= $row['household_head'] ?>" <?= ($row['household_head'] == 'yes') ? 'checked' : '' ?>>
                        </td>
                        <td class="actions">
                            <a href="#" class="edit" id="editMember">Edit</a>

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
                                        <a href="./model/remove/remove_household.php?id=<?= $row['id']?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php $no++; ?>
                    <?php  endforeach ?>
                    <?php } ?>
            </table>
            <div class="pagination">
                <button id="prevBtn">Previous</button>
                <div id="pageNumbers" class="page-numbers"></div>
                <button id="nextBtn">Next</button>
            </div>
        </div>
    </div>

    <div class="Edit_Member">
        <form action="#" class="formEditMember">
        <div class="headerInfo">
                <p>Edit Information</p>
                <img src="icons/closeWhiteColor.png" class="closeForm_editMember" alt="">
            </div>
            <div class="bodyInfo">
                <div class="leftInfo">
                    <div class="inputFullname">
                        <p>Full name<span>*</span></p>
                        <input type="text" name="lastName[]" id="lastName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Last Name" required>
                        <input type="text" name="firstName[]" id="firstName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="First Name" required>
                        <input type="text" name="middleName[]" id="middleName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Middle Name" required>
                        <input type="text" name="ext[]" class="suffix" id="ext"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Suffix">
                    </div>
                    <div class="inputDob">
                        <p>Date of Birth<span>*</span></p>
                        <input type="date" name="dateBirth[]" id="dateBirth"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="inputPob">
                        <p>Place of Birth<span>*</span></p>
                        <input type="text" name="placeBirth[]" id="placeBirth"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="inputCitizenship">
                        <p>Citizenship<span>*</span></p>
                        <input type="text" name="citizenship[]" id="citizenship"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="inputPhoneNo">
                        <p>Phone number</p>
                        <input type="number" name="phoneNo[]" id="phoneNo" placeholder="e.g., 09123456789">
                    </div>
                    <div class="inputEmail">
                        <p>Email</p>
                        <input type="text" name="email[]" id="email" placeholder="Enter your email">
                    </div>
                </div>

                <div class="rightInfo">
                    <div class="inputAddress">
                        <p>Address<span>*</span></p>
                        <input type="text" name="no[]" class="houseNo" id="no"
                            oninput="this.value = this.value.toUpperCase()" placeholder="House No.">
                        <input type="text" name="streetName[]" id="streetName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Street Name" required>
                        <input type="text" name="subdiName[]" id="subdiName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Subdivision Name">
                    </div>

                    <div class="inputOccupation">
                        <p>Occupation <span>*</span></p>
                        <input type="text" name="occupation[]" id="occupation"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>

                    <div class="inputSex">
                        <p>Sex <span>*</span></p>
                        <select id="sex" name="sex[]" required>
                            <option value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="inputCivilStatus">
                        <p>Civil Status<span>*</span></p>
                        <select id="civilStatus" name="civilStatus[]" required>
                            <option value=""></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    <div class="inputVoterStatus">
                        <p>Voters Status <span></span></p>
                        <select id="votersStatus" name="votersStatus[]" >
                            <option value=""></option>
                            <option value="Voters">Voters</option>
                            <option value="Non-voters">Non-voters</option>
                        </select>
                    </div>
                    <div class="inputProfile">
                        <p>Image Profile</p>
                        <input type="file" id="imageProfile" accept="image/*" onchange="previewProfile()">
                    </div>

                </div>
            </div>
            <div class="footerInfo">
                <button type="button" class="addSaTable">Update</button>
            </div>
        </form>
           
    </div>

</body>

</html>

<script>
// DELETE RESIDENTS
const deleteLink = document.querySelectorAll('.delete-archive');
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

// EDIT RESIDENTS
const editMember = document.getElementById('editMember');
const EditMemberModal = document.querySelector('.Edit_Member');
const closeFormeditMember = document.querySelector('.closeForm_editMember');

editMember.addEventListener('click', function(event) {
    event.preventDefault();
    EditMemberModal.style.display = 'block';
});

closeFormeditMember.addEventListener('click', function() {
    EditMemberModal.style.display = 'none';
});
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