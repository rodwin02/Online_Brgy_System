<?php
if(isset($_SESSION['username'])) {
    $from = $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'];
    $query = "SELECT * FROM chat_messages WHERE `from`='$from' ORDER BY timestamp ASC";

    $result = $conn->query($query);

    $message = array();
    while($row = $result->fetch_assoc()) {
    $message[] = $row;
    }
}
 ?>
<div class="chat-container">
    <div class="chat-screen">
        <header>
            <div class="section-1">
                <div class="brgy-icon">
                    <img src="../BACKENDMONATO/uploads/logo/<?php echo $brgy_logo ?>" alt="brgy-icon">
                </div>
                <span><?= $brgy_name?></span>
            </div>
            <div class="close-icon close-chat">
                <img src="./assets/close-login.svg" alt="close">
            </div>
        </header>

        <div class="messages-container">
            <?php if(!empty($message)) { ?>
                <?php $no=1; foreach($message as $row) : ?>
                    <div class="message-subContainer">
                        <div class="main-message">
                            <p><?= $row['messages']?></p>
                        </div>
                    </div>
                <?php $no++; endforeach?>
            <?php } ?>
        </div>

        <hr>

        <form action="./model/send_chat.php" method="post">
        <div class="create-message">
            <input type="text" name="message" id="" placeholder="Ask a question">
            <button type="submit"><img src="./assets/send-icon.svg" alt="send-icon"></button>
        </div>
        </form>
    </div>
    <?php if(isset($_SESSION['username'])) { ?>
    <div class="click-chat">
        <button class="chat-btn"><img src="./assets/chat-icon.svg" alt="chat-icon"><span>Chat</span></button>
    </div>
    <?php } else { ?>
    <div class="un-log">
        <a href="./login_page.php"><img src="./assets/chat-icon.svg" alt="chat-icon"><span>Chat</span>
        </a>
    </div>
    <?php } ?>
</div>