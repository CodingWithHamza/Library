<?php 

if (!isset($_SESSION['admin_email'])) {
	
	echo "<script>window.open('login.php','_self')</script>";
}
else
{

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		th,tr{
			border: 2px groove #000;
		}
		table{
			border: 2px solid #000;
		}
	
	</style>


</head>
<body>

<?php 
if (isset($_GET['view_books'])) { ?>

	<table align="center" width="794" bgcolor="#FFCC99">
		<tr align="center">
			<td colspan="8"><h2>View All Books</h2></td>
		</tr>

		<tr>
			<th>Book No</th>
			<th>Title</th>
			<th>Image</th>
			<th>Price</th>
			<th>Total Sold</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>

		<?php 

		include("includes/db.php");

		$i=0;

		$get_pro = "select * from books ";

		$run_pro= mysqli_query($con, $get_pro);

		while ($row_pro=mysqli_fetch_array($run_pro)) {
			$b_id = $row_pro['book_id'];
			$b_title = $row_pro['book_title'];
			$b_img = $row_pro['book_img1'];
			$b_price = $row_pro['book_price'];
			$status = $row_pro['status'];
			
			$i++;
		



		?>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $b_title; ?></td>
			<td><img src="book_images/<?php echo $b_img; ?>" width ="60" height= "60"></td>
			<td><?php echo $b_price; ?></td>
			<td>
				<?php 
				$get_sold="select * from pending_orders where book_id='$b_id' ";

				$run_sold=mysqli_query($con, $get_sold);

				$count = mysqli_num_rows($run_sold);

				echo "$count";


				?>

			</td>
			<td>
				<?php 
				

				echo "$status";


				?>


			</td>
			<td><a href="index.php?edit_book=<?php echo $b_id; ?> ">Edit</a></td>
			<td><a href="delete_book.php?delete_book=<?php echo $b_id; ?> ">Delete</a></td>
		</tr>

	<?php } ?>

	</table>

	<?php } ?>

</body>
</html>

<?php } ?>