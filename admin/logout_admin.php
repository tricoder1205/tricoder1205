<?php
session_start();
unset($_SESSION['IDQT']);
unset($_SESSION['FullNameNV']);
session_destroy();
header("location: login_admin.php");
?>