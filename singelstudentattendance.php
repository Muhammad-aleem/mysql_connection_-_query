<?php
include('classes/attendanceclass.php');
$obj=new Data;


session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}
 $month = date('m');



$currentmonthdays = date('t');

if(isset($_GET['std']))
{
	$singledata = $obj->getSingleattendanceData($_GET['std']);

	$result = $obj->getSingleStudentAttendance($_GET['std']);	
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	

	<title>viewStudent_Attendance</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body" data-url="http://neon.dev">
	<br>
	
				<a style="margin-left: 1100px;" href="logout.php">Log Out <span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a>
		
	<div class="container">
		<div class="container">
			<div class="row">
				<div class="col-md-12" style="background-color: white">
					<center>
					<img style="width: 130px; height: 130px;" src=" banners/<?php echo $singledata['student_image'];?>"><br>
					
					</center>

				</div>
				<div class="col-md-12">
					<h1>Personal Information</h1>
				</div>
				<div class="col-md-6" style="background-color: white">
					<div><b> Register NO </b>:<span style="padding-left: 250px" >12345</span> </div>
					<hr>
					 <div>
                        Roll :<span style="padding-left: 285px"><?php echo $singledata['rollno'];?></span>
                    </div>
                    <hr>
                    <div class="profile-view-tab">
                       <b>Section </b>: <span style="padding-left: 285px"><?php echo $singledata['section'];?></span>
                    </div><hr>
                    <hr>

				</div>
				<div class="col-md-6" style="background-color: white">
					 <div >
                       <b>Address </b>: <span style="padding-left: 285px"><?php echo $singledata['address'];?></span>
                    </div>
                    <hr>
                     <div class="profile-view-tab">
                       <b>Country </b> <span style="padding-left: 285px">Pakistan</span> 
                    </div><hr>
                    <div class="">
                        <b>Username</b> :<span style="padding-left: 285px"> <?php echo $singledata['studentname'];?></span>
                    </div><hr>
                    

				</div>
			</div>

			</div>
	</div>
	<hr>

	

	

              <div class="container">
  
                                <h1>Attendance Information</h1>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="hide-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <?php 
                                        for($i=1;$i<=$currentmonthdays;$i++)
                                        {
                                        	echo "<th>".$i."</th>";
                                        }
                                        ?>	

                                                                           </tr>
                                </thead>
                                 <tbody>

                                 	<tr>
                                 		<?php 
                                 		for($i=1;$i<=$currentmonthdays;$i++)
                                        {
                                        ?>
                                    	<?php foreach($result as $data):?>
                                    	<td>

                                    		<?php 

                                    		 $ndate = $data['date'];
 											$cdate = date("d", strtotime($ndate));
 											if($i==$cdate)
 											{
                                    		if($data['present']==1)
                                    		{
                                    			echo "P";
                                    		}
                                    		else
                                    		{
                                    			echo "A";
                                    		}
                                    		}
                                    		?>
                                    		
                                    	</td>
                                    <?php endforeach;?>
                                    <?php 
                                    	}
                                    	?>

                                          </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
                      </div>
        </section>
    </div>




                   </div>
             
        
	
	</div>
	
			
	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/bootstrap-switch.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>







