<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Businesst</title>
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
            <p>Business List of <span id="currentYear"></span></p>
            <a href="#">Logout</a>
        </div>
        <a href="business.php" class="backContainer">
            <img src="icons/back.png" alt="">
            <p>Go Back</p>
        </a>

        <form action="./model/add_business.php" method="post">
            <div class="BusinessCont">
                <div class="businessHeader">
                    <p>Business Registration</p>
                </div>
                <div class="businessBody">
                    <div class="left-cont">
                        <div class="input-business">
                            <label for="taxPayer_name">Taxpayer Name</label>
                            <input type="text" name="taxPayer_lname" id="taxPayer_lname" placeholder="Last Name">
                            <input type="text" name="taxPayer_fname" id="taxPayer_fname" placeholder="First Name">
                            <input type="text" name="taxPayer_mname" id="taxPayer_mname" placeholder="Middle Name">
                            <input type="text" name="taxPayer_suffix" id="taxPayer_suffix" placeholder="Suffix">
                        </div>
                        <div class="input-business">
                            <label for="taxPayer_name">Location</label>
                            <input type="text" name="taxPayer_houseNo" id="taxPayer_houseNo" placeholder="House no.">
                            <input type="text" name="taxPayer_street" id="taxPayer_street" placeholder="Street Name">
                            <input type="text" name="taxPayer_subdivision" id="taxPayer_subdivision"
                                placeholder="Subdivision Name">
                        </div>
                        <label for="businessType">Type</label>
                        <select name="businessType" id="businessType">
                            <option value="">Select Type</option>
                            <option value="New">New</option>
                            <option value="Renewal">Renewal</option>
                        </select>
                    </div>

                    <div class="right-cont">
                        <div class="input-business">
                            <label for="business_name">Taxpayer Name</label>
                            <input type="text" name="business_name" id="business_name" placeholder="Business Name">
                        </div>
                        <div class="input-business">
                            <label for="date">Date</label>
                            <input type="date">

                            <label for="businessStatus">Status</label>
                            <select name="businessStatus" id="businessStatus">
                                <option value="">Select Status</option>
                                <option value="Food">Food</option>
                                <option value=""></option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="submitHouseholdCont">
                <button type="submit" class="">Create</button>
            </div>

        </form>


    </div>

</body>

</html>
<script>
// Function to update the current year
function updateYear() {
    const currentYear = new Date().getFullYear(); // Get the current year
    const yearElement = document.getElementById("currentYear"); // Get the element by ID
    yearElement.textContent = currentYear; // Set the text content to the current year
}

// Call the function to initially set the year
updateYear();

// Set up an interval to update the year every minute (adjust as needed)
setInterval(updateYear, 60000); // 60000 milliseconds = 1 minute

// Function to clear input fields in a row
function clearRow(button) {
    const row = button.closest('tr');
    const inputs = row.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = ''; // Clear the input value
    });
}
</script>