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

        <form action="./model/add_households.php" method="post">
            <table class="addResidentsTable">
                <thead>
                    <tr>
                        <th>Taxpayer Name</th>
                        <th>Business Name</th>
                        <th>Business Address</th>
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
                        
                        <td>
                            <div class="DeleteBtn" onclick="clearRow(this)">Clear</div>
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="submitHouseholdCont">
                <button type="submit" class="submitHousehold">Create</button>
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
