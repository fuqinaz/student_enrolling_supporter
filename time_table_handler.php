<!-- query -->
<?php
$allCourses = array(
  "courseCode"=> array(),
  "section"=> array()
);

$userID = $_SESSION['userID'];
// if(!isset($_POST['change'])){
//   $query = "SELECT * FROM planned WHERE StudentID='$userID'";
// }
// else{
//   $query = "SELECT * FROM planning WHERE StudentID='$userID'";
// }
$query = "SELECT * FROM planning WHERE StudentID='".$userID."'";
$result = mysql_query($query);

for($i=0; $list=mysql_fetch_array($result); $i++){
  $allCourses['courseCode'][$i] = $list['CourseCode'];
  $allCourses['section'][$i] = $list['Section'];
}

$allCoursesDetails = array(
    "coursePID"=>array(),
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

for($i=0; $i<count($allCourses['courseCode']); $i++){
  $query = "SELECT * FROM course WHERE CourseCode='".$allCourses['courseCode'][$i]."' AND Section='".$allCourses['section'][$i]."' AND Semester='".$semester."'";
  $result = mysql_query($query);
  for($j=count($allCoursesDetails['coursePID']); $list=mysql_fetch_array($result); $j++){
    $allCoursesDetails['coursePID'][$j] = $list['CoursePID'];
    $allCoursesDetails['courseCode'][$j] = $list['CourseCode'];
    $allCoursesDetails['nameThai'][$j] = $list['NameThai'];
    $allCoursesDetails['nameEng'][$j] = $list['NameEng'];
    $allCoursesDetails['nameEngShort'][$j] = $list['NameEngShort'];
    $allCoursesDetails['facCode'][$j] = $list['FacCode'];
    $allCoursesDetails['program'][$j] = $list['Program'];
    $allCoursesDetails['acadYear'][$j] = $list['AcadYear'];
    $allCoursesDetails['semester'][$j] = $list['Semester'];
    $allCoursesDetails['remark'][$j] = $list['Remark'];
    $allCoursesDetails['totalCredit'][$j] = $list['TotalCredit'];
    $allCoursesDetails['courseCondition'][$j] = $list['CourseCondition'];
    $allCoursesDetails['midDate'][$j] = $list['MidDate'];
    $allCoursesDetails['midTime'][$j] = $list['MidTime'];
    $allCoursesDetails['finDate'][$j] = $list['FinDate'];
    $allCoursesDetails['finTime'][$j] = $list['FinTime'];
    $allCoursesDetails['section'][$j] = $list['Section'];
    $allCoursesDetails['teachType'][$j] = $list['TeachType'];
    $allCoursesDetails['day'][$j] = $list['Day'];
    $allCoursesDetails['teachTime'][$j] = $list['TeachTime'];
    $allCoursesDetails['building'][$j] = $list['Building'];
    $allCoursesDetails['roomNo'][$j] = $list['RoomNo'];
    $allCoursesDetails['instructor'][$j] = $list['Instructor'];
    $allCoursesDetails['totalRegis'][$j] = $list['TotalRegis'];
  }
}
?>
<!-- end query -->

<!-- manage & show schedule data -->
<?php
if(isset($allCoursesDetails['coursePID'][0])){
   $showCourses = array(
      "coursePID"=>array(),
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
  $showCourses['courseCode'][0] = $allCoursesDetails['courseCode'][0];
  $showCourses['nameEng'][0] = $allCoursesDetails['nameEng'][0];
  $showCourses['nameEngShort'][0] = $allCoursesDetails['nameEngShort'][0];
  $showCourses['section'][0] = $allCoursesDetails['section'][0];
  $showCourses['teachType'][0] = $allCoursesDetails['teachType'][0];
  $showCourses['day'][0] = $allCoursesDetails['day'][0];
  $showCourses['teachTime'][0] = $allCoursesDetails['teachTime'][0];
  $showCourses['building'][0] = $allCoursesDetails['building'][0];
  $showCourses['roomNo'][0] = $allCoursesDetails['roomNo'][0];
  ?>

  <?php
  for($i=1,$j=0; $i<count($allCoursesDetails['coursePID']); $i++){
    if($allCoursesDetails['courseCode'][$i]!=$showCourses['courseCode'][$j]){
      $j++;
      $showCourses['courseCode'][$j] = $allCoursesDetails['courseCode'][$i];
      $showCourses['nameEng'][$j] = $allCoursesDetails['nameEng'][$i];
      $showCourses['nameEngShort'][$j] = $allCoursesDetails['nameEngShort'][$i];
      $showCourses['section'][$j] = $allCoursesDetails['section'][$i];
      $showCourses['teachType'][$j] = $allCoursesDetails['teachType'][$i];
      $showCourses['day'][$j] = $allCoursesDetails['day'][$i];
      $showCourses['teachTime'][$j] = $allCoursesDetails['teachTime'][$i];
      $showCourses['building'][$j] = $allCoursesDetails['building'][$i];
      $showCourses['roomNo'][$j] = $allCoursesDetails['roomNo'][$i];
    }
    else{
      if($allCoursesDetails['section'][$i]!=$showCourses['section'][$j]){
        $j++;
        $showCourses['courseCode'][$j] = $allCoursesDetails['courseCode'][$i];
        $showCourses['nameEng'][$j] = $allCoursesDetails['nameEng'][$i];
        $showCourses['nameEngShort'][$j] = $allCoursesDetails['nameEngShort'][$i];
        $showCourses['section'][$j] = $allCoursesDetails['section'][$i];
        $showCourses['teachType'][$j] = $allCoursesDetails['teachType'][$i];
        $showCourses['day'][$j] = $allCoursesDetails['day'][$i];
        $showCourses['teachTime'][$j] = $allCoursesDetails['teachTime'][$i];
        $showCourses['building'][$j] = $allCoursesDetails['building'][$i];
        $showCourses['roomNo'][$j] = $allCoursesDetails['roomNo'][$i];
      }
      else{
        // $showCourses['teachType'][$j] .= ",".$allCoursesDetails['teachType'][$i];
        // $showCourses['day'][$j] .= ",".$allCoursesDetails['day'][$i];
        // $showCourses['teachTime'][$j] .= ",".$allCoursesDetails['teachTime'][$i];
      }
    }
  }
}
?>
