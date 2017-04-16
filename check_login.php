<?php
session_start();

if($_SESSION['userID']=="")
{
	header("refresh:0; url=login.php");
}
