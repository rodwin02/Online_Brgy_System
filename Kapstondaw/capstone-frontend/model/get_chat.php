<?php
include "../server/server.php";

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$name = $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'];

$result = $conn->query("SELECT * FROM chat_messages WHERE `from`='$name' OR `to_receiver`='$name' ORDER BY timestamp ASC");

$messages = array();
while ($row = $result->fetch_assoc()) {
    $messageClass = ($row['from'] === 'admin') ? 'message-subContainer-admin' : 'message-subContainer';

    echo "<div class='$messageClass'>
            <div class='main-message'>
                <p>{$row['messages']}</p>
                <p>{$row['from']}</p>
            </div>
          </div>";
}

$conn->close();
?>
