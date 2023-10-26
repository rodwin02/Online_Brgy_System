<div class="active-menu" id="active-menu">
    <div class="container" id="active-container">
        <div class="sub-container">
            <div>
                <h2 id="close-menu">x</h2>
            </div>
            <ul>
                <?php if(isset($_SESSION['username'])) { ?>
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


<div class="active-service" id="active-service">
    <form class="active-form" action="./model/request_brgyId.php" method="post">
        <p class="active-service-close">x</p>
        <h2>Barangay ID</h2>
        <div class="container requestor">
            <label for="requestor">Requestor</label>
            <input class="requestorName" type="text" name="requestor_fname" id="requestor"
                placeholder="Enter requestor firstname">
            <input class="requestorName" type="text" name="requestor_mname" id="requestor"
                placeholder="Enter requestor middlename">
            <input class="requestorName" type="text" name="requestor_lname" id="requestor"
                placeholder="Enter requestor lastname">
        </div>
        <div class="container">
            <label for="contact-number">Contact Number</label>
            <input required type="text" name="contactNo" id="contact-number" placeholder="Enter Contact Number" />
        </div>
        <div class="container">
            <label for="for">For</label>
            <select name="documentFor" id="for" class="for">
                <option value="self">For self</option>
                <option value="Someone">For someone else</option>
            </select>
        </div>
        <input type="text" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
        <input type="text" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
        <input type="text" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
        <input type="text" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
        <input type="text" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
        <input type="text" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
        <input type="text" name="applicant_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
        <input type="text" name="applicant_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
        <input type="text" name="applicant_civilStatus" value="<?php echo $_SESSION['civil'] ?>">
        <button type="submit" class="active-service-request">Request</button>
    </form>
</div>


<div class="active-service" id="active-service">
    <form class="active-form" action="./model/request_brgyClearance.php" method="post">
        <p class=" active-service-close">x</p>
        <h2>Barangay Clearance</h2>
        <!-- <div class="container">
            <label for="name">Name</label>
            <input required type="text" name="name" id="name" placeholder="Enter your name" />
        </div>
        <div class="container">
            <label for="purpose">Purpose</label>
            <textarea required name="purpose" id="purpose" placeholder="Enter your purpose"></textarea>
        </div> -->

        <input type="text" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
        <input type="text" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
        <input type="text" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
        <input type="text" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
        <input type="text" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
        <input type="text" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
        <input type="text" name="applicant_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
        <input type="text" name="applicant_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
        <button type="submit" class="active-service-request">Request</button>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./model/request_endoresement.php" method="POST">
        <p class="active-service-close">x</p>
        <h2>Endorsement</h2>
        <div class="container requestor">
            <label for="requestor">Requestor</label>
            <input class="requestorName" type="text" name="requestor_fname" id="requestor"
                placeholder="Enter requestor firstname">
            <input class="requestorName" type="text" name="requestor_mname" id="requestor"
                placeholder="Enter requestor middlename">
            <input class="requestorName" type="text" name="requestor_lname" id="requestor"
                placeholder="Enter requestor lastname">
        </div>
        <!-- <div class="container">
            <label for="purpose">Purpose</label>
            <textarea name="purpose" id="purpose" placeholder="Enter your purpose"></textarea>
        </div> -->
        <div class="container">
            <label for="for">For</label>
            <select name="documentFor" id="for" class="for">
                <option value="Self">For self</option>
                <option value="Someone">For someone else</option>
            </select>
        </div>

        <input type="text" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
        <input type="text" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
        <input type="text" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
        <input type="text" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
        <input type="text" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
        <input type="text" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">

        <button type="submit" class="active-service-request">Request</button>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./model/request_certOfIndigency.php" method="POST">
        <p class="active-service-close">x</p>
        <h2>Certificate of Indigency</h2>
        <div class="container requestor">
            <label for="requestor">Requestor</label>
            <input class="requestorName" type="text" name="requestor_fname" id="requestor"
                placeholder="Enter requestor firstname">
            <input class="requestorName" type="text" name="requestor_mname" id="requestor"
                placeholder="Enter requestor middlename">
            <input class="requestorName" type="text" name="requestor_lname" id="requestor"
                placeholder="Enter requestor lastname">
        </div>
        <!-- <div class="container">
            <label for="purpose">Purpose</label>
            <textarea required name="purpose" id="purpose" placeholder="Enter your purpose"></textarea>
        </div> -->
        <div class="container">
            <label for="for">For</label>
            <select name="documentFor" id="For" class="for">
                <option value="Self">For self</option>
                <option value="Someone">For someone else</option>
            </select>
        </div>

        <input type="text" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
        <input type="text" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
        <input type="text" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
        <input type="text" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
        <input type="text" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
        <input type="text" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">


        <button type="submit" class="active-service-request">Request</button>
    </form>
</div>


<div class="active-service" id="active-service">
    <form class="active-form" action="./model/request_certOfLBR.php" method="post">
        <p class="active-service-close">x</p>
        <h2>Certificate of Late Birth Registration</h2>
        <div class="container">
            <label for="ffname">Father's Firstname</label>
            <input required type="text" name="ffname" id="ffname" placeholder="Enter Father's Firstname" />
        </div>
        <div class="container">
            <label for="fmname">Father's Middlename</label>
            <input required type="text" name="fmname" id="fmname" placeholder="Enter Father's Middlename" />
        </div>
        <div class="container">
            <label for="flname">Father's Lastname</label>
            <input required type="text" name="flname" id="flname" placeholder="Enter Father's Lastname" />
        </div>
        <div class="container">
            <label for="mfname">Mother's Firstname</label>
            <input required type="text" name="mfname" id="mfname" placeholder="Enter Mother's Firstname" />
        </div>
        <div class="container">
            <label for="mmname">Mohert's Middlename</label>
            <input required type="text" name="mmname" id="mmname" placeholder="Enter Mother's Middlename" />
        </div>
        <div class="container">
            <label for="mlname">Mother's Lastname</label>
            <input required type="text" name="mlname" id="mlname" placeholder="Enter Mother's Lastname" />
        </div>
        <div class="container">
            <label for="for">For</label>
            <select name="documentFor" id="For" class="for">
                <option value="Self">For self</option>
                <option value="Someone">For someone else</option>
            </select>
        </div>
        <!-- <div class="container">
            <label for="reason">Reason</label>
            <textarea required name="purpose" id="reason" placeholder="Enter Reason"></textarea>
        </div> -->
        <input type="text" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
        <input type="text" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
        <input type="text" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
        <input type="text" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
        <input type="text" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
        <input type="text" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
        <button type="submit" class="active-service-request">Request</button>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./model/request_businessClearance.php" method="post">
        <p class="active-service-close">x</p>
        <h2>Business Clearance</h2>
        <div class="container">
            <label for="business-name">Name of Business</label>
            <input required type="text" name="business_name" id="business-name" placeholder="Enter Business Name" />
        </div>
        <div class="container">
            <label for="business-owner-name">Business Owner Firstname</label>
            <input required type="text" name="owner_fname" id="business-owner-fname"
                placeholder="Enter Business Owner" />
        </div>
        <div class="container">
            <label for="business-owner-name">Business Owner Middlename</label>
            <input required type="text" name="owner_mname" id="business-owner-mname"
                placeholder="Enter Business Owner" />
        </div>
        <div class="container">
            <label for="business-owner-name">Business Owner Lastname</label>
            <input required type="text" name="owner_lname" id="business-owner-lname"
                placeholder="Enter Business Owner" />
        </div>
        <div class="container">
            <label for="business-address">Address of Business</label>
            <input required type="text" name="business_address" id="business-address"
                placeholder="Enter Business Address" />
        </div>
        <!-- <div class="container">
            <label for="date-of-closure">Date of Closure</label>
            <input required type="text" name="name" id="date-of-closure" placeholder="Enter Date of Closure" />
        </div>
        <div class="container">
            <label for="reason">Reason</label>
            <textarea required name="purpose" id="reason" placeholder="Enter Reason"></textarea>
        </div> -->
        <button type="submit" class="active-service-request">Request</button>
    </form>
</div>