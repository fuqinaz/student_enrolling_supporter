<?php
$courseCode = $_GET['courseCode'];
$section = $_GET['section'];

$semester = 2;

require("connection.php");

$courseDetail = array(
    "courseCode"=>array(),
    "nameThai"=>array(),
    "nameEng"=>array(),
    "nameEngShort"=>array(),
    "facCode"=>array(),
    "program"=>array(),
    "acadYear"=>array(),
    "semester"=>array(),
    "remark"=>array(),
    "totalCredit"=>array(),
    "courseCondition"=>array(),
    "midDate"=>array(),
    "midTime"=>array(),
    "finDate"=>array(),
    "finTime"=>array(),
    "section"=>array(),
    "teachType"=>array(),
    "day"=>array(),
    "teachTime"=>array(),
    "building"=>array(),
    "roomNo"=>array(),
    "instructor"=>array(),
    "totalRegis"=>array()
);

$query = "SELECT * FROM course WHERE CourseCode='".$courseCode."' AND Semester='".$semester."'";
$result = mysql_query($query);

for($i=0; $list=mysql_fetch_array($result); $i++){
  $courseDetail['courseCode'][$i] = $list['CourseCode'];
  $courseDetail['nameThai'][$i] = $list['NameThai'];
  $courseDetail['nameEng'][$i] = $list['NameEng'];
  $courseDetail['nameEngShort'][$i] = $list['NameEngShort'];
  $courseDetail['facCode'][$i] = $list['FacCode'];
  $courseDetail['program'][$i] = $list['Program'];
  $courseDetail['acadYear'][$i] = $list['AcadYear'];
  $courseDetail['semester'][$i] = $list['Semester'];
  $courseDetail['remark'][$i] = $list['Remark'];
  $courseDetail['totalCredit'][$i] = $list['TotalCredit'];
  $courseDetail['courseCondition'][$i] = $list['CourseCondition'];
  $courseDetail['midDate'][$i] = $list['MidDate'];
  $courseDetail['midTime'][$i] = $list['MidTime'];
  $courseDetail['finDate'][$i] = $list['FinDate'];
  $courseDetail['finTime'][$i] = $list['FinTime'];
  $courseDetail['section'][$i] = $list['Section'];
  $courseDetail['teachType'][$i] = $list['TeachType'];
  $courseDetail['day'][$i] = $list['Day'];
  $courseDetail['teachTime'][$i] = $list['TeachTime'];
  $courseDetail['building'][$i] = $list['Building'];
  $courseDetail['roomNo'][$i] = $list['RoomNo'];
  $courseDetail['instructor'][$i] = $list['Instructor'];
  $courseDetail['totalRegis'][$i] = $list['TotalRegis'];
}

if(isset($courseDetail['courseCode'][0])){
   $showDetail = array(
      "courseCode"=>array(),
      "nameThai"=>array(),
      "nameEng"=>array(),
      "nameEngShort"=>array(),
      "facCode"=>array(),
      "program"=>array(),
      "acadYear"=>array(),
      "semester"=>array(),
      "remark"=>array(),
      "totalCredit"=>array(),
      "courseCondition"=>array(),
      "midDate"=>array(),
      "midTime"=>array(),
      "finDate"=>array(),
      "finTime"=>array(),
      "section"=>array(),
      "teachType"=>array(),
      "day"=>array(),
      "teachTime"=>array(),
      "building"=>array(),
      "roomNo"=>array(),
      "instructor"=>array(),
      "totalRegis"=>array()
    );

  //for initial
  $showDetail['courseCode'][0] = $courseDetail['courseCode'][0];
  $showDetail['nameThai'][0] = $courseDetail['nameThai'][0];
  $showDetail['nameEng'][0] = $courseDetail['nameEng'][0];
  $showDetail['nameEngShort'][0] = $courseDetail['nameEngShort'][0];
  $showDetail['facCode'][0] = $courseDetail['facCode'][0];
  $showDetail['program'][0] = $courseDetail['program'][0];
  $showDetail['acadYear'][0] = $courseDetail['acadYear'][0];
  $showDetail['semester'][0] = $courseDetail['semester'][0];
  $showDetail['remark'][0] = $courseDetail['remark'][0];
  $showDetail['totalCredit'][0] = $courseDetail['totalCredit'][0];
  $showDetail['courseCondition'][0] = $courseDetail['courseCondition'][0];
  $showDetail['midDate'][0] = $courseDetail['midDate'][0];
  $showDetail['midTime'][0] = $courseDetail['midTime'][0];
  $showDetail['finDate'][0] = $courseDetail['finDate'][0];
  $showDetail['finTime'][0] = $courseDetail['finTime'][0];
  $showDetail['section'][0] = $courseDetail['section'][0];
  $showDetail['teachType'][0] = $courseDetail['teachType'][0];
  $showDetail['day'][0] = $courseDetail['day'][0];
  $showDetail['teachTime'][0] = $courseDetail['teachTime'][0];
  $showDetail['building'][0] = $courseDetail['building'][0];
  $showDetail['roomNo'][0] = $courseDetail['roomNo'][0];
  $showDetail['instructor'][0] = $courseDetail['instructor'][0];
  $showDetail['totalRegis'][0] = $courseDetail['totalRegis'][0];
  ?>

  <?php
  for($i=1,$j=0; $i<count($courseDetail['courseCode']); $i++){
    if($courseDetail['section'][$i]!=$showDetail['section'][$j]){
      $j++;
      $showDetail['courseCode'][$j] = $courseDetail['courseCode'][$i];
      $showDetail['nameThai'][$j] = $courseDetail['nameThai'][$i];
      $showDetail['nameEng'][$j] = $courseDetail['nameEng'][$i];
      $showDetail['nameEngShort'][$j] = $courseDetail['nameEngShort'][$i];
      $showDetail['facCode'][$j] = $courseDetail['facCode'][$i];
      $showDetail['program'][$j] = $courseDetail['program'][$i];
      $showDetail['acadYear'][$j] = $courseDetail['acadYear'][$i];
      $showDetail['semester'][$j] = $courseDetail['semester'][$i];
      $showDetail['remark'][$j] = $courseDetail['remark'][$i];
      $showDetail['totalCredit'][$j] = $courseDetail['totalCredit'][$i];
      $showDetail['courseCondition'][$j] = $courseDetail['courseCondition'][$i];
      $showDetail['midDate'][$j] = $courseDetail['midDate'][$i];
      $showDetail['midTime'][$j] = $courseDetail['midTime'][$i];
      $showDetail['finDate'][$j] = $courseDetail['finDate'][$i];
      $showDetail['finTime'][$j] = $courseDetail['finTime'][$i];
      $showDetail['section'][$j] = $courseDetail['section'][$i];
      $showDetail['teachType'][$j] = $courseDetail['teachType'][$i];
      $showDetail['day'][$j] = $courseDetail['day'][$i];
      $showDetail['teachTime'][$j] = $courseDetail['teachTime'][$i];
      $showDetail['building'][$j] = $courseDetail['building'][$i];
      $showDetail['roomNo'][$j] = $courseDetail['roomNo'][$i];
      $showDetail['instructor'][$j] = $courseDetail['instructor'][$i];
      $showDetail['totalRegis'][$j] = $courseDetail['totalRegis'][$i];
    }
    else{
      $showDetail['teachType'][$j] .= ",".$courseDetail['teachType'][$i];
      $showDetail['day'][$j] .= ",".$courseDetail['day'][$i];
      $showDetail['teachTime'][$j] .= ",".$courseDetail['teachTime'][$i];
    }
  }
}

?>
