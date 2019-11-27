<?php
setcookie('username', null, -1,'/');
session_start();
unset($_SESSION['username']);
session_destroy();
header("Location: login.php");
exit;
?>
