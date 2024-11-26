<?php
session_start();
session_destroy();
header("Location: http://localhost/hpr/admin/admin_login.php");
exit();
?>
