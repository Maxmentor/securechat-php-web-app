<?php
session_start();
include "../config/db.php";

$username = trim($_POST['username'] ?? '');
$roomID   = trim($_POST['room_id'] ?? '');
$pass     = $_POST['room_pass'] ?? '';

if($username=="" || $roomID=="" || $pass==""){
    echo json_encode(["status"=>"error","msg"=>"All fields required"]);
    exit;
}

$q=$conn->query("SELECT * FROM rooms WHERE room_id='$roomID'");
if($q->num_rows){
    $r=$q->fetch_assoc();
    if(password_verify($pass,$r['room_password'])){
        $_SESSION['username']=$username;
        $_SESSION['room_id']=$roomID;
        echo json_encode(["status"=>"success"]);
        exit;
    }
}
echo json_encode(["status"=>"fail"]);
