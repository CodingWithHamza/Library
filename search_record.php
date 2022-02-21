
<?php 
/* if ($_SESSION['auth'] !== false) {
    header("Location: login.php");
    exit();
} */

include("includes/header.php"); ?>
<style type="text/css">
  table {
    border:1px solid black;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<div>
  <h2 style="text-align: center;">Search Record</h2>
  <form action="search_record.php" method="post">
<br>
<center>
	Enter Student Name, IUB Reg # For Search <br>
<input type="text" name="search" size="48" required="">
<br></br>
<input type="submit" value="Search">
<input type="reset" value="Reset">
</center>
<br>
</form>
</div>
<hr>
<?php if(@$_POST['search']){

$search_rec = $_POST['search'];
$data = array();
$search_rec = mysqli_real_escape_string($conn, htmlspecialchars($search_rec));
 $sql = "SELECT * FROM students_info WHERE student_name LIKE '%$search_rec%' OR father_name LIKE '%$search_rec%' OR iub_reg LIKE '%$search_rec%'";  
          
          $query = mysqli_query($conn, $sql);
          $counter =1;
            while($row = mysqli_fetch_array($query)){
            	$data[] = $row;
            }

?>

  <?php if(!empty($data)){ ?>
  	<div>
  <h2 style="text-align: center;">Search Record</h2>
  <table>
    <thead>
  <tr>
    <th>ID</th>
    <th>Student Name</th>
    <th>Father Name</th>
    <th>CNIC</th>
    <th>Phone</th>
    <th>Address</th>
    <th>D-O-B</th>
    <th>IUB Reg #</th>
    <th>Prograam</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody><?php
  		$query = mysqli_query($conn, $sql);
          $counter =1;
            while($row = mysqli_fetch_array($query)){ 
              ?>
              <tbody>
              <tr>
              <td><?php echo $counter++; ?></td>
              <td><?php echo $row['student_name'];?></td>
               <td><?php echo $row['father_name']; ?></td>
               <td><?php echo $row['cnic']; ?></td>
               <td><?php echo $row['phone']; ?></td>
               <td><?php echo $row['address']; ?></td>
               <td><?php echo date('d-m-Y',strtotime($row['dob'])); ?></td>
               <td><?php echo $row['iub_reg']; ?></td>
               <td><?php echo $row['program']; ?></td>
               <td><a href="view_record.php?id=<?php echo $row['id'];?>">View Full Details</a> | <a href="delete_record.php?id=<?php echo $row['id'];?>" style="color:red"> Delete Record</a></td>
              </tr>
              </tbody>
              <?php }
          
           ?></tbody>
</table>
</div>
<?php }else{ ?>
	<div>
  <h2 style="text-align: center;color: red">Sorry ! No Record found.....</h2>
</div>
<?php } }?>
<?php include("includes/footer.php"); ?>
