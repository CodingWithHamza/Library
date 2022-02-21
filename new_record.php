<?php include("includes/header.php"); ?>

<hr>
<h3 style="text-align: center;">Insert New Record </h3>
<hr>
<!--Once the form is submitted, all the form data is forwarded to InsertBooks.php -->
<form action="insert_record.php" method="post">

<table border="2" align="center"  cellpadding="5" cellspacing="5" style="width: 50%">

<td> Student Name :</td>
<td> <input type="text" name="student_name" size="48" placeholder="Student Name" required="true"> </td>
</tr>
<tr>
<td> Father Name :</td>
<td> <input type="text" name="father_name" size="48" placeholder="Father Name" required="true"> </td>
</tr>
<tr>
<td> CNIC No :</td>
<td> <input type="text" name="cnic" size="48" placeholder="xxxxxxxxxxxxx" required="true"> </td>
</tr>
<tr>
<td> Phone No :</td>
<td> <input type="text" name="phone" size="48" placeholder="xxxxxxxxxxx" required="true">  </td>
</tr>
<tr>
<td> Address :</td>
<td> <input type="text" name="address" size="48" placeholder="Student Address" required="true"> </td>
</tr>
<tr >
<td> Date Of Birth :</td>
<td> <input type="date" name="dob" size="48" placeholder="Student Name" required="true"> </td>
</tr>
<tr>
<td> program :</td>
<td> <input type="text" name="program" size="48" placeholder="Program" required="true"> </td>
</tr>
<tr>
<td> IUB Reg # :</td>
<td> <input type="text" name="iub_reg" size="48" placeholder="Registration No" required="true"> </td>
</tr>
<tr>
<td> Session Type :</td>
<td> 
	<select  name="session_type" required="true">
		<option value="">Select Session</option>
		<option value="Morning">Morning</option>
		<option value="Evening">Evening</option>
	</select> </td>
</tr>
<tr>
<td> Supervioser Name :</td>
<td> <input type="text" name="supervioser" size="48" placeholder="Supervioser Name" required="true"> </td>
</tr>
<tr>
<td> Initial Eximenior :</td>
<td> <input type="text" name="initial_eximenior" size="48" placeholder="Initial Eximenior" required="true" > </td>
</tr>
<tr>
<td> External Eximenior :</td>
<td> <input type="text" name="external_eximenior" size="48" placeholder="External Eximenior" required="true"> </td>
</tr>
<td>  <label>Submision Date:</label>
	</td>
<td> <input type="date" name="submission_date" size="48" placeholder="Student Name" required="true"> &nbsp; &nbsp; &nbsp; &nbsp;<label>Viva Date: </label>
	<input type="date" name="viva_date" size="48" placeholder="Student Name" required="true"> </td>
<tr>

</tr>
<tr>
<td> Remarks :</td>
<td> <input type="text" name="remarks" size="48" placeholder="Remarks" required="true"> </td>
</tr>
<tr>
<td> Campus :</td>
<td> <input type="text" name="campus" size="48" placeholder="Campus" required="true"></td>
</tr>
<tr>
<td> Department :</td>
<td> 
	<input type="text" name="depart" size="48" placeholder="Department" required="true"></td>
</tr>
<tr>
<td> Document Type: </td>
<td> <input type="text" name="document_type" size="48" required="true"> </td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" value="Save ">
<input type="reset" value="Reset">
</td>
</tr>
</table>
</form>
<?php include("includes/footer.php"); ?>