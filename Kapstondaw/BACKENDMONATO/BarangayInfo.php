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

        <div class="barangay-body">
            <div class="barangay-layer1">
                <div class="left-layer">
                    <div class="barangay-input">
                        <label for="barangay-name">Barangay Name</label>
                        <input type="text" name="barangay-name" id="barangay-name">
                    </div>
                    <div class="barangay-input">
                        <label for="municipality-name">Municipality Name</label>
                        <input type="text" name="municipality-name" id="municipality-name">
                    </div>
                    <div class="barangay-input">
                        <label for="email-name">Email</label>
                        <input type="text" name="email-name" id="email-name">
                    </div>
                    <div class="barangay-input">
                        <label for="contact-number">Contact Number</label>
                        <input type="text" name="contact-number" id="contact-number">
                    </div>
                    <div class="barangay-input">
                        <label for="address-name">Address</label>
                        <div class="address-cont-brgy">
                            <input type="text" name="address-no" id="address-no" placeholder="House no.">
                            <input type="text" name="address-street" id="address-street" placeholder="Street">
                            <input type="text" name="address-subdi" id="address-subdi"  placeholder="Subdivision">
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
                                    <input type="time" id="open-time" name="open-time">
                                </div>
                                <div class="input-time">
                                    <label for="close-time">Close at</label>  
                                    <input type="time" id="close-time" name="close-time">
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
                            <div id="imagePreview1"></div>
                            <input type="file" id="imageInput1" accept="image/*" onchange="previewImage1()">
                        </div>
                        <div class="right-img">
                            <label for="imageInput2">Barangay Logo</label>
                            <div id="imagePreview2" class="image-preview"></div>
                            <input type="file" id="imageInput2" accept="image/*" onchange="previewImage2()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="barangay-layer2">
                <div class="menu-img-cont">
                    <label for="menu-img">Menu Image</label>
                    <div id="MenuPreview" class="image-preview"></div>
                    <input type="file" id="menu-img" accept="image/*" onchange="previewMenu()">
                </div>
                <div class="historical-desc">
                    <label for="history-desc">Historical Background Description</label>
                    <textarea id="history-desc" rows="13" cols="165"></textarea>
                </div>
                <div class="historical-img">
                    <label for="history-img">Historical Background Image</label>
                    <div id="ImgPreview" class="image-preview"></div>
                    <input type="file" id="history-img" accept="image/*" onchange="previewHistoryImage()">
                </div>
                <div class="MissionVision-cont">
                    <div class="mission-cont">
                       <label for="mission">Mission</label>
                       <textarea id="mission" rows="10" cols="50"></textarea>
                    </div>
                    <div class="vision-cont">
                       <label for="vision">Vision</label>
                       <textarea id="vision" rows="10" cols="50"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    function previewImage1() {
      var input = document.getElementById('imageInput1');
      var preview = document.getElementById('imagePreview1');

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
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

        reader.onload = function (e) {
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

        reader.onload = function (e) {
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

        reader.onload = function (e) {
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
</script>