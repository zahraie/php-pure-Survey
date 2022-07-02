<?php require_once 'includes/init.php' ; ?>
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
<body>
<div class = "container" style=" margin-top : 50px  ;  background-color :  #bfe4ff; "><br>
    <div class = "row">
        <div class = "col-xs-offset-6  col-md-6">
		<form action="MasterEvaluation.php" method="GET">
			<script>
	alert("نظرسنجی شما ثبت شد ، استاد بعدی خود را انتخاب کنید .");
	</script><br><br><br><br><br><br>
			<div style=" float : right ">
			<a href="MasterEvaluation.php" class="btn-btn-success">انتخاب استاد بعدی</a>
			</div>
		</form>
        </div>
    </div>
</div>
</body>
</html>
