<html>
<head>
	<title>Personal area</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css?v=3">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<div class='container'>
		<?php
		require('connect.php');
		$username;
		if(isset($_SESSION['username']) or isset($_COOKIE['username'])){			
			$username = $_COOKIE['username'];	
		}
		else if(isset($_POST['username']) and isset($_POST['password'])){		
			$_SESSION['username']=$_POST['username'];
			$_COOKIE['username']=$_POST['username'];
			//setcookie('username', $_POST['username'], time() + (60 *1),'/');
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query ="SELECT * FROM users WHERE username='$username' and password='$password'";
			$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
			$count = mysqli_num_rows($result);
			if($count!=1){
				echo 'failed';      	
				echo ("<script>location.replace('login.php');</script>");
			}
		}
		else{
			echo("<script>alert('You should be logged in!');location.replace('login.php');</script>");
		}
		//output
		include_once("header.php");
		$query ="SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
		$user = mysqli_fetch_assoc($result);
		foreach ($user as $key => $value) {
			echo "$key: $value<br>";			
		}
		echo "<a href='logout.php'><button type='button' >Log out</button></a>";
		echo "<br>SESSION ";
		print_r($_SESSION);
		echo "<br>COOKIE ";
		print_r($_COOKIE);
		echo "<br>REQUEST ";
		print_r($_REQUEST);
		?>
	</div>
</body>	
</html>