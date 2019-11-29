<?php
require('connect.php');
$header = 'My orders';
if(!isset($_COOKIE['username'])){
	echo "<script>location.replace('login.php');</script>";
	exit;
}
$username = $_COOKIE['username'];
$query ="SELECT * FROM orders WHERE username='$username'";
$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
$orders = mysqli_fetch_all($result);
		//output		
include_once("header.php");
echo "<div class='container'>";
echo"<table>
 <caption>My orders</caption>
 <tr>
 <th>Order ID</th>
 <th>Type of work</th>
 <th>Price</th>
 </tr>";
 $sum=0;
foreach ($orders as $key => $order) {
	echo "<tr><td>$order[0]</td><td>$order[2]</td><td>$order[3]</td></tr>";
	$sum+=$order[3];
}
echo "<tr><td></td><td></td><td>$sum</td></tr>";
echo "</table>";
echo "<a href='onlinerequest.php'><button type='button' >New order</button></a><br>";
echo "<a href='logout.php'><button type='button' >Log out</button></a>";
echo "</div>";
?>
</div>
</body>	
</html>