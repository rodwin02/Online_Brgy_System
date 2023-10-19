<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Residents</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js"></script>

</head>

<body>

    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/import_residents.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include "./sidebar.php" ?>


    <div class="home_residents">
        <div class="first_layer">
            <p>RECORD OF BARANGAY INHABITANTS BY HOUSEHOLD</p>
            <a href="#">Logout</a>
        </div>


        <div class="household-cont">
            <img src="image/BorderInfo.png" alt="">
            <div class="household-inner-cont">
                <div class="title-cont">
                    <p>Household Head Inforamtion</p>
                </div>

                <form action="./model/add_resident.php" method="POST" class="household-form">
                    <div class="left-hold-cont">
                        <div class="input-container">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" class="firstName firstNameHead " name="firstname"
                                required>
                        </div>
                        <div class=" input-container">
                            <label for="middleName">Middle Name:</label>
                            <input type="text" id="middleName" class="middleName middleNameHead" name="middlename">
                        </div>
                        <div class="input-container">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" class="lastName lastNameHead" name="lastname" required>
                        </div>
                        <div class="input-container">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" class="dob dobHead" required>
                        </div>
                        <div class="input-container">
                            <label for="sex">Sex:</label>
                            <select name="sex" id="sex" class="sex sexHead">\
                                <option value=""></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="pob">Place of Birth:</label>
                            <input type="text" id="pob" name="place-of-birth" class="pob pobHead" required>
                        </div>
                    </div>
                    <div class="right-hold-cont">
                        <div class="input-container">
                            <label for="address">Address:</label>
                            <input type="text" id="houseNo" class="houseNo houseNoHead" placeholder="house no."
                                name="house-no">
                            <input type="text" id="streetNo" class="streetNo streetNoHead" placeholder="street no."
                                name="street">
                            <input type="text" id="Subdi" class="Subdi SubdiHead"
                                placeholder="subdivision/zone/sitio/purok" name="subdivision">
                        </div>

                        <div class="input-container">
                            <label for="Citizenship">Citizenship:</label>
                            <input type="text" id="Citizenship" class="citizenship citizenshipHead" name="citizenship">
                        </div>

                        <div class="input-container">
                            <label for="occupation">Occupation:</label>
                            <input type="text" id="occupation occupationHead" name="occupation">
                        </div>

                        <div class="input-container">
                            <label for="civilStatus">Civil Status:</label>
                            <select id="civilStatus" class="civilStatus civilStatusHead" name="civil-status">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>

                        <div class="input-container">
                            <label for="emailmo">Email:</label>
                            <input type="email" id="emailmo" class="emailmo emailmoHead" name="email">
                        </div>

                        <input type="hidden" value="Head" id="household-head" name="household-head">

                        <div class="button-cont">
                            <div class="addMember" id="addMember" onclick="addMember()">Add Member</div>
                            <div class="" id="" onclick="renderAllDetails()">Show</div>
                            <div class="addMember" id="addMember">Add</div>
                            <input type="submit" class="create-household" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="members-main-table">
            <p>HOUSEHOLD MEMBERS</p>
            <table class="member">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Date of Birth</th>
                        <th>Sex</th>
                        <th>Place of Birth</th>
                        <th>House No</th>
                        <th>Street No</th>
                        <th>Subdivision</th>
                        <th>Citizenship</th>
                        <th>Occupation</th>
                        <th>Civil Status</th>
                        <th>Email</th>
                        <th>Household Head</th>
                    </tr>
                </thead>
                <tbody id="membersTable"></tbody>
                <!-- <div class="fullName">Rodwin C. Homeres</div>
                <div class="address">23 kanto lang st.</div>
                <div class="bday">09/21/23</div>
                <div class="gender">Male</div>
                <div class="action" id="editMember">Edit</div> -->
            </table>



        </div>
    </div>


    <div class="modal-addMember" id="modal-addMember">
        <form action="#" class="member-form" id="member-form">
            <div class="title-member">
                <p>Household Member Information</p>
                <img src="icons/close 1.png" class="close-addMember" alt="">
            </div>

            <div class="member-container">
                <div class="left-member-cont">
                    <div class="input-container">
                        <label for="firstName1">First Name:</label>
                        <input type="text" id="firstName1" class="firstName firstNameMember" name="firstname">
                    </div>
                    <div class="input-container">
                        <label for="middleName1">Middle Name:</label>
                        <input type="text" id="middleName1" class="middleName middleNameMember" name="middlename">
                    </div>
                    <div class="input-container">
                        <label for="lastName1">Last Name:</label>
                        <input type="text" id="lastName1" class="lastName lastNameMember" name="lastname">
                    </div>
                    <div class="input-container">
                        <label for="dob1">Date of Birth:</label>
                        <input type="date" id="dob1" name="dob" class="dob dobMember" required>
                    </div>
                    <div class="input-container">
                        <label for="sex1">Sex:</label>
                        <select name="sex" id="sex1" class="sex sexMember">
                            <option value=""></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="pob1">Place of Birth:</label>
                        <input type="text" id="pob1" name="pob" class="pob pobMember" required>
                    </div>
                </div>

                <div class="input-container">
                    <!-- <label for="address">Address:</label> -->
                    <input type="hidden" id="houseNo" class="houseNo houseNoMember" placeholder="house no."
                        name="house-no">
                    <input type="hidden" id="streetNo" class="streetNo streetNoMember" placeholder="street no."
                        name="street">
                    <input type="hidden" id="Subdi" class="Subdi SubdiMember" placeholder="subdivision/zone/sitio/purok"
                        name="subdivision">
                </div>

                <div class="right-member-cont">
                    <div class="input-container">
                        <label for="Citizenship1">Citizenship:</label>
                        <input type="text" id="Citizenship1" class="citizenship citizenshipMember name=" citizenship>
                    </div>

                    <div class=" input-container">
                        <label for="occupation1">Occupation:</label>
                        <input type="text" id="occupation1" class="occupationMember" name="occupation>
                    </div>

                    <div class=" input-container">
                        <label for="civilStatus1">Civil Status:</label>
                        <select name="civilStatus" id="civilStatus1" class="civilStatus civilStatusMember">
                            <option value=""></option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>

                    <div class="button-cont">
                        <button onclick="renderAllDetails()">Show</button>
                        <input type="submit" class="create-household" value="Create">
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="modal-editMember">
        <form action="#" class="member-form">
            <div class="title-member">
                <p>Household Member Information</p>
                <img src="icons/close 1.png" class="close-editMember" alt="">
            </div>

            <div class="member-container">
                <div class="left-member-cont">
                    <div class="input-container">
                        <label for="firstName2">First Name:</label>
                        <input type="text" id="firstName2" class="firstName">
                    </div>
                    <div class="input-container">
                        <label for="middleName2">Middle Name:</label>
                        <input type="text" id="middleName2" class="middleName">
                    </div>
                    <div class="input-container">
                        <label for="lastName2">Last Name:</label>
                        <input type="text" id="lastName2" class="lastName">
                    </div>
                    <div class="input-container">
                        <label for="dob2">Date of Birth:</label>
                        <input type="date" id="dob2" name="dob" class="dob" required>
                    </div>
                    <div class="input-container">
                        <label for="sex2">Sex:</label>
                        <select name="sex" id="sex2" class="sex">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="pob2">Place of Birth:</label>
                        <input type="text" id="pob2" name="pob" class="pob" required>
                    </div>
                </div>

                <div class="right-member-cont">
                    <div class="input-container">
                        <label for="Citizenship2">Citizenship:</label>
                        <input type="text" id="Citizenship2">
                    </div>

                    <div class="input-container">
                        <label for="occupation2">Occupation:</label>
                        <input type="text" id="occupation2">
                    </div>

                    <div class="input-container">
                        <label for="civilStatus2">Civil Status:</label>
                        <select name="civilStatus" id="civilStatus2" class="civilStatus">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>

                    <div class="button-cont">
                        <input type="submit" class="create-household" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>


</body>

</html>

<script>
function addMember() {
    console.log("member")
    const membersDiv = document.getElementById("modal-addMember");
    const newMemberInput = `
    <form action="#" class="member-form" id="member-form">
            <div class="title-member">
                <p>Household Member Information</p>
                <img src="icons/close 1.png" class="close-addMember" alt="">
            </div>

            <div class="member-container">
                <div class="left-member-cont">
                    <div class="input-container">
                        <label for="firstName1">First Name:</label>
                        <input type="text" id="firstName1" class="firstName firstNameMember" name="firstname">
                    </div>
                    <div class="input-container">
                        <label for="middleName1">Middle Name:</label>
                        <input type="text" id="middleName1" class="middleName middleNameMember" name="middlename">
                    </div>
                    <div class="input-container">
                        <label for="lastName1">Last Name:</label>
                        <input type="text" id="lastName1" class="lastName lastNameMember" name="lastname">
                    </div>
                    <div class="input-container">
                        <label for="dob1">Date of Birth:</label>
                        <input type="date" id="dob1" name="dob" class="dob dobMember" required>
                    </div>
                    <div class="input-container">
                        <label for="sex1">Sex:</label>
                        <select name="sex" id="sex1" class="sex sexMember">
                            <option value=""></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="pob1">Place of Birth:</label>
                        <input type="text" id="pob1" name="pob" class="pob pobMember" required>
                    </div>
                </div>

                <div class="input-container">
                    <!-- <label for="address">Address:</label> -->
                    <input type="hidden" id="houseNo" class="houseNo houseNoMember" placeholder="house no."
                        name="house-no">
                    <input type="hidden" id="streetNo" class="streetNo streetNoMember" placeholder="street no."
                        name="street">
                    <input type="hidden" id="Subdi" class="Subdi SubdiMember" placeholder="subdivision/zone/sitio/purok"
                        name="subdivision">
                </div>

                <div class="right-member-cont">
                    <div class="input-container">
                        <label for="Citizenship1">Citizenship:</label>
                        <input type="text" id="Citizenship1" class="citizenship citizenshipMember name=" citizenship>
                    </div>

                    <div class=" input-container">
                        <label for="occupation1">Occupation:</label>
                        <input type="text" id="occupation1" class="occupationMember" name="occupation>
                    </div>

                    <div class=" input-container">
                        <label for="civilStatus1">Civil Status:</label>
                        <select name="civilStatus" id="civilStatus1" class="civilStatus civilStatusMember">
                            <option value=""></option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>

                    <div class="button-cont">
                        <button onclick="renderAllDetails()">Show</button>
                        <input type="submit" class="create-household" value="Create">
                    </div>
                </div>
            </div>
        </form>`;
    membersDiv.innerHTML += newMemberInput;
}

const memberList = document.getElementById("membersTable");
memberList.innerHTML = "";

const houseNoValue = document.querySelector('.houseNoHead').value;
const streetNoValue = document.querySelector('.streetNoHead').value;
const subdiValue = document.querySelector('.SubdiHead').value;

function displayDetails() {

    const tableRowHead = document.createElement("tr");
    const fieldsHead = [
        "firstNameHead",
        "middleNameHead",
        "lastNameHead",
        "dobHead",
        "sexHead",
        "pobHead",
        "houseNoHead",
        "streetNoHead",
        "SubdiHead",
        "citizenshipHead",
        "occupationHead",
        "civilStatusHead",
        "emailmoHead",
        "household-head"
    ];


    const householdHead = document.querySelector('#household-head').value;

    fieldsHead.forEach((field) => {
        console.log(field);
        const el = document.querySelector(`.${field}`);
        const tableDataHead = document.createElement("td");
        if (field === "household-head") {
            tableDataHead.innerText = householdHead;
        } else {
            tableDataHead.innerText = el ? el.value :
                "Not Found"
        }
        tableRowHead.appendChild(tableDataHead);
    });

    memberList.appendChild(tableRowHead);
}

function displayMember() {
    document.querySelectorAll(".member-form").forEach((members) => {
        const tableRow = document.createElement("tr");

        const fields = [
            "firstNameMember",
            "middleNameMember",
            "lastNameMember",
            "dobMember",
            "sexMember",
            "pobMember",
            "houseNoMember",
            "streetNoMember",
            "SubdiMember",
            "citizenshipMember",
            "occupationMember",
            "civilStatusMember",
        ];

        fields.forEach((fieldRow) => {
            const tableData = document.createElement("td");

            const memberEl = document.querySelector(`.${fieldRow}`);

            if (fieldRow === "houseNoMember") {
                tableData.innerText = houseNoValue;
            } else if (fieldRow === "streetNoMember") {
                tableData.innerText = streetNoValue;
            } else if (fieldRow === "SubdiMember") {
                tableData.innerText = subdiValue;
            } else {
                tableData.innerText = memberEl ? memberEl.value : "Not Found";
            }
            tableRow.appendChild(tableData);
        });
        memberList.appendChild(tableRow);
    });
}

function renderAllDetails() {
    displayDetails();
    displayMember();
}

const addMemberLink = document.getElementById('addMember');
const modalAddMember = document.querySelector('.modal-addMember');
const closeAddMember = document.querySelector('.close-addMember');

addMemberLink.addEventListener('click', function(event) {
    event.preventDefault();
    modalAddMember.style.display = 'block';
});

closeAddMember.addEventListener('click', function() {
    modalAddMember.style.display = 'none';
});

const editMemberLink = document.getElementById('editMember');
const modaleditMember = document.querySelector('.modal-editMember');
const closeeditMember = document.querySelector('.close-editMember');

editMemberLink.addEventListener('click', function(event) {
    event.preventDefault();
    modaleditMember.style.display = 'block';
});

closeeditMember.addEventListener('click', function() {
    modaleditMember.style.display = 'none';
});
</script>