<?php include '../server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_brgyclearance WHERE `id`='$id'";
    $result = $conn->query($query);
    $brgyclearance = $result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Barangay Clearance</title>
    <link rel="stylesheet" href="../style/generateCert.css">
    <script src="../sidebar.js"></script>

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

    <div class="printing-container-brgyClearance">
        <div class="title-cont">
            <p>Generate Barangay Clearance</p>
            <a href="#">Logout</a>
        </div>

        <div class="print-title">
            <p>Barangay Clearance</p>
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
                        <div class="title" style=" color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        text-decoration-line: underline;

                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-top: 10px;">BARANGAY CLEARANCE</div>
                        <p class="greet" style=" color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 15px;">To Whom It May Concern:</p>
                        <p class="certify" style=" text-indent: 50px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: 20px;">This
                            is to certify that the person whose name, signature and right thumb mark print
                            appeared hereon, applied for clearance and has complied with the requirements
                            which have been verified by this office. Results of which are listed below:</p>

                        <div class="info" style="display: flex;
                        flex-direction: column;
                        margin-top: 30px;">
                            <p class="name" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">NAME:
                                <input type="text" value="<?php echo $brgyclearance['fullname']?>" id="name"
                                    required="required" style=" width: 300px;
                                margin-left: 110px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="address" style=" display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">ADDRESS:
                                <input type="text" value="<?php echo $brgyclearance['address']?>" id="address"
                                    required="required" style="width: 300px;
                                margin-left: 90px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="dob" style=" display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">DATE OF BIRTH:
                                <input type="text" value="<?php echo $brgyclearance['date-of-birth']?>" id="dob"
                                    required="required" style=" width: 300px;
                                margin-left: 52px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="pob" style="  display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">PLACE OF BIRHT:
                                <input type="text" value="<?php echo $brgyclearance['place-of-birth']?>" id="pob"
                                    required="required" style=" width: 300px;
                                margin-left: 45px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="purpose" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">PURPOSE:
                                <input type="text" value="<?php echo $brgyclearance['purpose']?>" id="purpose"
                                    required="required" style="width: 300px;
                                margin-left: 90px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="certNo" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">RES. CERT. NO.:
                                <input type="text" id="certNo" required="required" style="width: 300px;
                                margin-left: 60px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="dateIssue" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">DATE OF ISSUE:
                                <input type="text" value="<?php echo $brgyclearance['date-issue']?>" id="dateIssue"
                                    required="required" style="width: 300px;
                                margin-left: 56px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="findings" style=" display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 13px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">FINDINGS:
                                <span style=" width: 300px;
                                margin-left: 90px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                                margin-top: 12px;">NO CRIMINAL, CIVIL OR ADMINISTRATIVE COMPLAINT/S AS OF THIS DATE
                                    ISSUE</span>
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" width="475" height="4" viewbox="0 0 475 4" fill="none">
                            <path d="M0 2.5L475 2.48485" stroke="black" stroke-width="3" stroke-dasharray="10 10" />
                        </svg>

                        <div class="signature-cont" style="  display: flex;
                        flex-direction: row;
                        justify-content: flex-end;

                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        margin-top: 12px;">
                            <p class="signature" style="display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            margin-top: 75px;
                            margin-right: 30px;">____________________________
                                <span>Signature</span>
                            </p>
                            <p class="thumb-mark" style="border-radius: 10px;
                            border: 1px solid black;
                            width: 120px;
                            height: 90px;
                            margin-right: 40px;">
                                <span style="display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                                margin-top: 90px;">Right Thumb Mark</span>
                            </p>
                        </div>

                        <p class="from" style="display: flex;
                        justify-content: flex-end;
                        margin-right: 130px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 70px;">Certified by:</p>

                        <p class="b-captain" style="display: flex;
                        flex-direction: column;
                        align-items: center;
                        margin-left: 220px;
                        margin-top: 30px;">
                            <span style="color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;  ">MERCADO P. HAYAG</span>Punong Barangay
                        </p>

                        <p class="validity" style="width: 210px;
                        margin-top: 30px;

                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: italic;
                        font-weight: 400;
                        line-height: 30px;">(2 Months Validity after Date of Issue) Not Valid Without Official Dry Seal
                        </p>

                        <div class="watermark-cont-brgyClearance" style="position: relative;
                        margin-top: -680px;
                        margin-left: 20px;">
                            <img src="../image/watermarklogo.png" alt="" style=" position: absolute;
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
        var printContents = document
            .getElementById(divName)
            .innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;

    }
    </script>
</body>

</html>