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
if(isset($_SESSION['message'])) 
{ ?>
<div class="active-success">
    <div class="container">
        <h2><?php echo $_SESSION['message']; ?></h2>
    </div>
</div>
<?php unset($_SESSION['message']);
} ?>