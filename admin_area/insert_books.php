<?php
@session_start();

include("includes/db.php");

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
	
</head>
<body bgcolor="#433030">

	<form method="post" action="insert_books.php " enctype="multipart/form-data">
		
		<table width="794" height="500" align="center" border="1" bgcolor="#FFCC99">
			<tr align="center">
				<td colspan="2"><h1>Insert New Book</h1></td>

			</tr>

			<tr>
				<td align="right"><b>Book Title</b></td>

				<td><input type="text" name="book_title" size="50"></td>
			</tr>

			<tr>
				<td align="right"><b>Book Image1</b></td>
				<td><input type="file" name="book_img1"></td>
			</tr>

			<tr>
				<td align="right"><b>Book Image2</b></td>
				<td><input type="file" name="book_img2"></td>
			</tr>

			<tr>
				<td align="right"><b>Book Image3</b></td>
				<td><input type="file" name="book_img3"></td>
			</tr>

			<tr>
				<td align="right"><b>Book File</b></td>
				<td><input type="file" name="book_file" accept="application/pdf"></td>
			</tr>

			<tr>
				<td align="right"><b>Book Price</b></td>
				<td><input type="text" name="book_price"></td>
			</tr>

			<tr>
				<td align="right"><b>Book Short Desc</b></td>
				<td><textarea name="book_short_desc" cols="25" rows="5"></textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Book Description</b></td>
				<td><textarea name="book_desc" cols="50" rows="10"></textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Book Keywords</b></td>
				<td><input type="text" name="book_keywords"></td>
			</tr>

			<tr align="center">
				<td colspan="2"><input type="submit" name="insert_book" value="Insert Book"></td>
			</tr>



		</table>



	</form>

</body>
</html>

<?php
if (isset($_POST['insert_book'])) {

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


 	 	$insert_book="insert into books (book_title, date,  book_img1, book_img2, book_img3, book_file, book_price, book_short_desc , book_desc, book_keywords, status) 
 	 	values ( '$book_title', NOW(),'$book_img1', '$book_img2', '$book_img3', '".$upload_file."','$book_price', '$book_short_desc','$book_desc','$book_keywords','$status')";
 	 	$run_book = mysqli_query($con, $insert_book);

 	 	if ($run_book) {

 	 		echo "<script>alert('Book Insert Successfully')</script>";

 	 		echo "<script>window.open('index.php?insert_books','_self') </script>";

 	 	}


 	 }




 } 





 ?>


 <?php } ?>