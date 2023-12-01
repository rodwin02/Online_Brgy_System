<?php include './server/server.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>
</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>
    

    <div class="home_residents">
        <div class="first_layer">
            <p>Messages</p>
            <a href="#">Logout</a>
        </div>
        
        <div class="messages-cont">
            <div class="inbox-cont">
                <div class="search-cont">
                    <label for="search">Search:</label>
                    <input type="text" id="search" placeholder="Search Resident Here..">
                </div>
                <div class="one-inbox">
                    <div class="user-cont">
                        <p class="name">Rodwin C. Homeres</p>
                        <p class="question">Can I ask a question?...</p>
                    </div>
                    <div class="time-cont">
                        <p class="time">7:55 am</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                            <circle cx="4.04541" cy="3.37378" r="3.37378" fill="#EB7878" />
                    </svg>
                </div>

                <div class="one-inbox">
                    <div class="user-cont">
                        <p class="name">Rodwin C. Homeres</p>
                        <p class="question">Can I ask a question?...</p>
                    </div>
                    <div class="time-cont">
                        <p class="time">7:55 am</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                            <circle cx="4.04541" cy="3.37378" r="3.37378" fill="#EB7878" />
                    </svg>
                </div>

                
            </div>  
            <div class="chat-cont">
                <div class="header-name">
                    <p class="name">Rodwin C. Homeres</p>
                    <p class="location">No.123 Sinigang St. Dasmarinas Cavite</p>
                </div>

                <div class="body-message">

                    <div id="chat-container">
                        <div id="chat-messages">
                            <div class="message-user">
                              <p class="chat-user">Chat ni User Chat ni UserChat UserChat UserChat UserChat UserChat UserChat UserChat ni UserChat ni UserChat ni UserChat ni UserChat ni UserChat ni UserChat ni User</p>
                            </div>
                           
                        </div>
                        <div id="user-input">
                            <textarea type="text" id="user-message" placeholder="Type your message..."> </textarea>
                            <img id="send-button" src="icons/send.png" alt="" onclick="sendMessage()">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



<!-- Add this script after including sidebar.js -->
<script>
    function sendMessage() {
        // Get user input from the textarea
        var userMessage = document.getElementById('user-message').value;

        // Check if the user input is not empty
        if (userMessage.trim() !== '') {
            // Create a new message-admin container
            var newMessageAdminContainer = document.createElement('div');
            newMessageAdminContainer.classList.add('message-admin');

            // Create a paragraph element for the message content
            var messageContent = document.createElement('p');
            messageContent.classList.add('chat-admin');
            messageContent.textContent = userMessage;

            // Set the CSS property for word-wrap to break-word
            messageContent.style.wordWrap = 'break-word';

            // Append the message content to the message-admin container
            newMessageAdminContainer.appendChild(messageContent);

            // Get the chat-messages div where the new message-admin container will be appended
            var chatMessages = document.getElementById('chat-messages');

            // Append the new message-admin container to the chat-messages div
            chatMessages.appendChild(newMessageAdminContainer);

            // Clear the user input after sending the message
            document.getElementById('user-message').value = '';
        }
    }

    // Attach the function to the keyup event of the user-message textarea
    document.getElementById('user-message').addEventListener('keyup', function(event) {
        // Check if the Enter key is released (keyCode 13)
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent the default behavior of the Enter key (e.g., adding a newline)

            // Call the sendMessage function when Enter is released
            sendMessage();
        }
    });
</script>




    

</body>
</html>