<?php require_once 'pages/header.php' ?>
<div class="body"><!-- start body-->
    <?php require_once 'pages/sidebar.php' ?>
    <?php
    if (isset($_GET['delete'])) {
        $deleteComment = deleteComment($_GET['delete']);
        if ($deleteComment) {
            header('location:Comments.php?success=ok');
        } else {
            header('location:Comments.php?error=ok');
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
                <th>نام فرد ارسال کننده</th>
				<th>نام استاد موردنظر</th>
				<th>شماره سوال ها</th>
                <th>وضعیت پاسخ ها</th>
                <th width="13%">عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $selectAllSurvey = selectAllSurvey();
            if ($selectAllSurvey) {
                foreach ($selectAllSurvey as $index => $value) {
                    ?>
                    <tr>
                        <td><?php echo $index + 1 ?></td>
                        <td><?php echo $value['user_fullname'] ?></td>
						<td><?php echo $value['user_fullname'] ?></td>
                        <td><?php echo $value['question_name'] ?></td>
						<td><?php echo $value['reply_name'] ?></td>
                        <?php
                        if (isset($_GET['confirm'])) {
                            commentConfirm($_GET['confirm']);
                            header('location:Comments.php');
                        } elseif (isset($_GET['reject'])) {
                            commentReject($_GET['reject']);
                            header('location:Comments.php');
                        }
                        ?>
                        <td>
                            <a class="delete" href="Comments.php?delete=<?php echo $value['comment_id'] ?>">حذف</a>
                            <a class="edit" href="EditComment.php?edit=<?php echo $value['comment_id'] ?>">ویرایش</a>
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

