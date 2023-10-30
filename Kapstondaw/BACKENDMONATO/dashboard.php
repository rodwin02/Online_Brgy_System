<?php include "./server/server.php" ?>
<?php 

function calculateAge($dob) {
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $interval = $today->diff($birthDate);
    return $interval->y;
}
	$query = "SELECT * FROM tblresidents";
    $result = $conn->query($query);
	$total = $result->num_rows;

  	$query1 = "SELECT * FROM tblresidents WHERE sex='Male'";
    $result1 = $conn->query($query1);
	$male = $result1->num_rows;

	$query2 = "SELECT * FROM tblresidents WHERE sex='Female'";
    $result2 = $conn->query($query2);
	$female = $result2->num_rows;

  	$query3 = "SELECT * FROM tblresidents WHERE `voter_status`='voter'";
    $result3 = $conn->query($query3);
	$totalvoters = $result3->num_rows;

  $query4 = "SELECT * FROM tblresidents WHERE `voter_status`='non-voter'";
	$non = $conn->query($query4)->num_rows;

  $query5 = "SELECT * FROM tblblotter";
	$blotter = $conn->query($query5)->num_rows;

  $query6 = "SELECT * FROM tblresidents WHERE osy='OSY'";
	$osy = $conn->query($query6)->num_rows;

  $query7 = "SELECT * FROM tblresidents WHERE pwd='PWD'";
	$pwd = $conn->query($query7)->num_rows;

//   $query8 = "SELECT * FROM tblresidents WHERE age>=60";
// 	$snr = $conn->query($query8)->num_rows;

//   $query9 = "SELECT * FROM tblresidents WHERE sector='Student'";
// 	$students = $conn->query($query9)->num_rows;

  if(isset($_GET['state'])) {
    $state = $_GET['state'];
    
    if($state=='male'){
        $query = "SELECT * FROM tblresidents WHERE sex='Male'";
        $result2 = $conn->query($query);
    }elseif($state=='female'){
        $query = "SELECT * FROM tblresidents WHERE sex='Female'";
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
        $query = "SELECT * FROM tblresidents WHERE `voter_status`='non-voter'";
        $result2 = $conn->query($query);
    }elseif($state=='voters'){
        $query = "SELECT * FROM tblresidents WHERE `voter_status`='voter'";
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
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include "./sidebar.php" ?>

    <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>"
        role="alert">
        <?php echo "<script type='text/javascript'>alert('" . $_SESSION['message'] . "');</script>"; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif ?>


    <div class="home-container">
        <div class="logout-container">

        </div>
        <div class="center">
            <div class="box">
                <div class="rectangle">
                    <p>Dashboard</p>
                    <a href="#">Logout</a>
                </div>
                <div class="stats">
                    <div class="population">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Population</div>
                                <div class="c2"><?= number_format($total) ?></div>
                                <div class="c3">Total Population</div>
                            </div>
                            <div class="b2">
                                <div class="c4-p">
                                    <img src="icons/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-p" id="more-population">
                            <a href="morePopulation.php" class="b3">More info</a>
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
                            <a href="moreMale.php" class="b3">More info</a>
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
                        <div class="a2-f" id="more-female">
                            <a href="moreFemale.php" class="b3">More info</a>
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
                        <div class="a2-v" id="more-voters">
                            <a href="moreVoters.php" class="b3">More info</a>
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
                        <div class="a2-b" id="more-blotters">
                            <a href="blotter.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="icons/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="osy">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">OSY (15-24)</div>
                                <div class="c2-o"><?= number_format($osy) ?></div>
                                <div class="c3">Total OSY</div>
                            </div>
                            <div class="b2">
                                <div class="c4-o">
                                    <img src="icons/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-o" id="more-osy">
                            <a href="moreOSY.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="icons/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="osc">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">OSC (6-14)</div>
                                <div class="c2-osc">0</div>
                                <div class="c3">Total OSC</div>
                            </div>
                            <div class="b2">
                                <div class="c4-osc">
                                    <img src="icons/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-osc" id="more-osc">
                            <a href="#" class="b3">More info</a>
                            <div class="b4">
                                <img src="icons/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="soloParent">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Solo Parent</div>
                                <div class="c2-soloP">0</div>
                                <div class="c3">Total Solo Parent</div>
                            </div>
                            <div class="b2">
                                <div class="c4-soloP">
                                    <img src="icons/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-soloP" id="more-pwd">
                            <a href="#" class="b3">More info</a>
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
                        <div class="a2-pw" id="more-pwd">
                            <a href="morePWD.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="icons/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="labor">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Labor Force</div>
                                <div class="c2-lbr">0</div>
                                <div class="c3">Total Labor Force</div>
                            </div>
                            <div class="b2">
                                <div class="c4-lbr">
                                    <img src="icons/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-lbr" id="more-pwd">
                            <a href="#" class="b3">More info</a>
                            <div class="b4">
                                <img src="icons/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="unemploy">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Unemployed</div>
                                <div class="c2-ploy">0</div>
                                <div class="c3">Total Unemployed</div>
                            </div>
                            <div class="b2">
                                <div class="c4-ploy">
                                    <img src="icons/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-ploy" id="more-pwd">
                            <a href="#" class="b3">More info</a>
                            <div class="b4">
                                <img src="icons/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="ofw">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">OFW</div>
                                <div class="c2-ofw">0</div>
                                <div class="c3">Total OFW</div>
                            </div>
                            <div class="b2">
                                <div class="c4-ofw">
                                    <img src="icons/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-ofw" id="more-pwd">
                            <a href="#" class="b3">More info</a>
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
    </div>

   

    <script src="./js/jQuery-3.7.0.js"></script>
    <script src="./js/app.js"></script>
    <script>
    const monthYearElement = document.getElementById("monthYear");
    const daysElement = document.getElementById("days");

    function updateCalendar() {
        const today = new Date();
        const currentMonth = today.getMonth();
        const currentYear = today.getFullYear();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        // Set the month and year in the header
        monthYearElement.textContent = new Date(currentYear, currentMonth).toLocaleString("default", {
            month: "long"
        }) + " " + currentYear;

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
