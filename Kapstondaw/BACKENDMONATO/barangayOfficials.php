<?php include "./server/server.php" ?>
<?php 
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] =='staff'){
			$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY tblposition.order ASC ";
		}else{
			$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship ORDER BY tblposition.order ASC, `status` ASC ";
		}
	}else{
		$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship ORDER BY tblposition.order ASC ";
	}
	
	$res_o = $conn->query($off_q);

	$official = array();
	while($row = $res_o->fetch_assoc()){
		$official[] = $row; 
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials</title>
    <link rel="stylesheet" href="style2.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_officials">
        <div class="left_officials">
            <div class="first_layer">
                  <p>Barangay Officials</p>
                  <a href="#">Logout</a>
            </div>
            <div class="second_layer">
                <div class="text-cont">
                    <p>Current Barangay Officials</p>
                </div>
                <div class="modal-cont">
                    <a href="#" id="showModal">+ Officials</a>
                    <a href="#" id="archive">Archive</a>
                </div>
            </div>

            <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>"
                role="alert">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); ?>
            <?php endif ?>


            <div class="third_layer">
                <table>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Chairmanship</th>
                            <th>Position</th>
                            <th>Term Start</th>
                            <th>Term End</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php if(!empty($official)) { ?>
                    <?php foreach($official as $row): ?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['position'] ?></td>
                        <td><?= $row['termstart'] ?></td>
                        <td><?= $row['termend'] ?></td>
                        <td class="status"><?= $row['status'] ?></td>
                        <td class="actions">
                            <span class="edit" id="editOfficials" onclick="editOfficial(this)"
                                data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>"
                                data-chair="<?= $row['chair_id'] ?>" data-pos="<?= $row['pos_id'] ?>"
                                data-start="<?= $row['termstart'] ?>" data-end="<?= $row['termend'] ?>"
                                data-status="<?= $row['status'] ?>">Edit</span>
                            <!-- <a href="./model/remove/remove_official.php?id=<?= $row['id'] ?>" class="delete">Delete</a> -->
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php }?>
                    <!-- Add more rows here -->
                    <!-- Add more rows here -->
                </table>
            </div>
        </div>
        
    </div>

    <!-- START ADD OFFICIALS -->
    <div class="modal-AddOfficials">
        <form class="formOfficials" action="./model/add_officials.php" method="POST">
            <div class="Unang-cont">
                <p>Create Officials</p>
                <img src="icons/close 1.png" class="closeBtnAdd" alt="">
            </div>

            <div class="pangalawang-cont">
                <label class="fullname" for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" pattern="[A-Za-z\s]+" title="Please enter only letters"
                    required>

                <label class="chairmanship" for="chairmanship">Chairmanship:</label>
                <select id="chairmanship" name="chairmanship" required>
                    <option disabled selected>Select Chairmanship</option>
                    <?php foreach($chair as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                    <?php endforeach ?>
                </select>

                <label class="position" for="position">Position:</label>
                <select id="position" name="position" required>
                    <option disabled selected>Select Position</option>
                    <?php foreach($position as $row): ?>
                    <option value="<?= $row['id'] ?>">Brgy. <?= $row['position'] ?></option>
                    <?php endforeach ?>
                    <!-- Add more options as needed -->
                </select>

                <label class="term-start" for="term-start">Term Start:</label>
                <input type="date" id="term-start" name="term-start" required>

                <label class="term-end" for="term-end">Term End:</label>
                <input type="date" id="term-end" name="term-end" required>

                <!-- <label class="status1" for="status">Status:</label>
      <select id="status" name="status" required>
        <option value="">Select Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select> -->

                <input type="hidden" name="status" value="Active">

                <input class="submitAdd" type="submit" value="Create">
            </div>

        </form>
    </div>
    <!-- END ADD OFFICIALS -->





    <!-- START EDIT OFFICIALS -->
    <div class="modal-editOfficials">
        <form class="formOfficials" action="./model/edit_official.php" method="POST">
            <div class="Unang-cont">
                <p>Create Officials</p>
                <img src="icons/close 1.png" class="closeBtnEdit" alt="">
            </div>

            <div class="pangalawang-cont">
                <label class="fullname" for="fullname">Full Name:</label>
                <input type="text" id="fullname1" name="fullname" pattern="[A-Za-z\s]+"
                    title="Please enter only letters" required>

                <label class="chairmanship" for="chairmanship">Chairmanship:</label>
                <select id="chairmanship1" name="chairmanship" required>
                    <option disabled selected>Select Chairmanship</option>
                    <?php foreach($chair as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                    <?php endforeach ?>
                </select>

                <label class="position" for="position">Position:</label>
                <select id="position1" name="position" required>
                    <option disabled selected>Select Position</option>
                    <?php foreach($position as $row): ?>
                    <option value="<?= $row['id'] ?>">Brgy. <?= $row['position'] ?></option>
                    <?php endforeach ?>
                    <!-- Add more options as needed -->
                </select>

                <label class="term-start" for="term-start">Term Start:</label>
                <input type="date" id="term-start1" name="term-start" required>

                <label class="term-end" for="term-end">Term End:</label>
                <input type="date" id="term-end1" name="term-end" required>

                <label class="status1" for="status">Status:</label>
                <select id="status1" name="status" required>
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>

                <input type="hidden" name="official_id" id="official_id">
                <input class="submitAdd" type="submit" value="Create">
            </div>

        </form>
    </div>
    <!-- END EDIT OFFICIALS -->

    <!-- UPDATE INFO -->
    <div class="modal-b-info">
        <form class="form-b-info" action="">
            <div class="header-cont">
                <p>Update Barangay Information</p>
                <img src="icons/close 1.png" class="closemo" alt="">
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
                    <input type="file" name="barangay_logo" id="barangay_logo">
                </div>
            </div>
            <input class="UpdateInfo" type="submit" value="Update">
        </form>
    </div>


    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    const showModalLink = document.getElementById('showModal');
    const modal = document.querySelector('.modal-AddOfficials');
    const closeButton = document.querySelector('.closeBtnAdd');

    showModalLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    const editOfficialsLink = document.querySelectorAll('.edit');
    const modalEdit = document.querySelector('.modal-editOfficials');
    const closeButtonEdit = document.querySelector('.closeBtnEdit');

    editOfficialsLink.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modalEdit.style.display = 'block';
        });
    })

    closeButtonEdit.addEventListener('click', function() {
        modalEdit.style.display = 'none';
    });

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