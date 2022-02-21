<?php include("include/header.php");
$data = [];
if ($_GET) {
  require  "DBConnection.php";
  $record_id = $_GET['id'];
  $sql = "SELECT * FROM students_info where id = '$record_id'";

if ($result = $conn -> query($sql)) {
    while ($row = $result -> fetch_row()) {
      $data = $row;
    
    }
    // $result -> free_result();
  }
}

 ?>
<style type="text/css">
  table {

    border:1px solid black;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

/*tr:nth-child(even) {
  background-color: #dddddd;
}*/
</style>
<div>

  <h2 style="text-align: center;"> Student Record </h2>

  <table align="center">
   
  <tbody>
    <tr>
      <th>Full Name</th>
      <td><?php echo $data[1];?></td>
      <th>Father Name</th>
      <td><?php echo $data[2];?></td>
    </tr>
    <tr>
      <th>CNIC No</th>
      <td><?php echo $data[3];?></td>
      <th>Phone No</th>
      <td><?php echo $data[4];?></td>
    </tr>
    <tr > 
      <th>Address</th>
      <td colspan="3"><?php echo $data[5];?></td>
    </tr>
    <tr>
      <th>DOB </th>
      <td><?php echo date('d-M-Y',strtotime($data[6]));?></td>
      <th>IUB-Reg #</th>
      <td><?php echo $data[7];?></td>
    </tr>
    <tr>
      <th>Program </th>
      <td><?php echo $data[8];?></td>
      <th>Session Type</th>
      <td><?php echo $data[9];?></td>
    </tr>
    <tr>
      <th>Supervisor </th>
      <td colspan="3"><?php echo $data[10];?></td>
      
    </tr>
    <tr>
      <th>Initital Eximenor</th>
      <td><?php echo $data[11];?></td>
      <th>External Eximenor </th>
      <td><?php echo $data[12];?></td>
    </tr>
    <tr>
      <th>Submission Date </th>
      <td><?php echo date('d-M-Y',strtotime($data[13]));?></td>
      <th>Viva Date </th>
      <td><?php echo date('d-M-Y',strtotime($data[14]));?></td>
    </tr>
    <tr>
      <th>Campus</th>
      <td><?php echo $data[17];?></td>
      <th>Department</th>
      <td><?php echo $data[18];?></td>
    </tr>
    <tr>
      <th>Document Type </th>
      <td colspan="3"><?php echo $data[16];?></td>
      
    </tr>
    <tr>
      <th>Remarks </th>
      <td colspan="3"><?php echo $data[15];?></td>
      
    </tr>
    <tr>
      <th colspan="4" style="text-align: center;"><button style="width: 150px;background-color: black;color: white" align="center" onclick="goBack()">Back</button></th>
      
    </tr>
  </tbody>
</table>
<butto>Back</button>
</div>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
<?php include("include/footer.php"); ?>
