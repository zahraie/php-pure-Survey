<?php
session_start();
session_destroy();
unset($_SESSION['UserId']);
header('location:index.php');
?>