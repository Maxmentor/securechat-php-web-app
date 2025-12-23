<?php
// Start session safely
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "securechat"; // change if different

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example encrypt/decrypt functions
function encryptMsg($msg){
    return base64_encode($msg); // simple encryption
}
function decryptMsg($msg){
    return base64_decode($msg);
}
