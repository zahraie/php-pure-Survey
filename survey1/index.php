<?php require_once '../includes/init.php' ; ?>
<?php
function getAllProfessors(){
    global $con ;
    $sql= "SELECT * FROM `users` WHERE  user_role =1" ;
    $stmt = $con->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_OBJ);
}
if (isset($_GET['select'])) {
	$submitSurvey = submitSurvey($_GET['select']);
	if ($submitSurvey) {
		header('location:addQuestion.php?success=ok');
	} else {
		header('location:addQuestion.php?error=ok');
	}

}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<title>صفحه ی ورود</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href= "assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color : #d6c1d2 ";>
<?php $professors = getAllProfessors() ;?>
<div class = "container" style=" margin-top : 50px  ;  background-color :  #b396bb; "><br>
    <div class = "row">
        <div class = "col-xs-offset-6  col-md-3">
		<form action="survey1.php " method="GET">
			<lable for select>این فرم را دانشجویان گرامی پر میکنند </lable></br></br>
      <lable for select>لطفا استاد موردنظر خود را انتخاب کنید</lable>
			<input type="hidden"></br>
			<select name="professor" value="1" >
				<?php
				foreach ($professors as $professor) {
				?>
				<option value="<?= $professor->user_id ?>">
					<?php
					echo ($professor->user_fullname);
					}
					?>
				</option>
			</select>
			<input type="submit" name="submit" value="submit">
		</form><br>
        </div>
    </div>
</div>
<?php
if (isset($_GET['success'])) {
	echo '<p class="alert alert-success">حذف با موفقیت انجام شد</p>';
} elseif (isset($_GET['error'])) {
	echo '<p class="alert alert-error">حذف با  خطا مواجه شد</p>';
}
?>
</body>
</html>


<?php
/*
   <tr class="table-primary">
        <td>2</td>
        <td>اشراف کامل استاد بر محتوای کتاب درسی و داشتن طرح درس مناسب</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-success">
        <td>3</td>
        <td>تونانایی تفهیم و انتقال مطالب در خصوص مرور درس</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-danger">
        <td>4</td>
        <td>توانمندی علمی استاد در پاسخگویی به سوالات دانشجویان</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-info">
        <td>5</td>
        <td>کوشش برای طرح مباحث جدید و معرفی منابع جدید</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-warning">
        <td>6</td>
        <td>میزان آشنا نمودن دانشجویان با نحوه ی امتحانات</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-active">
        <td>7</td>
        <td>ایجاد انگیزه و رغبت در دانشجویان جهت تحقیق و مطالعه</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-secondary">
        <td>8</td>
        <td>میزان ابتکار و خلاقیت استاد در امر تدریس</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-light">
        <td>9</td>
        <td>فراهم آوردن زمینه ی مشارکت دانشجویان در مباحث درسی</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-dark text-dark">
        <td>10</td>
        <td>میزان استفاده ی استاد از امکانات و رسانه های آموزشی</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-danger">
        <td>11</td>
        <td>استفاده ی مطلوب از شیوه ها و روش های فعال و نوین آموزشی</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-info">
        <td>12</td>
        <td>نحوه ی مدیریت توانایی اداره ی کلاس</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-warning">
        <td>13</td>
        <td>نحوه ی تنظیم ارائه ی مطالب درسی با میزان ساعات تنظیم شده</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-active">
        <td>14</td>
        <td>گشاده رویی - رفتار اجتماعی مطلوب و تکریم دانشجو</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-secondary">
        <td>15</td>
        <td>توجه و اهمیت به مفهوم شاگردپروری</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-light">
        <td>16</td>
        <td>واکنش منطقی و معقول به پیشنهاد ها و انتقادات دانشجویان</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
      <tr class="table-dark text-dark">
        <td>17</td>
        <td>حضور به موقع و منظم استاد و استفاده ی بهینه از وقت کلاس</td>
        <form action="/action_page.php">
            <td>
                <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                </div>
            </td>
        </form>
        <form action="/action_page.php">
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option3">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option4">
                </label>
                </div>
            </td>
            <td>
                <div class="form-check-inline">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option5">
                </label>
                </div>
            </td>
            <td>
        </form>
      </tr>
    </tbody>
    */
?>
