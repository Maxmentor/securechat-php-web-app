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

/* Admin Settings */
$settings = $conn->query("SELECT * FROM admin_settings LIMIT 1")->fetch_assoc();

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
    body{
        background:url('https://img.freepik.com/free-photo/dark-style-valentines-day-celebration_23-2151133998.jpg');

        
    }
/* HEADER */
.chat-header{
    background:url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2qP46zy08J8zy6QPJK5gZ7AoLbfZEy07kaQ&s");
    padding:10px;
    color: white;
    border-bottom:1px solid #ddd;
}

.chat-header h3{
    font-size:16px;
    
}

/* MESSAGES */
.chat-messages{
    
    flex:1;
    overflow-y:auto;
    padding:10px;
    background:url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2qP46zy08J8zy6QPJK5gZ7AoLbfZEy07kaQ&s");
}

/* MESSAGE ALIGNMENT */
.chat-msg{
    
    display:flex;
    margin-bottom:8px;
}

.chat-msg.me{
    justify-content:flex-end;
}

.chat-msg.other{
    justify-content:flex-start;
}

/* MESSAGE BUBBLE */
.bubble{
    max-width:70%;
    padding:8px 10px;
    border-radius:12px;
    background:#fff;
    font-size:14px;
}

.chat-msg.me .bubble{
    background:#dcf8c6;
    text-align:right;
}

.uname{
    font-size:11px;
    color:#555;
    margin-bottom:3px;
}

.text{
    word-wrap:break-word;
}

/* Chat Image Wrapper & Icons */
.chat-img-wrapper{
    position: relative;
    display: inline-block;
}

.chat-img-icons{
    display:flex;
    gap:6px;
    margin-top:4px;
}

.chat-img-icons button{
    background: rgba(0,0,0,0.5);
    color:#fff;
    border:none;
    border-radius:4px;
    padding:2px 6px;
    font-size:12px;
    cursor:pointer;
    transition:0.2s;
}

.chat-img-icons button:hover{
    background: rgba(0,0,0,0.8);
}

 /* ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
========================================================  */

/* ===============================
   CHAT IMAGE FIX (50% WIDTH)
================================ */
.chat-img{
    display:block !important;
    width:100% !important;  /* fixed to 50% */
    max-width:100%;
    height:400px;
    border-radius:8px;
    margin-top:6px;
}

.chat-msg.me .bubble img{
    margin-left:auto;
    margin-right:0;
}

.chat-msg.other .bubble img{
    margin-left:0;
    margin-right:auto;
}



/* ===============================
   CHAT INPUT BAR (65px)
================================ */
.bottom-bar{
    height:65px;
    display:flex;
    align-items:center;
    gap:6px;
    padding:6px;
    border-top:1px solid #ddd;
    background:url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2qP46zy08J8zy6QPJK5gZ7AoLbfZEy07kaQ&s");
}

.bottom-bar input[type="text"]{
    width:60%;
    height:38px;
    border-radius:20px;
    border:1px solid #ccc;
    padding:0 12px;
}

.bottom-bar input[type="file"]{
    width:20%;
}

.bottom-bar button{
    width:20%;
}



.chat-box{
    width:94% !important;
    height:690px !important;
    display:flex;
    flex-direction:column;
}

.room-id{
    margin-top:1rem;
    font-weight:600;
    display:flex;
    align-items:center;
    gap:.5rem;
}

.copy-id{
    border:1px solid #000;
    background:#fff;
    padding:.25rem .5rem;
    cursor:pointer;
}


/* ---------- Mobile ---------- */
@media(max-width:650px){
   .chat-img{
    display:block !important;
    width:100% !important;  /* fixed to 50% */  
    height:500px;
    border-radius:8px;
    margin-top:6px;
}

.bubble{
    max-width:1000%;
   
}
}



  
</style>
</head>
<body>



    <!-- CHAT SECTION -->
    <div class="chat-box card" id="chatBox">
        <div class="chat-header"  style="width:100%; display:flex;"> 
          <div style="width:100%;"> 
            <p><b>Room Name:</b> <?= htmlspecialchars($_SESSION['room_name']) ?></p>
            <h3>Room ID: <span id="roomIdText"><?= htmlspecialchars($_SESSION['room_id']) ?></span></h3>
      
              <a href="logout.php" style="float:right; width:138px;margin-top:-2rem;border-radius:.3rem;background-color:red;"><button style="width:138px;margin-top:-2rem;border-radius:.3rem;background-color:red;color:white;font-weight:bold;" class="btn">Logout</button></a>
        </div>
       
        </div>
        <div class="chat-messages" id="messages"></div>
        <div class="bottom-bar">
            <input type="text" id="msgInput" placeholder="Type message">
            <input type="file" id="fileInput" accept="image/*">
            <button class="btn" id="sendBtn">Send</button>
        </div>
    </div>
</div>



<!-- JS LIBS -->


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