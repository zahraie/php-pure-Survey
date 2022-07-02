<?php require_once 'pages/header.php' ?>
<div class="body"><!-- start body-->
<?php require_once 'pages/sidebar.php' ?>
<?php require_once '../includes/init.php' ; ?>
    <?php
    if (isset($_GET['delete'])) {
        $deleteSurvey = deleteSurvey($_GET['delete']);
        if ($deleteSurvey) {
            header('location:surveyManager1.php?success=ok');
        } else {
            header('location:surveyManager1.php?error=ok');
        }
    }
    ?>
  <div class="content"> <!--- start Content --->
    <?php
    if (isset($_GET['success'])) {
        echo '<p class="alert alert-success">حذف با موفقیت انجام شد</p>';
    } elseif (isset($_GET['error'])) {
        echo '<p class="alert alert-error">حذف با  خطا مواجه شد</p>';
    }
    ?>
        <br>
        <table>
            <thead>
            <tr>
                <th>شناسه</th>
				<th>نام استاد موردنظر</th>
				<th>شماره سوال ها</th>
                <th>وضعیت پاسخ ها</th>
                <th width="13%">عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $selectAllSurvey = selectAllSurvey1();
            if ($selectAllSurvey) {
                foreach ($selectAllSurvey as $index => $value) {
                    ?>
                    <tr>
                        <td><?php echo $index + 1 ?></td>
						<td><?php echo $value['user_fullname'] ?></td>
                        <td><?php echo $value['question_name'] ?></td>
						<td><?php echo $value['reply_name'] ?></td>
            <td>
                <a class="delete" href="surveyManager1.php?delete=<?php echo $value['user_id'] ?>">حذف</a>
                <a class="edit" href="EditQuestion.php?edit=<?php echo $value['question_id'] ?>">ویرایش</a>
            </td>
            </tr>
                <?php }
            } else {
                ?>
                <td colspan="9" class="alert alert-info">نظری وجود ندارد</td>

            <?php } ?>
            </tbody>
        </table>
    </div><!--- end Content --->
    <div class="clear"></div>
</div><!-- end body-->

<?php require_once 'pages/footer.php' ?>
