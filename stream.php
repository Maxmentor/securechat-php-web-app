<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->

<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->

<?php

include "config/config.php";


/* Session check */
if(!isset($_SESSION['username'])){
    header("Location: userset.php");
    exit;
}

/* Default room */
if(!isset($_SESSION['room_id'])){
    $_SESSION['room_id'] = 'WORLD001';
    $_SESSION['room_name'] = 'WORLD';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CHAT</title>
<link rel="stylesheet" href="assets/css/style.css">

<style>

  
</style>
</head>
<body>

<div class="chat-box" id="chatBox">

    <!-- HEADER -->
    <div class="chat-header">
        <div class="room-info">
            <p><b>Room:</b> <?= htmlspecialchars($_SESSION['room_name']) ?></p>
            <small>ID: <span id="roomIdText"><?= htmlspecialchars($_SESSION['room_id']) ?></span></small>
        </div>
        <a href="logout.php">
            <button class="btn">Logout</button>
        </a>
    </div>

    <!-- MESSAGES -->
    <div class="chat-messages" id="messages"></div>

    <!-- INPUT BAR -->
    <div class="bottom-bar">
        <input type="text" id="msgInput" placeholder="Type message">
        <label class="file-btn">
            📎
            <input type="file" id="fileInput" accept="image/*" hidden>
        </label>
        <button class="btn" id="sendBtn">Send</button>
    </div>

</div>



<script src="assets/js/chat.js"></script>

<script>


   
/* USERNAME */
const USERNAME = "<?= $_SESSION['username'] ?>";
</script>

</body>
</html>



<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->
