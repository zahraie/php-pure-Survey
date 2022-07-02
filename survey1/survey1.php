<?php require_once '../includes/init.php' ;
$survey_professor_id = $_GET['professor'];
function selectedProfessor () {
    global $con;
    if(isset($_GET['professor'])){
        $professors = $_GET['professor'];
    //		print "you are selected:";
        $sql = "SELECT `user_role`  FROM `users` WHERE  user_role =1" ;
        $stmt = $con->prepare($sql);
        if ($stmt->execute()) {
        return $stmt;
        } else {
        return false;
        }
    }
}
$questions = getAllQuestion1() ;
 selectedProfessor () ;
if (isset($_POST['optradio'])) {
    $survey_student_id = $_SESSION['UserId']['user_id'];
     $survey_professor_id = $_GET['professor'];
     $survey_daneshkadeh_id = rand(1 , 5);
     $i=0 ;
     foreach ($_POST['optradio'] as $question_id =>$survey_mark){
     $sql = "INSERT INTO `survey` (survey_student_id , survey_professor_id , survey_daneshkadeh_id ,survey_question_id, survey_mark)
        VALUES ('$survey_student_id','$survey_professor_id','$survey_daneshkadeh_id','$question_id' , '$survey_mark')";

     $stmt = $con->prepare($sql);
	$stmt->execute();
	$i++;
    //print_r ($_POST['optradio']);
    //print_r ($_SESSION['UserId']['user_id']);

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
<body style="background-color : #d6c1d2 ;">
<div class="container" style="direction:rtl  ; text-align :center ;">
<h2 style="direction:rtl  ; align :right ;">فرم ارزیابی اساتید</h2>
<p style="direction:rtl  ; align :right ;">این فرم توسط دانشجویان تکمیل شود</p>
<p style="direction:rtl  ; align :right ;">محتویات این فرم محرمانه است و با هیچ یک از اساتید درمیان گذاشته نخواهد شد </p><br>
    <form action="" method="POST">
        <table class="table-info" style="width:60% ; margin-right: 19%">
            <thead>
                <tr>
                    <th>شماره</th>
                    <th></th>
                    <th>کد نمره</th>
					<th>**بله**</th>
					<th>تاحدودی</th>
                    <th>**خیر**</th>
                </tr>
            </thead>
            <?php foreach ($questions as $question) : ?>
            <tbody>
                <tr class="table-primary" >
                    <td>
                        <?= $question->question_id ?>
                    </td>
                    <td>
                        <?= $question->question_name ?>
                    </td>
                    <td>
                        <div  class="form-group">
                        <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;" noscroll></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="table-info">
                        <input type="radio" class="form-check-input" name="optradio[<?=$question->question_id?>]" value="3">
                        </div>
                    </td>
                    <td>
                        <div class="table-info">
                        <input type="radio" class="form-check-input" name="optradio[<?=$question->question_id?>]" value="2">
                        </div>
                    </td>
                    <td>
                        <div class="table-info">
                        <input type="radio" class="form-check-input"  name="optradio[<?=$question->question_id?>]" value="1">
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php endforeach ;?>
        </table><br>
        <div style="text-align:center ; float-right :50px">

        <input type="submit" name="submit" value="ثبت گزارش" >
<a href="/blogAdmin/survey1">انتخاب استاد بعدی</a>
    <a style="color:#ffeefe" href="/blogAdmin/index-blog.php">پایان نظرسنجی</a>
        </div><br><br><br>
    </form>
</div>
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
