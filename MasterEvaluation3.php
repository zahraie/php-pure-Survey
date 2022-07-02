<?php require_once 'includes/init.php' ; ?>
<?php
function getAllProfessors(){
    global $con ;
    $sql= "SELECT * FROM `users` WHERE  user_role =1" ;
    $stmt = $con->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_OBJ);    
}

function getOnlineStudent(){
    global $con ;
    $sql= "SELECT * FROM `users` WHERE  user_role =2" ;
    $stmt = $con->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_OBJ);    
	if ($stmt->rowCount()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['UserId'] = [
                'user_id' => $row['user_id'],
                'user_student_number' => $row['user_student_number']
            ];
            header('location:index-blog.php');
            exit() ;
//            $_SESSION['adminId']=$row['admin_id'];
//            $_SESSION['admin_username']=$row['admin_username'];
        } else {
            header('location:index.php?Login=error');
            exit();
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
<body style="margin: 0;background-color : #efefff ;">
<?php $professors = getAllProfessors() ;?>
<?php $student = getOnlineStudent() ;?>
<div class = "container" style=" margin-top : 50px  ;  background-color :  #bfe4ff; "><br>
    <div class = "row">
        <div class="col-md-12 wel_grid" >
		<form action="survey3.php" method="GET">
			<div style=" float : right ">
			<input type="submit" name="submit" value="انتخاب استاد بعدی" >
			این قسمت از نظرسنجی مربوط به مدیر گروه و اساتید محترم دانشگاه میباشد 		
			</div>
		</form>
        </div>
    </div>
</div>

</body>
</html>