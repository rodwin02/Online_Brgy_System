<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Household</title>
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
            <p>RECORD OF BARANGAY INHABITANTS BY HOUSEHOLD</p>
            <a href="#">Logout</a>
        </div>
        <a href="residentInfo.php" class="backContainer">
            <img src="icons/back.png" alt="">
            <p>Go Back</p>
        </a>

        <form action="#" class="input-form">
             <div class="headerInfo">
                <p>Household Information</p>
             </div>
             <div class="bodyInfo">
                <div class="leftInfo">
                    <div class="inputFullname">
                        <p>Full name<span>*</span></p>
                        <input type="text" id="lastName[]" oninput="this.value = this.value.toUpperCase()"
                                required>
                        <input type="text"  id="firstName[]" oninput="this.value = this.value.toUpperCase()"
                                required>
                        <input type="text"  id="middleName[]" oninput="this.value = this.value.toUpperCase()"
                                required>     
                        <input type="text" class="suffix" id="ext[]" oninput="this.value = this.value.toUpperCase()">                
                    </div>
                    <div class="inputDob">
                        <p>Date of Birth<span>*</span></p>
                        <input type="date" id="dateBirth[]" oninput="this.value = this.value.toUpperCase()"
                                required>
                    </div>
                    <div class="inputPob">
                        <p>Place of Birth<span>*</span></p>
                        <input type="text" id="placeBirth[]" oninput="this.value = this.value.toUpperCase()"
                                required>
                    </div>
                    <div class="inputCitizenship">
                         <p>Citizenship<span>*</span></p>
                        <input type="text" id="citizenship[]" oninput="this.value = this.value.toUpperCase()"
                                required>
                    </div>
                    <div class="inputPhoneNo">
                       <p>Phone number</p>
                       <input type="number" id="phoneNo[]">
                    </div>
                    <div class="inputEmail">
                       <p>Email</p>
                       <input type="text" id="email[]">
                    </div>
                </div>

                <div class="rightInfo">
                    <div class="inputAddress">
                        <p>Address<span>*</span></p>
                        <input type="text" class="houseNo" id="no[]" oninput="this.value = this.value.toUpperCase()"
                                required>
                        <input type="text" id="streetName[]" oninput="this.value = this.value.toUpperCase()"
                                required>
                        <input type="text" id="subdiName[]" oninput="this.value = this.value.toUpperCase()"
                                required>                    
                    </div>

                    <div class="inputOccupation">
                        <p>Occupation <span>*</span></p>
                        <input type="text" id="occupational[]" oninput="this.value = this.value.toUpperCase()"
                                required>
                    </div>

                    <div class="inputSex">
                        <p>Sex <span>*</span></p>
                        <select id="sex[]" class="sex111" required>
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="inputCivilStatus">
                        <p>Civil Status <span>*</span></p>
                        <select id="civilStatus[]" class="civilStatus111" required>
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
                <button type="submit" class="addSaTable" onclick="displayData()">Create</button>
             </div>
        </form>

        <p class="List">List of Members</p>
        
        <table class="addResidentsTable">
                <thead>
                    <tr>
                       <th>Full Name</th>
                       <th>Address</th>
                       <th>Date of Birth</th>
                       <th>Civil Status</th>
                       <th>Sex</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>    
                        <td>
                            Last Name: <span id="lastNameValue"></span><br>
                            First Name: <span id="firstNameValue"></span><br>
                            Middle Name: <span id="middleNameValue"></span><br>
                            Suffix: <span id="extValue"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</body>
</html>

<script>
        function displayData() {
            document.getElementById("lastNameValue").textContent = document.getElementById("lastName[]").value;
            document.getElementById("firstNameValue").textContent = document.getElementById("firstName[]").value;
            document.getElementById("middleNameValue").textContent = document.getElementById("middleName[]").value;
            document.getElementById("extValue").textContent = document.getElementById("ext[]").value;
            document.getElementById("dateBirthValue").textContent = document.getElementById("dateBirth[]").value;
            document.getElementById("placeBirthValue").textContent = document.getElementById("placeBirth[]").value;
            document.getElementById("citizenshipValue").textContent = document.getElementById("citizenship[]").value;
            document.getElementById("phoneNoValue").textContent = document.getElementById("phoneNo[]").value;
            document.getElementById("emailValue").textContent = document.getElementById("email[]").value;
            document.getElementById("noValue").textContent = document.getElementById("no[]").value;
            document.getElementById("streetNameValue").textContent = document.getElementById("streetName[]").value;
            document.getElementById("subdiNameValue").textContent = document.getElementById("subdiName[]").value;
            document.getElementById("occupationalValue").textContent = document.getElementById("occupational[]").value;
            document.getElementById("sexValue").textContent = document.getElementById("sex[]").value;
            document.getElementById("civilStatusValue").textContent = document.getElementById("civilStatus[]").value;
        }
    </script>



