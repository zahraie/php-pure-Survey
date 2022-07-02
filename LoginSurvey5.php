<?php require_once 'includes/init.php';
if (isset($_SESSION['UserId'])) {
    header('location:survey5/');
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
    <title>ورود به صفحه ی نظرسنجی اساتید</title>
</head>
<body>
<div class="contanier" style="width:40%;background: #fff;padding: 50px;margin: 120px auto;box-shadow: 0 0 3px #ccc;">
    <?php LoginSurvey5(); ?>
    <form action="" method="post">
        <input type="text" class="textbox" name="username" placeholder="شماره دانشجویی">
        <input type="text" class="textbox" name="password" placeholder="رمز عبور">
        <br>
        <input type="submit" class="btn btn-success" name="Login5.php" value="ورود به نظرسنجی اساتید">
    </form>
    <?php
    if (isset($_GET['Login5.php'])) {
        echo '<p class="alert alert-error">نام کاربری و یا رمز عبور اشتباست</p>';
    }
    ?>
</div>
</body>
</html>