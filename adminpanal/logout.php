<?php
session_start();
session_unset();
//unset($_SESSION['uemail	']);
echo "<script> location.assign('signin.php')</script>";
?>