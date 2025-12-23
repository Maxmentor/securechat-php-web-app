
<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/Ymaxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->



<?php
require_once "../config/db.php";


/* ===== UPDATE BRAND ===== */
if(isset($_POST['update_brand'])){
    $stmt = $conn->prepare(
        "UPDATE admin_settings SET brand_name=?, footer_text=? WHERE id=1"
    );
    $stmt->bind_param("ss", $_POST['brand_name'], $_POST['footer_text']);
    $stmt->execute();

  $_SESSION['success'] = "Brand settings updated successfully!";
    header("Location: admin.php");
    exit;


  
}

/* ===== UPDATE BUTTONS ===== */
if(isset($_POST['update_buttons'])){
    $stmt = $conn->prepare(
        "UPDATE admin_settings SET
        btn1_text=?, btn1_url=?,
        btn2_text=?, btn2_url=?,
        btn3_text=?, btn3_url=?,
        btn4_text=?, btn4_url=?
        WHERE id=1"
    );
    $stmt->bind_param(
        "ssssssss",
        $_POST['btn1_text'], $_POST['btn1_url'],
        $_POST['btn2_text'], $_POST['btn2_url'],
        $_POST['btn3_text'], $_POST['btn3_url'],
        $_POST['btn4_text'], $_POST['btn4_url']
    );
    $stmt->execute();

   $_SESSION['success'] = "Servers Are Updated successfully!";
    header("Location: admin.php");

    exit;
}

/* ===== DELETE WORLD CHAT ===== */
if(isset($_POST['delete_world'])){
    $conn->query("DELETE FROM messages WHERE room_id='WORLD001'");
     $_SESSION['success'] = "World Chats Deleted successfully!";
    header("Location: admin.php");
    exit;
}

/* ===== DELETE PRIVATE ROOMS ===== */
if(isset($_POST['delete_private'])){
    $conn->query("DELETE FROM messages WHERE room_id!='WORLD001'");
    $conn->query("DELETE FROM rooms WHERE room_type='private'");
     $_SESSION['success'] = "Private Room Data Deleted successfully!";
    header("Location: admin.php");
    exit;
}

exit;




