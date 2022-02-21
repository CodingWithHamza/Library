<!DOCTYPE html>
<html>
<head>
	<title>Payment Options</title>
</head>
<body>

<?php 
include ("includes/db.php");

?>


<div align="center" style="padding: 20px; background-color: #FFB233;" >

	<h2>You have sucessfully logged in.</h2><br>

	<?php 
	$ip =getRealIpAddr();

	$get_customer = "select * from customers where customer_ip='$ip' ";

	$run_customer =mysqli_query($con , $get_customer);

	$customer = mysqli_fetch_array($run_customer);

	$customer_id = $customer['customer_id'];


	?>
	
	
</div>


</body>
</html>