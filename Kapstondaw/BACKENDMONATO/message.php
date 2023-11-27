<?php include './server/server.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
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
            <p>Messages</p>
            <a href="#">Logout</a>
        </div>
        
        <div class="messages-cont">
            <div class="inbox-cont">
                <div class="search-cont">
                    <label for="search">Search:</label>
                    <input type="text" id="search" placeholder="Search Resident Here..">
                </div>
                <div class="one-inbox">
                    <div class="user-cont">
                        <p class="name">Rodwin C. Homeres</p>
                        <p class="question">Can I ask a question?...</p>
                    </div>
                    <div class="time-cont">
                        <p class="time">7:55 am</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                            <circle cx="4.04541" cy="3.37378" r="3.37378" fill="#EB7878" />
                    </svg>
                </div>

                <div class="one-inbox">
                    <div class="user-cont">
                        <p class="name">Rodwin C. Homeres</p>
                        <p class="question">Can I ask a question?...</p>
                    </div>
                    <div class="time-cont">
                        <p class="time">7:55 am</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                            <circle cx="4.04541" cy="3.37378" r="3.37378" fill="#EB7878" />
                    </svg>
                </div>

            </div>  
            <div class="chat-cont">
                <div class="header-name">
                    <p class="name">Rodwin C. Homeres</p>
                    <p class="location">No.123 Sinigang St. Dasmarinas Cavite</p>
                </div>

                <div class="body-message">
                    
                </div>
            </div>
        </div>
       
       

      

        
    </div>
</body>
</html>