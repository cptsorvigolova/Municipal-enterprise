<html>
<head>
	<title>Authorization</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css?v=3">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<div class="container">
		<form class="form-signin" method="POST">
			<fieldset>
				<legend>Authorization</legend>
				<input type="text" name="username" placeholder="Login"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<button type="submit" name="submit">Sign in!</button>
				<a href="registration.php"><button type="button" formaction="registration.php" >Registration</button></a>
			</fieldset>
		</form>
	</div>
	<?php
	require('connect.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query ="SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($connection, $query);
	$result = mysqli_fetch_assoc($result);
	if($result['password']==$password){
	$smsg = "Success!";
	include_once('personalarea.php');
	exit();
} else {
$fmsg = "Error(Wrong password.)";
}
}
?>
	<!--
	-->
</body>	
</html>
