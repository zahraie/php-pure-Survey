<?php require_once 'includes/init.php' ;

if (isset($_POST['submit'])) {
		$user_student_number = $_POST['student-number'];
		$user_fullname = $_POST['fullname'];
		$user_email = $_POST['email'];
		$user_password = md5($_POST['password']);
		$user_sex = $_POST['sex'];
		$user_role = $_POST['role'];
		$user_daneshkadeh = $_POST['danesh'];
		$user_created_at = date('y-m-d');
		$user_updated_at = date('y-m-d');
		$sql = "INSERT INTO `users` (user_fullname , user_student_number , user_email , user_password, user_sex , user_role,user_daneshkadeh_id , user_created_at , user_updated_at )
			VALUES ('$user_fullname', '$user_student_number', '$user_email', '$user_password', '$user_sex', '$user_role', '$user_daneshkadeh',  '$user_created_at',  '$user_updated_at')";
	$stmt = $con->prepare($sql);
	if ($stmt->execute()) {
		return $stmt;
	} else {
		return false;
	}
	echo "اطلاعات شما با موفقیت ثبت شد .";
}
    $role = "SELECT role_id ,role_name FROM `roles`";
    $stmt = $con->prepare($role);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_OBJ);
	//echo var_dump ($result);

	$danesh = "SELECT daneshkadeh_id ,daneshkadeh_name FROM `daneshkadeh`";
    $stmt = $con->prepare($danesh);
	$stmt->execute();
	$result2 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Fullscreen Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>ورود به سیستم</h1>
		<form action="" method="post">
            <input type="text"  placeholder="نام و نام خانوادگی" name='fullname'>
            <input type="text"  placeholder="شماره پرسونلی" name='student-number'>
			<input type="email" id="email" name="email" placeholder="ایمیل">
			<input type="password" name="password" placeholder="گذرواژه">
			<lable for select>انتخاب نقش</lable><br>
			<select name="role" style="width:300px; height:35px"><br>
                <?php
                foreach ($result as $item) {
                ?>
                <option value="<?= $item->role_id ?>">
                <?php
                echo ($item->role_name);
                }
                ?>
                </option>
            </select>
			<lable for select>انتخاب دانشکده </lable><br>
			<select name="danesh" style="width:300px; height:35px"><br>
                <?php
                foreach ($result2 as $item) {
                ?>
                <option value="<?= $item->daneshkadeh_id ?>">
                <?php
                echo ($item->daneshkadeh_name);
                }
                ?>
                </option>
            </select>
			<lable for select>جنسیت </lable><br>
			<select name="sex" style="width:300px; height:35px"><br>
                <option value="0">مرد</option>
				<option value="1">زن</option>
            </select>
			<button type="submit" name="submit">ثبت</button><br><br>
			<a href="index-login.php" style="color :#fff" >ورود</a>
		</form>
            <div class="connect">
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>
