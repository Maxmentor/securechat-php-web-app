<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->


<?php

session_start();
include "../config/db.php";

if(isset($_SESSION['admin'])){
    header("Location: admin.php");
    exit;
}

if(isset($_POST['login'])){
    $u=$_POST['username'];
    $p=$_POST['password'];

    $q=$conn->query("SELECT * FROM admin_users WHERE username='$u'");
    if($q->num_rows){
        $r=$q->fetch_assoc();
        if(password_verify($p,$r['password'])){
            $_SESSION['admin']=$u;
            header("Location: admin.php");
            exit;
        }
    }
    $err="Invalid Login";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
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

<div class="card">
    <h3 style="color:black;">Login Admin</h3>
<?php if(isset($err)) echo $err; ?>
<form method="post">
<input style="border:.3px solid;width:94.5%;"   name="username" placeholder="Username" required>
<input style="border:.3px solid;width:94.5%;"   type="password" name="password" placeholder="Password" required>
<button name="login">LOGIN</button>
</form>
<a type="button" style="background-color:teal;color:white;padding:.4rem;border-radius:.3rem;text-decoration:none;" href="register.php">Create Admin</a>
</div>

</body>
</html>



<!-- ===================================================
 Developed by : Maxpro [Maxmentor]
 GitHub       : https://github.com/maxmentor
 Telegram     : https://t.me/maxmentor
======================================================== -->