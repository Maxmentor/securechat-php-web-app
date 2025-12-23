<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->

<?php

include "config/config.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = trim($_POST['username']);
    $room_id = trim($_POST['room_id']);
    $room_password = trim($_POST['room_password']);

    if(!$username || !$room_id || !$room_password){
        $error = "All fields are required!";
    } else {
        // Ensure private_rooms table exists
        $conn->query("CREATE TABLE IF NOT EXISTS private_rooms (
            id INT AUTO_INCREMENT PRIMARY KEY,
            room_id VARCHAR(20) UNIQUE,
            room_name VARCHAR(100),
            room_password VARCHAR(100),
            created_by VARCHAR(50),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        // Validate room
        $stmt = $conn->prepare("SELECT * FROM private_rooms WHERE room_id=? AND room_password=?");
        $stmt->bind_param("ss", $room_id, $room_password);
        $stmt->execute();
        $res = $stmt->get_result();

        if($res->num_rows > 0){
            $room = $res->fetch_assoc();

            // Set session
            $_SESSION['username'] = $username;
            $_SESSION['room_id'] = $room['room_id'];
            $_SESSION['room_name'] = $room['room_name'];
            $_SESSION['is_creator'] = false;

            header("Location: stream.php");
            exit;
        } else {
            $error = "Invalid Room ID or Password!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Join Room - Secure Chat</title>
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
</head>
<body>

<div class="card">
    <h3 style="color:black;">Join Private Room</h3>
    <?php if(isset($error)){ echo "<div class='error'>$error</div>"; } ?>
    <form method="POST">
        <input style="width:100%;border:.3px solid"  type="text" name="username" placeholder="Enter Username" required>
        <input  style="width:100%;border:.3px solid"  type="text" name="room_id" placeholder="Enter 10-Digit Room ID" required>
        <input  style="width:100%;border:.3px solid"  type="password" name="room_password" placeholder="Enter Room Password" required>
        <button type="submit">Join Room</button>
    </form>
</div>

</body>
</html>


<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->
