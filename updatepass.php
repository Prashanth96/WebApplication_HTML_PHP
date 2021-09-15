<?php
include 'db.php';
/*$dbc = mysqli_connect('localhost','root','','student');
if(!$dbc)
{
	echo "error";
}*/

//echo "_SESSION['studentID']".$_SESSION['studentID'];
$spass = $_POST["spass"];
$srepass = $_POST["srepass"];
$student_id = $_SESSION['studentID']; 
//echo $spass.' '.$srepass;

if($spass==''&& $srepass==''){
	echo "Please Enter Password";
}
else if($spass==$srepass)
{
	$insertvalues = mysqli_query($dbc, "update student_details set student_password = '".$spass."' where student_id='".$student_id."'");
 //echo "Successfully Registered";
 ?>
 <center style="margin-top:10%">
 <u><h1> Successfully Registered </h1></u>
 <br><button  style="width:4em;height:2em"><a href="login.html" >Log In</a></button>
 </center>
 <?php
	//echo "update student_details set student_password = '".$spass."' where student_id='".$student_id."'";
}else
{
	echo "Password mismatch";
}
//$insertvalues = mysqli_query($dbc, "update student_details set student_password = '".$spass."'");

?>