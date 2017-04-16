<?php
@ini_set('display_errors', '0');
require("course_detail_handler.php");
?>

<table border=1>
  <tr>
    <td>courseCode</td>
    <td>nameThai</td>
    <td>nameEng</td>
    <td>facCode</td>
    <td>program</td>
    <td>acadYear</td>
    <td>semester</td>
    <td>remark</td>
    <td>totalCredit</td>
    <td>courseCondition</td>
    <td>midDate</td>
    <td>midTime</td>
    <td>finDate</td>
    <td>finTime</td>
    <td>section</td>
    <td>teachType</td>
    <td>day</td>
    <td>teachTime</td>
    <td>building</td>
    <td>roomNo</td>
    <td>instructor</td>
    <td>totalRegis</td>
  </tr>

  <?php
  echo "counttttttt = ".count($showDetail['courseCode']);
  for($i=0; $i<count($showDetail['courseCode']); $i++){
    echo "<tr>";
      echo "<td>".$showDetail['courseCode'][$i]."</td>";
      echo "<td>".$showDetail['nameThai'][$i]."</td>";
      echo "<td>".$showDetail['nameEng'][$i]."</td>";
      echo "<td>".$showDetail['facCode'][$i]."</td>";
      echo "<td>".$showDetail['program'][$i]."</td>";
      echo "<td>".$showDetail['acadYear'][$i]."</td>";
      echo "<td>".$showDetail['semester'][$i]."</td>";
      echo "<td>".$showDetail['remark'][$i]."</td>";
      echo "<td>".$showDetail['totalCredit'][$i]."</td>";
      echo "<td>".$showDetail['courseCondition'][$i]."</td>";
      echo "<td>".$showDetail['midDate'][$i]."</td>";
      echo "<td>".$showDetail['midTime'][$i]."</td>";
      echo "<td>".$showDetail['finDate'][$i]."</td>";
      echo "<td>".$showDetail['finTime'][$i]."</td>";
      echo "<td>".$showDetail['section'][$i]."</td>";
      echo "<td>".$showDetail['teachType'][$i]."</td>";
      echo "<td>".$showDetail['day'][$i]."</td>";
      echo "<td>".$showDetail['teachTime'][$i]."</td>";
      echo "<td>".$showDetail['building'][$i]."</td>";
      echo "<td>".$showDetail['roomNo'][$i]."</td>";
      echo "<td>".$showDetail['instructor'][$i]."</td>";
      echo "<td>".$showDetail['totalRegis'][$i]."</td>";
    echo "</tr>";
  }
  ?>
</table>
