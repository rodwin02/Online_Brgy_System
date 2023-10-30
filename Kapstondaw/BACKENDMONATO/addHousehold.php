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
                        <input type="text" id="lastName" oninput="this.value = this.value.toUpperCase()"
                                required>
                        <input type="text"  id="firstName" oninput="this.value = this.value.toUpperCase()"
                                required>
                        <input type="text"  id="middleName" oninput="this.value = this.value.toUpperCase()"
                                required>     
                        <input type="text" class="suffix" id="ext" oninput="this.value = this.value.toUpperCase()">                
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
                       <input type="number" id="phoneNo">
                    </div>
                    <div class="inputEmail">
                       <p>Email</p>
                       <input type="text" id="email">
                    </div>
                </div>

                <div class="rightInfo">
                    <div class="inputAddress">
                        <p>Address<span>*</span></p>
                        <input type="text" class="houseNo" id="no" oninput="this.value = this.value.toUpperCase()"
                                required>
                        <input type="text" id="streetName" oninput="this.value = this.value.toUpperCase()"
                                required>
                        <input type="text" id="subdiName" oninput="this.value = this.value.toUpperCase()"
                                required>                    
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
                <button type="submit" class="addSaTable" onclick="displayData()">Create</button>
             </div>
        </form>

        <p class="List">List of Members</p>
        
        <form action="#" class="input-table">
            <table>
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Date of Birth</th>
                        <th>House No</th>
                        <th>Street Name</th>
                        <th>Subdivision Name</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be dynamically added here using JavaScript -->
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>


<script>
    // Function to display data in the input-table and clear input fields
    function displayData() {
        // Get references to the visible input fields
        var requiredFields = [
            "lastName",
            "firstName",
            "middleName",
            "dateBirth",
            "no",
            "streetName",
            "subdiName"
        ];

        // Check if the required fields in the input-form are filled
        var missingFields = requiredFields.filter(function(fieldName) {
            var field = document.getElementById(fieldName);
            return field.value.trim() === "";
        });

        if (missingFields.length > 0) {
            alert("Please fill in all required fields in the input form.");
            return;
        }

        // Reference to the table in the input-table form
        var table = document.querySelector(".input-table table");

        // Create a new row and cells in the table
        var newRow = table.insertRow(-1);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);
        var cell5 = newRow.insertCell(4);
        var cell6 = newRow.insertCell(5);
        var cell7 = newRow.insertCell(6);

        // Populate the cells with the input data
        cell1.innerHTML = document.getElementById("lastName").value;
        cell2.innerHTML = document.getElementById("firstName").value;
        cell3.innerHTML = document.getElementById("middleName").value;
        cell4.innerHTML = document.getElementById("dateBirth").value;
        cell5.innerHTML = document.getElementById("no").value;
        cell6.innerHTML = document.getElementById("streetName").value;
        cell7.innerHTML = document.getElementById("subdiName").value;

        // Clear only the visible input fields
        requiredFields.forEach(function(fieldName) {
            document.getElementById(fieldName).value = "";
        });

        // Store "Citizenship," "Phone Number," "Email," and "Place of Birth" in hidden input fields
        var citizenship = document.getElementById("citizenship").value;
        var phoneNo = document.getElementById("phoneNo").value;
        var email = document.getElementById("email").value;
        var placeBirth = document.getElementById("placeBirth").value;

        // Create hidden input fields to store the data
        var citizenshipInput = document.createElement("input");
        citizenshipInput.type = "hidden";
        citizenshipInput.name = "hidden_citizenship";
        citizenshipInput.value = citizenship;
        document.getElementById("input-form").appendChild(citizenshipInput);

        var phoneNoInput = document.createElement("input");
        phoneNoInput.type = "hidden";
        phoneNoInput.name = "hidden_phoneNo";
        phoneNoInput.value = phoneNo;
        document.getElementById("input-form").appendChild(phoneNoInput);

        var emailInput = document.createElement("input");
        emailInput.type = "hidden";
        emailInput.name = "hidden_email";
        emailInput.value = email;
        document.getElementById("input-form").appendChild(emailInput);

        var placeBirthInput = document.createElement("input");
        placeBirthInput.type = "hidden";
        placeBirthInput.name = "hidden_placeBirth";
        placeBirthInput.value = placeBirth;
        document.getElementById("input-form").appendChild(placeBirthInput);
    }
</script>




