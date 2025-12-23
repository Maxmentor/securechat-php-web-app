<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->

<?php
include "config/config.php";

// Start session safe (already handled in config.php)
if(isset($_SESSION['username'])){
    // User already has session, redirect to stream
    header("Location: stream.php");
    exit;
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = trim($_POST['username']);
    if(!$username) { echo "Enter username"; exit; }

    $username_safe = $conn->real_escape_string($username);

    // Make sure users table exists
    $conn->query("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Insert username if not exists
    $conn->query("INSERT IGNORE INTO users(username) VALUES('$username_safe')");

    // Set session
    $_SESSION['username'] = $username_safe;

    // Redirect to stream
    header("Location: stream.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Username</title>
</head>
<link rel="stylesheet" href="assets/css/style.css">
<style>
body{font-family:Arial,sans-serif; background:#f5f5f5; padding:1rem;}
.card{background:#fff; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; margin:1rem auto; width:96%; max-width:400px; padding:1rem; border-radius:8px;}
h3{margin-bottom:1rem;}
input, button{width:100%; padding:10px; margin-bottom:1rem; border:none; border-radius:6px;}
button{background:#0072ff; color:#fff; font-weight:bold; cursor:pointer;}
button:hover{background:#0056c1;}
.error{color:red; margin-bottom:1rem;}
</style>
<body>
    <div class="card">
 
<!-- HTML FORM -->
<form method="POST">
    <h3>Enter Username</h3>
    <input style="border:.3px solid" type="text" name="username" placeholder="Username" required>
    <button type="submit">Join</button>
</form>
</div>
</body>
</html>


<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->