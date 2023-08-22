<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style4.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
  <title>Background Information</title>
  <script src="sidebar.js"></script>
</head>
<body>
  <!-- HEADER -->
  <div class="container">
    <div class="layer1">Barangay Zone IV Dasmarinas Cavite
    </div>
    <div class="layer2">
      <img src="vector/Vector 1.png" alt=""></div>
  </div>
  
  <!-- SIDE BAR -->
  <div class="sidebar">
    <div class="slayer1">
        <img class="vector-side" src="vector/layerside.png" alt="">
          <img class="db-icon" src="icons/dashboard-icon.png" alt=""></img>
          <img class="bo-icon" src="icons/B_Officials-iocn.png" alt=""></img>
          <img class="ri-icon" src="icons/residents-icon.png" alt=""></img>
          <img class="cc-icon" src="icons/certificate-icon.png" alt=""></img>
          <img class="rs-icon" src="icons/blotter-icon.png" alt=""></img>
          <img class="um-icon" src="icons/user-icon.png" alt=""></img>
          <img class="cm-icon" src="icons/content-icon.png" alt=""></img>
        </img> 
    </div>

    <div class="slayer2">
      <a class="db" href="dashboard.php">Dashboard</a>
      <a class="bo" href="barangayOfficials.php">Barangay Officials</a>
      <a class="ri" href="residentInfo.php">Residents Information</a>
      <a class="cc" href="#">Certificate/Clearance</a>
        <a href="idForm.php" class="idform">Identification Form</a>
        <a href="brgyClearance.php" class="b-clearance">Barangay Clearance</a>
        <a href="endorsmentCert.php" class="e-certificate">E-Certificate</a>
        <a href="certOfIndigency.php" class="c-indigency">Cetificate of Indigency</a>
        <a href="certOfLBR.php" class="c-latebirth">Certificate Of LBR</a>
        <a href="businessClearance.php" class="bb-clearance">Business Clearance</a>
      <a class="rs" href="#">Reports</a>
        <a href="blotter.php" class="blotter1">Blotter records</a>
        <a href="complain.php" class="complain1">Complain records</a>
        <a href="awareness.php" class="awareness1">Awereness</a>
      <a class="um" href="#">User Management</a>
        <a href="users.php" class="users">Users</a>
      <a class="cm" href="#">Content Management</a>
        <a href="#" class="b-information" id="b-info">Barangay Information</a>
        <a href="announcement.php" class="announcement">Announcement</a>
        <a href="backup" class="backup">Backup</a>
        <a href="restore.php" class="restore">Restore</a> 
    </div>
  </div>
  
  <!-- START BODY -->
  <div class="body-cont">
    <div class="first-layer">
      <p>Announcement</p>
      <a href="#">Logout</a>
    </div>

    <div class="second_layer">
      <div class="search-cont">
        <p>Search:</p>
        <input type="text" class="searchBar" placeholder=" Enter text here">
      </div>
      <div class="add-cont">
        <a href="#" class="addAnnouncement" id="addAnnouncement">+ Announcement</a>
      </div>
    </div>

    <div class="third_layer">
      <table id="table">
        <thead>
          <tr>
            <th>What</th>
            <th>Why</th>
            <th>Where</th>
            <th>When</th>
            <th>Who</th>
            <th>Date/Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>watawat</td>
            <td>malay ko sayo</td>
            <td>kahit san</td>
            <td>ikaw ba?</td>
            <td>ewan ko</td>
            <td>kahit kailan</td>
            <td>
              <a href="#" class="edit" id="edit">Edit</a>
              <a href="#" class="delete" id="delete">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- END BODY -->

  <!-- START MODAL ANNOUNCEMENT -->
  <div class="modal-addAnnouncement">
    <form class="formAnnouncement" action="">
      <div class="title-container">
        <p>Announcement</p>
        <img src="icons/close 1.png"  class="closeAnnouncement" alt="">
      </div>

      <div class="add-container">
        <div class="left">
          <label for="what">What:</label>
          <input type="text" name="what" id="what">
          <label for="where">Where:</label>
          <input type="text" name="where" id="where">
          <label for="who">Who:</label>
          <input type="text" name="who" id="who">
        </div>

        <div class="right">
          <label for="why">Why:</label>
          <input type="text" name="why" id="why">
          <label for="when">When:</label>
          <input type="text" name="when" id="when">
          <label for="dateTime">Date/Time:</label>
          <input type="datetime-local" name="dateTime" id="dateTime">
        </div>
      </div>
        <p class="upload">Upload Photo:</p>
        <label for="image" class="image">
        <input type="file" id="image" > </label>
        <img id="preview" alt="Barangay Announcement">
        

        <input class="submitAnnouncement" type="submit" value="Add">
    </form>
  </div>
  <!-- END MODAL ANNOUNCEMENT -->


   <!-- START EDIT MODAL ANNOUNCEMENT -->
   <div class="modal-editAnnouncement">
    <form class="formAnnouncement" action="">
      <div class="title-container">
        <p>Edit Announcement</p>
        <img src="icons/close 1.png"  class="closeAnnouncementEdit" alt="">
      </div>

      <div class="add-container">
        <div class="left">
          <label for="what">What:</label>
          <input type="text" name="what" id="what1">
          <label for="where">Where:</label>
          <input type="text" name="where" id="where1">
          <label for="who">Who:</label>
          <input type="text" name="who" id="who1">
        </div>

      <div class="right">
          <label for="why">Why:</label>
          <input type="text" name="why" id="why1">
          <label for="when">When:</label>
          <input type="text" name="when" id="when1">
          <label for="dateTime">Date/Time:</label>
          <input type="datetime-local" name="dateTime" id="dateTime1">
        </div>
      </div>

      <p class="upload">Upload Photo:</p>
      <label for="image" class="image">
      <input type="file" id="image1" > </label>
      <img id="preview" alt="Barangay Announcement">

        <input class="submitAnnouncement" type="submit" value="Add">
    </form>
  </div>
  <!-- END EDIT MODAL ANNOUNCEMENT -->

  <!-- UPDATE INFO -->
  <div class="modal-b-info">
    <form class="form-b-info" action="">
       <div class="header-cont">
          <p>Update Barangay Information</p>
          <img src="icons/close 1.png"  class="closemo" alt="">
       </div>
      
       <div class="input-cont">
        <div class="left-cont">
          <label for="province_name">Province Name:</label>
          <input type="text" name="province_name" id="province_name">

          <label for="b_name">Barangay Name:</label>
          <input type="text" name="b_name" id="b_name">
          
          <label for="municipality_logo">Municipality Logo:</label>
          <img id="preview" alt="Preview">
          <input type="file" name="municipality_logo">
        </div>
        
        <div class="right-cont">
          <label for="town_name">Town Name:</label>
          <input type="text" name="town_name" id="town_name">
      
          <label for="tel_no">Tel No.:</label>
          <input type="text" name="tel_no" id="tel_no">
          
          <label for="barangay_logo">Barangay Logo:</label>
          <img id="preview" alt="Preview">
          <input type="file" name="barangay_logo" id="barangay_logo" >
        </div>
       </div>
       <input class="UpdateInfo" type="submit" value="Update">
    </form>
  </div>



</body>
</html>

<script>
  const bInfo = document.getElementById('b-info');
  const modalInfo = document.querySelector('.modal-b-info');
  const closemo = document.querySelector('.closemo');

  bInfo.addEventListener('click', function(event) {
    event.preventDefault();
    modalInfo.style.display = 'block';
  });

  closemo.addEventListener('click', function() {
    modalInfo.style.display = 'none';
  });

  const addAnnouncement = document.getElementById('addAnnouncement');
  const modalAnnouncement = document.querySelector('.modal-addAnnouncement');
  const closeAnnouncement = document.querySelector('.closeAnnouncement');

  addAnnouncement.addEventListener('click', function(event) {
    event.preventDefault();
    modalAnnouncement.style.display = 'block';
  });

  closeAnnouncement.addEventListener('click', function() {
    modalAnnouncement.style.display = 'none';
  });

  const edit = document.getElementById('edit');
  const modalAnnouncementEdit = document.querySelector('.modal-editAnnouncement');
  const closeAnnouncementEdit = document.querySelector('.closeAnnouncementEdit');

  edit.addEventListener('click', function(event) {
    event.preventDefault();
    modalAnnouncementEdit.style.display = 'block';
  });

  closeAnnouncementEdit.addEventListener('click', function() {
    modalAnnouncementEdit.style.display = 'none';
  });

  // Get the file input element and the preview image element
  const fileInput = document.getElementById("image");
  const imagePreview = document.getElementById("preview");

  // Add an event listener to the file input
  fileInput.addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    // Read the selected file as a data URL and set it as the preview image source
    reader.onload = function (e) {
      imagePreview.src = e.target.result;
    };

    if (file) {
      reader.readAsDataURL(file);
    }
  });


</script>

