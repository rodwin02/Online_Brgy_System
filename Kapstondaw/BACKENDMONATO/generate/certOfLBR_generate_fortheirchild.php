<?php include '../server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_certoflbr WHERE `id`='$id'";
    $result = $conn->query($query);
    $certOfLBR = $result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Certificate of Late Birth Registration For Their Child</title>
    <link rel="stylesheet" href="../style/generateCert.css">
    <script src="sidebar.js"></script>
</head>

<body>
    <!-- HEADER -->
    <div class="container">
        <div class="layer1">Barangay Zone IV Dasmarinas Cavite
        </div>
        <div class="layer2">
            <img src="../vector/Vector 1.png" alt="">
        </div>
    </div>

    <!-- SIDE BAR -->
    <div class="sidebar">
        <div class="slayer1">
            <img class="vector-side" src="../vector/layerside.png" alt="">
            <img class="db-icon" src="../icons/dashboard-icon.png" alt=""></img>
            <img class="bo-icon" src="../icons/B_Officials-iocn.png" alt=""></img>
            <img class="ri-icon" src="../icons/residents-icon.png" alt=""></img>
            <img class="cc-icon" src="../icons/certificate-icon.png" alt=""></img>
            <img class="rs-icon" src="../icons/blotter-icon.png" alt=""></img>
            <img class="um-icon" src="../icons/user-icon.png" alt=""></img>
            <img class="cm-icon" src="../icons/content-icon.png" alt=""></img>
            </img>
        </div>

        <div class="slayer2">
            <a class="db" href="../dashboard.php">Dashboard</a>
            <a class="bo" href="../barangayOfficials.php">Barangay Officials</a>
            <a class="ri" href="../residentInfo.php">Residents Information</a>
            <a class="cc" href="#">Certificate/Clearance</a>
            <a href="../idForm.php" class="idform">Identification Form</a>
            <a href="../brgyClearance.php" class="b-clearance">Barangay Clearance</a>
            <a href="../endorsmentCert.php" class="e-certificate">E-Certificate</a>
            <a href="../certOfIndigency.php" class="c-indigency">Cetificate of Indigency</a>
            <a href="../certOfLBR.php" class="c-latebirth">Certificate Of LBR</a>
            <a href="../businessClearance.php" class="bb-clearance">Business Clearance</a>
            <a class="rs" href="#">Reports</a>
            <a href="../blotter.php" class="blotter1">Blotter records</a>
            <a href="../complain.php" class="complain1">Complain records</a>
            <a href="../awareness.php" class="awareness1">Awereness</a>
            <a class="um" href="#">User Management</a>
            <a href="../users.php" class="users">Users</a>
            <a class="cm" href="#">Content Management</a>
            <a href="#" class="b-information" id="b-info">Barangay Information</a>
            <a href="../announcement.php" class="announcement">Announcement</a>
            <a href="../backup" class="backup">Backup</a>
            <a href="../restore" class="restore">Restore</a>
            <a href="../request.php" class="request">Requested Documents</a>
        </div>
    </div>

    <div class="printing-container-lbr">
        <div class="title-cont">
            <p>Generate Certificate of Late Birth Registration For Their Child</p>
            <a href="#">Logout</a>
        </div>

        <div class="print-title">
            <p>Certificate of Late Birth Registration</p>
            <a href="#" id="print" onclick="printDiv('printMe')">Print</a>
        </div>

        <div class="form-container" id="printMe">
            <form action="#" class="paper">

                <div class="header-cont" style="display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
                height: 133px;">
                    <img class="left" src="../image/barangaylogo.png" alt="" style=" width: 118.677px;
                    height: 132.677px;
          
                    margin-left: 10px;
                    margin-top: 10px;">

                    <div class="center-head" style="display: flex;
                    justify-content: center;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;">
                        <p class="first" style="  color: #000;
                        text-align: center;
                        font-family: Caladea;
                        font-size: 12px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;">Republic of the Phippines
                            <br>
                            Province of Cavite
                            <br>
                            City of Dasmarinas
                        </p>
                        <p class="second" style=" color: #000;
                        font-family: Caladea;
                        font-size: 23px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;">
                            <span style=" color: #00AF50;
                            text-align: center;
                            font-family: Caladea;
                            font-size: 30px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;">BARANGAY ZONE IV</span><br>
                            OFFICE OF SANGGUIANG BARANGAY
                        </p>
                        <p class="third" style="  color: #000;
                        text-align: center;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;">Tel. No. (046) 471-1247</p>
                    </div>

                    <img class="right" src="../image/dasmaLogoPrint.png" alt="" style=" width: 115.677px;
                    height: 125.677px;
                    
                    margin-top: 10px;
                    margin-right: 10px;">
                </div>

                <div class="lines" style="border-bottom:1px solid black"></div>

                <div class="body-container-lbr" style="width: 100%;
                height: auto;">
                    <div class="title-body" style="  margin-top: 20px;
                    display: flex;
                    justify-content: center;
                    color: #000;
                    font-family: Caladea;
                    font-size: 19px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;">CERTIFICATE OF LATE BIRTH REGISTRATION</div>

                    <p class="to" style="color: #000;
                    font-family: Caladea;
                    font-size: 19px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    
                    margin-left: 70px;
                    margin-top: 30px;">City Civil Registration</p>
                    <p class="governor" style="color: #000;
                    font-family: Caladea;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
               
                    margin-left: 70px;">City of Dasmarinas, Cavite</p>

                    <p class="greet" style=" color: #000;
                    font-family: Caladea;
                    font-size: 19px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                     
                    margin-top: 50px;
                    margin-left: 70px;">THIS IS TO CERTIFY THAT:</p>

                    <p class="first-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 19px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">1.
                        <input type="text" value="<?php echo $certOfLBR['name-of-requestor']?>" id="nameRequest"
                            placeholder="NAME OF REQUESTING LATE BIRTH" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        is the child/one of the children of
                        <input type="text" value="<?php echo $certOfLBR['name-of-father']?>" id="nameFather"
                            placeholder="FATHER’S NAME" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        and
                        <input type="text" value="<?php echo $certOfLBR['name-of-mother']?>" id="nameMother"
                            placeholder="MOTHER’S NAME" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">, who was born on
                        <input type="text" value="<?php echo $certOfLBR['date-of-birth']?>" id="dob"
                            placeholder="DATE OF BIRTH" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        <span style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;">at City of Dasmarinas, Cavite.</span>
                    </p>

                    <p class="second-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 19px;;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">
                        The birth of
                        <input type="text" value="<?php echo $certOfLBR['name-of-requestor'] ?>" id="nameRequest1"
                            placeholder="NAME OF REQUESTING LATE BIRTH" style="color: #000;
                            font-family: Caladea;
                            font-size: 19px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            border: none;
                            border-bottom: 1px solid black;
                            width: 200px;">,
                        was attended by Midwife/Traditional hilot who was from City of Dasmarinas
                        Cavite.
                    </p>

                    <p class="third-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 19px;;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">
                        I know the date and place of birth of
                        <input type="text" value="<?php echo $certOfLBR['name-of-requestor']?>" id="nameRequest2"
                            placeholder="NAME OF REQUESTING LATE BIRTH" style="color: #000;
                            font-family: Caladea;
                            font-size: 19px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: 20px;
                            border: none;
                            border-bottom: 1px solid black;
                            width: 200px;">
                        as well as his/her parentage and citizenship because the spouses,
                        <input type="text" value="<?php echo $certOfLBR['name-of-father']?>" id="nameFather1"
                            placeholder="FATHER'S NAME" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        and
                        <input type="text" value="<?php echo $certOfLBR['name-of-mother']?>" id="nameMother1"
                            placeholder="MOTHER’S NAME" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        are personally known to me and permanent residents of
                        <input type="text" value="<?php echo $certOfLBR['address']?>" id="address" placeholder="ADDRESS"
                            style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">, Subd., Zone IV, City of Dasmarinas, Cavite.
                    </p>

                    <p class="fourth-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 19px;;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">This certification is being issued to the request of
                        <input type="text" value="<?php echo $certOfLBR['name-of-father'] ?>" id="nameFather2"
                            placeholder="FATHER'S NAME" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        and
                        <input type="text" value="<?php echo $certOfLBR['name-of-mother']?>" id="nameMother2"
                            placeholder="MOTHER’S NAME" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        in order to certify the birth of <input type="text"
                            value="<?php echo $certOfLBR['name-of-requestor']?>" id="nameRequest3"
                            placeholder="NAME OF REQUESTING LATE BIRTH" style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;"> and in order to
                        give effect to the delayed registration of his/her birth on the Office of City
                        Civil Registrar of City of Dasmarinas, Cavite.
                    </p>

                    <div class="date-time" id="date-time" style=" color: #000;
                    font-family: Caladea;
                    font-size: 19px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    
                    margin-top: 40px;
                    margin-left: 100px;"></div>

                    <p class="captain-name" style="color: #000;
                    font-family: Caladea;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
        
                    margin-top: 30px;
                    margin-left: 450px;">
                        <span style="color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
              
                        margin-top: 30px;">MEDARDO P. HAYAG<br></span>
                        Punong Barangay
                    </p>
                </div>

                <div class="watermark-cont" style="position: relative;
                margin-top: -580px;
                margin-left: 140px;">
                    <img src="../image/watermarklogo.png" alt="" style=" position: absolute;
                    top: 0;
                    left: 0;
                    pointer-events: none;">
                </div>
            </form>
        </div>

    </div>
    <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;

    }
    </script>
</body>

</html>

<script>
// Function to get the day suffix (e.g., 1st, 2nd, 3rd, 4th, etc.)
function getDaySuffix(day) {
    if (day >= 11 && day <= 13) {
        return "th";
    }
    switch (day % 10) {
        case 1:
            return "st";
        case 2:
            return "nd";
        case 3:
            return "rd";
        default:
            return "th";
    }
}

// Function to update date
function updateDate() {
    const now = new Date();
    const day = now.getDate();
    const month = now.toLocaleString("en-US", {
        month: "long"
    });
    const year = now.getFullYear();

    // Get the day suffix
    const daySuffix = getDaySuffix(day);

    // Update the content of the element with id "date-time"
    const dateTimeElement = document.getElementById("date-time");
    dateTimeElement.innerHTML = `Issued this <span style="color: #000;
            font-family: Caladea;
            font-size: 19px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;"> ${day}${daySuffix} day of ${month}, ${year} </span>`;
}

// Call the updateDate function to set the content initially
updateDate();
</script>