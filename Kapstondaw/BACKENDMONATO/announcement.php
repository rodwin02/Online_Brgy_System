<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>


    <!-- START BODY -->
    <div class="body-cont">
        <div class="first-layer">
            <p>Announcement</p>
            <a href="#">Logout</a>
        </div>

        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="addAnnouncement" id="addAnnouncement">+ Announcement</a>
                <a href="archives/ArchiveAnnouncement.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>What</th>
                        <th>Why</th>
                        <th>Where</th>
                        <th>When</th>
                        <th>Who</th>
                        <th>Date/Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>watawat</td>
                        <td>malay ko sayo</td>
                        <td>kahit san</td>
                        <td>ikaw ba?</td>
                        <td>ewan ko</td>
                        <td>kahit kailan</td>
                        <td>
                            <a href="#" class="edit" id="edit">Edit</a>
                            <a href="#" class="delete" id="delete">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination">
                <button id="prevBtn">Previous</button>
                <div id="pageNumbers" class="page-numbers"></div>
                <button id="nextBtn">Next</button>
            </div>
        </div>
    </div>
    <!-- END BODY -->

    <!-- START MODAL ANNOUNCEMENT -->
    <div class="modal-addAnnouncement">
        <form class="formAnnouncement" action="">
            <div class="title-container">
                <p>Announcement</p>
                <img src="icons/close 1.png" class="closeAnnouncement" alt="">
            </div>

            <div class="add-container">
                <div class="left">
                    <label for="what">What:</label>
                    <input type="text" name="what" id="what">
                    <label for="where">Where:</label>
                    <input type="text" name="where" id="where">
                    <label for="who">Who:</label>
                    <input type="text" name="who" id="who">
                </div>

                <div class="right">
                    <label for="why">Why:</label>
                    <input type="text" name="why" id="why">
                    <label for="when">When:</label>
                    <input type="text" name="when" id="when">
                    <label for="dateTime">Date/Time:</label>
                    <input type="datetime-local" name="dateTime" id="dateTime">
                </div>
            </div>
            <p class="upload">Upload Photo:</p>
            <label for="image" class="image">
                <input type="file" id="image"> </label>
            <img id="preview" alt="Barangay Announcement">


            <input class="submitAnnouncement" type="submit" value="Add">
        </form>
    </div>
    <!-- END MODAL ANNOUNCEMENT -->


    <!-- START EDIT MODAL ANNOUNCEMENT -->
    <div class="modal-editAnnouncement">
        <form class="formAnnouncement" action="">
            <div class="title-container">
                <p>Edit Announcement</p>
                <img src="icons/close 1.png" class="closeAnnouncementEdit" alt="">
            </div>

            <div class="add-container">
                <div class="left">
                    <label for="what">What:</label>
                    <input type="text" name="what" id="what1">
                    <label for="where">Where:</label>
                    <input type="text" name="where" id="where1">
                    <label for="who">Who:</label>
                    <input type="text" name="who" id="who1">
                </div>

                <div class="right">
                    <label for="why">Why:</label>
                    <input type="text" name="why" id="why1">
                    <label for="when">When:</label>
                    <input type="text" name="when" id="when1">
                    <label for="dateTime">Date/Time:</label>
                    <input type="datetime-local" name="dateTime" id="dateTime1">
                </div>
            </div>

            <p class="upload">Upload Photo:</p>
            <label for="image" class="image">
                <input type="file" id="image1"> </label>
            <img id="preview" alt="Barangay Announcement">

            <input class="submitAnnouncement" type="submit" value="Add">
        </form>
    </div>
    <!-- END EDIT MODAL ANNOUNCEMENT -->


<div class="addModal-cont">
    <div id="displayContainer">
        <!-- Initial container without any specific class -->
        <div class="column-cont">
            <p id="questionDisplay"></p>
            <p id="answerDisplay"></p>
        </div>
        <a href="#" class="editBtn">Edit</a>
    </div>
    <a href="#" class="addBtn" id="addBtn">Add</a>
</div>

<div class="modal-add">
    <form action="" class="addForm">
        <img src="icons/close 1.png" class="closeAddForm" alt="">
        <input type="text" name="question" id="questionInput" placeholder="Input question here">
        <input type="text" name="answer" id="answerInput" placeholder="Input answer here">
        <input type="submit" value="Add" id="submitBtn">
    </form>
</div>


</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // The DOM is ready
        console.log("DOM is ready");

        // Add click event for the Add button in the modal
        document.getElementById("submitBtn").addEventListener("click", function (e) {
            // Prevent the form from submitting
            e.preventDefault();

            // Get the values from the input fields
            var questionValue = document.getElementById("questionInput").value;
            var answerValue = document.getElementById("answerInput").value;

            // Create new display elements
            var newQuestionDisplay = document.createElement("p");
            newQuestionDisplay.innerText = questionValue;

            var newAnswerDisplay = document.createElement("p");
            newAnswerDisplay.innerText = answerValue;

            // Create a container for each cloned pair
            var newDisplayContainer = document.createElement("div");
            newDisplayContainer.classList.add("display-container");

            // Append the new elements to the container
            newDisplayContainer.appendChild(newQuestionDisplay);
            newDisplayContainer.appendChild(newAnswerDisplay);

            // Append the new container to the main display container
            document.getElementById("displayContainer").appendChild(newDisplayContainer);

            // Optionally, you can clear the input fields after updating the display
            document.getElementById("questionInput").value = '';
            document.getElementById("answerInput").value = '';
        });
    });
    const addBtn = document.getElementById('addBtn');
    const modalAdd = document.querySelector('.modal-add');
    const closeAddForm = document.querySelector('.closeAddForm');

    addBtn.addEventListener('click', function(event) {
        event.preventDefault();
        modalAdd.style.display = 'block';
    });

    closeAddForm.addEventListener('click', function() {
        modalAdd.style.display = 'none';
    });

const addAnnouncement = document.getElementById('addAnnouncement');
const modalAnnouncement = document.querySelector('.modal-addAnnouncement');
const closeAnnouncement = document.querySelector('.closeAnnouncement');

addAnnouncement.addEventListener('click', function(event) {
    event.preventDefault();
    modalAnnouncement.style.display = 'block';
});

closeAnnouncement.addEventListener('click', function() {
    modalAnnouncement.style.display = 'none';
});

const edit = document.getElementById('edit');
const modalAnnouncementEdit = document.querySelector('.modal-editAnnouncement');
const closeAnnouncementEdit = document.querySelector('.closeAnnouncementEdit');

edit.addEventListener('click', function(event) {
    event.preventDefault();
    modalAnnouncementEdit.style.display = 'block';
});

closeAnnouncementEdit.addEventListener('click', function() {
    modalAnnouncementEdit.style.display = 'none';
});

// Get the file input element and the preview image element
const fileInput = document.getElementById("image");
const imagePreview = document.getElementById("preview");

// Add an event listener to the file input
fileInput.addEventListener("change", function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    // Read the selected file as a data URL and set it as the preview image source
    reader.onload = function(e) {
        imagePreview.src = e.target.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
});


    // JavaScript code to handle pagination
    const table = document.getElementById('table');
    const rows = table.querySelectorAll('tbody tr');
    const totalRows = rows.length;
    const rowsPerPage = 10;
    let currentPage = 1;

    function showRows(page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        rows.forEach((row, index) => {
            if (index >= start && index < end) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function updatePaginationButtons() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const pageNumbers = document.getElementById('pageNumbers');

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === Math.ceil(totalRows / rowsPerPage);

        pageNumbers.textContent = currentPage;
    }

    // Initial setup
    showRows(currentPage);
    updatePaginationButtons();

    // Previous button click event
    document.getElementById('prevBtn').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            showRows(currentPage);
            updatePaginationButtons();
        }
    });
</script>