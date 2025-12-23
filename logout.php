<?php
include "config/config.php";

// Start session safe (already handled in config.php)

// Delete user from DB (if table exists)
if(isset($_SESSION['username'])){
    $username = $conn->real_escape_string($_SESSION['username']);

    $result = $conn->query("SHOW TABLES LIKE 'users'");
    if($result && $result->num_rows > 0){
        $conn->query("DELETE FROM users WHERE username='$username'");
    }
}

// Destroy session
session_destroy();

// Redirect to index
header("Location: index.php");
exit;
