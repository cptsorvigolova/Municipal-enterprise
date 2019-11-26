<html>
<head>
	<title>Authorization</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css?v=3">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<meta charset="utf-8">
</head>
<body>	
	<?php
	require('connect.php');
	if(isset($_POST['username']) and isset($_POST['password']) and $_POST['username']!='' and $_POST['password']!=''){		
		session_start();
	}
	?>
	<div class="container">
		<form class="form-signin" method="POST" action="personalarea.php">
			<fieldset>
				<legend>Authorization</legend>
				<input type="text" name="username" placeholder="Login"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<button type="submit" name="submit">Sign in!</button>
				<a href="registration.php"><button type="button" formaction="registration.php">Registration</button></a>
			</fieldset>
		</form>
	</div>	
	<!--
	-->
</body>	
</html>
