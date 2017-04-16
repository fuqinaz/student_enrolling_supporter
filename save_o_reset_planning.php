<?php
require("connection.php");

if(isset($_POST['save'])){
  session_start();
  $userID = $_SESSION['userID'];

  $query = "DELETE FROM planned WHERE StudentID='".$userID."'";
  mysql_query($query);

  $query = "SELECT * FROM planning WHERE StudentID='".$userID."'";
  $result=mysql_query($query);
  while($list=mysql_fetch_array($result)){
    $code = $list['CourseCode'];
    $sec = $list['Section'];
    $grade = $list['EstimatedGrade'];
    $query1 = "INSERT INTO planned SET StudentID='".$userID."', CourseCode='".$code."', Section='".$sec."', EstimatedGrade='".$grade."'";
    mysql_query($query1);
  }
  echo "<script> alert('save la ja ^ ^') </script>";
  header("refresh: 0; url=time_table.php");
}

if(isset($_POST['reset'])){
  session_start();
  $userID = $_SESSION['userID'];

  $query = "DELETE FROM planning WHERE StudentID='".$userID."'";
  mysql_query($query);

  $query = "SELECT * FROM planned WHERE StudentID='".$userID."'";
  $result=mysql_query($query);
  while($list=mysql_fetch_array($result)){
    $code = $list['CourseCode'];
    $sec = $list['Section'];
    $grade = $list['EstimatedGrade'];
    $query1 = "INSERT INTO planning SET StudentID='".$userID."', CourseCode='".$code."', Section='".$sec."', EstimatedGrade='".$grade."'";
    mysql_query($query1);
  }
  header("refresh: 0; url=time_table.php");
}

if(isset($_POST['clear'])){
  session_start();
  $userID = $_SESSION['userID'];

  $query = "DELETE FROM planning WHERE StudentID='".$userID."'";
  mysql_query($query);

  $query = "DELETE FROM planned WHERE StudentID='".$userID."'";
  mysql_query($query);

  header("refresh: 0; url=time_table.php");
}
?>
