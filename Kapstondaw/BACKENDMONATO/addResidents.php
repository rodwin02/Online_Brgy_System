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
                            <input type="text" id="firstName" class="firstName" name="firstname" required>
                        </div>
                        <div class=" input-container">
                            <label for="middleName">Middle Name:</label>
                            <input type="text" id="middleName" class="middleName" name="middlename">
                        </div>
                        <div class="input-container">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" class="lastName" name="lastname" required>
                        </div>
                        <div class="input-container">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" class="dob" required>
                        </div>
                        <div class="input-container">
                            <label for="sex">Sex:</label>
                            <select name="sex" id="sex" class="sex">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="pob">Place of Birth:</label>
                            <input type="text" id="pob" name="place-of-birth" class="pob" required>
                        </div>
                    </div>
                    <div class="right-hold-cont">
                        <div class="input-container">
                            <label for="address">Address:</label>
                            <input type="text" id="houseNo" class="houseNo" placeholder="house no." name="house-no">
                            <input type="text" id="streetNo" class="streetNo" placeholder="street no." name="street">
                            <input type="text" id="Subdi" class="Subdi" placeholder="subdivision/zone/sitio/purok"
                                name="subdivision">
                        </div>

                        <div class="input-container">
                            <label for="Citizenship">Citizenship:</label>
                            <input type="text" id="Citizenship" name="citizenship">
                        </div>

                        <div class="input-container">
                            <label for="occupation">Occupation:</label>
                            <input type="text" id="occupation" name="occupation">
                        </div>

                        <div class="input-container">
                            <label for="civilStatus">Civil Status:</label>
                            <select id="civilStatus" class="civilStatus" name="civil-status">
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>

                        <div class="input-container">
                            <label for="emailmo">Email:</label>
                            <input type="email" id="emailmo" name="email">
                        </div>

                        <input type="hidden" value="Head" name="household-head">

                        <div class="button-cont">
                            <div class="addMember" id="addMember">Add</div>
                            <input type="submit" class="create-household" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="members-cont">
            <p>HOUSEHOLD MEMBERS</p>
            <div class="member">
                <div class="fullName">Rodwin C. Homeres</div>
                <div class="address">23 kanto lang st.</div>
                <div class="bday">09/21/23</div>
                <div class="gender">Male</div>
                <div class="action" id="editMember">Edit</div>
            </div>



        </div>
    </div>


    <div class="modal-addMember">
        <form action="#" class="member-form">
            <div class="title-member">
                <p>Household Member Information</p>
                <img src="icons/close 1.png" class="close-addMember" alt="">
            </div>

            <div class="member-container">
                <div class="left-member-cont">
                    <div class="input-container">
                        <label for="firstName1">First Name:</label>
                        <input type="text" id="firstName1" class="firstName">
                    </div>
                    <div class="input-container">
                        <label for="middleName1">Middle Name:</label>
                        <input type="text" id="middleName1" class="middleName">
                    </div>
                    <div class="input-container">
                        <label for="lastName1">Last Name:</label>
                        <input type="text" id="lastName1" class="lastName">
                    </div>
                    <div class="input-container">
                        <label for="dob1">Date of Birth:</label>
                        <input type="date" id="dob1" name="dob" class="dob" required>
                    </div>
                    <div class="input-container">
                        <label for="sex1">Sex:</label>
                        <select name="sex" id="sex1" class="sex">
                            <option value=""></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="pob1">Place of Birth:</label>
                        <input type="text" id="pob1" name="pob" class="pob" required>
                    </div>
                </div>

                <div class="right-member-cont">
                    <div class="input-container">
                        <label for="Citizenship1">Citizenship:</label>
                        <input type="text" id="Citizenship1">
                    </div>

                    <div class="input-container">
                        <label for="occupation1">Occupation:</label>
                        <input type="text" id="occupation1">
                    </div>

                    <div class="input-container">
                        <label for="civilStatus1">Civil Status:</label>
                        <select name="civilStatus" id="civilStatus1" class="civilStatus">
                            <option value=""></option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>

                    <div class="button-cont">
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
                            <option value=""></option>
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
                            <option value=""></option>
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