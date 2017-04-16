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

<BODY style="background: transparent;">

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
?>

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
                        <form ID="search" METHOD="POST" ACTION="" >
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
                                           <form method="POST" action="time_table.php" target="timeTableFrame">
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
                                           <form method="POST" action="time_table.php" target="timeTableFrame">
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


</BODY>
