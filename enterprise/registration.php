<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css?v=3">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<?php
	require('connect.php');
	include_once("header.php");
	if(isset($_POST['username']) and isset($_POST['password']) and $_POST['username']!='' and $_POST['password']!=''){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query ="INSERT INTO users (username, email, password) VALUES ('$username', '$email','$password')";
		$result = mysqli_query($connection, $query);
		if($result){
			$smsg = "Success!";
			include_once('index.php');  // перенаправление на нужную страницу
			exit;
		} else {
			$fmsg = "Error. (Maybe user already exists.)";
		}
	}
	?>
	<div class="container">
		<form class="form-signup" method="POST">
			<fieldset>
				<legend>Registration</legend>
				<?php 
				if($result){ 
					echo"<div class='alert alert-success' role='alert'>$smsg</div>"; 
				}
				else { 
					echo"<div class='alert alert-danger' role='alert'>$fmsg</div>"; 
				}?>
				<input type="text" name="username" placeholder="Full name"><br>
				<input type="email" name="email" placeholder="E-mail address"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<button type="submit" name="submit">Sign up</button>
				<a href="login.php"><button type="button" >Authorization</button></a>
			</fieldset>
		</form>
	</div>
</body>	
</html>