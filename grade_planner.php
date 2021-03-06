<!DOCTYPE html>

<?php
require("page_header.php");
?>


<html lang="en">


<head>
   <title>Grade Planner</title>



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

</head>
                <!-- - - - - - - - - - - - - End head Start body - - - - - - - - - - - - - - - - -  -->
<body>
  
    <!-- Web navigator -->
    <!-- <div class="row"> -->
        <!-- <h3>This is Navigator Div</h3> -->
       <!--  <div class="col-md-11">
            <table class="navbar">
                <tr>
                    <td> -->
                        <!-- <button type="button" class="btn btn-default"> -->
             <!--            <a href="schedule.php"><label>&nbsp;&nbsp;&nbsp;&nbsp;Scheduler&nbsp;&nbsp;&nbsp;&nbsp;</label></a> -->
                        <!-- </button> -->
  <!--                       
                    </td>
                    <td>
                        <a href="grade_planner.html"><label>&nbsp;&nbsp;&nbsp;&nbsp;Grade Planner&nbsp;&nbsp;&nbsp;&nbsp;</label></a> -->
                       <!-- <button type="button" class="btn btn-default" onclick="grade_planner.html"><label>Grade Planner</label></button> -->
             <!--        </td>
                    <td>
                        &nbsp;&nbsp;
                        <a href="#">
                            <span class="glyphicon glyphicon-user"></span>
                        </a> 
                        &nbsp;&nbsp;
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-1"></div>     -->
        
    <!-- </div> -->
    <!-- End Web Nav -->

    <div class="container">
        <div class="row">

        <!-- old style div -->
<!--             <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="row">
                    <div class="col-md-4 widget">
                        Current GPAX:
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6 widget">
                        Planned GPAX:
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 widget">
                        table
                    </div>
                </div>    
              
            </div>
            <div class="col-md-1"></div> -->

            <!-- new style div -->

            <!-- left margin -->
            <div class="col-md-1"></div>

            <!-- left col -->
            <div class="col-md-3 widget">
                <div>Current GPAX:</div>
                <div>Planned GPAX:</div>
            </div>

            <!-- center margin -->
            <div class="col-md-1"></div>

            <!-- right col -->
            <div class="col-md-6 widget">
                <div class="table-responsive">          
                    <table class="table">

                        <!-- table head -->
                        <thead>
                            <tr>
                                <th style="width: 30%;">Subject name</th>
                                <th style="width: 70%;">Grade Estimated</th>
                            </tr>
                        </thead>

                        <!-- table data -->
                        <tbody id="estimator_parent">
                            <!-- <tr id="subject_parent" style="width: 30%">
                                <td id="subject_child">
                                </td>
                            </tr> -->
                            <tr id="grade_parent" style="width: 70%;">
                                <td>
                                    CourseName
                                </td>
                                <td id="grade_child">
                                    <ul class="pagination" width="100%">
                                      <li><a href="#">A</a></li>
                                      <li><a href="#">B+</a></li>
                                      <li><a href="#">B</a></li>
                                      <li><a href="#">C+</a></li>
                                      <li><a href="#">C</a></li>
                                      <li><a href="#">D</a></li>
                                      <li><a href="#">F</a></li>
                                      <li><a href="#">W</a></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <!-- fill data -->
            <script type="text/javascript">
                writeSubjectandGrade();

                // test
                var tr = document.createElement("tr");
                var td1 = document.createElement("td");
                var td2 = document.createElement("td");

                console.log(td2);

                var node1 = document.createTextNode("1");
                var node2 = document.createTextNode("2");

                td1.appendChild(node1);
                td2.appendChild(node2);

                tr.appendChild(td1);
                console.log(tr);
                tr.appendChild(td2);
                console.log(tr);

            </script>

            <!-- right margin -->
            <div class="col-md-1"></div>

        </div>
    </div>




</body>
</html>