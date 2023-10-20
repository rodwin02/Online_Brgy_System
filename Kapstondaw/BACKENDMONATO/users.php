<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_users";
$result = $conn->query($query);

$users = array();
while($row = $result->fetch_assoc()) {
  $users[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include "./sidebar.php" ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Users</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="addUsers" id="addUser">+ User</a>
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
            <table id="table">
                <thead>
                    <tr>
                        <th>Resident Name</th>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($users)) { ?>
                    <?php $no=1; foreach($users as $row): ?>
                    <tr>
                        <td><?= $row['firstname']. " " .$row['middlename']. " " .$row['lastname'] ?></td>
                        <td><?= $row['username']?></td>
                        <td><?= $row['role']?></td>
                        <td><?= $row['time'] ?></td>
                        <td class="actions">
                            <a href="" class="edit" id="editUser" onclick="editPassword(this)"
                                data-id="<?= $row['id']?>" data-email="<?= $row["email"] ?>"
                                data-username="<?= $row['username'] ?>">Edit</a>
                            <a href="./model/remove/remove_user.php?id=<?= $row['id'] ?>" class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
                <!-- Add more rows here -->
            </table>

            <!-- <div class="pagination">
        <button class="previous" onclick="showPreviousTable()">&lt; Previous</button>
        <span id="pageNumber">1</span>
        <button class="next" onclick="showNextTable()">Next &gt;</button>
      </div> -->
        </div>
    </div>

    <div class="modal-AddUser">
        <form class="form2-user" action="./model/add_user.php" method="POST">
            <div class="title-cont-1">
                <p class="title-name">Create New User</p>
                <img src="icons/close 1.png" class="closeBtn" alt="">
            </div>

            <div class="unang-layer-user">
                <img id="preview" alt="Preview">
                <label for="file-upload" class="custom-file-upload">
                    <input type="file" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="pangalawang-layer-user">
                <label for="username-user"></label>Username
                <input type="text" id="username-user" name="username" required>

                <label for="password-user"></label>Password
                <input type="password" id="password-user" name="password" required>

                <label for="usertype-user">User Type</label>
                <select id="usertype-user" name="usertype-user" required>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <input class="submitUser" type="submit" value="Create">
        </form>
    </div>


    <div class="modal-editUser" id="modal-editUser">
        <form class="form2-user" action="./model/change_password.php" method="POST">
            <div class="title-cont-1">
                <p class="title-name">Edit User</p>
                <img src="icons/close 1.png" class="closeBtnEdit" alt="">
            </div>

            <div class="unang-layer-user">
                <img id="preview" alt="Preview">
                <label for="file-upload" class="custom-file-upload">
                    <input type="file" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="pangalawang-layer-user">
                <label for="username-user">Username</label>
                <input type="text" id="username-user1" name="username" readonly value="<?= $row['username'] ?>"
                    required>
                <?php if($_SESSION["role"] === "staff") { ?>
                <label for="password-user">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
                <?php } ?>

                <label for="password-user">New Password</label>
                <input type="password" id="new_password" name="new_password" required>

                <?php if($_SESSION["role"] === "staff") { ?>
                <label for="password-user">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <?php } ?>

                <!-- <label for="usertype-user">User Type</label>
                <select id="usertype-user" name="usertype-user" required>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select> -->
            </div>

            <input type="hidden" name="email" id="update-email" value="<?= $row["email"] ?>">
            <input type="hidden" id="id" name="id">
            <?php if($_SESSION["role"] === "staff") { ?>
            <input class="submitUser" type="submit" value="Create">
            <?php } else {?>
            <input class="submitUser" type="submit" name="submit_admin" value="Create">

            <?php } ?>
        </form>
    </div>
    <!-- edit user -->


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
    function previewImage(event) {
        var input = event.target;
        var preview = document.querySelector('#preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.setAttribute('src', '');
        }
    }

    // add user
    const addUserLink = document.getElementById('addUser');
    const modal = document.querySelector('.modal-AddUser');
    const closeButton = document.querySelector('.closeBtn');

    addUserLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // edit user
    const editUserLink = document.querySelectorAll('.edit');
    const modalEdit = document.querySelector('.modal-editUser');
    const closeButtonEdit = document.querySelector('.closeBtnEdit');

    editUserLink.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modalEdit.style.display = 'block';
        });
    })
    closeButtonEdit.addEventListener('click', function() {
        modalEdit.style.display = 'none';
    });


    // Set existing image
    var existingImage = 'image/user 1.png'; // Replace with the path to your existing image
    var preview = document.querySelector('#preview');
    preview.setAttribute('src', existingImage);


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