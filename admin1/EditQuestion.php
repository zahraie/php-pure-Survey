<?php require_once 'pages/header.php' ?>
<div class="body"><!-- start body-->
<?php require_once 'pages/sidebar.php' ;
$form = "SELECT form_id ,form_name FROM `forms`";
$stmt = $con->prepare($form);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$row = selectQuestion($_GET['edit']);
if (isset($_GET['edit']) && isset($_POST['question_id'])) {
	$updateQuestion = updateQuestion($_POST['question_id']);
	if ($updateQuestion) {
		$message = '<p class="alert alert-success">ویرایش با موفقیت انجام شد</p>';
		header("refresh:1, url = addQuestion.php");
	} else {
		$message = '<p class="alert alert-error">ویرایش با خطا مواجه شد</p>';
	}
}
?>
    <div class="content"> <!--- start Content --->
        <form action="" method="post">
            <input type="text" class="textbox" value="<?= $row->question_name; ?>" name="question_name"
                   placeholder="نام سوال">

            <input type="hidden" name="cate_id" value="<?php if (isset($row)) echo $row->question_id;; ?>" placeholder="">
			    <select name="form" placeholder="انتخاب فرم ها" class="textbox" required="required">
				<?php
                foreach ($result as $item) {
                ?>
                <option value="<?= $item->form_id ?>">
                <?php
                echo ($item->form_name);
                }
                ?>
                </option>
            </select>
            <br>
            <input type="submit" class="btn btn-success" name="editQuestion" value="ویرایش دسته بندی">
            <input type="reset" class="btn btn-error" value="انصراف">
        </form>
        <?php if (isset($message)) echo $message; ?>
    </div><!--- end Content --->
    <div class="clear"></div>
</div><!-- end body-->

<?php require_once 'pages/footer.php' ?>

