<?php
require('connect.php');
$header = 'Settings';
include_once("header.php");
if(!isset($_COOKIE['username'])){
	echo "<script>location.replace('login.php');</script>";
}
$username = $_COOKIE['username'];
$query ="SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
$user = mysqli_fetch_assoc($result);
$email = $user['email'];
$password=$user['password'];
if(isset($_POST['setprofileinfo'])){
	$username = $_COOKIE['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	if(strlen($password)>2){
		$query ="UPDATE users SET username = '$username',email = '$email',password = '$password' WHERE username = '$username'";
		$result = mysqli_query($connection, $query);
		if($result){
			echo "done";
			echo "<script>location.replace('personalarea.php');</script>";  // перенаправление на нужную страницу
			exit;
		} else {
			$fmsg = "Error. Try again later.";
		}
	}
	else{
		$fmsg = "Error. Password should have 2 or  more characters.";
	}

}	
		//output		
include_once("header.php");
if(isset($fmsg))
	echo $fmsg;
echo "<div class='container'>
<form class='form-signup' method='POST'>
<fieldset>
<legend>Settings</legend>				
Username: <br><input type='text' name='username' value='$username' disabled='disabled'><br>
Email: <br><input type='email' name='email' value='$email'><br>
Password: <br><input type='text' name='password' value='$password'><br>
<button type='submit' name='setprofileinfo' value='done'>Save changes</button>
</fieldset>
</form>
</div>"	;
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