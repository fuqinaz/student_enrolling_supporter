<form method="GET" action="">
	<input type="file" name="file">
	<input type="submit">
	<input type="reset" value="clear">
</form>

<?php
if(isset($_GET['file']))
{
	echo $_GET['file'];
}
?>

<?php
$objCSV = fopen("Input Data/".$_GET['file'], "r");
?>
<table width="600" border="1">
  <tr>
    <th width="90"> <div align="center">Course Code </div></th>
    <th width="90"> <div align="center">Name Thai </div></th>
    <th width="90"> <div align="center">Thai Short</div></th>
    <th width="90"> <div align="center">Name Eng </div></th>
    <th width="90"> <div align="center">facCode</div></th>
    <th width="90"> <div align="center">program</div></th>
    <th width="90"> <div align="center">acadYear</div></th>
    <th width="90"> <div align="center">semester</div></th>
    <th width="90"> <div align="center">remark</div></th>
    <th width="90"> <div align="center">totalCredit</div></th>
    <th width="90"> <div align="center">courseCon</div></th>
    <th width="90"> <div align="center">midDate</div></th>
    <th width="90"> <div align="center">midTime</div></th>
    <th width="90"> <div align="center">finDate</div></th>
    <th width="90"> <div align="center">finTime</div></th>
    <th width="90"> <div align="center">section</div></th>
    <th width="90"> <div align="center">teachType</div></th>
    <th width="90"> <div align="center">day</div></th>
    <th width="90"> <div align="center">teachTime</div></th>
    <th width="90"> <div align="center">building</div></th>
    <th width="90"> <div align="center">roomNo</div></th>
    <th width="90"> <div align="center">instructor</div></th>
    <th width="90"> <div align="center">totalRegis</div></th>
  </tr>

  <?php
if(isset($_GET['file']))
{
?>

<?php
require("connection.php");
ini_set("max_execution_time",100);
?>

<?php
fgetcsv($objCSV, 0, ",");
while (($objArr = fgetcsv($objCSV, 0, ","))) {
?>

  <tr>
    <td><?php echo $objArr[0];?></td>
    <td><?php echo $objArr[1];?></td>
    <td><?php echo sName($objArr[1]);?></td>
    <td><?php echo $objArr[2];?></td>
    <td><?php echo $objArr[3];?></td>
    <td><?php echo $objArr[4];?></td>
    <td><?php echo $objArr[5];?></td>
    <td><?php echo $objArr[6];?></td>
    <td><?php echo $objArr[7];?></td>
    <td><?php echo $objArr[8];?></td>
    <td><?php echo $objArr[9];?></td>
	<td>
	<?php
	if($objArr[10]!="")
	{
		$splitDate = explode("/",$objArr[10]);
		$GLOBALS['newMidDate'] = $splitDate[2]."/".$splitDate[1]."/".$splitDate[0];
		echo $GLOBALS['newMidDate'];
	}
	?>
	</td>
    <td><?php echo $objArr[11];?></td>
	<td>
	<?php
	if($objArr[10]!="")
	{
		$splitDate = explode("/",$objArr[10]);
		$GLOBALS['newFinDate'] = $splitDate[2]."/".$splitDate[1]."/".$splitDate[0];
		echo $GLOBALS['newFinDate'];
	}
	?>
	</td>
    <td><?php echo $objArr[13];?></td>
    <td><?php echo $objArr[14];?></td>
    <td><?php echo $objArr[15];?></td>
    <td><?php echo $objArr[16];?></td>
    <td><?php echo $objArr[17];?></td>
    <td><?php echo $objArr[18];?></td>
    <td><?php echo $objArr[19];?></td>
    <td><?php echo $objArr[20];?></td>
    <td><?php echo $objArr[21];?></td>

  </tr>

  <?php
    $newID=mysql_result(mysql_query("Select Max(CoursePID)+1 as MaxID from course"),0,"MaxID");

    $query = "INSERT INTO course SET
        CoursePID = '$newID',
        CourseCode = '".$objArr[0]."',
        NameThai = '".$objArr[1]."',
        NameThaiShort = '".sName($objArr[1])."',
        NameEng = '".$objArr[2]."',
        FacCode = '".$objArr[3]."',
        Program = '".$objArr[4]."',
        AcadYear = '".$objArr[5]."',
        Semester = '".$objArr[6]."',
        Remark = '".$objArr[7]."',
        TotalCredit = '".$objArr[8]."',
        CourseCondition = '".$objArr[9]."',
        MidDate = '".$GLOBALS['newMidDate']."',
        MidTime = '".$objArr[11]."',
        FinDate = '".$GLOBALS['newFinDate']."',
        FinTime = '".$objArr[13]."',
        Section = '".$objArr[14]."',
        TeachType = '".$objArr[15]."',
        Day = '".$objArr[16]."',
        TeachTime = '".$objArr[17]."',
        Building = '".$objArr[18]."',
        RoomNo = '".$objArr[19]."',
        Instructor = '".$objArr[20]."',
        TotalRegis = '".$objArr[21]."'";
    //mysql_query($query);
?>

  <?php
}
fclose($objCSV);
?>

<?php
}
?>
</table>

<?php
function sName($name){
	$split = explode(" ",$name);
	$shortName = "";
	for($i=0; $i<count($split); $i++){
		if(strlen($split[$i])>3){
			$split[$i] = substr($split[$i],0,3);
		}
		$shortName .= $split[$i]." ";
	}
	return $shortName;
}
?>
