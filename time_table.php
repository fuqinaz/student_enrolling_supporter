<?php
@ini_set('display_errors', '0');
?>
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


<body style="background: transparent;">
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
require("time_table_handler.php");
?>

<?php

// array for collecting caourse id sorted
// let row represent day: mon = day 0, tue = day 1, ..., fri = day 4, unknown = day 5
$courseSortedbbytime = array();

// variables for collecting start and finish time
$start_time = null;
$finish_time = null;

// just for check in case that the first course time is AR
$ch = false;

// print_r($showCourses);

// collecting loop
for($i=0; $i<count($showCourses['courseCode']); $i++){
    // check overall start and fin time

    // for the first start and finish time
    // incase that the first one doesn't have teachtime
    if($i==0 || $ch) {
        // initial
        if($showCourses['teachTime'][$i]=="AR" || $showCourses['teachTime'][$i]=="IA"){
            $ch = true;
        } else {
            $start_time = (int)substr($showCourses['teachTime'][$i],0,2);
            $finish_time = (int)substr($showCourses['teachTime'][$i],6,2);
            $ch = false;

        }

    // for >1th data that doesn't have teachtime
    } elseif ($showCourses['teachTime'][$i]=="AR" || $showCourses['teachTime'][$i]=="IA") {
        //do nothing na ja

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

        // debugging /////

            echo "start time loop ".$i." = ".$start_time."<br>";
            echo "finish time loop ".$i." = ".$finish_time."<br>";
            echo "teach time = ".$showCourses['teachTime'][$i]."<br>";

    }

    // assign courseID to day
    if($showCourses['day'][$i]=="MON") {
        $courseSortedbbytime[0][] = array
                                        (
                                        'courseCode'=> $showCourses['courseCode'][$i],
                                        'nameEngShort'=> $showCourses['nameEngShort'][$i],
                                        'teachTime'=> $showCourses['teachTime'][$i],
                                        'section'=> $showCourses['section'][$i],
                                        'building'=> $showCourses['building'][$i],
                                        'roomNo'=> $showCourses['roomNo'][$i],
                                        );
    } elseif ($showCourses['day'][$i]=="TUE") {
        $courseSortedbbytime[1][] = array
                                        (
                                        'courseCode'=> $showCourses['courseCode'][$i],
                                        'nameEngShort'=> $showCourses['nameEngShort'][$i],
                                        'teachTime'=> $showCourses['teachTime'][$i],
                                        'section'=> $showCourses['section'][$i],
                                        'building'=> $showCourses['building'][$i],
                                        'roomNo'=> $showCourses['roomNo'][$i],
                                        );
    } elseif ($showCourses['day'][$i]=="WED") {
        $courseSortedbbytime[2][] = array
                                        (
                                        'courseCode'=> $showCourses['courseCode'][$i],
                                        'nameEngShort'=> $showCourses['nameEngShort'][$i],
                                        'teachTime'=> $showCourses['teachTime'][$i],
                                        'section'=> $showCourses['section'][$i],
                                        'building'=> $showCourses['building'][$i],
                                        'roomNo'=> $showCourses['roomNo'][$i],
                                        );
    } elseif ($showCourses['day'][$i]=="THU") {
        $courseSortedbbytime[3][] = array
                                        (
                                        'courseCode'=> $showCourses['courseCode'][$i],
                                        'nameEngShort'=> $showCourses['nameEngShort'][$i],
                                        'teachTime'=> $showCourses['teachTime'][$i],
                                        'section'=> $showCourses['section'][$i],
                                        'building'=> $showCourses['building'][$i],
                                        'roomNo'=> $showCourses['roomNo'][$i],
                                        );
    } elseif ($showCourses['day'][$i]=="FRI") {
        $courseSortedbbytime[4][] = array
                                        (
                                        'courseCode'=> $showCourses['courseCode'][$i],
                                        'nameEngShort'=> $showCourses['nameEngShort'][$i],
                                        'teachTime'=> $showCourses['teachTime'][$i],
                                        'section'=> $showCourses['section'][$i],
                                        'building'=> $showCourses['building'][$i],
                                        'roomNo'=> $showCourses['roomNo'][$i],
                                        );
    } elseif ($showCourses['day'][$i]=="AR") {
        $courseSortedbbytime[5][] = array
                                        (
                                        'courseCode'=> $showCourses['courseCode'][$i],
                                        'nameEngShort'=> $showCourses['nameEngShort'][$i],
                                        'teachTime'=> $showCourses['teachTime'][$i],
                                        'section'=> $showCourses['section'][$i],
                                        'building'=> $showCourses['building'][$i],
                                        'roomNo'=> $showCourses['roomNo'][$i],
                                        );
    }

}

// check array element
print_r($courseSortedbbytime);
echo "<br><br>";


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
print_r($courseSortedbbytime);


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
                            console.log("start time = "+start_time);
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



                                $content = $courseSortedbbytime[$daynum][$i]['courseCode']." (".$courseSortedbbytime[$daynum][$i]['section'].")"."<br>".$courseSortedbbytime[$daynum][$i]['nameEngShort']."<br>".$courseSortedbbytime[$daynum][$i]['building']." ".$courseSortedbbytime[$daynum][$i]['roomNo'];
                                // $style = "border-radius: 10px\; background-color: rgba(40, 40, 40, .4)\; padding: 10px\;text-align: left\; width:15%\"";


                            //     // class block print
                                // for($j=0; $j<$blocks[$daynum][$i]['class']; $j++){
                                    echo '<td colspan="'.$blocks[$daynum][$i]['class'].'" style="border-radius: 10px; background-color: rgba(40, 40, 40, .4); padding: 10px;text-align: center; font-size:12px;">';
                                    //echo $content;
                                    $ccode = $courseSortedbbytime[$daynum][$i]['courseCode'];
                                    $ssec = $courseSortedbbytime[$daynum][$i]['section'];
                                    echo "<A HREF='course_detail.php?courseCode=$ccode&section=$ssec' target='courseDetailFrame'>".$content."</A>";
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

            <form action="save_o_reset_planning.php" method="POST">
              <button type="submit" name="save" class="btn btn-default" style="float:right; min-width: 80px;">Save</button>
              &nbsp;&nbsp;
              <button type="submit" name="reset" class="btn btn-default" style="float:right; min-width: 80px;">Reset</button>
              &nbsp;&nbsp;
              <button type="button" onclick="askClear()" class="btn btn-default" style="float:right; min-width: 80px;">Clear</button>
              <button type="submit" id="clear" name="clear" style="position: absolute; left: -9999px; width: 0px; height: 0px"></button>
            </form>

          </div>
        <!-- End Bootstrap Scheduler -->

    </div>
    <!-- end scheduler div -->

  </body>

<script>
function askClear(){
  if(confirm("clear powwww?"))
    document.getElementById("clear").click();
}
</script>
