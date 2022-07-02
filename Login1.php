<?php require_once 'includes/init.php';
if (isset($_SESSION['AdminId'])) {
    header('location:admin1/');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>ورود به مدیریت</title>
</head>
<body style="background: #b6bb9c">
<div class="contanier" style="width:40%;background: #d8dcc2;padding: 50px;margin: 120px auto;box-shadow: 0 0 3px #ccc;">
    <?php LoginCheck1(); ?>
    <form action="" method="post">
        <input type="text" class="textbox" name="admin_username" placeholder="نام کاربری">
        <input type="text" class="textbox" name="admin_password" placeholder="رمز عبور">
        <br>
        <input type="submit" class="btn btn-success" name="Login1" value="ورود به پنل مدیریت">
    </form>
	<a style="color:#ffeefe" href="/blogAdmin/index-blog.php">خروج</a>
    <?php
    if (isset($_GET['Login1'])) {
        echo '<p class="alert alert-error">نام کاربری و یا رمز عبور اشتباست</p>';
    }
    ?>
</div>
</body>
</html>