<?php
require("connection.php");
$semester = 2;
$searchedCoursesDetails = array(
    "coursePID"=>array(),
    "courseCode"=>array(),
    "nameThai"=>array(),
    "nameEng"=>array(),
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

if($_POST['gened']!="NO"){
  if($_POST['courseSearch']!=""){
    $courseSearch = $_POST['courseSearch'];
    if(strlen($courseSearch)>2){
      $gened = $_POST['gened'];
      $querySearched = "SELECT * FROM course WHERE
          Semester = '".$semester."' AND
          Gened = '".$gened."' AND
          (NameEng LIKE '%".$courseSearch."%' OR
          NameThai LIKE '%".$courseSearch."%' OR
          CourseCode LIKE '%".$courseSearch."%')";
      //$result = mysql_query($query);
    }
  }
  else{
    $gened = $_POST['gened'];
    if($gened!=""){
      $querySearched = "SELECT * FROM course WHERE Gened = '".$gened."'";
    }
    //$result = mysql_query($query);
  }
}
else{
  if(isset($_POST['courseSearch'])){
    $courseSearch = $_POST['courseSearch'];
    if(strlen($courseSearch)>2){
      require("connection.php");
      $semester = 2;
      $querySearched = "SELECT * FROM course WHERE
          Semester = '".$semester."' AND
          (NameEng LIKE '%".$courseSearch."%' OR
          NameThai LIKE '%".$courseSearch."%' OR
          CourseCode LIKE '%".$courseSearch."%')";
      //$result = mysql_query($query);
    }
  }
}
$result = mysql_query($querySearched);
for($i=0; $list=mysql_fetch_array($result); $i++){
    $searchedCoursesDetails['coursePID'][$i] = $list['CoursePID'];
    $searchedCoursesDetails['courseCode'][$i] = $list['CourseCode'];
    $searchedCoursesDetails['nameThai'][$i] = $list['NameThai'];
    $searchedCoursesDetails['nameEng'][$i] = $list['NameEng'];
    $searchedCoursesDetails['facCode'][$i] = $list['FacCode'];
    $searchedCoursesDetails['program'][$i] = $list['Program'];
    $searchedCoursesDetails['acadYear'][$i] = $list['AcadYear'];
    $searchedCoursesDetails['semester'][$i] = $list['Semester'];
    $searchedCoursesDetails['remark'][$i] = $list['Remark'];
    $searchedCoursesDetails['totalCredit'][$i] = $list['TotalCredit'];
    $searchedCoursesDetails['courseCondition'][$i] = $list['CourseCondition'];
    $searchedCoursesDetails['midDate'][$i] = $list['MidDate'];
    $searchedCoursesDetails['midTime'][$i] = $list['MidTime'];
    $searchedCoursesDetails['finDate'][$i] = $list['FinDate'];
    $searchedCoursesDetails['finTime'][$i] = $list['FinTime'];
    $searchedCoursesDetails['section'][$i] = $list['Section'];
    $searchedCoursesDetails['teachType'][$i] = $list['TeachType'];
    $searchedCoursesDetails['day'][$i] = $list['Day'];
    $searchedCoursesDetails['teachTime'][$i] = $list['TeachTime'];
    $searchedCoursesDetails['building'][$i] = $list['Building'];
    $searchedCoursesDetails['roomNo'][$i] = $list['RoomNo'];
    $searchedCoursesDetails['instructor'][$i] = $list['Instructor'];
    $searchedCoursesDetails['totalRegis'][$i] = $list['TotalRegis'];
}
?>
<!-- end query -->

 <!-- manage & show searched data-->
 <?php
 if(isset($searchedCoursesDetails['coursePID'][0])){
    $showSearched = array(
       "coursePID"=>array(),
       "courseCode"=>array(),
       "nameThai"=>array(),
       "nameEng"=>array(),
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
   $showSearched['courseCode'][0] = $searchedCoursesDetails['courseCode'][0];
   $showSearched['nameEng'][0] = $searchedCoursesDetails['nameEng'][0];
   $showSearched['section'][0] = $searchedCoursesDetails['section'][0];
   $showSearched['teachType'][0] = $searchedCoursesDetails['teachType'][0];
   $showSearched['day'][0] = $searchedCoursesDetails['day'][0];
   $showSearched['teachTime'][0] = $searchedCoursesDetails['teachTime'][0];
   ?>

   <?php
   for($i=1,$j=0; $i<count($searchedCoursesDetails['coursePID']); $i++){
     if($searchedCoursesDetails['courseCode'][$i]!=$showSearched['courseCode'][$j]){
       $j++;
       $showSearched['courseCode'][$j] = $searchedCoursesDetails['courseCode'][$i];
       $showSearched['nameEng'][$j] = $searchedCoursesDetails['nameEng'][$i];
       $showSearched['section'][$j] = $searchedCoursesDetails['section'][$i];
       $showSearched['teachType'][$j] = $searchedCoursesDetails['teachType'][$i];
       $showSearched['day'][$j] = $searchedCoursesDetails['day'][$i];
       $showSearched['teachTime'][$j] = $searchedCoursesDetails['teachTime'][$i];
     }
     else{
       if($searchedCoursesDetails['section'][$i]!=$showSearched['section'][$j]){
         $j++;
         $showSearched['courseCode'][$j] = $searchedCoursesDetails['courseCode'][$i];
         $showSearched['nameEng'][$j] = $searchedCoursesDetails['nameEng'][$i];
         $showSearched['section'][$j] = $searchedCoursesDetails['section'][$i];
         $showSearched['teachType'][$j] = $searchedCoursesDetails['teachType'][$i];
         $showSearched['day'][$j] = $searchedCoursesDetails['day'][$i];
         $showSearched['teachTime'][$j] = $searchedCoursesDetails['teachTime'][$i];
       }
       else{
         $showSearched['teachType'][$j] .= ",".$searchedCoursesDetails['teachType'][$i];
         $showSearched['day'][$j] .= ",".$searchedCoursesDetails['day'][$i];
         $showSearched['teachTime'][$j] .= ",".$searchedCoursesDetails['teachTime'][$i];
       }
     }
   }
 }
 ?>
