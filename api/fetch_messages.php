<?php
include "../config/config.php";

header("Content-Type: application/json");

if(!isset($_SESSION['room_id'])){
    echo json_encode([]);
    exit;
}

$room_id = $_SESSION['room_id'];
$room_type = $_SESSION['room_type'] ?? 'public';

$sql = "SELECT username, message, image, created_at 
        FROM messages 
        WHERE room_id = ? 
        ORDER BY id ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $room_id);
$stmt->execute();

$result = $stmt->get_result();
$messages = [];

while($row = $result->fetch_assoc()){
    $img_path = null;
    if($row['image']){
        $folder = ($room_type==='private')
            ? "uploads/private_images"
            : "uploads/public_images";
        $img_path = $folder . "/" . $row['image'];
    }

    $messages[] = [
        "username" => $row['username'],
        "message"  => $row['message'],
        "image"    => $img_path,
        "time"     => $row['created_at']
    ];
}

echo json_encode($messages);
