<div class="active-login">
    <form action="./model/access_login_users.php" method="POST">
        <p class="active-login-close">x</p>
        <h1>Login</h1>
        <div class="container">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="container">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter username">
        </div>
        <button type="submit" class="active-login-submit">Submit</button>
    </form>
</div>


<?php 
if(isset($_SESSION['success'])) 
{ ?>
<div class="active-success">
    <div class="container">
        <div class="close-icon-message"><img src="./assets/close-login.svg" alt=""></div>
        <h2><?php echo $_SESSION['message']; ?></h2>
        <p>Thank you for your request. We are working on it! To check your request status, please go to <a
                href="Cart.php">"Request Status"</a> page.
        </p>
    </div>
</div>
<?php unset($_SESSION['success']);
} ?>