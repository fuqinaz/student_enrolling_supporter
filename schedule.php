<?php
@ini_set('display_errors', '0');
require("page_header.php");
?>

<HTML>

<HEAD>
       <title>Scheduler</title>



    <!-- DHTMLX JS and CSS -->
       <!-- <script src="dhtmlxscheduler.js" type="text/javascript"></script> -->
       <!-- <link rel="stylesheet" href="dhtmlxscheduler.css" type="text/css"> -->
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

    <!-- from chula expo -->
        <!-- <link rel="stylesheet" href="application.min.css" type="text/css"> -->
    <!-- end chula expo -->

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

    <?php
    //for show schedule
    require("connection.php");

    session_start();
    $userID=$_SESSION['userID'];

    //$attendYear = substr($userID, 0, 2)-43+2000;
    $attendYear = 2015;
    // echo "Attend Year (Fix ไว้ ยังไม่ได้ดึงจากฐานข้อมูล) : ".$attendYear."<br>";
    $facCode = substr($userID, 8, 2);
    // echo "Faculty code (ดึงจากรหัสนิสิต) : ".$facCode."<br>";
    $majorCode = $_SESSION['majorCode'];
    $year = 3;
    $semester = 2;

    require("planning_handler.php");
    //$allCourses = array();

    //require("check_new_planning.php");

    // if($GLOBALS['checkNewFlag']==true) {
    //   $query = "SELECT * FROM bulletin WHERE
    //       FacCode='".$facCode."' AND
    //       MajorCode='".$majorCode."' AND
    //       AttendYear='".$attendYear."' AND
    //       Year='".$year."' AND
    //       Semester='".$semester."'";
    //
    //       $result = mysql_query($query);
    //
    //       for($i=0; $list=mysql_fetch_array($result); $i++){
    //             $allCourses[$i] = $list['CourseCode'];
    //       }
    // }

    require("schedule_handler.php");


    //echo "ตารางนี้คือตารางเรียนที่วางแผนไว้ ตัวแปรชื่อ $allCoursesDetail[ข้อมูลที่ต้องการ][ลำดับ]";
    ?>
    <!-- <br>ตารางนี้คือตารางเรียนที่วางแผนไว้ ตัวแปรชื่อ $allCoursesDetail[ข้อมูลที่ต้องการ][ลำดับ] เช่น <br>
      $allCoursesDetail['nameThai'][3] แสดงชื่อวิชาลำดับที่ 4 ภาษาไทย
    <table border="1">
      <tr>
        <th> <div align="center">Course PID</div></th>
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
    for($i=0; $i<count($showCourses['courseCode']); $i++){
    ?>
        <TR>
        <td><?php echo $showCourses['coursePID'][$i];?></td>
            <TD><?php echo $showCourses['courseCode'][$i];?></TD>
            <TD><?php echo $showCourses['nameThai'][$i];?></TD>
            <TD><?php echo $showCourses['nameEng'][$i];?></TD>
            <TD><?php echo $showCourses['facCode'][$i];?></TD>
            <TD><?php echo $showCourses['program'][$i];?></TD>
            <TD><?php echo $showCourses['acadYear'][$i];?></TD>
            <TD><?php echo $showCourses['semester'][$i];?></TD>
            <TD><?php echo $showCourses['remark'][$i];?></TD>
            <TD><?php echo $showCourses['totalCredit'][$i];?></TD>
            <TD><?php echo $showCourses['courseCondition'][$i];?></TD>
            <TD><?php echo $showCourses['midDate'][$i];?></TD>
            <TD><?php echo $showCourses['midTime'][$i];?></TD>
            <TD><?php echo $showCourses['finDate'][$i];?></TD>
            <TD><?php echo $showCourses['finTime'][$i];?></TD>
            <TD><?php echo $showCourses['section'][$i];?></TD>
            <TD><?php echo $showCourses['teachType'][$i];?></TD>
            <TD><?php echo $showCourses['day'][$i];?></TD>
            <TD><?php echo $showCourses['teachTime'][$i];?></TD>
            <TD><?php echo $showCourses['building'][$i];?></TD>
            <TD><?php echo $showCourses['roomNo'][$i];?></TD>
            <TD><?php echo $showCourses['instructor'][$i];?></TD>
            <TD><?php echo $showCourses['totalRegis'][$i];?></TD>
        </TR>
    <?php
    }
    ?>
    </table> -->


    <!-- collect data sorted by day & time -->
    <?php

    // array for collecting caourse id sorted
    // let row represent day: mon = day 0, tue = day 1, ..., fri = day 4, unknown = day 5
    $courseSortedbbytime = array();

    // variables for collecting start and finish time
    $start_time = null;
    $finish_time = null;

    // just for check in case that the first course time is AR
    $ch = false;

    // collecting loop
    for($i=0; $i<count($showCourses['courseCode']); $i++){
        // check overall start and fin time
        if($i==0 || $ch) {
            // initial
            if($showCourses['teachTime'][$i]=="AR"){
                $ch = true;
            } else {
                $start_time = (int)substr($showCourses['teachTime'][$i],0,2);
                $finish_time = (int)substr($showCourses['teachTime'][$i],6,2);
                $ch = false;
            }

        } else {
            // new start time
            if((int)substr($showCourses['teachTime'][$i],0,2) < $start_time){
                $start_time = (int)substr($showCourses['teachTime'][$i],0,2);
            }
            // new finish time
            if((int)substr($showCourses['teachTime'][$i],6,2) > $finish_time) {
                $finish_time = (int)substr($showCourses['teachTime'][$i],6,2);
                if((int)substr($showCourses['teachTime'][$i],9,2)>0){
                    $finish_time=$finish_time+1;
                }
            }

        }

        // assign courseID to day
        if($showCourses['day'][$i]=="MON") {
            $courseSortedbbytime[0][] = array
                                            (
                                            'courseCode'=> $showCourses['courseCode'][$i],
                                            'nameEng'=> $showCourses['nameEng'][$i],
                                            'teachTime'=> $showCourses['teachTime'][$i],
                                            'section'=> $showCourses['section'][$i],
                                            'building'=> $showCourses['building'][$i],
                                            'roomNo'=> $showCourses['roomNo'][$i],
                                            );
        } elseif ($showCourses['day'][$i]=="TUE") {
            $courseSortedbbytime[1][] = array
                                            (
                                            'courseCode'=> $showCourses['courseCode'][$i],
                                            'nameEng'=> $showCourses['nameEng'][$i],
                                            'teachTime'=> $showCourses['teachTime'][$i],
                                            'section'=> $showCourses['section'][$i],
                                            'building'=> $showCourses['building'][$i],
                                            'roomNo'=> $showCourses['roomNo'][$i],
                                            );
        } elseif ($showCourses['day'][$i]=="WED") {
            $courseSortedbbytime[2][] = array
                                            (
                                            'courseCode'=> $showCourses['courseCode'][$i],
                                            'nameEng'=> $showCourses['nameEng'][$i],
                                            'teachTime'=> $showCourses['teachTime'][$i],
                                            'section'=> $showCourses['section'][$i],
                                            'building'=> $showCourses['building'][$i],
                                            'roomNo'=> $showCourses['roomNo'][$i],
                                            );
        } elseif ($showCourses['day'][$i]=="THU") {
            $courseSortedbbytime[3][] = array
                                            (
                                            'courseCode'=> $showCourses['courseCode'][$i],
                                            'nameEng'=> $showCourses['nameEng'][$i],
                                            'teachTime'=> $showCourses['teachTime'][$i],
                                            'section'=> $showCourses['section'][$i],
                                            'building'=> $showCourses['building'][$i],
                                            'roomNo'=> $showCourses['roomNo'][$i],
                                            );
        } elseif ($showCourses['day'][$i]=="FRI") {
            $courseSortedbbytime[4][] = array
                                            (
                                            'courseCode'=> $showCourses['courseCode'][$i],
                                            'nameEng'=> $showCourses['nameEng'][$i],
                                            'teachTime'=> $showCourses['teachTime'][$i],
                                            'section'=> $showCourses['section'][$i],
                                            'building'=> $showCourses['building'][$i],
                                            'roomNo'=> $showCourses['roomNo'][$i],
                                            );
        } elseif ($showCourses['day'][$i]=="AR") {
            $courseSortedbbytime[5][] = array
                                            (
                                            'courseCode'=> $showCourses['courseCode'][$i],
                                            'nameEng'=> $showCourses['nameEng'][$i],
                                            'teachTime'=> $showCourses['teachTime'][$i],
                                            'section'=> $showCourses['section'][$i],
                                            'building'=> $showCourses['building'][$i],
                                            'roomNo'=> $showCourses['roomNo'][$i],
                                            );
        }

    }

    // check array element
    // print_r($courseSortedbbytime);
    // echo "<br><br>";


    // sort data by day
    // usort($courseSortedbbytime, function($a, $b) {
    //     return $a['teachTime'] - $b['teachTime'];
    // });

    // sort data by teach time for day that have >1 class
    for($i=0; $i<sizeof($courseSortedbbytime); $i++){
        if(sizeof($courseSortedbbytime[$i])>1) {
            // $data is your array from the example
            // first obtain the rows for sorting
            $sortkeys = array();
            foreach ($courseSortedbbytime[$i] as $row) {
                $sortkeys[] = $row['teachTime'];
            }

            // sort $data according to $sortkeys
            array_multisort($sortkeys, $courseSortedbbytime);
            var_dump($courseSortedbbytime);
            // end usort
        }
        // end if
    }
    // end for loop
    // echo "<br><br>";
    // usort($courseSortedbbytime, function($a, $b) {
    //     return $a['teachTime'] - $b['teachTime'];
    // });

    // check sorted data
    // print_r($courseSortedbbytime);


    ?>

    <!-- define how many td to use -->
    <?php
        $tdEachDay = 2*($finish_time-$start_time);
        // echo "all td blocks = ".$tdEachDay."<br>";
        // echo "Start time: ".$start_time."<br>";
        // echo "Finish time: ".$finish_time."<br>";


    ?>

    <?php
        $blocks = array();

    // let j be day no.
    for($j=0; $j<sizeof($courseSortedbbytime); $j++){

        // echo "day ".$j."<br>";
        // let i be class no. in that day
        // start at 0
        for($i=0; $i<sizeof($courseSortedbbytime[$j]); $i++){

            // echo "loop ".$i."<br>";

            // define class time and before class time blocks
            if($i==0) {
                $bfclasstime = 2*((int)substr($courseSortedbbytime[$j][$i]['teachTime'],0,2)-$start_time);
                // echo "teach time ".$courseSortedbbytime[$j][$i]['teachTime']."<br>";
                // echo "i=0: bfclasstime = ".$bfclasstime."<br>";

            } else {
                // echo "teach time ".$courseSortedbbytime[$j][$i]['teachTime']."<br>";
                $bfclasstime = 2*((int)substr($courseSortedbbytime[$j][$i]['teachTime'],0,2)-(int)substr($courseSortedbbytime[$j][$i-1]['teachTime'],6,2));
                // echo "next class teach time start at ".(int)substr($courseSortedbbytime[$j][$i]['teachTime'],0,2)."<br>";
                // echo "last fin teach time is ".(int)substr($courseSortedbbytime[$j][$i-1]['teachTime'],6,2)."<br>";
                // echo $courseSortedbbytime[$j][$i-1]['nameEng']."<br>";
                // echo $courseSortedbbytime[$j][$i-1]['teachTime']."<br>";
                // echo $courseSortedbbytime[$j][$i]['nameEng']."<br>";
                // echo $courseSortedbbytime[$j][$i]['teachTime']."<br>";
                // echo "i=".$i.": bfclasstime = ".$bfclasstime."<br>";
                // มาเขียน if condition ต่อ เผื่อกรณีตอนเริ่มหรือจบเป็น :30--------
            }

            // echo "before class time = ".$bfclasstime."<br>";

            $classtime = 2*((int)substr($courseSortedbbytime[$j][$i]['teachTime'],6,2)-(int)substr($courseSortedbbytime[$j][$i]['teachTime'],0,2));
            // echo "loop ".$i." classtime is ".$classtime."<br>";

            // echo "class time = ".$classtime."<br>";

            // in case that there is any :30
            if((int)substr($courseSortedbbytime[$j][$i]['teachTime'],3,2)==30) {
                $bfclasstime = $bfclasstime +1;
                if((int)substr($courseSortedbbytime[$j][$i]['teachTime'],9,2)==0){
                    $classtime = $classtime -1;
                }
            } elseif ((int)substr($courseSortedbbytime[$j][$i]['teachTime'],9,2)==30) {
                $classtime = $classtime +1;
            }

            // echo "before class time = ".$bfclasstime."<br>";
            // echo "class time = ".$classtime."<br>";

            // assign to var
            $blocks[$j][$i] = array
                            (
                                'bfclass'=>$bfclasstime,
                                'class'=>$classtime
                            );


        }
    }



    ?>



    <!-- end define how many td to use -->

    <!-- end collect data sorted by day & time -->

    <!-- Scheduler and Search engine -->
    <div class="container">
    <div class="row">

        <!-- <div class="col-md-1"></div> -->

        <!-- scheduler div -->


        <div class="col-md-8 ">

            <!-- BootStrap Scheduler -->

            <!-- <div class="table-responsive" style="font-color:white;">
                <table class="table" > -->



            <div class="table-responsive widget row">

                <!-- <legend>
                    Schedule
                </legend>
                 -->
                <table class="table" ">

                    <thead>
                        <tr id="thead_parent">
                            <th style="width: 15%;">Date\Time </th>
                            <!-- <th id="thead_child1">&nbsp;&nbsp;</th> -->

                            <!-- draw table head -->
                            <script type="text/javascript">
                                var start_time = <?php echo $start_time; ?>;
                                var finish_time = <?php echo $finish_time; ?>;
                                var percenttdwidth = 85/(finish_time-start_time);
                                for(var i=start_time; i< finish_time; i++) {
                                    document.write("<th colspan=2 style=\"width=60px;\">"+i+"-"+(i+1)+"</th>");
                                }
                            </script>

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

                        <!-- #td for each day -->


                        <!-- table for style testing -->
                        <!-- Each td = 30 min -->
                        <!-- <tr id="mon_parent" style="width: 15%"> -->

                            <!-- <th >&nbsp;&nbsp;</th> -->



                            <!-- php for printing -->
                            <?php

                            for($k=0; $k<5; $k++){

                                if($k==0) {
                                    echo "<tr id=\"mon_parent\" style=\"width: 15%\"><td>MON</td>";
                                } elseif ($k==1) {
                                    echo "<tr><td>TUE</td>";
                                } elseif ($k==2) {
                                    echo "<tr><td>WED</td>";
                                } elseif ($k==3) {
                                    echo "<tr><td>THU</td>";
                                } elseif ($k==4) {
                                    echo "<tr><td>FRI</td>";
                                }

                                $daynum = $k;
                                $classnum = sizeof($blocks[$daynum]);
                                $therest = $tdEachDay;
                                // echo "tdEachDay = ".$tdEachDay;

                                for($i=0; $i<$classnum; $i++){
                                    // bfclass blocks print
                                    for($j=0; $j<$blocks[$daynum][$i]['bfclass']; $j++){
                                        echo '<td></td>';
                                    }



                                    $content = $courseSortedbbytime[$daynum][$i]['courseCode']." (".$courseSortedbbytime[$daynum][$i]['section'].")"."<br>".$courseSortedbbytime[$daynum][$i]['nameEng']."<br>".$courseSortedbbytime[$daynum][$i]['building']." ".$courseSortedbbytime[$daynum][$i]['roomNo'];

                                    // $content = $courseSortedbbytime[$daynum][$i]['courseCode']." (".$courseSortedbbytime[$daynum][$i]['section'].")"."<br>".$courseSortedbbytime[$daynum][$i]['nameEng']."<br>".$courseSortedbbytime[$daynum][$i]['building']." ".$courseSortedbbytime[$daynum][$i]['roomNo'];
                                    // $style = "border-radius: 10px\; background-color: rgba(40, 40, 40, .4)\; padding: 10px\;text-align: left\; width:15%\"";


                                //     // class block print
                                    // for($j=0; $j<$blocks[$daynum][$i]['class']; $j++){
                                        echo '<td colspan="'.$blocks[$daynum][$i]['class'].'" style="border-radius: 10px; background-color: rgba(40, 40, 40, .4); padding: 10px;text-align: center; font-size:12px;">';
                                        echo $content;
                                        echo '</td>';
                                    // }

                                    $therest = $therest - $blocks[$daynum][$i]['class'] - $blocks[$daynum][$i]['bfclass'];

                                }

                                // echo "the rest = ".$therest;

                                for($i=0; $i<$therest; $i++){
                                    echo '<td></td>';
                                }
                                echo "</tr>";
                            }

                            ?>

                        <!-- </tr>
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
                        </tr> -->
                        <!-- end table for style testing -->

                    </tbody>
                </table>

                <!-- draw table head -->
                <script type="text/javascript">
                        // var start_time = <?php echo $start_time; ?>;
                        // var finish_time = <?php echo $finish_time; ?>;
                        // console.log(start_time);
                        // console.log(finish_time);
                        // drawTableTime(start_time,finish_time);
                </script>


                <button type="button" class="btn btn-default" style="float:right; min-width: 80px;">Save</button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-default" style="float:right; min-width: 80px;">Reset</button>

              </div>
            <!-- End Bootstrap Scheduler -->

            <!-- data details -->
            <div class = "row widget">

            </div>
            <!-- end data detail -->

        </div>
        <!-- end scheduler div -->



        <!-- space between schedule and search engine -->

        <!-- <div class="col-md-1">

=======
        <div class="col-md-1">

>>>>>>> origin/master
        </div>
 -->


        <!-- search engine div -->

        <div class="col-md-3">



<!-- for search -->
<!-- end -->



        <!-- Search tool div -->
        <div class="row">
            <section class="widget">
            <!-- Search form -->

      <!--   <table>
      <tr>
      <!-- Search Form -->
            <!-- <td> -->
                    <div class="form-group">

                        <label for="subsearch">Search from keywords</label>
          <!--  <input type="subsearch" class="form-control" id="subsearch">
          &nbsp;&nbsp; -->
          <!-- <input class="form-control" type="search" /> -->
          <!-- <span class="glyphicon glyphicon-search"></span> -->

                         <?php
                         //Search Course
                         //$courseSearch = $_POST['courseSearch'];
                         // echo $courseSearch;

                         ?>
                         <!-- <FORM METHOD=POST ACTION="schedule.php">
                             <INPUT TYPE="text" NAME="courseSearch">
                             <INPUT TYPE="submit" >
                         </FORM> -->
                         <form ID="search" METHOD="POST" ACTION="schedule.php" >
                               <div class="input-group">
                                   <input type="text" class="input-transparent form-control" placeholder="Search" NAME="courseSearch" >
                                   <div class="input-group-btn">
                                       <button class="btn btn-default" type="submit" style="height:34px; top:-7px">

                                           <i class="glyphicon glyphicon-search"></i>
                                       </button>
                                    </div>
                               </div>
                               <!-- Gened search button -->
                               <div>
                                   <div class="form-group">
                                       <label for="sel1">Search from Gened</label>
                                       <select name="gened" onchange="selectGen()"  class="form-control" id="sel1">
                                           <option value="NO">---Search from Gened---</option>
                                           <option value="SC">Science and Math</option>
                                           <option value="SO">Social Science</option>
                                           <option value="HU">Humanities</option>
                                           <option value="IN">Interdisciplinary</option>
                                       </select>
                                   </div>
                               </div>
                               <!-- End gened search button -->
                           </form>





                            <!--         <div class="form-group has-success has-feedback">
                          <label class="control-label" for="inputSuccess2">Input with success</label>
                          <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status">
                          <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                          <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                         -->
                    <!-- End Search form -->

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

                        <!-- <div class="well" data-toggle="tooltip" title="Select to find">Basic Well</div> -->
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

                        <!-- query searched-->
                       <?php
                       require("search_handler.php");
                       ?>
                       <!-- end query -->

                      <!-- show searched data-->
                      <?php
                      require("connection.php");

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
                      ?>

                      <?php
                      if(isset($searchedCoursesDetails['coursePID'][0])){
                      ?>
                        <!-- <div class="panel panel-default"> -->
                        <?php
                        for($i=0; $i<count($showSearched['courseCode']); $i++){
                          if($showSearched['courseCode'][$i]!=$showSearched['courseCode'][$i-1]){
                            // if($i>0) echo "</div></div>";
                            if($i>0) echo "</ul></div></div>";
                        ?>

                            <!-- panel group div -->
                            <div class="panel-group" id="accordion">
                            <div class="panel panel-default" style="margin: 5px;">

                                <!-- panel head -->
                                <div class="panel-heading">
                                    <?php echo "<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$i."\">"; ?>
                                
                                        <p class = "query-head">
                                          <?php echo $showSearched['courseCode'][$i]." ".$showSearched['nameEng'][$i]; ?>
                                        </p>
                                    </a>
                                </div>
                                <!-- end panel header -->

                                <!-- panel body   -->
                                <?php
                                    if($i==0) {
                                        // the first qyery result will be collapsed by default
                                        echo "<div id=\"collapse".$i."\" class=\"panel-collapse collapse in\">"; 
                                    } else {
                                        // others query result will not 
                                        echo "<div id=\"collapse".$i."\" class=\"panel-collapse collapse\">"; 
                                    }
                                ?>
                                
                                    <!-- <div class="panel-body"> -->
                                    <ul class="list-group">
                                        <li class="list-group-item" style="padding-top: 0px;
    padding-bottom: 10px;">
                                            <form method="POST" action="">
                                                <?php require("check_course.php"); ?>
                                                <input type="hidden" name="change" value=<?php echo $GLOBALS['changeFlag']; ?>>
                                                <input type="hidden" name="changeCode" value=<?php echo $showSearched['courseCode'][$i]; ?>>
                                                <input type="hidden" name="changeSec" value=<?php echo $showSearched['section'][$i]; ?>>
                                                <button type="submit" class="btn btn-default btn-sm" style = "float: right;
                                                                                                        height: 20px;
                                                                                                        padding-top:  0px;">
                                                    <?php
                                                    $flag = $GLOBALS['changeFlag'];
                                                    act($flag);
                                                    ?>
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </form>
                                            <p style="font-weight: bold;">Section <?php echo $showSearched['section'][$i];?></p>
                                            <div>
                                              <p style="font-size: 14px; font-color: #555;">
                                                  <?php
                                                  if ($showSearched['teachTime'][$i]=="AR") {
                                                      echo "The schedule will be declared later";
                                                  } else {
                                                      echo $showSearched['day'][$i]." ";
                                                      echo $showSearched['teachTime'][$i];
                                                  }
                                                  ?>
                                              </p>
                                            </div>
                                        </li>    

                                    


                            <?php
                            }
                            else{
                            ?>          <li class="list-group-item" style="padding-top: 0px;
    padding-bottom: 10px;">
                                            <form method="POST" action="">
                                            <?php require("check_course.php"); ?>
                                                <input type="hidden" name="change" value=<?php echo $GLOBALS['changeFlag']; ?>>
                                                <input type="hidden" name="changeCode" value=<?php echo $showSearched['courseCode'][$i]; ?>>
                                                <input type="hidden" name="changeSec" value=<?php echo $showSearched['section'][$i]; ?>>
                                                <button type="submit" class="btn btn-default btn-sm" style = "float: right;
                                                                                                height: 20px;
                                                                                                padding-top:  0px;">
                                                  <?php
                                                  $flag = $GLOBALS['changeFlag'];
                                                  act($flag);
                                                  ?>
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </form>
                                            <p style="font-weight: bold;">Section <?php echo $showSearched['section'][$i];?></p>
                                              <div>
                                                <p style="font-size: 14px; font-color: #555;">
                                                    <?php
                                                    if ($showSearched['teachTime'][$i]=="AR") {
                                                        echo "The schedule will be declared later";
                                                    } else {
                                                        echo $showSearched['day'][$i]." ";
                                                        echo $showSearched['teachTime'][$i];
                                                    }?>
                                                </p>
                                              </div>
                                        </li>      
                          <?php
                            }
                          }
                          ?>

                          </div>
                                    <!-- end panel body class -->
                                </div>
                                <!-- end collapse id class -->


                        </div>
                      <?php
                    //ปิด if(isset)
                      }?>
                        <!-- end manage & show searched data -->

                       
                    </div>
                    <!-- end query result div -->
                    </div>

                <!-- </section> -->
                </div>
            </div>
            <!-- End Query result -->

        </div>
        <!-- end search engine div -->
      </div>
    </div>
    </div>

    <!-- End Scheduler and search engine -->



<!-- copied from ming -->

<!-- for show searched courses -->
<script>
function selectGen(){
  document.getElementById("search").submit();
}
</script>

<!-- word on button -->
<?php
function act($flag){
  if($flag == "change") echo "Change Sec";
  if($flag == "add") echo "Add";
  if($flag == "drop") echo "Drop";
}
?>
