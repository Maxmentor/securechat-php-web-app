<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->

<?php
session_start();
include "../config/db.php";

if(isset($_POST['register'])){
    $u=$_POST['username'];
    $p=password_hash($_POST['password'],PASSWORD_DEFAULT);

    $conn->query("INSERT INTO admin_users(username,password)
                  VALUES('$u','$p')");
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Register</title>
<link rel="stylesheet" href="./assets/css/style.css">
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

<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->

<div class="card">
    <h3 style="color:black;">Register Admin</h3>

<form method="post">
<input  style="border:.3px solid;width:94.5%;"  name="username" required>
<input style="border:.3px solid;width:94.5%;"  type="password" name="password" required>
<button name="register">REGISTER</button>
</form>
<a type="button" style="background-color:teal;color:white;padding:.4rem;border-radius:.3rem;text-decoration:none;" href="login.php">Login Admin</a>

</div>

</body>
</html>