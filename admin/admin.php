<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->



<?php
require_once "../config/db.php";

/* ================= SESSION CHECK ================= */
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

/* ================= FETCH SETTINGS ================= */
$settingsQ = $conn->query("SELECT * FROM admin_settings LIMIT 1");
$settings  = $settingsQ->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Chat Admin Panel</title>
    <style>
        body{font-family:Arial;background:#f4f6f8;margin:0;padding:0}
        .wrap{max-width:800px;margin:auto;padding:20px}
        .card{
            background:#fff;
            padding:20px;
            margin-bottom:20px;
            border-radius:8px;
            box-shadow:rgba(50,50,93,.25) 0 2px 5px -1px,
                       rgba(0,0,0,.3) 0 1px 3px -1px
        }
        h2{margin-top:0}
        input,button{
            width:100%;
            padding:12px;
            margin-bottom:12px;
            border-radius:6px;
            border:1px solid #ddd;
            font-size:15px
        }
        button{
            background:#0072ff;
            color:#fff;
            border:none;
            cursor:pointer
        }
        .danger{background:#e74c3c}

        .alert{
    padding:14px;
    border-radius:6px;
    margin-bottom:15px;
    font-size:15px;
    animation:fadein .3s ease;
}
.alert.success{
    background:#e9fbe9;
    color:#1e7e34;
    border:1px solid #b6f0c2;
}
.alert.error{
    background:#fdeaea;
    color:#a94442;
    border:1px solid #f5c6cb;
}

@keyframes fadein{
    from{opacity:0;transform:translateY(-5px)}
    to{opacity:1;transform:translateY(0)}
}

    </style>
</head>

<body>
<div class="wrap">
    <?php if(isset($_SESSION['success'])): ?>
<div class="alert success">
    <?= $_SESSION['success']; ?>
</div>
<?php unset($_SESSION['success']); endif; ?>

<?php if(isset($_SESSION['error'])): ?>
<div class="alert error">
    <?= $_SESSION['error']; ?>
</div>
<?php unset($_SESSION['error']); endif; ?>




<!-- ================= MASTER DELETE ================= -->
<div class="card">
    <h2>Master Controls</h2>
    <form method="post" action="admin_action.php">
        <button class="danger" name="delete_world">Delete World Chat</button>
        <!-- <button class="danger" name="delete_public">Delete Public Rooms</button> -->
        <button class="danger" name="delete_private">Delete Private Rooms</button>
    </form>
    <br>
    <br>
    <a href="https://t.me/maxmentor" style="text-align:center;width:100%;">Project By Maxmentor</a>
</div>

</div>
</body>
</html>


<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->