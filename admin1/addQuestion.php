<?php require_once 'pages/header.php' ;

$form = "SELECT form_id ,form_name FROM `forms`";
$stmt = $con->prepare($form);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);


if (isset($_GET['delete'])) {
	$deleteQuestion = deleteQuestion($_GET['delete']);
	if ($deleteQuestion) {
		header('location:addQuestion.php?success=ok');
	} else {
		header('location:addQuestion.php?error=ok');
	}

}

 ?>
<div class="body"><!-- start body-->
    <?php require_once 'pages/sidebar.php' ?>

    <div class="content"> <!--- start Content --->
        <?php addAllQuestions(); ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" class="textbox" required="required" name="question_title" placeholder="عنوان سوال">
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
            <input type="submit" class="btn btn-success" name="insertQuestion" value="درج سوال">
            <input type="reset" class="btn btn-error" value="انصراف">
        </form>
		<?php
        if (isset($_GET['success'])) {
            echo '<p class="alert alert-success">حذف با موفقیت انجام شد</p>';
        } elseif (isset($_GET['error'])) {
            echo '<p class="alert alert-error">حذف با  خطا مواجه شد</p>';
        }
        ?>
        <table>
            <thead>
            <tr>
                <th>شناسه</th>
                <th>عنوان سوال</th>
				<th>فرم انتخابی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $selectQuestion = selectAllQuestion();
            if ($selectQuestion) {
                foreach ($selectQuestion as $index => $value) {
                    ?>
                    <tr>
                        <td><?php echo $index + 1 ?></td>
                        <td><?= $value->question_name ?></td>
						<td><?= $value->question_form_id ?></td>
                        <td>
                            <a class="delete" href="addQuestion.php?delete=<?= $value->question_id; ?>">حذف</a>
                            <a class="edit" href="EditQuestion.php?edit=<?= $value->question_id ?>">ویرایش</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <td colspan="3" class="alert alert-info">سوالی وجود ندارد </td>
            <?php } ?>

            </tbody>
        </table>
    </div><!--- end Content --->
    <div class="clear"></div>
</div><!-- end body-->

<?php require_once 'pages/footer.php' ?>

