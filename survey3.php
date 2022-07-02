<?php require_once 'includes/init.php' ; 

function getAllQuestion3(){
    global $con ;
    $sql= "SELECT * FROM `questions` where question_form_id =3 " ;
    $stmt = $con->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_OBJ);    
}
$questions = getAllQuestion3() ; 

if (isset($_POST['optradio'])) {
    $survey_student_id = $_SESSION['UserId']['user_id'];
     $survey_professor_id = $_GET['professor'];
     $i=0 ;
     foreach ($_POST['optradio'] as $question_id =>$survey_mark){
     $sql = "INSERT INTO `survey` (survey_student_id , survey_professor_id ,survey_question_id, survey_mark)
        VALUES ('$survey_student_id','$survey_professor_id','$question_id' , '$survey_mark')";
		
     $stmt = $con->prepare($sql);
	$stmt->execute();
	$i++;
    print_r ($_POST['optradio']);
    print_r ($_SESSION['UserId']['user_id']);
	
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
<body style="background-color : #efefff ;">
<div class="container" style="direction:rtl  ; text-align :center ;">
<h2 style="direction:rtl  ; align :right ;">فرم ارزیابی گروه علمی</h2>
<p style="direction:rtl  ; align :right ;">مدیر محترم گروه و اساتید گرامی لطفا با دقت به سوالات نظرسنجی پاسخ دهید </p><br><br>
    <form action="" method="POST">
        <table class="table-info" style="width:70% ; margin-right: 14%">
            <thead>
                <tr>
                    <th>شماره</th>
                    <th></th>
                    <th>کد نمره</th>
					<th>****بله****</th>
					<th>تاحدودی</th>
                    <th>****خیر****</th>
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
                        <textarea class="form-control" rows="5" id="comment" name="text" style="width:45px ; height:35px;margin-top : 2px;" noscroll></textarea>
                        </div>
                    </td>    
                    <td>
                        <div class="table-info">
                        <input type="radio" class="form-check-input" name="optradio[<?=$question->question_id?>]" value="3">
                        </label>
                        </div>
                    </td>
                    <td>   
                        <div class="table-info">
                        <input type="radio" class="form-check-input" name="optradio[<?=$question->question_id?>]" value="2">
                        </label>
                        </div>
                    </td>
                    <td>    
                        <div class="table-info">
                        <input type="radio" class="form-check-input"  name="optradio[<?=$question->question_id?>]" value="1">
                        </label>
                        </div>
                    </td> 
                </tr>        
            </tbody>                       
            <?php endforeach ;?> 
        </table><br>
        <div style="text-align:center ; float-right :50px">
        <input type="submit" name="submit" value="ثبت گزارش" >
        </div><br><br><br>
    </form>
</div>
</body>
</html>