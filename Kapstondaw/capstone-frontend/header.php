<header class="hide" id="website-header">
    <div class="menu">
        <img src="./assets/menu.png" alt="menu" id="menu" />
    </div>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href=" #announcement">Announcement</a></li>
        <li><img src="../BACKENDMONATO/uploads/<?php echo $brgy_logo ?>" alt="" /></li>
        <li>Contact us!</li>
        <?php if(isset($_SESSION['username'])) { ?>
        <li><a href="./Cart.php">Cart</a></li>
        <li><?php echo $_SESSION['username'];?></li>
        <li><a href="./model/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></li>
        <?php } else {?>
        <li class="" id=""><a href="./login_page.php">Login</a></li>
        <?php } ?>
    </ul>
</header>

<div class="hide subHeader" id="subHeader">
    <div class="layer1">
        <div class="logo">
            <img src="../BACKENDMONATO/uploads/<?php echo $brgy_logo ?>" alt="brgy-logo" />
        </div>
        <div class="brgy">
            <span>Republic of the Philippines</span>
            <h2>Zone IV Dasmariñas Cavite</h2>
        </div>
    </div>

    <ul class="sub-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#announcement">Announcement</a></li>
        <li>Contact us!</li>
        <?php if(isset($_SESSION['username'])) { ?>
        <li><a href="./Cart.php">Cart</a></li>
        <li><?php echo $_SESSION['username'];?></li>
        <li><a href="./model/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></li>
        <?php } else {?>
        <li class="" id=""><a href="./login_page.php">Login</a></li>
        <?php } ?>
    </ul>
</div>

<div class="active-menu" id="active-menu">
    <div class="container" id="active-container">
        <div class="sub-container">
            <div>
                <h2 id="close-menu">x</h2>
            </div>
            <ul>
                <?php if(isset($_SESSION['username'])) { ?>
                <li><a href="./Cart.php">Cart</a></li>
                <li><?php echo $_SESSION['username'];?></li>
                <li><a href="./model/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></li>
                <?php } else {?>
                <li class="login" id="login">Login</li>
                <?php } ?>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#announcement">Announcement</a></li>
                <li>Contact us!</li>
            </ul>
        </div>
    </div>
</div>