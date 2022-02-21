<?php include("includes/header.php");
if ($_GET) {
  require  "DBConnection.php";
  $record_id = $_GET['id'];
  $sql = "DELETE FROM students_info WHERE id='$record_id'";
  $result = mysqli_query($conn,$sql);
 

	if($result){
        echo "<script>alert('Record has been Deleted ');
					window.history.back();
					</script>";
    }
    else {
        echo "<script>alert('Record not Deleted!');
        window.history.back();
					</script>";	
    }
}else{
	 echo "<script>alert('Record not Deleted!');
        window.history.back();
					</script>";	
}

 ?>