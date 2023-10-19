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
            <p>INDIVIDUAL RECORD OF BARANGAY INHABITANTS</p>
            <a href="#">Logout</a>
        </div>

        <div class="household-cont">
            <img src="image/BorderInfo.png" alt="">
            <div class="household-inner-cont">
                <div class="title-cont1">
                    <p>Personal Inforamtion</p>
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
                                <option value=""></option>
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
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>

                        <div class="button-cont1">
                            <input type="submit" class="create-household1" value="Create">
                        </div>
                    </div>
                </form>
            </div>
            <div class="submitHouseholdCont">
                <button type="submit" class="submitHousehold">Create</button>
            </div>
            </form>
        </div>

</body>

</html>