<?php
$dbc = mysqli_connect('localhost','root','','student');
if(!$dbc)
{
	echo "error";
}else{
session_start();
}
?>