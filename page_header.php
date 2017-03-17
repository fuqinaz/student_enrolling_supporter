<?php
require("check_login.php");
?>

<HTML>
<!-- <input type="button" onclick="window.location.href='schedule.php'" value="Schedule">
<input type="button" onclick="window.location.href='grade_planner.php'" value="Grade">
 -->
    <!-- Web navigator -->
    <div class="row">
        <!-- <h3>This is Navigator Div</h3> -->
        <div class="col-md-11">

            <table class="navbar">
                <tr>
                    <td>
                        <!-- <button type="button" class="btn btn-default"> -->
                        <a href="schedule.php"><label>&nbsp;&nbsp;&nbsp;&nbsp;Scheduler&nbsp;&nbsp;&nbsp;&nbsp;</label></a>
                        <!-- </button> -->
                        
                    </td>
                    <td>
                        <a href="grade_planner.html"><label>&nbsp;&nbsp;&nbsp;&nbsp;Grade Planner&nbsp;&nbsp;&nbsp;&nbsp;</label></a>
                       <!-- <button type="button" class="btn btn-default" onclick="grade_planner.html"><label>Grade Planner</label></button> -->
                    </td>
                    <td>
                        <!-- &nbsp;&nbsp;
                        <a href="#">
                            <span class="glyphicon glyphicon-user"></span>
                        </a> 
                        &nbsp;&nbsp; -->


                        <div class="dropdown">

                          &nbsp;&nbsp;
                          <button class="btn btn-logout dropdown-toggle" type="button" data-toggle="dropdown">
                            <a href="#">
                                <span class="glyphicon glyphicon-user"></span>
                            </a> 
                            &nbsp;&nbsp;
                            <span class="caret"></span>
                          </button>

                          <ul class="dropdown-menu ul-logout">
                            <!-- <li><a href="#">Hi, Prayut Chan.</a></li> -->
                            <!-- <li><a href="#">CSS</a></li> -->
                            <li class="dropdown-header">Hi, Haming</li>
                            <li><a href="#">Log out</a></li>
                          </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-1"></div>    
        
    </div>
    <!-- End Web Nav -->




</HTML>