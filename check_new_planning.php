<?php
	require("connection.php");
?>

<?php
	$userID = $_SESSION['userID'];
	$year = 3;
	$semester = 2;

	$query = "SELECT * FROM planning WHERE StudentID = '$userID' AND Year = '$year' AND Semester = '$semester'";
	$result = mysql_query($query);

	for($i=0; $list=mysql_fetch_array($result); $i++){
	  $allCourses[$i]=$list['CoursePID'];
	}

	$GLOBALS['checkNewFlag']=true;
	if(count($allCourses)>0) $GLOBALS['checkNewFlag'] = false;
?>
