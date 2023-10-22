<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Requested Documents</title>
  <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
  <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
  <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
  <script src="sidebar.js ?<?php echo time(); ?>"></script>

  
</head>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>
    
    <div class="home_request">
      <div class="first_layer">
        <p>Requested Documents</p>
        <a href="#">Logout</a>
      </div>

      <div class="second_layer">
        <div class="search-cont">
            <p>Search:</p>
            <input class="searchBar" type="text" placeholder=" Enter text here">
        </div>
      </div>

      <?php include './template/message.php' ?>

      <div class="third_layer">
        <table id="table">
          <tr>
            <th>Account Name</th>
            <th>Name of Requestor</th>
            <th>Pickup Date</th>
            <th>Purpose</th>
            <th>Date Requested</th>
            <th>Status</th>
            <th>Tracking Code</th>
            <th>Action</th>
          </tr>
          <tr>
            <td>rodwin02</td>
            <td>Rodwin Homeres</td>
            <td>09/09/23</td>
            <td>For work</td>
            <td>08/09/23</td>
            <td>Pending</td>
            <td>DD12-ASDA-123A-ASDD</td>
            <td class="action">
              <a href="#" class="edit">Edit</a>
              <a href="#" class="delete">Delete</a>
            </td>
          </tr>
          
        </table>
      </div>
    </div>

    <!-- UPDATE INFO -->
<div class="modal-b-info">
    <form class="form-b-info" action="./model/update_brgy_information.php" method="post" enctype="multipart/form-data">
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


  <script>
     //js update info
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
  </script>
</body>
</html>