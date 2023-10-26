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
    <title>Generate Certificate of Late Birth Registration For Self</title>
    <link rel="stylesheet" href="../style/generateCert.css">
    <script src="sidebar1.js ?<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="../sidenav.css">
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar1.php' ?>


    <div class="printing-container-lbr">
        <div class="title-cont">
            <p>Generate Certificate of Late Birth Registration For Self</p>
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
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;">CERTIFICATE OF LATE BIRTH REGISTRATION</div>

                    <p class="to" style="color: #000;
                    font-family: Caladea;
                    font-size: 16px;
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
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                     
                    margin-top: 50px;
                    margin-left: 70px;">THIS IS TO CERTIFY THAT:</p>

                    <p class="first-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">1.
                        <input type="text" id="nameApplicant"
                            value="<?php echo $certOfLBR['applicant_fname']. ' ' .$certOfLBR['applicant_mname']. ' ' .$certOfLBR['applicant_lname'] ?>"
                            placeholder="NAME OF APPLICANT" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        is the child/one of the children of
                        <input type="text" id="nameFather"
                            value="<?php echo $certOfLBR['father_fname']. ' ' .$certOfLBR['father_mname']. ' ' .$certOfLBR['father_lname'] ?>"
                            placeholder="NAME OF FATHER" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        and
                        <input type="text" id="nameMother"
                            value="<?php echo $certOfLBR['mother_fname']. ' ' .$certOfLBR['mother_mname']. ' ' .$certOfLBR['mother_lname'] ?>"
                            placeholder="NAME OF MOTHER" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">, who was born on
                        <input type="text" id="dob" value="
<?php 
$date = new DateTime($certOfLBR['date-of-birth']);
echo $date->format('F d, Y'); 
?>
                        " placeholder="DATE OF BIRTH" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        at <span style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;">City of Dasmarinas, Cavite.</span>
                    </p>

                    <p class="second-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 16px;;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">
                        2.The birth of
                        <input type="text" id="nameApplicant1"
                            value="<?php echo $certOfLBR['applicant_fname']. ' ' .$certOfLBR['applicant_mname']. ' ' .$certOfLBR['applicant_lname']  ?>"
                            placeholder="NAME OF APPLICANT" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">, was
                        attended by Midwife/Traditional hilot who was from Brgy. Zone IV, City of
                        Dasmarinas Cavite.
                    </p>

                    <p class="third-p" style=" color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        padding-right: 80px;
                        
                        margin-top: 30px;
                        margin-left: 70px;">
                        3.I know the date and place of birth of
                        <input type="text" id="nameApplicant2"
                            value="<?php echo $certOfLBR['applicant_fname']. ' ' .$certOfLBR['applicant_mname']. ' ' .$certOfLBR['applicant_lname']  ?>"
                            placeholder="NAME OF APPLICANT" style=" color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        as well as his/her parentage and citizenship because the spouses,
                        <input type="text" id="nameFather1"
                            value="<?php echo $certOfLBR['father_fname']. ' ' .$certOfLBR['father_mname']. ' ' .$certOfLBR['father_lname'] ?>"
                            placeholder="NAME OF FATHER" style=" color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        and
                        <input type="text" id="nameMother1"
                            value="<?php echo $certOfLBR['mother_fname']. ' ' .$certOfLBR['mother_mname']. ' ' .$certOfLBR['mother_lname'] ?>"
                            placeholder="NAME OF MOTHER" style=" color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        are personally known to me and permanently residents of
                        <input type="text" id="address" value="<?php echo $certOfLBR['address'] ?>"
                            placeholder="ADDRESS" style=" color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">, Zone IV, City of Dasmarinas, Cavite.
                    </p>

                    <p class="fourth-p" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        padding-right: 80px;
                        
                        margin-top: 30px;
                        margin-left: 70px;">This certification is being issued to the request of
                        <input type="text" id="nameApplicant3"
                            value="<?php echo $certOfLBR['applicant_fname']. ' ' .$certOfLBR['applicant_mname']. ' ' .$certOfLBR['applicant_lname'] ?>"
                            placeholder="NAME OF APPLICANT" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 200px;">
                        in order to certify the birth of his/her self and in order to give effect to the
                        delayed registration of his/her birth on the Office of City Civil Registrar of
                        City of Dasmarinas, Cavite.
                    </p>

                    <div class="date-time" id="date-time" style=" color: #000;
                        font-family: Caladea;
                        font-size: 16px;
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
                        font-size: 16px;
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
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;"> ${day}${daySuffix} day of ${month}, ${year} </span>`;
}

// Call the updateDate function to set the content initially
updateDate();
</script>