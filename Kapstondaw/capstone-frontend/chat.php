<div class="chat-container">
    <div class="chat-screen">
        <header>
            <div class="section-1">
                <div class="brgy-icon">
                    <img src="../BACKENDMONATO/uploads/logo/<?php echo $brgy_logo ?>" alt="brgy-icon">
                </div>
                <span><?= $brgy_name?></span>
            </div>
            <div class="close-icon">
                <img src="./assets/close-login.svg" alt="close">
            </div>
        </header>

        <form action="">

        <div class="messages-container"></div>

        <hr>

        <div class="create-message">
            <input type="text" name="message" id="" placeholder="Ask a question">
            <button type="submit"><img src="./assets/send-icon.svg" alt="send-icon"></button>
        </div>
        </form>
    </div>
    <div class="click-chat">
        <button class="chat-btn"><img src="./assets/chat-icon.svg" alt="chat-icon"><span>Chat</span></button>
    </div>
</div>