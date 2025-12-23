<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->



<?php include "config/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>SecureChat</title>
<link rel="stylesheet" href="assets/css/style.css">

<style>
/* ===============================
   INDEX / HOME PAGE
================================ */

body{
    margin:0;
    padding:0;
    min-height:100vh;
    font-family: 'Segoe UI', Roboto, Arial, sans-serif;
    background: radial-gradient(circle at top, #0f2027, #0b1622, #000);
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    color:#fff;
}

/* ---------- Brand Animation ---------- */
.brand-animation{
    font-size:3rem;
    font-weight:800;
    letter-spacing:2px;
    margin-bottom:2.5rem;
    background: linear-gradient(90deg,#00e5ff,#00ff95,#00e5ff);
    background-size:200% auto;
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    animation: shine 3s linear infinite, fadeIn 1.2s ease;
    text-shadow:0 0 20px rgba(0,229,255,.25);
}

@keyframes shine{
    to{ background-position:200% center; }
}
@keyframes fadeIn{
    from{ opacity:0; transform:translateY(15px); }
    to{ opacity:1; transform:translateY(0); }
}

/* ---------- Buttons Wrapper ---------- */
.index-buttons{
    width:100%;
    max-width:420px;
    display:flex;
    flex-direction:column;
    gap:1rem;
    padding:1rem;
}

/* ---------- Buttons ---------- */
.index-buttons button{
    width:100%;
    padding:1rem;
    font-size:1.1rem;
    font-weight:600;
    border:none;
    border-radius:14px;
    cursor:pointer;
    color:#fff;
    background: linear-gradient(145deg,#1c2b3a,#0e1622);
    box-shadow:
      rgba(50,50,93,.25) 0px 8px 20px -4px,
      rgba(0,0,0,.35) 0px 6px 12px -6px;
    transition:all .25s ease;
}

/* ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
========================================================  */

/* Hover / Focus */
.index-buttons button:hover{
    transform:translateY(-2px);
    box-shadow:
      rgba(0,229,255,.25) 0px 10px 25px -5px,
      rgba(0,0,0,.45) 0px 8px 16px -6px;
}

/* Active (Android touch feel) */
.index-buttons button:active{
    transform:scale(.98);
}

/* ---------- Different Accent Colors ---------- */
.index-buttons button:nth-child(1){
    background:linear-gradient(145deg,#0ea5e9,#0369a1);
}
.index-buttons button:nth-child(2){
    background:linear-gradient(145deg,#22c55e,#15803d);
}
.index-buttons button:nth-child(3){
    background:linear-gradient(145deg,#f97316,#c2410c);
}

/* ---------- Responsive (Desktop / TV) ---------- */
@media(min-width:900px){
    .brand-animation{
        font-size:3.5rem;
    }
    .index-buttons{
        max-width:480px;
    }
    .index-buttons button{
        font-size:1.2rem;
        padding:1.1rem;
    }
}

</style>
</head>
<body>

<div class="brand-animation">Secure Chat</div>

<div class="index-buttons">
    <button onclick="location.href='userset.php'">World Chat</button>
    <button onclick="location.href='create-room.php'">Create Room</button>
    <button onclick="location.href='join-room.php'">Join Room</button>
   </div>
</body>
</html>

<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor

======================================================== -->
