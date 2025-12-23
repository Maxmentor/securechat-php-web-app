<?php
include "../config/config.php";

// Session check
if(!isset($_SESSION['username'])) exit;

$room_id = $_SESSION['room_id'];
$room_type = $_SESSION['room_type'] ?? 'public';
$username = $_SESSION['username'];

$msg = trim($_POST['message'] ?? '');
$image = null;

// IMAGE UPLOAD HANDLING
if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
    $folder = ($room_type==='private') ? "../uploads/private_images/" : "../uploads/public_images/";

    if(!is_dir($folder)) mkdir($folder,0777,true);

    $filename = time() . "_" . preg_replace('/\s+/', '_', $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $folder . $filename);

    $image = $filename;
}

// IF BOTH EMPTY, EXIT
if($msg=='' && !$image) exit;

// INSERT INTO DB
$stmt = $conn->prepare(
 "INSERT INTO messages (room_id, username, message, image, created_at)
  VALUES (?, ?, ?, ?, NOW())"
);
$stmt->bind_param("ssss", $room_id, $username, $msg, $image);
$stmt->execute();

echo json_encode(["status"=>"ok"]);
