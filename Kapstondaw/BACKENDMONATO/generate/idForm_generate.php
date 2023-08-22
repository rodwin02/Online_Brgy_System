<?php include '../server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_idform WHERE `id`='$id'";
    $result = $conn->query($query);
    $idForm = $result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate ID Form</title>
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

    <div class="printing-container-idForm">
        <div class="title-cont">
            <p>Generate ID Form</p>
            <a href="#">Logout</a>
        </div>

        <div class="print-title">
            <p>ID Form</p>
            <a href="#" id="print" onclick="printDiv('printMe')">Print</a>
        </div>

        <div class="form-container-idForm" id="printMe">
            <form action="#" class="paper">
                <div class="half-paper" style=" width: 700px;
            height: 368px;
            border: 3px solid #000;
            background: #FFF;
            margin: 20px;
            padding: 10px;">
                    <p class="title" style=" color: #000;
            text-align: center;
            font-family: Poppins;
            font-size: 30px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;">BARANGAY RESIDENT IDENTIFICATION FORM</p>
                    <div class="second-layer" style=" display: flex;
            flex-direction: row;
            justify-content: space-between;">
                        <div class="left" style="width: 500px;
            height: 131px;
            border: 1px solid #000;
            background: #FFF;
            display: flex;
            flex-direction: row;

            color: #000;
            font-family: Poppins;
            font-size: 8px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;">
                            <div class="left-cont" style=" width: 70%;
                height: 130px;
                border-right: 1px solid #000;">
                                <div class="kanan" style="  display: flex;
                    flex-direction: column;">
                                    <div class="fullname" style="width: 100%;
                        height: 43px;
                        border-bottom: 1px solid #000;
                        padding-left: 5px;">
                                        <h4>FULLNAME: (FIRST, MIDDLE, & LAST NAME)</h4>
                                        <h2><?php echo  $idForm['firstname']. " " .$idForm['middlename']. " " .$idForm['lastname']?>
                                        </h2>
                                    </div>
                                    <div class="address" style="width: 100%;
                        height: 43px;
                        border-bottom: 1px solid #000;
                        padding-left: 5px;">
                                        <h5>ADDRESS:</h5>
                                        <h2><?php echo $idForm['address']?></h2>
                                    </div>
                                    <div class="placeStatus-cont" style="display: flex;
                        flex-direction: row;">
                                        <div class="pob" style=" width: 60%;
                            height: 44px;
                            border-right: 1px solid #000;
                            padding-left: 5px;">
                                            <h5>PLACE OF BIRTH:</h5>
                                            <h2><?php echo $idForm['place-of-birth']?></h2>
                                        </div>
                                        <div class="civilStatus" style=" width: 40%;
                            height: 44px;
                            padding-left: 5px;">
                                            <h5>CIVIL STATUS:</h5>
                                            <h2><?php echo $idForm['civil-status']?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-cont" style="  width: 30%;
                height: 130px;">
                                <div class="kaliwa" style=" display: flex;
                    flex-direction: column;">
                                    <div class="birthDate" style=" width: 100%;
                        height: 43px;
                        border-bottom: 1px solid #000;
                        padding-left: 5px;">
                                        <h5>BIRTH DATE:</h5>
                                        <h2><?php echo $idForm['birth-date']?></h2>
                                    </div>
                                    <div class="contactNo" style="width: 100%;
                        height: 86px;
                        padding-left: 5px;">
                                        <h5>CONTACT NUMBER:</h5>
                                        <h2><?php echo $idForm['contact-number']?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right" style=" width: 156px;
            height: 131px;
            border: 2px solid #000;
            background: #FFF;

            display: flex;
            justify-content: center;
            align-items: flex-end;

            color: #000;
            font-family: Poppins;
            font-size: 7px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;">2X2 Picture (White Background)</div>
                    </div>

                    <p class="warning" style="  color: #F00;
            font-family: Poppins;
            font-size: 13px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            text-decoration-line: underline;
            margin-top: 35px;">PAALALA:</p>

                    <div class="third-layer" style=" display: flex;
            flex-direction: row;">
                        <p class="sentence" style=" width: 426px;
                color: #000;
                font-family: Poppins;
                font-size: 12px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
                margin-top: 10px;">Paki-ayos po ang pagsulat ng inyong mga detalye. Panibagong
                            bayad po ulit kung kayo ang magkamali. Hindi rin po gagawin kung hindi
                            maintindahan. Ang tamang pagpirma po ay sa taas at hindi didikit sa salitang
                            <span class="signature" style="color: #F00;
                    font-family: Poppins;
                    font-size: 12px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;">SIGNATURE/LAGDA/PIRMA.</span>
                            <br>
                            <span class="ending-s" style="color: #000;
                        font-family: Poppins;
                        font-size: 12px;
                        font-style: italic;
                        font-weight: 700;
                        line-height: normal;">Dapat po ay
                                <span style=" color: #F00;
                            font-family: Poppins;
                            font-size: 12px;
                            font-style: italic;
                            font-weight: 700;
                            line-height: normal;">LIMBAG</span>
                                ang sulat at hindi cursive o dikit-dikit</span>
                        </p>

                        <p class="pirma" style="   color: #000;
                    text-align: right;
                    font-family: Poppins;
                    font-size: 10px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                
                    display: flex;
                    justify-content: center;
                    align-items: flex-end; 
                    margin-left: 110px;">SIGNATURE/LAGDA/PIRMA.</p>
                    </div>
                </div>




                <div class="half-paper" style=" width: 700px;
            height: 368px;
            border: 3px solid #000;
            background: #FFF;
            margin: 20px;
            padding: 10px;">
                    <p class="title" style=" color: #000;
            text-align: center;
            font-family: Poppins;
            font-size: 30px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;">BARANGAY RESIDENT IDENTIFICATION FORM</p>
                    <div class="second-layer" style=" display: flex;
            flex-direction: row;
            justify-content: space-between;">
                        <div class="left" style="width: 500px;
            height: 131px;
            border: 1px solid #000;
            background: #FFF;
            display: flex;
            flex-direction: row;

            color: #000;
            font-family: Poppins;
            font-size: 8px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;">
                            <div class="left-cont" style=" width: 70%;
                height: 130px;
                border-right: 1px solid #000;">
                                <div class="kanan" style="  display: flex;
                    flex-direction: column;">
                                    <div class="fullname" style="width: 100%;
                        height: 43px;
                        border-bottom: 1px solid #000;
                        padding-left: 5px;">FULLNAME: (FIRST, MIDDLE, & LAST NAME)</div>
                                    <div class="address" style="width: 100%;
                        height: 43px;
                        border-bottom: 1px solid #000;
                        padding-left: 5px;">ADDRESS:</div>
                                    <div class="placeStatus-cont" style="display: flex;
                        flex-direction: row;">
                                        <div class="pob" style=" width: 60%;
                            height: 44px;
                            border-right: 1px solid #000;
                            padding-left: 5px;">PLACE OF BIRTH:</div>
                                        <div class="civilStatus" style=" width: 40%;
                            height: 44px;
                            padding-left: 5px;">CIVIL STATUS:</div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-cont" style="  width: 30%;
                height: 130px;">
                                <div class="kaliwa" style=" display: flex;
                    flex-direction: column;">
                                    <div class="birthDate" style=" width: 100%;
                        height: 43px;
                        border-bottom: 1px solid #000;
                        padding-left: 5px;">BIRTH DATE:</div>
                                    <div class="contactNo" style="width: 100%;
                        height: 86px;
                        padding-left: 5px;">CONTACT NUMBER:</div>
                                </div>
                            </div>
                        </div>
                        <div class="right" style=" width: 156px;
            height: 131px;
            border: 2px solid #000;
            background: #FFF;

            display: flex;
            justify-content: center;
            align-items: flex-end;

            color: #000;
            font-family: Poppins;
            font-size: 7px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;">2X2 Picture (White Background)</div>
                    </div>

                    <p class="warning" style="  color: #F00;
            font-family: Poppins;
            font-size: 13px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            text-decoration-line: underline;
            margin-top: 35px;">PAALALA:</p>

                    <div class="third-layer" style=" display: flex;
            flex-direction: row;">
                        <p class="sentence" style=" width: 426px;
                color: #000;
                font-family: Poppins;
                font-size: 12px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
                margin-top: 10px;">Paki-ayos po ang pagsulat ng inyong mga detalye. Panibagong
                            bayad po ulit kung kayo ang magkamali. Hindi rin po gagawin kung hindi
                            maintindahan. Ang tamang pagpirma po ay sa taas at hindi didikit sa salitang
                            <span class="signature" style="color: #F00;
                    font-family: Poppins;
                    font-size: 12px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;">SIGNATURE/LAGDA/PIRMA.</span>
                            <br>
                            <span class="ending-s" style="color: #000;
                        font-family: Poppins;
                        font-size: 12px;
                        font-style: italic;
                        font-weight: 700;
                        line-height: normal;">Dapat po ay
                                <span style=" color: #F00;
                            font-family: Poppins;
                            font-size: 12px;
                            font-style: italic;
                            font-weight: 700;
                            line-height: normal;">LIMBAG</span>
                                ang sulat at hindi cursive o dikit-dikit</span>
                        </p>

                        <p class="pirma" style="   color: #000;
                    text-align: right;
                    font-family: Poppins;
                    font-size: 10px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                
                    display: flex;
                    justify-content: center;
                    align-items: flex-end; 
                    margin-left: 110px;">SIGNATURE/LAGDA/PIRMA.</p>
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