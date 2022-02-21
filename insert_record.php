<?php
include("DBConnection.php");
include("includes/snippet.php");

$student_name = sanitize(trim($_POST['student_name']));
$father_name = sanitize(trim($_POST['father_name']));
$cnic = sanitize(trim($_POST['cnic']));
$phone = sanitize(trim($_POST['phone']));
$address = sanitize(trim($_POST['address']));
$dob = sanitize(trim($_POST['dob']));
$iub_reg = sanitize(trim($_POST['iub_reg']));
$session_type = sanitize(trim($_POST['session_type']));
$supervioser = sanitize(trim($_POST['supervioser']));
$initial_eximenior = sanitize(trim($_POST['initial_eximenior']));
$external_eximenior = sanitize(trim($_POST['external_eximenior']));
$submission_date = sanitize(trim($_POST['submission_date']));
$viva_date = sanitize(trim($_POST['viva_date']));
$remarks = sanitize(trim($_POST['remarks']));
$campus = sanitize(trim($_POST['campus']));
$depart = sanitize(trim($_POST['depart']));
$document_type = sanitize(trim($_POST['document_type']));
$program = sanitize(trim($_POST['program']));
$query = "insert into students_info(student_name,father_name,cnic,phone,address,dob,iub_reg,session_type,supervioser,initial_eximenior,external_eximenior,submission_date,viva_date,remarks,campus,depart,document_type,program) values('$student_name','$father_name','$cnic','$phone','$address','$dob','$iub_reg','$session_type','$supervioser','$initial_eximenior','$external_eximenior','$submission_date','$viva_date','$remarks','$campus','$depart','$document_type','$program')"; //Insert query to add book details into the book_info table
$result = mysqli_query($conn,$query);
if($result){
        echo "<script>alert('Record has been added ');
					location.href ='index.php';
					</script>";
    }
    else {
        echo "<script>alert('Record not added!');
					</script>";	
    }

?>