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

        <form action="./model/add_households.php" method="post">
            <table class="addResidentsTable">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Ext.</th>
                        <th class="no">NO.</th>
                        <th>St. Name</th>
                        <th>Name of Subdivision</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Sex</th>
                        <th>Civil Status</th>
                        <th>Citizenship</th>
                        <th>Occupational</th>
                        <th class="houseTitle">Household Head</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="lastName[]" oninput="this.value = this.value.toUpperCase()"
                                required></td>
                        <td><input type="text" name="firstName[]" oninput="this.value = this.value.toUpperCase()"
                                required></td>
                        <td><input type="text" name="middleName[]" oninput="this.value = this.value.toUpperCase()"
                                required></td>
                        <td><input type="text" name="ext[]" oninput="this.value = this.value.toUpperCase()"></td>
                        <td><input type="text" name="no[]" oninput="this.value = this.value.toUpperCase()"></td>
                        <td><input type="text" name="streetName[]" oninput="this.value = this.value.toUpperCase()"
                                required></td>
                        <td><input type="text" name="subdiName[]" oninput="this.value = this.value.toUpperCase()"></td>
                        <td><input type="date" name="dateBirth[]" oninput="this.value = this.value.toUpperCase()"
                                required></td>
                        <td><input type="text" name="placeBirth[]" oninput="this.value = this.value.toUpperCase()"
                                required></td>

                        <td><select name="sex[]" class="sex111" required>
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </td>
                        <td>
                            <select name="civilStatus[]" class="civilStatus111" required>
                                <option value=""></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </td>
                        <td><input type="text" name="citizenship[]" oninput="this.value = this.value.toUpperCase()"
                                required></td>
                        <td><input type="text" name="occupational[]" oninput="this.value = this.value.toUpperCase()"
                                required></td>
                        <td><input type="radio" name="householdHead[0][]" value="yes"></td>
                        <td>
                            <div class="DeleteBtn" onclick="deleteRow(this)">Delete</div>
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="submitHouseholdCont">
                <button type="submit" class="submitHousehold">Create</button>
            </div>

        </form>
        <div class="addRowCont">
            <button onclick="addRow()" class="addRow">Add Row</button>
        </div>
    </div>

</body>

</html>


<script>
function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
function addRow() {
    var table = document.querySelector("table tbody");
    var newRow = document.createElement("tr");
    var columns = ["lastName", "firstName", "middleName", "ext", "no", "streetName", "subdiName", "dateBirth",
        "placeBirth", "sex", "civilStatus", "citizenship", "occupational", "householdHead"
    ];

    for (var i = 0; i < columns.length; i++) {
        var cell = document.createElement("td");
        var input;

        if (columns[i] === "sex" || columns[i] === "civilStatus") {
            input = document.createElement("select");
            input.name = columns[i] + "[]";
            input.required = true;

            var emptyOption = document.createElement("option");
            emptyOption.value = "";
            input.appendChild(emptyOption);

            if (columns[i] === "sex") {
                var maleOption = document.createElement("option");
                maleOption.value = "Male";
                maleOption.text = "Male";
                input.appendChild(maleOption);

                var femaleOption = document.createElement("option");
                femaleOption.value = "Female";
                femaleOption.text = "Female";
                input.appendChild(femaleOption);
            } else if (columns[i] === "civilStatus") {
                var options = ["Single", "Married", "Divorced", "Widowed"];
                for (var optionText of options) {
                    var option = document.createElement("option");
                    option.value = optionText;
                    option.text = optionText;
                    input.appendChild(option);
                }
            }
        } else if (columns[i] === "householdHead") {
            input = document.createElement("input");
            input.type = "radio";
            input.name = columns[i] + "[" + table.rows.length + "][]";
            input.value = "yes";
            input.className = "radio-input";
        } else if (columns[i] === "no" || columns[i] === "streetName" || columns[i] === "subdiName") {
            // Use hidden fields to store the initial values
            input = document.createElement("input");
            input.type = "hidden";
            input.name = "initial" + columns[i];
            input.value = document.querySelector("table tbody tr:first-child td:nth-child(" + (i + 1) + ") input")
                .value;

            // Display the initial value in a read-only input field
            var displayInput = document.createElement("input");
            displayInput.type = "text";
            displayInput.name = columns[i] + "[]";
            displayInput.value = input.value;
            displayInput.readOnly = true;

            cell.appendChild(input);
            cell.appendChild(displayInput);
        } else if (columns[i] === "dateBirth") {
            // Create a new date input
            input = document.createElement("input");
            input.type = "date";
            input.name = columns[i] + "[]";
            input.required = true;
        } else {
            input = document.createElement("input");
            input.type = "text";
            input.name = columns[i] + "[]";
            input.setAttribute("oninput", "this.value = this.value.toUpperCase()");
        }

        cell.appendChild(input);
        newRow.appendChild(cell);
    }

    // Add a "Delete" button to the new row and attach the deleteRow function
    var deleteCell = document.createElement("td");
    var deleteButton = document.createElement("div");
    deleteButton.className = "DeleteBtn";
    deleteButton.textContent = "Delete";
    deleteButton.onclick = function() {
        deleteRow(deleteButton);
    };
    deleteCell.appendChild(deleteButton);
    newRow.appendChild(deleteCell);

    table.appendChild(newRow);
} 
</script>