<?php 

include("includes/db.php");

if (isset($_GET['delete_book'])) {
	
	$delete_id = $_GET['delete_book'];

	$delete_book = "delete from books where book_id ='$delete_id' ";

	$run_delete = mysqli_query($con, $delete_pro);

	if ($run_delete) {
		
		echo "<script>alert('One Book has been deleted')</script> ";

		echo "<script>window,open('index.php?view_books','_self') </script> ";


	}
}

?>