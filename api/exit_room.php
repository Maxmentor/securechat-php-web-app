<?php
session_start();
include "../config/db.php";

$user=$_SESSION['username'] ?? '';
$room=$_SESSION['room_id'] ?? 0;

/* remove user */
$conn->query("DELETE FROM users WHERE username='$user'");

/* if owner, delete private room */
$conn->query("DELETE FROM rooms 
              WHERE owner='$user' AND room_type='private'");

/* clear session */
session_destroy();

echo json_encode(["status"=>"exit"]);
