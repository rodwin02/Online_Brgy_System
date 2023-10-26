<?php include '../server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_certofindigency WHERE `id`='$id'";
    $result = $conn->query($query);
    $certofindigency = $result->fetch_assoc();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Certificate of Indigency For Someone</title>
    <link rel="stylesheet" href="../style/generateCert.css">
    <script src="sidebar1.js ?<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="../sidenav.css">
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar1.php' ?>

    <div class="printing-container-indigency">
        <div class="title-cont">
            <p>Generate Certificate of Indigency For Someone</p>
            <a href="#">Logout</a>
        </div>

        <div class="print-title">
            <p>Certificate of Indigency</p>
            <a href="#" id="print" onclick="printDiv('printMe')">Print</a>
        </div>

        <div class="form-container-brgyClearance" id="printMe">
            <form action="#" class="paper" style="border:1px solid black">

                <div class="header-cont" style="display: flex;  flex-direction: row;
                justify-content: space-between;  width: 100%;
                height: 133px;">
                    <img class="left" src="../image/barangaylogo.png" alt="" style="width: 118.677px;
                    height: 132.677px;
                    margin-left: 10px;
                    margin-top: 10px;">

                    <div class="center-head" style="display: flex;
                    justify-content: center;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;">
                        <p class="first" style="color: #000;
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
                        <p class="second" style="color: #000;
                        font-family: Caladea;
                        font-size: 23px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;">
                            <span style="color: #00AF50;
                            text-align: center;
                            font-family: Caladea;
                            font-size: 30px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;">BARANGAY ZONE IV</span><br>
                            OFFICE OF SANGGUIANG BARANGAY
                        </p>
                        <p class="third" style=" color: #000;
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

                <div class="body-container" style="display: flex;
                flex-direction: row;
                width: 100%;
                height: auto;">
                    <div class="left-cont" style=" width: 30%;
                    
                    display: flex;
                    flex-direction: column;
                    margin-left: 1px;
                    height: 832px;
                    padding-right: 40px;">
                        <div class="rectangle-cont" style=" position: relative;">
                            <img src="../image/Rectangle.png" alt="" style=" position: absolute;
                            top: 0;
                            left: 0;
                            pointer-events: none;
                            width: 222px;
                            height: 830px;
                            margin-top: 1px;">
                        </div>

                        <p class="b-captain" style="position: relative; display: flex; flex-direction: column;  justify-content: center;
                        align-items: center;
                        margin-top: 30px;
                        margin-left: 25px;">
                            <span style="color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;  ">MERCADO P. HAYAG</span>Punong Barangay
                        </p>
                        <p class="k-title" style="color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;  
                            align-items: flex-start;
                            margin-left: 10px;
                            margin-top: 30px;
                            position: relative;">KAGAWAD:</p>
                        <div class="left-name-cont" style="position: relative; display: flex;
                            flex-direction: column;
                            width: 100%;
                            color: #000;
                            font-family: Caladea;
                            font-size: 12px;
                            font-style: normal;
                            font-weight: 400;
                            line-height: normal;">
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px; 
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">JORGE P. CANTIMBUHAN</span>Committee on Peace & Order/Human
                                Rights
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">ALEXANDER P. GENEVEO</span>Committee on Rules & Privileges
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">EFREN F. LARA</span>Committee on Budget & Appropration
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">IAN MARK S. MENDOZA</span>Committee on Health & Sanitation
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">HONESTO P. GUYAMIN</span>Committee on Cooperatives/Livelihood
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">LEO L. FERRER</span>Committee on Women & Family/Sports
                                Development
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">RELLY Q. KALUGDAN</span>Committee on Infrastructure
                            </p>
                            <p class="b-councilor1" style=" margin-left: 10px;
                            margin-top: 35px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">FRANCES JANKEE T. LACSADO</span>Brgy. Treasurer
                            </p>
                            <p class="b-councilor1" style="margin-left: 10px;
                            margin-top: 35px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">JERIKA V. LARA</span>Brgy. Secretary
                            </p>
                            <p class="b-councilor1" style=" margin-left: 10px;
                            margin-top: 35px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">JERALD Y. CORPUZ</span>SK Chairperson
                            </p>
                        </div>
                    </div>

                    <div class="right-cont" style="width: 70%;
                    padding: 10px;">
                        <div class="title" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        text-decoration-line: underline;
            
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-top: 10px;">CERTIFICATE OF INDIGENCY</div>
                        <p class="to" style="  color: #000;
                        font-family: Caladea;
                        font-size: 18px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 50px;">To:
                            <span style="  color: #000;
                            font-family: Caladea;
                            font-size: 18px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;">Jennifer Austria Barzaga</span>
                        </p>
                        <p class="position" style="color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-left: 27px;">City Mayor</p>
                        <p class="location" style="  color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-left: 27px;">City of Dasmarinas</p>

                        <p class="first-p" style="text-indent: 40px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 50px;">This is certify that
                            <input type="text"
                                value="<?php echo $certofindigency['requestor_fname']. ' ' .$certofindigency['requestor_mname']. ' ' .$certofindigency['requestor_lname']?>"
                                id="name" placeholder="NAME OF REQUESTOR" style=" color: #000;
                            font-family: Caladea;
                            font-size: 19px;
                            font-style: normal;
                            font-weight: 400;
                            line-height: normal;
              
                            border: none;
                            border-bottom: 1px solid black;
                            width: 200px;">. is a Filipino Citizen and bonafide resident of
                            <input type="text"
                                value="<?php echo $certofindigency['house_no']. " ". $certofindigency['street']. " ". $certofindigency['subdivision']?>"
                                id="address" placeholder="ADDRESS" style="  color: #000;
                            font-family: Caladea;
                            font-size: 19px;
                            font-style: normal;
                            font-weight: 400;
                            line-height: normal;
              
                            border: none;
                            border-bottom: 1px solid black;
                            width: 200px;">., Brgy. Zone IV, Dasmarinas City, Cavite.
                        </p>
                        <p class="second-p" style=" text-indent: 40px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 50px;">It is further certified that above-named individual belongs
                            to a low/no income bracket or an indigent family in this Barangay.</p>
                        <p class="third-p" style="text-indent: 40px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 19px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 50px;">This certification is being issued upon the request of above
                            mention name for the purpose/s of her Financial/Medical Assistance
                            <input type="text" value="<?php echo $certofindigency['purpose']?>" id="purpose"
                                placeholder="PURPOSE" style=" color: #000;
                                font-family: Caladea;
                                font-size: 19px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                  
                                border: none;
                                border-bottom: 1px solid black;
                                width: 200px;">
                            of her husband,
                            <input type="text"
                                value="<?php echo $certofindigency['applicant_fname']. ' ' .$certofindigency['applicant_mname']. ' ' .$certofindigency['applicant_lname']?>"
                                id="name2" placeholder="NAME OF APPLICANT" style=" color: #000;
                            font-family: Caladea;
                            font-size: 19px;
                            font-style: normal;
                            font-weight: 400;
                            line-height: 20px;
              
                            border: none;
                            border-bottom: 1px solid black;
                            width: 200px;">.
                        </p>

                        <div class="date-time" id="date-time" style="color: #000;
                        font-family: Caladea;
                        font-size: 20px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
            
                        margin-top: 50px;
                        margin-left: 40px;"></div>

                        <p class="b-captain1" style="  display: flex;
                        flex-direction: column;
                        align-items: center;
                        margin-top: 60px;
                        margin-left: 290px;
                        
            
                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
            ">
                            <span style="   color: #000;
                            text-align: center;
                            font-family: Caladea;
                            font-size: 18px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;">MERCADO P. HAYAG</span>Punong Barangay
                        </p>

                        <div class="watermark-cont-indigency" style=" position: relative;
                        margin-top: -540px;
                        margin-left: 20px;">
                            <img src="../image/watermarklogo.png" alt="" style="position: absolute;
                            top: 0;
                            left: 0;
                            pointer-events: none;">
                        </div>
                    </div>
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
    dateTimeElement.innerHTML = `Issued this ${day}${daySuffix} day of ${month}, ${year}`;
}

// Call the updateDate function to set the content initially
updateDate();
</script>