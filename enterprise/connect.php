<?php
require_once 'connection.php'; 
$connection = mysqli_connect($host, $user, $password) 
    or die("Ошибка " . mysqli_error($connection));
$select_db = mysqli_select_db($connection, $database);
?>