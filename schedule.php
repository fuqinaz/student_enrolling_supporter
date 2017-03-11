<?php
require("page_header.php");
?>

<HTML>
 <br>
 <?php
 //Search Course
 $courseSearch = $_POST['courseSearch'];
 echo $courseSearch;

 ?>
 <br>
<FORM METHOD=POST ACTION="schedule.php">
	<INPUT TYPE="text" NAME="courseSearch" value="search course">
	<INPUT TYPE="submit" value="Search">
</FORM>
</BODY>
</HTML>

<?php
//for show schedule
require("connection.php");

session_start();
$userID=$_SESSION['userID'];

//$attendYear = substr($userID, 0, 2)-43+2000;
$attendYear = 2015;
echo "Attend Year (Fix ไว้ ยังไม่ได้ดึงจากฐานข้อมูล) : ".$attendYear."<br>";
$facCode = substr($userID, 8, 2);
echo "Faculty code (ดึงจากรหัสนิสิต) : ".$facCode."<br>";
$majorCode = $_SESSION['majorCode'];
$year = 3;
$semester = 2;

$allCourse = array();

require("check_new_planning.php");

if($GLOBALS['checkNewFlag']==true) {
  $query = "SELECT * FROM bulletin WHERE
      FacCode='".$facCode."' AND
      MajorCode='".$majorCode."' AND
	    AttendYear='".$attendYear."' AND
	    Year='".$year."' AND
	    Semester='".$semester."'";

      $result = mysql_query($query);

      for($i=0; $list=mysql_fetch_array($result); $i++){
	        $allCourse[$i] = $list['CourseCode'];
      }
}

?>

<?php
$allCourseDetail = array(
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


for($i=0; $i<count($allCourse); $i++){
  if($GLOBALS['checkNewFlag']==true){
    $query1 = "SELECT * FROM course WHERE CourseCode='".$allCourse[$i]."' AND Semester='".$semester."'";
  }
  else {
    $query1 = "SELECT * FROM course WHERE CoursePID = '".$allCourse[$i]."'";
  }
	$result1 = mysql_query($query1);
	for($j=count($allCourseDetail['coursePID']); $list1=mysql_fetch_array($result1); $j++){
		    $allCourseDetail['coursePID'][$j] = $list1['CoursePID'];
		    $allCourseDetail['courseCode'][$j] = $list1['CourseCode'];
        $allCourseDetail['nameThai'][$j] = $list1['NameThai'];
        $allCourseDetail['nameEng'][$j] = $list1['NameEng'];
        $allCourseDetail['facCode'][$j] = $list1['FacCode'];
        $allCourseDetail['program'][$j] = $list1['Program'];
        $allCourseDetail['acadYear'][$j] = $list1['AcadYear'];
        $allCourseDetail['semester'][$j] = $list1['Semester'];
        $allCourseDetail['remark'][$j] = $list1['Remark'];
        $allCourseDetail['totalCredit'][$j] = $list1['TotalCredit'];
        $allCourseDetail['courseCondition'][$j] = $list1['CourseCondition'];
        $allCourseDetail['midDate'][$j] = $list1['MidDate'];
        $allCourseDetail['midTime'][$j] = $list1['MidTime'];
        $allCourseDetail['finDate'][$j] = $list1['FinDate'];
        $allCourseDetail['finTime'][$j] = $list1['FinTime'];
        $allCourseDetail['section'][$j] = $list1['Section'];
        $allCourseDetail['teachType'][$j] = $list1['TeachType'];
        $allCourseDetail['day'][$j] = $list1['Day'];
        $allCourseDetail['teachTime'][$j] = $list1['TeachTime'];
        $allCourseDetail['building'][$j] = $list1['Building'];
        $allCourseDetail['roomNo'][$j] = $list1['RoomNo'];
        $allCourseDetail['instructor'][$j] = $list1['Instructor'];
        $allCourseDetail['totalRegis'][$j] = $list1['TotalRegis'];
	}
}

//echo "ตารางนี้คือตารางเรียนที่วางแผนไว้ ตัวแปรชื่อ $allCourseDetail[ข้อมูลที่ต้องการ][ลำดับ]";
?>
ตารางนี้คือตารางเรียนที่วางแผนไว้ ตัวแปรชื่อ $allCourseDetail[ข้อมูลที่ต้องการ][ลำดับ] เช่น <br>
  $allCourseDetail['nameThai'][3] แสดงชื่อวิชาลำดับที่ 4 ภาษาไทย
<table width="600" border="1">
  <tr>
    <th>Course PID</th>
    <th> <div align="center">Course Code </div></th>
    <th> <div align="center">Name Thai </div></th>
    <th> <div align="center">Name Eng </div></th>
    <th> <div align="center">facCode</div></th>
    <th> <div align="center">program</div></th>
    <th> <div align="center">acadYear</div></th>
    <th> <div align="center">semester</div></th>
    <th> <div align="center">remark</div></th>
    <th> <div align="center">totalCredit</div></th>
    <th> <div align="center">courseCon</div></th>
    <th> <div align="center">midDate</div></th>
    <th> <div align="center">midTime</div></th>
    <th> <div align="center">finDate</div></th>
    <th> <div align="center">finTime</div></th>
    <th> <div align="center">section</div></th>
    <th> <div align="center">teachType</div></th>
    <th> <div align="center">day</div></th>
    <th> <div align="center">teachTime</div></th>
    <th> <div align="center">building</div></th>
    <th> <div align="center">roomNo</div></th>
    <th> <div align="center">instructor</div></th>
    <th> <div align="center">totalRegis</div></th>
  </tr>

<?php
for($i=0; $i<count($allCourseDetail['coursePID']); $i++){
?>
	<TR>
    <td><?php echo $allCourseDetail['coursePID'][$i];?></td>
		<TD><?php echo $allCourseDetail['courseCode'][$i];?></TD>
		<TD><?php echo $allCourseDetail['nameThai'][$i];?></TD>
		<TD><?php echo $allCourseDetail['nameEng'][$i];?></TD>
		<TD><?php echo $allCourseDetail['facCode'][$i];?></TD>
		<TD><?php echo $allCourseDetail['program'][$i];?></TD>
		<TD><?php echo $allCourseDetail['acadYear'][$i];?></TD>
		<TD><?php echo $allCourseDetail['semester'][$i];?></TD>
		<TD><?php echo $allCourseDetail['remark'][$i];?></TD>
		<TD><?php echo $allCourseDetail['totalCredit'][$i];?></TD>
		<TD><?php echo $allCourseDetail['courseCondition'][$i];?></TD>
		<TD><?php echo $allCourseDetail['midDate'][$i];?></TD>
		<TD><?php echo $allCourseDetail['midTime'][$i];?></TD>
		<TD><?php echo $allCourseDetail['finDate'][$i];?></TD>
		<TD><?php echo $allCourseDetail['finTime'][$i];?></TD>
		<TD><?php echo $allCourseDetail['section'][$i];?></TD>
		<TD><?php echo $allCourseDetail['teachType'][$i];?></TD>
		<TD><?php echo $allCourseDetail['day'][$i];?></TD>
		<TD><?php echo $allCourseDetail['teachTime'][$i];?></TD>
		<TD><?php echo $allCourseDetail['building'][$i];?></TD>
		<TD><?php echo $allCourseDetail['roomNo'][$i];?></TD>
		<TD><?php echo $allCourseDetail['instructor'][$i];?></TD>
		<TD><?php echo $allCourseDetail['totalRegis'][$i];?></TD>
	</TR>
<?php
}
?>
</table>
