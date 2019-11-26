<html>
<head>
	<title>Personal area</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css?v=3">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<meta charset="utf-8">
</head>
<body>
<?php
	require('connect.php');
	if(isset($_POST['username']) and isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query ="SELECT * FROM users WHERE username='$username' and password='$password'";
		$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
		$count = mysqli_num_rows($result);
		if($count==1){
			$_SESSION['username'] =$username;
		} else {
			$fmsg = "Error";
		}
	}
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$query ="SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
		$user = mysqli_fetch_assoc($result);
		foreach ($user as $key => $value) {
			echo "$key: $value<br>";			
		}
		echo "<a href='logout.php'><button type='button' >Log out</button></a>";
	}
	?>
</body>	
</html>