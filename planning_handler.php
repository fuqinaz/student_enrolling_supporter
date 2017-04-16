<?php
require("connection.php");
session_start();

$userID = $_SESSION['userID'];
$courseCode = $_POST['changeCode'];
$section = $_POST['changeSec'];

//check course
$planning = array(
  "courseCode"=>array(),
  "section"=>array()
);

$userID = $_SESSION['userID'];
$query = "SELECT * FROM planning WHERE StudentID = '".$userID."'";
$result = mysql_query($query);
for($a=0; $list=mysql_fetch_array($result); $a++){
  $planning['courseCode'][$a] = $list['CourseCode'];
  $planning['section'][$a] = $list['Section'];
}

$GLOBALS['changeFlag'] = "add";

$code = $courseCode;
$sec = $section;

for($a=0; $a<count($planning['courseCode']); $a++){
  if($code == $planning['courseCode'][$a]){
    if($sec == $planning['section'][$a]){
      $GLOBALS['changeFlag'] = "drop";
      //return;
    }
    else{
      $GLOBALS['changeFlag'] = "change";
      //return;
    }
  }
}

//end check course

if($_POST['change'] == "add" && $GLOBALS['changeFlag']=="add"){
  $query = "INSERT INTO planning SET StudentID='".$userID."', CourseCode='".$courseCode."', Section='".$section."'";
  mysql_query($query);
}

if($_POST['change'] == "drop" && $GLOBALS['changeFlag']=="drop"){
  $query = "DELETE FROM planning WHERE StudentID='".$userID."' AND CourseCode='".$courseCode."'";
  mysql_query($query);
}

if($_POST['change'] == "change" && $GLOBALS['changeFlag']=="change"){
  $query = "UPDATE planning SET Section='".$section."' WHERE StudentID='".$userID."' AND CourseCode='".$courseCode."'";
  mysql_query($query);
}
?>
