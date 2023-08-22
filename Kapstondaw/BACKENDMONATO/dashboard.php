<?php include "./server/server.php" ?>
<?php 
	$query = "SELECT * FROM tblresidents";
    $result = $conn->query($query);
	$total = $result->num_rows;

  	$query1 = "SELECT * FROM tblresidents WHERE gender='Male'";
    $result1 = $conn->query($query1);
	$male = $result1->num_rows;

	$query2 = "SELECT * FROM tblresidents WHERE gender='Female'";
    $result2 = $conn->query($query2);
	$female = $result2->num_rows;

  	$query3 = "SELECT * FROM tblresidents WHERE `voter-status`='voter'";
    $result3 = $conn->query($query3);
	$totalvoters = $result3->num_rows;

  $query4 = "SELECT * FROM tblresidents WHERE `voter-status`='non-voter'";
	$non = $conn->query($query4)->num_rows;

  $query5 = "SELECT * FROM tblblotter";
	$blotter = $conn->query($query5)->num_rows;

  $query6 = "SELECT * FROM tblresidents WHERE osy='OSY'";
	$osy = $conn->query($query6)->num_rows;

  $query7 = "SELECT * FROM tblresidents WHERE pwd='PWD'";
	$pwd = $conn->query($query7)->num_rows;

  $query8 = "SELECT * FROM tblresidents WHERE age>=60";
	$snr = $conn->query($query8)->num_rows;

  $query9 = "SELECT * FROM tblresidents WHERE sector='Student'";
	$students = $conn->query($query9)->num_rows;

  if(isset($_GET['state'])) {
    $state = $_GET['state'];
    
    if($state=='male'){
        $query = "SELECT * FROM tblresidents WHERE gender='Male'";
        $result2 = $conn->query($query);
    }elseif($state=='female'){
        $query = "SELECT * FROM tblresidents WHERE gender='Female'";
        $result2 = $conn->query($query);
    }elseif($state=='osy'){
        $query = "SELECT * FROM tblresidents WHERE osy='OSY'";
        $result2 = $conn->query($query);
    }elseif($state=='pwd'){
        $query = "SELECT * FROM tblresidents WHERE pwd='PWD'";
        $result2 = $conn->query($query);
    }elseif($state=='snr'){
        $query = "SELECT * FROM tblresidents WHERE sector='Senior Citizen'";
        $result2 = $conn->query($query);
    }elseif($state=='students'){
        $query = "SELECT * FROM tblresidents WHERE pwd='Student'";
        $result2 = $conn->query($query);
    }elseif($state=='blotters'){
        $query = "SELECT * FROM tblblotter";
        $result2 = $conn->query($query);
    }elseif($state=='non_voters'){
        $query = "SELECT * FROM tblresidents WHERE `voter-status`='non-voter'";
        $result2 = $conn->query($query);
    }elseif($state=='voters'){
        $query = "SELECT * FROM tblresidents WHERE `voter-status`='voter'";
        $result2 = $conn->query($query);
       
    }else{
        $query = "SELECT * FROM tblresidents";
        $result2 = $conn->query($query);
    }

	
    $resident = array();
	while($row = $result2->fetch_assoc()){
		$resident[] = $row; 
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style1.css ?<?php echo time(); ?>">
  <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
  <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
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
        <a href="./backup/backup.php" class="backup">Backup</a>
        <a href="restore" class="restore">Restore</a>
        <a href="request.php" class="request">Requested Documents</a>
    </div>
  </div>

            <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
        <?php echo "<script type='text/javascript'>alert('" . $_SESSION['message'] . "');</script>"; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif ?>
  

  <div class="home-container">
    <div class="center">
      <div class="box">
        <div class="rectangle">Dashboard</div>
        <div class="stats">
          <div class="population">
            <div class="a1">
              <div class="b1">
                <div class="c1">POPULATION</div>
                <div class="c2"><?= number_format($total) ?></div>
                <div class="c3">Total Population</div>
              </div>
              <div class="b2">
                <div class="c4-p">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div> 
            <div class="a2-p" id="more-allresidents">
              <a href="?state=population" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="male">
            <div class="a1">
              <div class="b1">
                <div class="c1">MALE</div>
                <div class="c2-m"><?= number_format($male) ?></div>
                <div class="c3">Total Male</div>
              </div>
              <div class="b2">
                <div class="c4-m">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-m" id="more-male">
              <a href="?state=male" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="female">
            <div class="a1">
              <div class="b1">
                <div class="c1">FEMALE</div>
                <div class="c2-f"><?= number_format($female) ?></div>
                <div class="c3">Total Female</div>
              </div>
              <div class="b2">
                <div class="c4-f">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-f"  id="more-female">
              <a href="?state=female" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="voters">
            <div class="a1">
              <div class="b1">
                <div class="c1">VOTERS</div>
                <div class="c2-v"><?= number_format($totalvoters) ?></div>
                <div class="c3">Total Voters</div>
              </div>
              <div class="b2">
                <div class="c4-v">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-v"  id="more-voters">
              <a href="?state=voters" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="nonvoters">
            <div class="a1">
              <div class="b1">
                <div class="c1">NON-VOTERS</div>
                <div class="c2-n"><?= number_format($non) ?></div>
                <div class="c3">Total Non-voters</div>
              </div>
              <div class="b2">
                <div class="c4-n">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-n"  id="more-nonvoters">
              <a href="?state=non_voters" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="blotter">
            <div class="a1">
              <div class="b1">
                <div class="c1">BLOTTER</div>
                <div class="c2-b"><?= number_format($blotter) ?></div>
                <div class="c3">Total Blotter</div>
              </div>
              <div class="b2">
                <div class="c4-b">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-b"  id="more-blotters">
              <a href="?state=blotters" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="osy">
            <div class="a1">
              <div class="b1">
                <div class="c1">OSY</div>
                <div class="c2-o"><?= number_format($osy) ?></div>
                <div class="c3">Total OSY</div>
              </div>
              <div class="b2">
                <div class="c4-o">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-o"  id="more-osy">
              <a href="?state=pwd" class="b3">More info</a>
              <div class="b3">More info</div>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="pwd">
            <div class="a1">
              <div class="b1">
                <div class="c1">PWD</div>
                <div class="c2-pw"><?= number_format($pwd) ?></div>
                <div class="c3">Total PWD</div>
              </div>
              <div class="b2">
                <div class="c4-pw">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-pw"  id="more-pwd">
              <a href="?state=pwd" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="snr">
            <div class="a1">
              <div class="b1">
                <div class="c1">SNR</div>
                <div class="c2-sn"><?= number_format($snr) ?></div>
                <div class="c3">Total SNR</div>
              </div>
              <div class="b2">
                <div class="c4-sn">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-sn"  id="more-snr">
              <a href="?state=snr" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
          <div class="students">
            <div class="a1">
              <div class="b1">
                <div class="c1">STUDENTS</div>
                <div class="c2-st"><?= number_format($students) ?></div>
                <div class="c3">Total STUDENTS</div>
              </div>
              <div class="b2">
                <div class="c4-st">
                  <img src="icons/people.png" alt="">
                </div>
              </div>
            </div>
            <div class="a2-st"  id="more-students">
              <a href="?state=students" class="b3">More info</a>
              <div class="b4">
                <img src="icons/down-arrow.png" alt="">
              </div>
            </div>
          </div>
        </div>

        <div class="line-container">
          <img src="vector/Line 6.png" alt="">
        </div>

        <div class="containerLogs">
          <div class="RecentLogs">Recent Logs</div>
          <table>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>User</th>
              <th>Information</th>
            </tr>
            <tr>
              <td>June 28, 2023</td>
              <td>10:00 AM</td>
              <td>John Doe</td>
              <td>Information 1</td>
            </tr>
            <tr>
              <td>June 29, 2023</td>
              <td>2:30 PM</td>
              <td>Jane Smith</td>
              <td>Information 2</td>
            </tr>
            <tr>
              <td>June 30, 2023</td>
              <td>8:45 AM</td>
              <td>Mike Johnson</td>
              <td>Information 3</td>
            </tr>
            <tr>
              <td>July 1, 2023</td>
              <td>4:15 PM</td>
              <td>Sarah Williams</td>
              <td>Information 4</td>
            </tr>
            <tr>
              <td>July 2, 2023</td>
              <td>9:30 AM</td>
              <td>David Brown</td>
              <td>Information 5</td>
            </tr>
            <tr>
              <td>July 3, 2023</td>
              <td>1:00 PM</td>
              <td>Emily Davis</td>
              <td>Information 6</td>
            </tr>
          </table>
          <div class="nextBtn">NEXT</div>
        </div>
        
        
      </div>
    </div>
  
    <div class="rightdiv">
      <div class="upperdiv">
        <a href="./model/logout.php">Logout</a>
      </div>
      <div class="lowerdiv">
        <img src="image/barangaylogo.png" alt="">
        <p class="adminText">ADMIN</p>
        
        <div class="calendar">
          <div class="header">
            <span class="month-year" id="monthYear"></span>
          </div>
          <div class="weekdays">
            <span>Sun</span>
            <span>Mon</span>
            <span>Tue</span>
            <span>Wed</span>
            <span>Thu</span>
            <span>Fri</span>
            <span>Sat</span>
          </div>
          <div class="days" id="days">
            <!-- Days will be generated dynamically using JavaScript -->
          </div>
        </div>

        <div class="credits">
          <p>OMS</p>
          <p>Develop by BSIT3.2A</p>
          <p>2023 All Rights Reserved</p>
        </div>
      </div>
    </div>
  </div>

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

  <!-- MORE INFO CLICKED -->

  <!-- ALL RESIDENTS -->
  <div class="modal-allResidents" id="modal-allResidents">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closeAllResidents" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="allresidents">
            <div class="text-cont">
              <p class="text">All Residents</p>
              <p class="number">15,000</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>

          <div class="age">
            <p class="number1">3,000</p>
            <div class="age-cont">
              <p class="text1">Babies</p>
              <img src="icons/baby.png" alt="baby icon">
            </div>
          </div>

          <div class="age">
            <p class="number1">3,000</p>
            <div class="age-cont">
              <p class="text1">Childs</p>
              <img src="icons/child.png" alt="child icon">
            </div>
          </div>

          <div class="age">
            <p class="number1">3,000</p>
            <div class="age-cont">
              <p class="text1">Adolescents</p>
              <img src="icons/adolescents.png" alt="adolescents icon">
            </div>
          </div>

          <div class="age">
            <p class="number1">3,000</p>
            <div class="age-cont">
              <p class="text1">Adults</p>
              <img src="icons/adult.png" alt="adult icon">
            </div>
          </div>

          <div class="age">
            <p class="number1">3,000</p>
            <div class="age-cont">
              <p class="text1">Elderly</p>
              <img src="icons/elderly.png" alt="age icon">
            </div>
          </div>
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>ALL RESIDENTS</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- MALE -->
    <div class="modal-male" id="modal-male">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closeMale" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="male1">
            <div class="text-cont">
              <p class="text">All Male</p>
              <p class="number">15,000</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>

          <div class="age1">
            <p class="number1">3,000</p>
            <div class="age1-cont">
              <p class="text1">Babies</p>
              <img src="icons/baby.png" alt="baby icon">
            </div>
          </div>

          <div class="age1">
            <p class="number1">3,000</p>
            <div class="age1-cont">
              <p class="text1">Child</p>
              <img src="icons/child.png" alt="child icon">
            </div>
          </div>

          <div class="age1">
            <p class="number1">3,000</p>
            <div class="age1-cont">
              <p class="text1">Adolescents</p>
              <img src="icons/adolescents.png" alt="adolescents icon">
            </div>
          </div>

          <div class="age1">
            <p class="number1">3,000</p>
            <div class="age1-cont">
              <p class="text1">Adults</p>
              <img src="icons/adult.png" alt="adult icon">
            </div>
          </div>

          <div class="age1">
            <p class="number1">3,000</p>
            <div class="age1-cont">
              <p class="text1">Elderly</p>
              <img src="icons/elderly.png" alt="elderly icon">
            </div>
          </div>
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>MALE</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FEMALE -->
  <div class="modal-female" id="modal-female">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closeFemale" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="female1">
            <div class="text-cont">
              <p class="text">All Female</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>

          <div class="age2">
            <p class="number1">3,000</p>
            <div class="age2-cont">
              <p class="text1">Babies</p>
              <img src="icons/baby.png" alt="baby icon">
            </div>
          </div>

          <div class="age2">
            <p class="number1">3,000</p>
            <div class="age2-cont">
              <p class="text1">Childs</p>
              <img src="icons/child.png" alt="child icon">
            </div>
          </div>

          <div class="age2">
            <p class="number1">3,000</p>
            <div class="age2-cont">
              <p class="text1">Adolescents</p>
              <img src="icons/adolescents.png" alt="adolescents icon">
            </div>
          </div>

          <div class="age2">
            <p class="number1">3,000</p>
            <div class="age2-cont">
              <p class="text1">Adults</p>
              <img src="icons/adult.png" alt="adult icon">
            </div>
          </div>

          <div class="age2">
            <p class="number1">3,000</p>
            <div class="age2-cont">
              <p class="text1">Elderly</p>
              <img src="icons/elderly.png" alt="elderly icon">
            </div>
          </div>
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>FEMALE</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- VOTERS -->
  <div class="modal-voters" id="modal-voters">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closeVoters" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="voters1">
            <div class="text-cont">
              <p class="text">All Voters</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>

          <div class="voters1">
            <div class="text-cont">
              <p class="text">Positive Voters</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>

          <div class="voters1">
            <div class="text-cont">
              <p class="text">Negative Voters</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>
      
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>VOTERS</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- NON VOTERS -->
  <div class="modal-nonvoters" id="modal-nonvoters">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closeNonvoters" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="nonvoters1">
            <div class="text-cont">
              <p class="text">All Non-voters</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>NON VOTERS</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- OSY -->
  <div class="modal-osy" id="modal-osy">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closeOsy" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="osy1">
            <div class="text-cont">
              <p class="text">All Out-of-School Youth</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>OSY</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- PWD -->
  <div class="modal-pwd" id="modal-pwd">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closePwd" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="pwd1">
            <div class="text-cont">
              <p class="text">All Persons with disabilities</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>PWD</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                   <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- SENIOR -->
  <div class="modal-snr" id="modal-snr">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closeSnr" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="snr1">
            <div class="text-cont">
              <p class="text">All Senior</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>SENIOR</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- STUDENTS -->
  <div class="modal-students" id="modal-students">
    <div class="form-container">
      <div class="cross-cont">
        <img src="icons/close 1.png"  class="closeStudents" alt="">
      </div>
      
      <div class="div-cont">
        <div class="left-div">
          <div class="students1">
            <div class="text-cont">
              <p class="text">All Students</p>
              <p class="number">3,333</p>
            </div>
            <img src="icons/people.png" alt="">
          </div>
        </div>

        <div class="right-div">
          <div class="first-layer">
            <p>STUDENTS</p>
            <div class="search-cont">
              <p>Search:</p>
              <input type="text" id="search">
            </div>
          </div>
          
          <div class="second-layer">
            <table class="moreInfo" id="table">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Place of Birth</th>
                  <th>Date of Birth</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($resident)) { ?>
                  <?php $no=1; foreach($resident as $row): ?>
                  <tr>
                    <td><?= $row['firstname'] ?> <?= $row['middlename'] ?> <?= $row['lastname'] ?></td>
                    <td><?= $row['house-no'] ?> <?= $row['street'] ?> <?= $row['subdivision'] ?></td>
                    <td><?= $row['place-of-birth'] ?></td>
                    <td><?= $row['date-of-birth'] ?></td>
                    <td><?= $row['age'] ?></td>
                  </tr>
                    <?php $no++; endforeach ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const monthYearElement = document.getElementById("monthYear");
    const daysElement = document.getElementById("days");

    function updateCalendar() {
    const today = new Date();
    const currentMonth = today.getMonth();
    const currentYear = today.getFullYear();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    // Set the month and year in the header
    monthYearElement.textContent = new Date(currentYear, currentMonth).toLocaleString("default", { month: "long" }) + " " + currentYear;

    // Clear the days
    daysElement.innerHTML = "";

    // Calculate the first day of the month
    const firstDay = new Date(currentYear, currentMonth, 1).getDay();

    // Add empty spans for the days before the first day of the month
    for (let i = 0; i < firstDay; i++) {
      const emptySpan = document.createElement("span");
      emptySpan.className = "empty";
      daysElement.appendChild(emptySpan);
    }

    // Add the days of the month
    for (let day = 1; day <= daysInMonth; day++) {
      const daySpan = document.createElement("span");
      daySpan.textContent = day;
      if (currentMonth === today.getMonth() && currentYear === today.getFullYear() && day === today.getDate()) {
        daySpan.className = "today";
      }
      daysElement.appendChild(daySpan);
    }
    }

    updateCalendar();
  </script>


</body>
</html>

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

  //ALL RESIDENTS MORE INFO
  const moreAllResidents = document.getElementById('more-allresidents');
  const modalAllResidents = document.querySelector('.modal-allResidents');
  const closeAllResidents = document.querySelector('.closeAllResidents');

  moreAllResidents.addEventListener('click', function(event) {
    event.preventDefault();
    modalAllResidents.style.display = 'block';
  });

  closeAllResidents.addEventListener('click', function() {
    modalAllResidents.style.display = 'none';
  });

  //MALE MORE INFO
  const moreMale = document.getElementById('more-male');
  const modalMale = document.querySelector('.modal-male');
  const closeMale = document.querySelector('.closeMale');

  moreMale.addEventListener('click', function(event) {
    event.preventDefault();
    modalMale.style.display = 'block';
  });

  closeMale.addEventListener('click', function() {
    modalMale.style.display = 'none';
  });

  //FEMALE MORE INFO
  const moreFemale = document.getElementById('more-female');
  const modalFemale = document.querySelector('.modal-female');
  const closeFemale = document.querySelector('.closeFemale');

  moreFemale.addEventListener('click', function(event) {
    event.preventDefault();
    modalFemale.style.display = 'block';
  });

  closeFemale.addEventListener('click', function() {
    modalFemale.style.display = 'none';
  });

  //VOTERS MORE INFO
  const moreVoters = document.getElementById('more-voters');
  const modalVoters = document.querySelector('.modal-voters');
  const closeVoters = document.querySelector('.closeVoters');

  moreVoters.addEventListener('click', function(event) {
    event.preventDefault();
    modalVoters.style.display = 'block';
  });

  closeVoters.addEventListener('click', function() {
    modalVoters.style.display = 'none';
  });

  //NONVOTERS MORE INFO
  const moreNonvoters = document.getElementById('more-nonvoters');
  const modalNonvoters = document.querySelector('.modal-nonvoters');
  const closeNonvoters = document.querySelector('.closeNonvoters');

  moreNonvoters.addEventListener('click', function(event) {
    event.preventDefault();
    modalNonvoters.style.display = 'block';
  });

  closeNonvoters.addEventListener('click', function() {
    modalNonvoters.style.display = 'none';
  });

  //OSY MORE INFO
  const moreOsy = document.getElementById('more-osy');
  const modalOsy = document.querySelector('.modal-osy');
  const closeOsy = document.querySelector('.closeOsy');

  moreOsy.addEventListener('click', function(event) {
    event.preventDefault();
    modalOsy.style.display = 'block';
  });

  closeOsy.addEventListener('click', function() {
    modalOsy.style.display = 'none';
  });

  //PWD MORE INFO
  const morePwd = document.getElementById('more-pwd');
  const modalPwd = document.querySelector('.modal-pwd');
  const closePwd = document.querySelector('.closePwd');

  morePwd.addEventListener('click', function(event) {
    event.preventDefault();
    modalPwd.style.display = 'block';
  });

  closePwd.addEventListener('click', function() {
    modalPwd.style.display = 'none';
  });

  //SNR MORE INFO
  const moreSnr = document.getElementById('more-snr');
  const modalSnr = document.querySelector('.modal-snr');
  const closeSnr = document.querySelector('.closeSnr');

  moreSnr.addEventListener('click', function(event) {
    event.preventDefault();
    modalSnr.style.display = 'block';
  });

  closeSnr.addEventListener('click', function() {
    modalSnr.style.display = 'none';
  });

  //STUDENTS MORE INFO
  const moreStudents = document.getElementById('more-students');
  const modalStudents = document.querySelector('.modal-students');
  const closeStudents = document.querySelector('.closeStudents');

  moreStudents.addEventListener('click', function(event) {
    event.preventDefault();
    modalStudents.style.display = 'block';
  });

  closeStudents.addEventListener('click', function() {
    modalStudents.style.display = 'none';
  });
</script>

