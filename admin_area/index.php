<?php 
@session_start();

if (!isset($_SESSION['admin_email'])) {
	
	echo "<script>window.open('login.php','_self')</script>";
}
else
{



?>


<!DOCTYPE html>
<html>
<head>
	<title>Digital Library</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all">


</head>
<body>

	<div class="wrapper">
		
		<div class="header">

			<a href="index.php" style="text-decoration: none;"><h1 align="center" style="padding-top: 20px; color: #FFF; ">WElCOME to ADMIN PANEL</h1></a>

			<a href="index.php" style="text-decoration: none;"><h1 align="center" style="padding-top: 10px; color: #FFF; ">Manage Your Content</h1></a>


			


		</div>

		
		<div class="right">
			
			<h2>Manage Content</h2>
			<a href="index.php?insert_books">Insert New Book</a>
			<a href="index.php?view_books">View All Books</a>
			<a href="index.php?view_customers">View Customers</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?view_payments">View Payments</a>
			<a href="logout.php">Admin Logout</a>

		</div>

		<div class="left"> 

			<h2 style="color: red; text-align: center; padding: 20px;"><?php echo @$_GET['logged_in']; ?> </h2>

			<?php 

			include("includes/db.php");


			if (isset($_GET['insert_books'])) {

				include("insert_books.php");
				
			}

			if (isset($_GET['view_books'])) {

				include("view_books.php");
				
			}

			if (isset($_GET['edit_book'])) {

				include("edit_book.php");
				
			}


			if (isset($_GET['view_customers'])) {

				include("view_customers.php");
				
			}

			if (isset($_GET['view_orders'])) {

				include("view_orders.php");
				
			}

			if (isset($_GET['view_payments'])) {

				include("view_payments.php");
				
			}

			?>

		</div>


	</div>

</body>
</html>

<?php } ?>


