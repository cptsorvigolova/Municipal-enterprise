<?php	
include_once("connect.php");
if(!isset($_COOKIE['username'])){
	echo "<script>location.replace('login.php');</script>";
	exit;
}
$username = $_COOKIE['username'];
if(isset($_POST['done'])){
	$username = $_POST['username'];
	$type = $_POST['type'];
	$price = 10000.0;
	$query ="INSERT INTO orders (username, type, price) VALUES ('$username', '$type','$price')";
	$result = mysqli_query($connection, $query);
	if($result){
		echo "<script>location.replace('orders.php');</script>";
		exit;
	}
	else{
		echo $result;
		$badrequest = true;
		$fail = 'Something wrong';
	}
}
include_once("header.php");
?>
<html>
<head>
	<title>Online request</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css?v=3">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if($badrequest)
		echo $fail;
	?>
	<div class="container">
		<form class="form-signup" method="POST">
			<fieldset>
				<legend>Online request</legend>
				<input type="text" name="username" placeholder="Username" value="<?echo $username?>"><br>
				<input type="text" name="type" placeholder="Type of work"><br>
				<button type="submit" name="done" value="true">Send order</button>
			</fieldset>
		</form>
	</div>
</body>	
</html>