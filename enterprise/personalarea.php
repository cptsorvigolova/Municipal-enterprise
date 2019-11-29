<?php
require('connect.php');
$header='Personal area';
$username;
if(isset($_SESSION['username']) or isset($_COOKIE['username'])){			
	$username = $_COOKIE['username'];	
}
else if(isset($_POST['username']) and isset($_POST['password'])){		
	$_SESSION['username']=$_POST['username'];
	setcookie('username', $_POST['username'], time() + (60 * 15),'/');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query ="SELECT * FROM users WHERE username='$username' and password='$password'";
	$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
	$count = mysqli_num_rows($result);
	if($count!=1){
		echo 'failed';      	
		echo ("<script>location.replace('login.php');</script>");
		exit;
	}
}
else{
	echo("<script>location.replace('login.php');</script>");
}
		//output		
include_once("header.php");
echo "<div class='container'>";
$query ="SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
$user = mysqli_fetch_assoc($result);
foreach ($user as $key => $value) {
	echo strtoupper($key).": $value<br>";			
}
echo "<a href='setprofileinfo.php'><button type='button' >Profile settings</button></a><br>";
echo "<a href='onlinerequest.php'><button type='button' >New order</button></a><br>";
echo "<a href='orders.php'><button type='button' >My orders</button></a><br>";
echo "<a href='logout.php'><button type='button' >Log out</button></a>";
/*echo "<br>SESSION ";
print_r($_SESSION);
echo "<br>COOKIE ";
print_r($_COOKIE);
echo "<br>REQUEST ";
print_r($_REQUEST);*/
?>
</div>
</body>	
</html>