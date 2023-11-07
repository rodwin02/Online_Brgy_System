<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./scss/styles.css?<?php echo time()?>">

</head>

<body>
    <div class="login_page">
        <section class="section-1">
            <img src="./assets/brgy-logo.png" alt="Barangay Logo">
        </section>

        <section class="section-2">
            <div class="close">
                <a href="./main.php">
                    <img src="./assets/close-login.svg" alt="close">
                </a>
            </div>
            <form action="./model/access_login_users.php" method="post">
                <h1>LOGIN</h1>
                <div class="username">
                    <input type="text" name="username" id="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="password">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div>

                <button type="submit">Sign in</button>
            </form>
        </section>
    </div>

</body>

</html>