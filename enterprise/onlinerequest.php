<html>
<head>
	<title>Online request</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css?v=3">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<?php	
		include_once("connect.php");
		include_once("header.php");
	?>
	<div class="container">
		<form class="form-signup" method="POST">
			<fieldset>
				<legend>Online request</legend>
				<input type="text" name="username" placeholder="Full name"><br>
				<input type="tel" name="tel" placeholder="Phone number"><br>
				<input type="email" name="email" placeholder="E-mail address"><br>
				<button type="submit" name="submit">Send order</button>
			</fieldset>
		</form>
	</div>
</body>	
</html>