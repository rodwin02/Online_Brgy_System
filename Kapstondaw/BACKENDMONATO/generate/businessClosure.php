
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate Endorsement Certificate For Someone</title>
  <link rel="stylesheet" href="../style/generateCert.css">
  <script src="sidebar.js"></script>
</head>
<body>
  <!-- HEADER -->
  <div class="container">
    <div class="layer1">Barangay Zone IV Dasmarinas Cavite
    </div>
    <div class="layer2">
        <img src="../vector/Vector 1.png" alt=""></div>
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
  <div class="printing-container-endorsement">
    <div class="title-cont">
      <p>Generate Endorsement Certificate For Someone</p>
      <a href="#">Logout</a>
    </div>

    <div class="print-title">
      <p>Endorsement Certificate</p>
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
         
         <div class="body-container" style="  width: 100%;
         height: auto;
         padding-right: 50px;">
          <div class="title-body" style=" margin-top: 20px;
          display: flex;
          justify-content: center;
          color: #000;
          font-family: Caladea;
          font-size: 18px;
          font-style: normal;
          font-weight: 700;
          line-height: normal;">CERTIFICATION</div>


          <div class="first-p" style=" text-indent: 50px;
          color: #000;
          font-family: Caladea;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: 25px;
          
          margin-top: 30px;
          margin-left: 85px;">
            This is to certify that the business <input type="text" id="bname" placeholder="NAME OF BUSINESS" style="color: #000;
            font-family: Caladea;
            font-size: 19px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            border: none;
            border-bottom: 1px solid black;
            width: 200px;">owned and
            operated by <input type="text" id="ownersName" placeholder="BUSINESS OWNER’S NAME" style="color: #000;
            font-family: Caladea;
            font-size: 19px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            border: none;
            border-bottom: 1px solid black;
            width: 200px;">whose business address is located at
            <input type="text" id="address" placeholder="ADDRESS OF BUSINESS" style="color: #000;
            font-family: Caladea;
            font-size: 19px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            border: none;
            border-bottom: 1px solid black;
            width: 200px;"> <span>Barangay Zone IV, City of Dasmariñas, Cavite</span>has
            ceased / stopped its business operation effective <input type="text" id="dateClosure" placeholder="DATE OF CLOSURE" style="color: #000;
            font-family: Caladea;
            font-size: 19px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            border: none;
            border-bottom: 1px solid black;
            width: 200px;"> due to
            <input type="text" id="reason" placeholder="REASON" style="color: #000;
            font-family: Caladea;
            font-size: 19px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            border: none;
            border-bottom: 1px solid black;
            width: 200px;">.
          </div>
          
      
           
          <div class="date-time" id="date-time" style="color: #000;
          font-family: Caladea;
          font-size: 18px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          
          margin-top: 40px;
          margin-left: 105px;"></div>

          <p class="ending-p" style="color: #000;
          font-family: Caladea;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          
          margin-top: 40px;
          margin-left: 105px;">Thank you and more power!</p>

          <p class="from" style=" color: #000;
          font-family: Caladea;
          font-size: 17px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;

          margin-top: 30px;
          margin-left: 450px;">Respectfully yours,</p>
          <p class="captain-name" style=" color: #000;
          font-family: Caladea;
          font-size: 17px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;

          margin-top: 30px;
          margin-left: 450px;"><span style="  color: #000;
            font-family: Caladea;
            font-size: 20px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
  
            margin-top: 30px;">MEDARDO P. HAYAG<br></span>
             Punong Barangay</p>
         </div>

         <div class="watermark-cont" style="position: relative;
         margin-top: -400px;
         margin-left: 140px;">
          <img src="../image/watermarklogo.png" alt="" style="position: absolute;
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
      const month = now.toLocaleString("en-US", { month: "long" });
      const year = now.getFullYear();

      // Get the day suffix
      const daySuffix = getDaySuffix(day);

      // Update the content of the element with id "date-time"
      const dateTimeElement = document.getElementById("date-time");
      dateTimeElement.innerHTML = `Issued this ${day}${daySuffix} day of ${month}, ${year} upon request of <span> above mentioned name </span>
      for whatever legal intent this may serve.`;
  }

  // Call the updateDate function to set the content initially
  updateDate();
</script>