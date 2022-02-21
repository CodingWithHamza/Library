<?php
include("includes/db.php");

if (!isset($_SESSION['admin_email'])) {
	
	echo "<script>window.open('login.php','_self')</script>";
}
else
{


//Getting the specific product from table

if (isset($_GET['edit_book'])) {

	$edit_id= $_GET['edit_book'];

	$get_edit= "select * from books where book_id='$edit_id' ";

	$run_edit=mysqli_query($con, $get_edit);

	$row_edit=mysqli_fetch_array($run_edit);

	$update_id = $row_edit['book_id'];

	$b_title = $row_edit['book_title'];
	$b_image1 =$row_edit['book_img1'];
	$b_image2 =$row_edit['book_img2'];
	$b_image3 =$row_edit['book_img3'];
	$b_file =$row_edit['book_file'];
	$b_price =$row_edit['book_price'];
	$b_short_desc =$row_edit['book_short_desc'];
	$b_desc =$row_edit['book_desc'];
	$b_keywords =$row_edit['book_keywords'];


}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body bgcolor="#433030">

	<form method="post" action="" enctype="multipart/form-data">
		
		<table width="794" height="500" align="center" border="1" bgcolor="#FFCC99">
			<tr align="center">
				<td colspan="2"><h1>Update or Edit Book</h1></td>

			</tr>

			<tr>
				<td align="right"><b>Book Title</b></td>

				<td><input type="text" name="book_title" size="50" value="<?php echo $b_title; ?>"></td>
			</tr>

			<tr>
				<td align="right"><b>Book Image 1</b></td>
				<td><input type="file" name="book_img1"><br><img src="book_images/<?php echo $b_image1 ?>" width="70" height="70" >  </td>
			</tr>

			<tr>
				<td align="right"><b>Book Image 2</b></td>
				<td><input type="file" name="book_img2"><br><img src="book_images/<?php echo $b_image2 ?>" width="70" height="70" > </td>
			</tr>

			<tr>
				<td align="right"><b>Book Image 3</b></td>
				<td><input type="file" name="book_img3"><br><img src="book_images/<?php echo $b_image3 ?>" width="70" height="70" > </td>
			</tr>

			<tr>
				<td align="right"><b>Book File</b></td>
				<td><input type="file" name="book_file"><br><img src="book_files/<?php echo $b_file ?>" width="70" height="70" > </td>
			</tr>

			<tr>
				<td align="right"><b>Book Price</b></td>
				<td><input type="text" name="book_price" value="<?php echo $b_price; ?>" ></td>
			</tr>

			<tr>
				<td align="right"><b>Book Short Description</b></td>
				<td><textarea name="book_short_desc" cols="50" rows="10"><?php echo $b_short_desc; ?> </textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Book Description</b></td>
				<td><textarea name="book_desc" cols="50" rows="10"><?php echo $b_desc; ?> </textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Book Keywords</b></td>
				<td><input type="text" name="book_keywords" value="<?php echo $b_keywords; ?>"></td>
			</tr>

			<tr align="center">
				<td colspan="2"><input type="submit" name="update_book" value="Update Book"></td>
			</tr>



		</table>



	</form>

</body>
</html>

<?php
if (isset($_POST['update_book'])) {

	//text data variales
 	
 	$book_title=$_POST['book_title'];
 	$book_price=$_POST['book_price'];
 	$book_short_desc=$_POST['book_short_desc'];
 	$book_desc=$_POST['book_desc'];
 	$status= 'on';
 	$book_keywords=$_POST['book_keywords'];
 	
 	//image name

 	$book_img1=$_FILES['book_img1']['name'];
 	$book_img2=$_FILES['book_img2']['name'];
 	$book_img3=$_FILES['book_img3']['name'];
 	$allow=array('pdf');
 	$temp=explode(".", $_FILES['book_file']['name']);
 	$extension=end($temp);

 	//Image temperory names
 	$temp_name1=$_FILES['book_img1']['tmp_name'];
 	$temp_name2=$_FILES['book_img2']['tmp_name'];
 	$temp_name3=$_FILES['book_img3']['tmp_name'];
 	$upload_file=$_FILES['book_file']['name'];

 	//validations
 	 if ($book_title== '' OR $book_price== '' OR $book_short_desc=='' OR $book_desc==''  OR   $book_keywords=='' OR $book_img1==''  ) {
 	 	echo "<script>alert('Please Fill All the feilds!')</script>";
 	 	exit();
 	 }
 	 else{
 	 	//uploading images
 	 	move_uploaded_file($temp_name1, "book_images/$book_img1");
 	 	move_uploaded_file($temp_name2, "book_images/$book_img2");
 	 	move_uploaded_file($temp_name3, "book_images/$book_img3");
 	 	move_uploaded_file($_FILES['book_file']['tmp_name'], "book_files/" .$_FILES['book_file']['name'] );


 	 	$update_book="update books set book_title='$book_title', date=NOW() , book_img1='$book_img1', book_img2='$book_img2' , book_img3='$book_img3', book_price='$book_price', book_short_desc='$book_short_desc',  book_desc='$book_desc', book_keywords='$book_keywords' where book_id='$update_id' ";

 	 	$run_update = mysqli_query($con, $update_book);

 	 	if ($run_update) {

 	 		echo "<script>alert('Book Updated Successfully')</script>";

 	 		echo "<script>window.open('index.php?view_books','_self') </script>";

 	 	}


 	 }




 } 





 ?>


 <?php } ?>