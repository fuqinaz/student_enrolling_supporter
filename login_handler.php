<?php
ob_start();
session_start();
require("connection.php");

$userID=$_POST['userID'];
$password=$_POST['password'];

$query="SELECT * FROM user_inform WHERE UserID='$userID' AND Password='$password'";

$result=mysql_query($query);

if($list=mysql_fetch_array($result))
{
	// echo "if";
  	$_SESSION['userID']=$list['UserID'];
  	// echo $_SESSION['userID'];
  	$_SESSION['fName']=$list['FName'];
  	$_SESSION['lName']=$list['LName'];
  	$_SESSION['majorCode']=$list['MajorCode'];
  	$_SESSION['attendYear']=$list['AttendYear'];
  	$_SESSION['userPic']=$list['Pic'];
  	$_SESSION['userType']=$list['UserType'];

   	header("refresh: 0; url=schedule.php");

   	ob_end_flush();
}

else
{
	// echo "else";
	header("refresh: 0; url=login.php");
	//exit;
	ob_end_flush();
}


?>
