<?php
session_start();
unset($_SESSION['ID']);
unset($_SESSION['FullName']);
// session_destroy();
header("location: index.php");
?>