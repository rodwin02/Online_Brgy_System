<header class="hide" id="website-header">
    <div class="menu">
        <img src="./assets/menu.png" alt="menu" id="menu" />
    </div>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><img src="./assets/Header-logo.png" alt="" /></li>
        <li><a href="#announcement">Announcement</a></li>
        <li>Contact us!</li>
        <?php if(isset($_SESSION['username'])) { ?>
        <li><?php echo $_SESSION['username'];?></li>
        <li><a href="../BACKENDMONATO/model/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></li>
        <?php } else {?>
        <li class="login" id="login">Login</li>
        <?php } ?>
    </ul>
</header>

<div class="hide subHeader" id="subHeader">
    <div class="layer1">
        <div class="logo">
            <img src="./assets/brgy-logo.png" alt="brgy-logo" />
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
        <li><?php echo $_SESSION['username'];?></li>
        <li><a href="../BACKENDMONATO/model/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></li>
        <?php } else {?>
        <li class="login" id="login">Login</li>
        <?php } ?>
    </ul>
</div>