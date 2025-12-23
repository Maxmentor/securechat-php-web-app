<?php
include "config/db.php";
include "config/config.php";

if($_POST){
    $roomID = generateRoomID();
    $roomName=$_POST['room_name'];
    $pass=password_hash($_POST['room_pass'],PASSWORD_DEFAULT);
    $user=$_POST['username'];

    $_SESSION['username']=$user;
    $_SESSION['room_id']=$roomID;
    $_SESSION['room_name']=$roomName;
    $_SESSION['is_creator']=1;

    $conn->query("INSERT INTO rooms(room_id,room_name,room_password,type,created_by)
    VALUES('$roomID','$roomName','$pass','private','$user')");

    header("Location: stream.php");
}
?>
