<?php
require("page_header.php");
?>

<HTML>

<HEAD>
       <title>Scheduler</title>



    <!-- DHTMLX JS and CSS -->
       <script src="dhtmlxscheduler.js" type="text/javascript"></script>
       <link rel="stylesheet" href="dhtmlxscheduler.css" type="text/css">
    <!-- end dhtmlx -->

   <!---BootStrap-->
        <meta charset="utf-8"> 
        <!-- REsponsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--End BootStrap code-->

    <!-- Own style and js -->
        <script src="MyScheduler.js" type="text/javascript"></script>
        <link rel="stylesheet" href="MyStyle.css" type="text/css">
    <!-- End Own style and js -->

    <!-- code for hover bubble -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <!-- end code for hover bubble -->
</HEAD>

<BODY>
<!-- from sche.html -->

    <!-- Web navigator -->
    <!-- <div class="row">
        <!-- <h3>This is Navigator Div</h3> -->
        <!-- <div class="col-md-11">

            <table class="navbar">
                <tr>
                    <td> -->
                        <!-- <button type="button" class="btn btn-default"> -->
                   <!--      <a href="schedule.html"><label>&nbsp;&nbsp;&nbsp;&nbsp;Scheduler&nbsp;&nbsp;&nbsp;&nbsp;</label></a> -->
                        <!-- </button> -->
                        <!-- 
                    </td>
                    <td>
                        <a href="grade_planner.html"><label>&nbsp;&nbsp;&nbsp;&nbsp;Grade Planner&nbsp;&nbsp;&nbsp;&nbsp;</label></a>
                       <!-- <button type="button" class="btn btn-default" onclick="grade_planner.html"><label>Grade Planner</label></button> -->
                    <!-- </td>
                    <td>
                        &nbsp;&nbsp;
                        <a href="#">
                            <span class="glyphicon glyphicon-user"></span>
                        </a> 
                        &nbsp;&nbsp;
                    </td>
                </tr>
            </table> -->
      <!--   </div>
        <div class="col-md-1"></div>   -->  
        
    <!-- </div>  -->
    <!-- End Web Nav -->

    <!-- Scheduler and Search engine -->
    <div class="container">
    <div class="row">

        <!-- <div class="col-md-1"></div> -->

        <!-- scheduler div -->
        <div class="col-md-8 widget">

            <!-- BootStrap Scheduler -->
            <div class="table-responsive" style="font-color:white;">          
                <table class="table" >
                    <thead>
                        <tr id="thead_parent">
                            <th style="width: 15%;">Date\Time</th>
                            <!-- <th id="thead_child1">&nbsp;&nbsp;</th> -->
                        
                        </tr>
                    </thead>

                 <!--    <script type="text/javascript">
                        drawTableTime();
                    </script>
 -->
                    <tbody id="tbody_parent">
                        
                        <!-- Real table (write javascript table id = scheduler_here) -->
                        <!-- <div class="scheduler_here"> -->
                           
                        <!-- </div> -->
                        <!-- End real schedule -->

                        

                        <!-- table for style testing -->
                        <!-- Each td = 30 min -->
                        <tr id="mon_parent" style="width: 15%">

                            <!-- <th >&nbsp;&nbsp;</th> -->
                        
                        

                            <td>MON</td>
                            <td></td>

                            <!-- <th></th> -->
                            <td colspan="5" style="border-radius: 10px; 
                                                    /*border-color: #333;
                                                    border-style: solid;
                                                    border-width: 5px;*/
                                                    background-color: rgba(40, 40, 40, .4); 
                                                    padding: 10px;
                                                    text-align: left;

                                                    width:15%">
                                2104111<br>
                                app dev ie<br>
                                
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr id="tue_parent">
                            <td>TUE</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr id="wed_parent">
                            <td>WED</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr id="tdu_parent">
                            <td>THU</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr id="fri_parent">
                            <td>FRI</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <!-- end table for style testing -->

                    </tbody>
                </table>

              

              </div>
            <!-- End Bootstrap Scheduler -->




        </div>
        <!-- end scheduler div -->

        <script type="text/javascript">
            drawTableTime();
        </script>

        <!-- space between schedule and search engine -->
        <!-- <div class="col-md-1">
            
        </div>
 -->


        <!-- search engine div -->

        <div class="col-md-3">



<!-- for search -->
     <!-- <br> -->
     <?php
     $courseSearch = $_POST['courseSearch'];
     if($courseSearch) echo "PingPing";
     echo $courseSearch;
     ?>
     <!-- <br> -->

<!-- end -->






            <!-- Search tool div -->
            <div class="row">
                <section class="widget">
     
                    <!-- Search form -->
                    <form>
                      <!--   <table>
                            <tr>
                                <!-- Search Form -->
                                <td> 
                                    <div class="form-group">

                                        <label for="subsearch">Search from keywords</label>
                                     <!--  <input type="subsearch" class="form-control" id="subsearch">
                                      &nbsp;&nbsp; -->
                                        <!-- <input class="form-control" type="search" /> -->
                                        <!-- <span class="glyphicon glyphicon-search"></span> -->
                                        <form METHOD=POST ACTION="schedule.php">
                                          <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" NAME="courseSearch">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit" value="Search" style="height:35px;">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </div>
                                          </div>
                                        </form>

                                    </div>
                                <!-- </td> -->
                                <!-- Search button -->
                               <!--  <td>
                                    <button type="submit" class="btn btn-default">Search</button>
                                </td> -->
                            <!-- </tr>
                        </table> -->
                    </form>


                            <!--         <div class="form-group has-success has-feedback">
                          <label class="control-label" for="inputSuccess2">Input with success</label>
                          <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status">
                          <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                          <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                         -->
                    <!-- End Search form -->

            <!-- Gened search button -->
                    <div>
                        <div class="form-group">
                            <label for="sel1">Search from Gened</label>
                            <select class="form-control" id="sel1">
                                <option>---Search from Gened---</option>
                                <option>Science and Math</option>
                                <option>Social Science</option>
                                <option>Humanities</option>
                                <option>Interdisciplinary</option>
                            </select>
                        </div>
                    </div>    
            <!-- End gened search button -->
                </section>

            </div>
            <!-- End search tool div -->

            <!-- Query result -->
            
            <div class="row" id="query_result" style="position: relative;">
                <!-- <section class="widget"> -->
                    <div class="query_result">
                        <div class="widget">

                        <div style="margin-top : 10px;
                                    /*padding: 15px;*/
                                    position: relative;">
                        <!-- <section class="widget"> -->

                        <div class="well" data-toggle="tooltip" title="Select to find">Basic Well</div>
                        <!-- <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <p class="panel-title">
                                        <p> -
                                        <a data-toggle="collapse" href="#collapse1">2104111 APPICATION DEVELOPMENT</a>
                                    </p>
                                </div>
                            <div id="collapse1" class="panel-collapse collapse" >
                                <div class="panel-body">Sec 1 PLC WED 9:00-12:00 </div>
                                <div class="panel-body">Sec 2 PLC FRI 9:00-12:00 </div>
                                <!- <div class="panel-footer">Panel Footer</div>
                                    </p>
                                </div>
                            </div>
                        
                        </div> -->
                        <div class="panel panel-default">
                            <div class="panel-heading">2104111 APPICATION DEVELOPMENT</div>
                            <div class="panel-body">Sec 1 PLC WED 9:00-12:00</div>
                            <div class="panel-body">Sec 2 PLC FRI 9:00-12:00 </div>
                        </div>
               
                        <div class="well">Basic Well</div>
                        <div class="well">Basic Well</div>
                        <div class="well">Basic Well</div>
                        <div class="well">Basic Well</div>
                        <div class="well">Basic Well</div>
                        <div class="well">Basic Well</div>
                        <div class="well">Basic Well</div>
                        <div class="well">Basic Well</div>
                        <div class="well">Basic Well</div>
                    </div>
                    <!-- end query result div -->
                    </div>

                <!-- </section> -->
                </div>
            </div>
            <!-- End Query result -->



        
        </div>
       
        <!-- end search engine div -->

        
        </section>
    </div>
    </div>
    

    <!-- End Scheduler and search engine -->





<!-- for search -->
     <br>
     <?php
     $courseSearch = $_POST['courseSearch'];
     if($courseSearch) echo "PingPing";
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
echo $attendYear."<br>";
$facCode = substr($userID, 8, 2);
echo $facCode;
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

<Table border = "1">
<TR>
	<th>Faculty Code</th>
    <th>Major Code</th>
    <th>Attend Year</th>
    <th>Year</th>
    <th>Semester</th>
    <th>Course Code</th>
    <th>Credit</th>
</TR>
<?php
for($i=0; $i<count($allCourse); $i++){
?>
	<tr>
		<td><?php echo $allCourse[$i];?></td>
	</tr>
<?php
}
?>
</Table>

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

echo count($allCourseDetail['coursePID'])."<br>";
?>
<table width="600" border="1">
  <tr>
    <th>Course PID</th>
    <th width="90"> <div align="center">Course Code </div></th>
    <th width="90"> <div align="center">Name Thai </div></th>
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
