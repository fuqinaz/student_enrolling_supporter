<?php
session_start();
require("connection.php");

ob_start();
$userID=$_POST['userID'];
$password=$_POST['password'];

$query="SELECT * FROM user_inform WHERE UserID='$userID' AND Password='$password'";

$result=mysql_query($query);

if($list=mysql_fetch_array($result))
{
  	$_SESSION['userID']=$list['UserID'];
  	$_SESSION['fName']=$list['FName'];
  	$_SESSION['lName']=$list['LName'];
  	$_SESSION['majorCode']=$list['MajorCode'];
  	$_SESSION['attendYear']=$list['AttendYear'];
  	$_SESSION['userPic']=$list['Pic'];
  	$_SESSION['userType']=$list['UserType'];
   	header("refresh: 0; url=schedule.php");
}

else
{
	header("refresh: 0; url=login.php");
}
ob_end_flush();

?>
