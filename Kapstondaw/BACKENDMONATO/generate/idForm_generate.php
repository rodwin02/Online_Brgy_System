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
    <link rel="stylesheet" href="../style/generateCert.css ?<?php echo time(); ?>">
    <script src="sidebar1.js ?<?php echo time(); ?>"></script>
    
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar1.php' ?>

    <div class="printing-container-idForm">
        <div class="title-cont">
            <p>Generate ID Form</p>
            <a href="#">Logout</a>
        </div>

        <a href="../idForm.php" class="backContainer">
            <img src="../icons/back.png" alt="">
            <p>Go Back</p>
        </a>

        <div class="print-title">
            <p>ID Form</p>
 
            <div class="left-title">
                <button type="submit">Save</button>
                <label class="label">
                    <input type="file" id="image-input" accept="image/*">
                    <span>Select 2v2 Picture</span>
                </label>
                <a href="#" id="print" onclick="printDiv('printMe')">Print</a>
            </div>
          
            
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
                                        <h2>
                                            <div class="label111" 
                                                style="display: flex;
                                                       flex-directiont: row;">
                                                <input type="text" name="applicant_fname" id="applicant_fname"  
                                                style="margin-right: 5px;
                                                       width: 100px;
                                                       height: 28px;
                                                       border:none;">
                                                <input type="text" name="applicant_mname" id="applicant_mname" 
                                                style="margin-right: 5px;
                                                       width: 100px;
                                                       height: 28px;
                                                       border:none;">  
                                                <input type="text" name="applicant_lname" id="applicant_lname" 
                                                style="margin-right: 5px;
                                                       width: 100px;
                                                       height: 28px;
                                                       border:none;">
                                            </div>
                                           
                                        </h2>
                                    </div>
                                    <div class="address" style="width: 100%;
                        height: 43px;
                        border-bottom: 1px solid #000;
                        padding-left: 5px;">
                                        <h5>ADDRESS: (HOUSE NO., STREET, & SUBDIVISION)</h5>
                                        <h2>
                                            <div class="label111"
                                            style="display: flex;
                                                   flex-directiont: row;">
                                                <input type="text" name="house_no" id="house_no"
                                                style="margin-right: 5px;
                                                       width: 70px;
                                                       height: 28px;
                                                       border:none;">
                                                <input type="text" name="street" id="street" 
                                                style="margin-right: 5px;
                                                       width: 100px;
                                                       height: 28px;
                                                       border:none;">
                                                <input type="text" name="subdivision" id="subdivision" 
                                                style="margin-right: 5px;
                                                       width: 130px;
                                                       height: 28px;
                                                       border:none;">
                                            </div>
                                        </h2>
                                    </div>
                                    <div class="placeStatus-cont" style="display: flex;
                        flex-direction: row;">
                                        <div class="pob" style=" width: 60%;
                            height: 44px;
                            border-right: 1px solid #000;
                            padding-left: 5px;">
                                            <h5>PLACE OF BIRTH:</h5>
                                            <h2><input type="text" name="pob" id="place_of_birth"
                                            style="margin-right: 5px;
                                                       width: 130px;
                                                       height: 28px;
                                                       border:none;"></h2>
                                        </div>
                                        <div class="civilStatus" style=" width: 40%;
                            height: 44px;
                            padding-left: 5px;">
                                            <h5>CIVIL STATUS:</h5>
                                            <h2><input type="text" name="civil_status" id="civil_status"
                                            style="margin-right: 5px;
                                                       width: 130px;
                                                       height: 28px;
                                                       border:none;"></h2>
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
                                        <h2><input type="date" name="dob" id="birth_date"
                                        style="margin-right: 5px;
                                                       width: 130px;
                                                       height: 28px;
                                                       border:none;"></h2>
                                    </div>
                                    <div class="contactNo" style="width: 100%;
                        height: 86px;
                        padding-left: 5px;">
                                        <h5>CONTACT NUMBER:</h5>
                                        <h2><input type="text" name="contact_no" id="contact_number"
                                        style="margin-right: 5px;
                                                       width: 130px;
                                                       height: 28px;
                                                       border:none;"></h2>
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
                            line-height: normal;">
                            <img id="image-preview" 
                            style="width: 130px;
                                height: 127px;
                                border: none;">
                        </div>
                    </div>

                        <script>
                            document.getElementById('image-input').addEventListener('change', function (event) {
                            const input = event.target;
                            if (input.files && input.files[0]) {
                                const reader = new FileReader();

                                reader.onload = function (e) {
                                document.getElementById('image-preview').src = e.target.result;
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                            });
                        </script>
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
                        padding-left: 5px;">
                                        <h4>FULLNAME: (FIRST, MIDDLE, & LAST NAME)</h4>
                                        <h2><?php echo  $idForm['applicant_fname']. " " .$idForm['applicant_mname']. " " .$idForm['applicant_lname']?>
                                        </h2>
                                    </div>
                                    <div class="address" style="width: 100%;
                        height: 43px;
                        border-bottom: 1px solid #000;
                        padding-left: 5px;">
                                        <h5>ADDRESS:</h5>
                                        <h2><?php echo $idForm['house_no']. " ". $idForm['street']. " ". $idForm['subdivision']?>
                                        </h2>
                                    </div>
                                    <div class="placeStatus-cont" style="display: flex;
                        flex-direction: row;">
                                        <div class="pob" style=" width: 60%;
                            height: 44px;
                            border-right: 1px solid #000;
                            padding-left: 5px;">
                                            <h5>PLACE OF BIRTH:</h5>
                                            <h2><?php echo $idForm['place_of_birth']?></h2>
                                        </div>
                                        <div class="civilStatus" style=" width: 40%;
                            height: 44px;
                            padding-left: 5px;">
                                            <h5>CIVIL STATUS:</h5>
                                            <h2><?php echo $idForm['civil_status']?></h2>
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
                                        <h2><?php echo $idForm['birth_date']?></h2>
                                    </div>
                                    <div class="contactNo" style="width: 100%;
                        height: 86px;
                        padding-left: 5px;">
                                        <h5>CONTACT NUMBER:</h5>
                                        <h2><?php echo $idForm['contact_number']?></h2>
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