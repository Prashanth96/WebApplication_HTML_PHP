<?php 
include 'db.php';
/*$dbc = mysqli_connect('localhost','root','','student');
if(!$dbc)
{
echo "error";
}
session_start();*/
$sname = $_POST["sname"];
$sage = $_POST["sage"];
$sclass = $_POST["sclass"];
$saddress = $_POST["saddress"];
$sphoneno = $_POST["sphoneno"];
$semail = $_POST["semail"];
$query =mysqli_query($dbc, "select student_id from student_details order by student_id desc limit 1");
//echo  "select student_id from student_details order by student_id desc limit 1";
$num = mysqli_num_rows($query);
$rows = mysqli_fetch_assoc($query);
$student_id =$rows['student_id'];
//echo "hello yesh".$student_id." ";
if ($num!=0 ){
	$student_id = substr($student_id , 3);
	
	$student_id = $student_id + 1	;
	
	$student_id = str_pad($student_id, 4, '0', STR_PAD_LEFT);
	
	$student_id = "STU".$student_id;
	
}else {
	$student_id = "STU0001";
	}
//echo $student_id;

$query =mysqli_query($dbc, "select student_email , student_password from student_details where student_email='$semail'");

$num = mysqli_num_rows($query);

if ($num<1)
{

/*echo "insert into student_details(student_id, student_name, student_age, student_class, student_address, 
phone_number) values ('".$student_id."','".$sname."','".$sage."','".$sclass."','".$saddress."','".$sphoneno."')";

die();*/
if($sname==''){
echo "name is empty";

die();
}else if($sage==''){
	echo "age is empty";
}
else if($sclass==''){
	echo "class is empty";
}
else if($saddress==''){
	echo "Address is empty";
}
else if($sphoneno==''){
	echo "Phone nio. is empty";
}
else if($semail==''){
	echo " Student Email is empty";
}
else{
	
$insertvalues = mysqli_query($dbc, "insert into student_details(student_id, student_name, student_age, student_class, student_address, phone_number, student_email) values ('".$student_id."','".$sname."','".$sage."','".$sclass."','".$saddress."','".$sphoneno."','".$semail."')");
//echo "insert into student_details(student_id, student_name, student_age, student_class, student_address, phone_number) values ('".$student_id."','".$sname."','".$sage."','".$sclass."','".$saddress."','".$sphoneno."')";
if(!$insertvalues){
	echo "Row not Inserted!";
}else{
	echo "success";
	$_SESSION['studentID']= $student_id;
	
	header ("Location: CreatePassword.html");
}
}}else{
	?>
	<center><h1> Mail ID already Registred </h1></center>
	<br>
	<center><button><a style="text-decoration:none" href="studentform.html" >Go Back To Registration Form</a></button></center>
			<?php
}
	

?>