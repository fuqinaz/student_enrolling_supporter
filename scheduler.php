<?php
require("page_header.php");
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

<style type="text/css">
    iframe { border: none; }
    .pinkbody {
        background: black;
    font-weight: 300;
    padding-bottom: 100px;
    background-color: #154265 20%;
    font-color: #f8f8f8;
    background-image: radial-gradient(farthest-side ellipse at 10% 0, #e0659b 60%, #4f3a85);
    background-image: -webkit-radial-gradient(10% 0, farthest-side ellipse, #e0659b 60%, #4f3a85);
    background-image: -moz-radial-gradient(10% 0, farthest-side ellipse, #e0659b 60%, #4f3a85);
    background-attachment: fixed, fixed;
    /*font-family: myFirstFont;*/
    }
</style>

<body class = "pinkbody">
    
<center>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <iframe src="time_table.php" name="timeTableFrame" width="800" height="400" align="top" ></iframe>
                </div>
                <div class="row">
                    <iframe src="course_detail.php" name="courseDetailFrame" width="800" height="300"></iframe>
                </div>
               
            </div>
            <div class="col-md-4">    
                <iframe src="course_search.php" name="searchFrame" height="800"></iframe>
            </div>
        </div>
    </div>
</center>

<!-- old code -->
<!--  <iframe src="time_table.php" name="timeTableFrame" width="800" height="400" align="top" ></iframe>
                <iframe src="course_search.php" name="searchFrame" height="400"></iframe>
                <iframe src="course_detail.php" name="courseDetailFrame" width="800" height="300"></iframe> -->
<!-- end old code                 -->
</body>