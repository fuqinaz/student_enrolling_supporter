<HTML>

  <?php
  session_start();
  if($_SESSION['userID']!="")
  {
  	header("refresh:0; url=schedule.php");
  }
  ?>

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
	<center>
		<FORM METHOD=POST ACTION="login_handler.php">
			<table>
				<tr>
					<td>ID</td>
					<td><INPUT TYPE="text" NAME="userID"></td>
				</tr>
				<tr>
					<td>password</td>
					<td><INPUT TYPE="text" NAME="password"></td>
				</tr>
			</table>
			<INPUT TYPE="submit" value="LOGIN">
		</FORM>

	</center>


</BODY>
</HTML>
