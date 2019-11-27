<?php
require('connect.php');
$header = 'Registration';
include_once("header.php");
if(isset($_POST['username']) and isset($_POST['password']) and $_POST['username']!='' and $_POST['password']!=''){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query ="INSERT INTO users (username, email, password) VALUES ('$username', '$email','$password')";
	$result = mysqli_query($connection, $query);
	if($result){
			echo "<script>location.replace('personalarea.php');</script>";  // перенаправление на нужную страницу
			exit;
		} else {
			$fmsg = "Error. (Maybe user already exists.)";
		}
	}
	?>
	<div class="container">
		<form class="form-signup" method="POST" >
			<fieldset>
				<legend>Registration</legend>
				<?php 
				if(!$result){
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