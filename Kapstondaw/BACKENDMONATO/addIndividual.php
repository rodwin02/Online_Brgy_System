<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDIVIDUAL RECORD OF BARANGAY INHABITANT</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
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
            <p>INDIVIDUAL RECORD OF BARANGAY INHABITANT</p>
            <a href="#">Logout</a>
        </div>
        <a href="residentInfo.php" class="backContainer">
            <img src="icons/back.png" alt="">
            <p>Go Back</p>
        </a>

        <form action="#" class="input-form">
             <div class="headerInfo">
                <p>Individual Information</p>
             </div>
             <div class="bodyInfo">
                <div class="leftInfo">
                    <div class="inputFullname">
                        <p>Full name<span>*</span></p>
                        <input type="text" id="lastName" oninput="this.value = this.value.toUpperCase()"
                                placeholder="Last Name" required>
                        <input type="text"  id="firstName" oninput="this.value = this.value.toUpperCase()"
                                placeholder="First Name" required>
                        <input type="text"  id="middleName" oninput="this.value = this.value.toUpperCase()"
                                placeholder="Middle Name"required>     
                        <input type="text" class="suffix" id="ext" oninput="this.value = this.value.toUpperCase()" 
                               placeholder="Suffix">                
                    </div>
                    <div class="inputDob">
                        <p>Date of Birth<span>*</span></p>
                        <input type="date" id="dateBirth" oninput="this.value = this.value.toUpperCase()"
                               required>
                    </div>
                    <div class="inputPob">
                        <p>Place of Birth<span>*</span></p>
                        <input type="text" id="placeBirth" oninput="this.value = this.value.toUpperCase()"
                                required>
                    </div>
                    <div class="inputCitizenship">
                         <p>Citizenship<span>*</span></p>
                        <input type="text" id="citizenship" oninput="this.value = this.value.toUpperCase()"
                                required>
                    </div>
                    <div class="inputPhoneNo">
                       <p>Phone number</p>
                       <input type="number" id="phoneNo" placeholder="e.g., 09123456789">
                    </div>
                    <div class="inputEmail">
                       <p>Email</p>
                       <input type="text" id="email" placeholder="Enter your email">
                    </div>
                </div>

                <div class="rightInfo">
                    <div class="inputAddress">
                        <p>Address<span>*</span></p>
                        <input type="text" class="houseNo" id="no" oninput="this.value = this.value.toUpperCase()"
                               placeholder="House No.">
                        <input type="text" id="streetName" oninput="this.value = this.value.toUpperCase()"
                               placeholder="Street Name"required>
                        <input type="text" id="subdiName" oninput="this.value = this.value.toUpperCase()"
                               placeholder="Subdivision Name">                    
                    </div>

                    <div class="inputOccupation">
                        <p>Occupation <span>*</span></p>
                        <input type="text" id="occupation" oninput="this.value = this.value.toUpperCase()"
                                required>
                    </div>

                    <div class="inputSex">
                        <p>Sex <span>*</span></p>
                        <select id="sex" class="sex111" required>
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="inputCivilStatus">
                        <p>Civil Status <span>*</span></p>
                        <select id="civilStatus" class="civilStatus111" required>
                                <option value=""></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                </div>
             </div>
             <div class="footerInfo">
                <button type="submit" class="addSaTable">Create</button>
             </div>
        </form>
    </div>
</body>
</html>