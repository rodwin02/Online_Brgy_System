<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Information</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>


    <div class="home_residents">
        <div class="first_layer">
            <p>Barangay Information</p>
            <a href="#">Logout</a>
        </div>

        <form action="./model/update_brgy_information.php" method="post" enctype="multipart/form-data">
            <div class="barangay-body">
                <div class="barangay-layer1">
                    <div class="left-layer">
                        <div class="barangay-input">
                            <label for="barangay-name">Barangay Name</label>
                            <input type="text" name="barangay_name" id="barangay-name" value="<?= $brgy_name?>">
                        </div>
                        <div class="barangay-input">
                            <label for="municipality-name">Municipality Name</label>
                            <input type="text" name="municipality_name" id="municipality-name"
                                value="<?= $town_name ?>">
                        </div>
                        <div class="barangay-input">
                            <label for="province-name">Province Name</label>
                            <input type="text" name="province_name" id="municipality-name"
                                value="<?= $province_name ?>">
                        </div>
                        <div class="barangay-input">
                            <label for="email-name">Email</label>
                            <input type="text" name="email" id="email-name" value="<?= $email?>">
                        </div>
                        <div class="barangay-input">
                            <label for="contact-number">Contact Number</label>
                            <input type="text" name="contact-number" id="contact-number" value="<?= $contactNo ?>">
                        </div>
                        <div class="barangay-input">
                            <label for="address-name">Address</label>
                            <div class="address-cont-brgy">
                                <input type="text" name="address-no" id="address-no" placeholder="House no."
                                    value="<?= $addressNo ?>">
                                <input type="text" name="address-street" id="address-street" placeholder="Street"
                                    value="<?= $addressStreet ?>">
                                <input type="text" name="address-subdi" id="address-subdi" placeholder="Subdivision"
                                    value="<?= $addressSubdi ?>">
                            </div>
                        </div>
                    </div>

                    <div class="right-layer">
                        <div class="office-hrs-cont">
                            <p>Office Hours</p>
                            <div class="office-rect">
                                <div class="openClose-cont">
                                    <div class="input-time">
                                        <label for="open-time">Open at</label>
                                        <input type="time" id="open-time" name="open-time"
                                            value="<?= $formattedOpenTime ?>">
                                    </div>
                                    <div class="input-time">
                                        <label for="close-time">Close at</label>
                                        <input type="time" id="close-time" name="close-time"
                                            value="<?= $formattedCloseTime ?>">
                                    </div>
                                </div>
                                <div class="days-cont">
                                    <input type="checkbox" id="sun" name="sun">
                                    <label for="sun">Sun</label>
                                    <input type="checkbox" id="mon" name="mon">
                                    <label for="mon">Mon</label>
                                    <input type="checkbox" id="tue" name="tue">
                                    <label for="tue">Tue</label>
                                    <input type="checkbox" id="wed" name="wed">
                                    <label for="wed">Wed</label>
                                    <input type="checkbox" id="thu" name="thu">
                                    <label for="thu">Thu</label>
                                    <input type="checkbox" id="fri" name="fri">
                                    <label for="fri">Fri</label>
                                    <input type="checkbox" id="sat" name="sat">
                                    <label for="sat">Sat</label>
                                </div>
                            </div>
                        </div>
                        <div class="img-cont">
                            <div class="left-img">
                                <label for="imageInput1">Municipality Logo</label>
                                <div id="imagePreview1">
                                    <img src="./uploads/logo/<?= $municipality_logo ?>" alt="Barangay Logo">
                                </div>
                                <input type="file" name="municipality_logo" id="imageInput1" accept="image/*"
                                    onchange="previewImage1()">
                            </div>
                            <div class="right-img">
                                <label for="imageInput2">Barangay Logo</label>
                                <div id="imagePreview2" class="image-preview">
                                    <img src="./uploads/logo/<?= $brgy_logo ?>" alt="Barangay Logo">
                                </div>
                                <input type="file" name="barangay_logo" id="imageInput2" accept="image/*"
                                    onchange="previewImage2()">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="barangay-layer2">
                    <div class="menu-img-cont">
                        <label for="menu-img">Menu Image</label>
                        <div class="menu-center">
                            <div id="MenuPreview" class="image-preview">
                                <img src="./uploads/logo/<?= $header_image ?>" alt="">
                            </div>
                            <input type="file" name="header_image" id="menu-img" accept="image/*" onchange="previewMenu()">
                        </div>
                    </div>
                    <div class="historical-desc">
                        <label for="history-desc">Historical Background Description</label>
                        <div class="history-center">
                        <section>
                            <div class="row">
                                <div class="col">
                                    <div class="first box">
                                        <input id="font-size" type="number" value="16" min="1" max="100" onchange="f1(this)">
                                    </div>
                                    <div class="second box">
                                        <button type="button" onclick="f2(this)">
                                            <i class="fa-solid fa-bold"></i>
                                        </button>
                                        <button type="button" onclick="f3(this)">
                                            <i class="fa-solid fa-italic"></i>
                                        </button>
                                        <button type="button" onclick="f4(this)">
                                            <i class="fa-solid fa-underline"></i>
                                        </button>
                                    </div>
                                    <div class="third box">
                                        <button type="button" onclick="f5(this)">
                                            <i class="fa-solid fa-align-left"></i>
                                        </button>
                                        <button type="button" onclick="f6(this)">
                                            <i class="fa-solid fa-align-center"></i>
                                        </button>
                                        <button type="button" onclick="f7(this)">
                                            <i class="fa-solid fa-align-right"></i>
                                        </button>
                                    </div>
                                    <div class="fourth box">
                                        <button type="button" onclick="f8(this)">aA</button>
                                        <button type="button" onclick="f9()">
                                            <i class="fa-solid fa-text-slash"></i>
                                        </button>
                                        <input type="color" onchange="f10(this)">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <textarea id="textarea1" placeholder="Your text here "><?= $historicalBackground ?></textarea>
                                </div>
                            </div>
                        </section>

                        <script src="app.js"></script>
                        </div>
                    </div>
                    <div class="historical-img">
                        <label for="history-img">Historical Background Image</label>
                        <div id="ImgPreview" class="image-preview">
                            <img src="./uploads/logo/<?= $officials_image ?>" alt="Historical Background Image">
                        </div>
                        <input type="file" name="historicalBackground_image" id="history-img" accept="image/*"
                            onchange="previewHistoryImage()">
                    </div>
                    <div class="MissionVision-cont">
                        <div class="mission-cont">
                            <label for="mission">Mission</label>
                            <section>
                                <div class="row">
                                    <div class="colMission">
                                        <div class="first box">
                                            <input id="font-size1" type="number" value="16" min="1" max="100" onchange="f1(this)">
                                        </div>
                                        <div class="second box">
                                            <button type="button" onclick="f2(this)">
                                                <i class="fa-solid fa-bold"></i>
                                            </button>
                                            <button type="button" onclick="f3(this)">
                                                <i class="fa-solid fa-italic"></i>
                                            </button>
                                            <button type="button" onclick="f4(this)">
                                                <i class="fa-solid fa-underline"></i>
                                            </button>
                                        </div>
                                        <div class="third box">
                                            <button type="button" onclick="f5(this)">
                                                <i class="fa-solid fa-align-left"></i>
                                            </button>
                                            <button type="button" onclick="f6(this)">
                                                <i class="fa-solid fa-align-center"></i>
                                            </button>
                                            <button type="button" onclick="f7(this)">
                                                <i class="fa-solid fa-align-right"></i>
                                            </button>
                                        </div>
                                        <div class="fourth box">
                                            <button type="button" onclick="f8(this)">aA</button>
                                            <button type="button" onclick="f9()">
                                                <i class="fa-solid fa-text-slash"></i>
                                            </button>
                                            <input type="color" onchange="f10(this)">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="colMission">
                                        <textarea id="textarea1" placeholder="Your text here "><?= $mission ?></textarea>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="vision-cont">
                            <label for="vision">Vision</label>
                            <section>
                                <div class="row">
                                    <div class="colVision">
                                        <div class="first box">
                                            <input id="font-size1" type="number" value="16" min="1" max="100" onchange="f1(this)">
                                        </div>
                                        <div class="second box">
                                            <button type="button" onclick="f2(this)">
                                                <i class="fa-solid fa-bold"></i>
                                            </button>
                                            <button type="button" onclick="f3(this)">
                                                <i class="fa-solid fa-italic"></i>
                                            </button>
                                            <button type="button" onclick="f4(this)">
                                                <i class="fa-solid fa-underline"></i>
                                            </button>
                                        </div>
                                        <div class="third box">
                                            <button type="button" onclick="f5(this)">
                                                <i class="fa-solid fa-align-left"></i>
                                            </button>
                                            <button type="button" onclick="f6(this)">
                                                <i class="fa-solid fa-align-center"></i>
                                            </button>
                                            <button type="button" onclick="f7(this)">
                                                <i class="fa-solid fa-align-right"></i>
                                            </button>
                                        </div>
                                        <div class="fourth box">
                                            <button type="button" onclick="f8(this)">aA</button>
                                            <button type="button" onclick="f9()">
                                                <i class="fa-solid fa-text-slash"></i>
                                            </button>
                                            <input type="color" onchange="f10(this)">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="colVision">
                                        <textarea id="textarea1" placeholder="Your text here "><?= $vision ?></textarea>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>

            <div class="update-Container">
               <button type="submit">Update</button>
            </div>
        </form>
    </div>

</body>

</html>

<script>
function previewImage1() {
    var input = document.getElementById('imageInput1');
    var preview = document.getElementById('imagePreview1');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '';
    }
}

function previewImage2() {
    var input = document.getElementById('imageInput2');
    var preview = document.getElementById('imagePreview2');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '';
    }
}

function previewMenu() {
    var input = document.getElementById('menu-img');
    var preview = document.getElementById('MenuPreview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '';
    }
}

function previewHistoryImage() {
    var input = document.getElementById('history-img');
    var preview = document.getElementById('ImgPreview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '';
    }
}

const textarea = document.getElementById("textarea1");

function f1(e) {
    let value = e.value;
    textarea.style.fontSize = value + "px";
}

function f2(e) {
    if (textarea.style.fontWeight == "bold") {
        textarea.style.fontWeight = "normal";
        e.classList.remove("active");
    }
    else {
        textarea.style.fontWeight = "bold";
        e.classList.add("active");
    }
}

function f3(e) {
    if (textarea.style.fontStyle == "italic") {
        textarea.style.fontStyle = "normal";
        e.classList.remove("active");
    }
    else {
        textarea.style.fontStyle = "italic";
        e.classList.add("active");
    }
}

function f4(e) {
    if (textarea.style.textDecoration == "underline") {
        textarea.style.textDecoration = "none";
        e.classList.remove("active");
    }
    else {
        textarea.style.textDecoration = "underline";
        e.classList.add("active");
    }
}

function f5(e) {
    textarea.style.textAlign = "left";
}

function f6(e) {
    textarea.style.textAlign = "center";
}

function f7(e) {
    textarea.style.textAlign = "right";
}

function f8(e) {
    if (textarea.style.textTransform == "uppercase") {
        textarea.style.textTransform = "none";
        e.classList.remove("active");
    }
    else {
        textarea.style.textTransform = "uppercase";
        e.classList.add("active");
    }
}

function f9() {
    textarea.style.fontWeight = "normal";
    textarea.style.textAlign = "left";
    textarea.style.fontStyle = "normal";
    textarea.style.textTransform = "capitalize";
    textarea.value = "";
}

function f1(e) {
    let value = e.value;
    textarea.style.color = value;
}

window.addEventListener('load', () => {
    textarea.value = "";
});



</script>