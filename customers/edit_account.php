<?php 
@session_start();

include ("includes/db.php");

if (isset($_GET['edit_account'])) {
	$customer_email = $_SESSION['customer_email'];

	$get_customer = "select * from customers where customer_email='$customer_email' ";

	$run_customer = mysqli_query($con, $get_customer);

	$row = mysqli_fetch_array($run_customer);

	$id = $row['customer_id'];
	$name = $row['customer_name'];
	$email = $row['customer_email'];
	$pass = $row['customer_pass'];
	$country = $row['customer_country'];
	$city = $row['customer_city'];
	$contact = $row['customer_contact'];
	$address = $row['customer_address'];
	$image = $row['customer_image'];

}


?>


<form action="" method="post" enctype="multipart/form-data" style="padding-left: 200px;">

	<table align="center" width="600">
		<tr>
			<td align="center" colspan="8"><h2>Update Your Account:</h2></td>
		</tr>

		<tr>
			<td align="right">Customer Name:</td>
			<td><input type="text" name="c_name" value="<?php echo $name; ?>" required></td>
		</tr>

		<tr>
			<td align="right">Customer Email:</td>
			<td><input type="text" name="c_email" value="<?php echo $email; ?>" required></td>
		</tr>

		<tr>
			<td align="right">Customer Password:</td>
			<td><input type="password" name="c_pass" value="<?php echo $pass; ?>" required></td>
		</tr>

		<tr>
			<td align="right">Customer Country:</td>
			<td>
				<select name="c_country" disabled>
					<option value="<?php echo $country; ?> "><?php echo $country; ?> </option>
					<option>Afghanistan</option>
					<option>India</option>
					<option>Iran</option>
					<option>Japan</option>
					<option>China</option>
					<option>PAKISTAN</option>
					<option>United Arab Emirates</option>
					<option>Saudi Arabia</option>
					<option>United Kingdom</option>
					<option>United States</option>


				</select>
			</td>
		</tr>

		<tr>
			<td align="right">Customer City:</td>
			<td><input type="text" name="c_city" value="<?php echo $city; ?>" required></td>
		</tr>

		<tr>
			<td align="right">Customer Phone No:</td>
			<td><input type="text" name="c_contact" value="<?php echo $contact; ?>" required></td>
		</tr>

		<tr>
			<td align="right">Customer Address:</td>
			<td><input type="text" name="c_address" value="<?php echo $address; ?>" required></td>
		</tr>

		<tr>
			<td align="right">Customer Image:</td>
			<td><input type="file" name="c_image" size="60"><img src="customer_photos/<?php echo $image; ?>" width="60" height="60"></td>
		</tr>

		<tr>
			<td align="center" colspan="8"><br>
			<input type="submit" name="update_account" Value= "Update Now">		
			</td>
		</tr>

	</table>
	

	</form>

<?php 

if (isset($_POST['update_account'])) {
	
	$update_id = $id;

	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['contact'];
	$c_address=$_POST['c_address'];
	$c_image=$_FILES['c_image']['name'];
	if($c_image == null){
		$c_image = $image;
	}else{
		$c_image_tmp =$_FILES['c_image']['tmp_name'];
		move_uploaded_file($c_image_tmp, "customer_photos/$c_image"); 
	}
	
	$update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' where customer_id='$update_id'  ";

	$run_c = mysqli_query($con , $update_c);

	if ($run_c) {
		echo "<script>alert('Your Account has been updated!')</script> ";
		echo "<script>window.open('user_detail.php','_self')</script> ";
	}


}

?>