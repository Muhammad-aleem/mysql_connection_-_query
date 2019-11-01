<?php
include('classes/attendanceclass.php');
$obj=new Data;
session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}

if (isset($_POST['submit'])) {
	
	
	$degreename=$_POST['degreename'];
	$sectionname=$_POST['sectionname'];
	
 	 $students=$obj->getAllAttendanceData($degreename,$sectionname );
}
if(isset($_POST['getStudentsAttendanceData']))
{
	$studentAttendances = $obj->getStudentsAttendanceData($_POST['classid']);
	$html='<table class="table table-bordered">
	
					<thead>
						<tr>
							<th><b>Name</b></th>
							<th><b>Photo</b></th>
							<th><b>roll</b></th>
						
								<th><b>Action</b></th>
							
						</tr>
					</thead>';
	foreach ($studentAttendances as  $studentAttendance){
		$image = '<img src=banners/'.$studentAttendance['student_image'].' width="20">';

	$html.='<tr>
								<td> '.$studentAttendance['studentname'].'</td>
								<td> '.$image.'</td>
								<td>'.$studentAttendance['rollno'].'</td>
								
									<td> <a target="_blank" href="http://localhost/neon/singelstudentattendance.php?std='.$studentAttendance['student_id'].'"><button class="btn btn-info" ><span style="font-size: 15px; " class="glyphicon glyphicon glyphicon-ok-circle" ></button> </a></td>

						</tr>		
					
				';
	}
	$html.='</table>';
	 echo $html;
 	exit;
	
}



if(isset($_GET['attendanceid']))
{
	$point = $obj->getSinglestudentData($_GET['attendanceid']);
	
}


if (isset($_POST['SaveAttendanceData'])) {

	$degree=$_POST['degreeid'];
	$section=$_POST['sectionid'];
	$student=$_POST['studentid'];
	$present=$_POST['present'];

	$result = $obj->SaveAttendanceData($degree,$section,$student,$present);
	
	exit;
}

// $option=$obj->getAllAttendanceData();


// echo "<pre>";
// print_r($point);
// echo "</pre>";
//  die();


$degreename=$obj->getAlldegreeData();
$degree=$obj->getAlldegree1Data();
$section=$obj->getAllsectionData();
if(isset($_POST['getData'])){
	$attendance=$obj->getattendanceData($_POST['degree']);
	


	$html='';
	$html.='<option value="">Select Section</option>';
	foreach($attendance as $section)
	{
		$html.='<option value="'.$section['section_id'].'">'.$section['sectionname'].'</option>';
	}
	echo $html;
	
	exit;

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

	

	<title>Attendance</title>

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
	

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php include('navbar.php');?>


	
	<div class="main-content">					
		<h2 style="margin-left: 200px;font-size: 50px;">Attendance</h2>
				<a style="margin-left: 850px;" href="logout.php">Log Out <span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a>
				<br><br>
			
				<div class="form-group"  >
								
								
								<div class="col-md-2" style="margin-left: 770px;">
									<select  style="height: 30px;"  class="form-control" onchange="myFunction1()" name="degreename" id="classid">
										<option >Choose Class</option>
										<?php foreach($degree as $degree):?>
											<option  value="<?php echo $degree['degree_id'];?>"><?php echo $degree['degreename'];?></option>
											<?php endforeach;?>
										
										
									</select>
								</div>
								
								<br>

							</div>

						
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
				
					<div class="panel-body">
						
						<form role="form" action="attendance.php" method="POST" class="form-horizontal form-groups-bordered">

							
							<div class="form-group">
								<label class="col-sm-3 control-label">Class</label>
								
								<div class="col-sm-5">
									<select class="form-control" onchange="myFunction()" name="degreename" id="degreename" required>
										<option>Choose Class</option>
										<?php foreach($degreename as $degreename):?>
											<option value="<?php echo $degreename['degree_id'];?>"><?php echo $degreename['degreename'];?></option>
											<?php endforeach;?>
										
										
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Section</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="sectionname" id="section" required>
										<option>Choose Section</option>
										<?php foreach($section as$section):?>
											<option value="<?php echo $section['section_id'];?>"><?php echo $section['sectionname'];?> </option>
										<?php endforeach;?>
										
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-success">Attendance</button>
								</div>
							</div>
						</form>
						
					</div>
				
				</div>
			
			</div>
		</div>
		<br>
		<br>
			
			<!--  -->
		<br><br>
		<div id="dynamic-data">	
		<div id="hide-table">
                    <table class="table table-striped table-bordered table-hover">
                        <thead >
                            <tr >
                                <th class="col-sm-2" style="background-color: black;">#</th>
                                <th class="col-sm-2"style="background-color: black;">Photo</th>
                                <th class="col-sm-2"style="background-color: black;">Name</th>
    

                                <th class="col-sm-2" style="background-color: black;">Roll</th>
                                                                

                                <th colspan="2" class="col-sm-2"style="background-color: black;"><input type="checkbox" class="all_attendance" id="" data-placement="top" data-toggle="tooltip" data-original-title="Add All Attendance">  Action</th>
                            </tr>
                        </thead>
                        <tbody >

                        	<?php if(isset($students)):?>
                        	
                        	
                        
                        	<?php foreach ($students as $student):?>
                        	<tr>
                                                            
                                    <td data-title="#">
                                    	 <?php echo $student['student_id'];?>

                                    	
                                         </td>                               
                                    <td data-title="Photo">
                                    	
                                    	<img style="width: 130px; height: 130px;" src=" banners/<?php echo $student['student_image'];?>"></td>
                                    
                                                                         
                                    <td data-title="Name" id="name">
                                    	  <?php echo $student['studentname'];?>

                                                 </td> 
                                                  
                                                                         

                                  
                                    <td data-title="Roll">
                                    	 <?php echo $student['rollno'];?>
                                    	
                                            </td>                            
                                    <td data-title="Action">
                                    	P
                                        <input type="checkbox" class="attendance btn btn-warning" id="click"  onclick="mysaveFunction('<?php echo $student['student_id'];?>','<?php echo $student['degree'];?>','<?php echo $student['section'];?>',1)" data-placement="top" data-toggle="tooltip" data-original-title="Present">                                      </td>
                                            <td data-title="Action">
                                            	A
                                        <input type="checkbox" class="attendance btn btn-warning" id="click"  onclick="mysaveFunction('<?php echo $student['student_id'];?>','<?php echo $student['degree'];?>','<?php echo $student['section'];?>',0)" data-placement="top" data-toggle="tooltip" data-original-title="absent">                                      </td>
                                        </tr>
                                        <?php endforeach;?>
                                         	
                               <?php else:?>
                               <?php endif;?>
                            
                        </tbody>
                    </table>
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
	<script type="text/javascript">
		function myFunction()
	{
		var degree = $('#degreename :selected').val(); 
		// alert(degree); 
			
		// onchange ajax function call
		$.ajax({
				url:'attendance.php',
				type:'POST',
				data:'degree='+degree+'&getData='+1,
				success:function(result)

				{
					// alert(result);
					
					$('#section').html(result);

        

				}
				});
}
 function mysaveFunction(studentid,degreeid,sectionid,present){
			// alert(present); 	

 	$.ajax({
 		url:'attendance.php',
		type:'POST',
		data:'studentid='+studentid+'&degreeid='+degreeid+'&sectionid='+sectionid+'&present='+present+'&SaveAttendanceData='+1,
		success:function(result){
			// alert(result);
		}
 	});
 }

 function myFunction1()
 {
 	var classid = $('#classid option:selected').val();
 	// alert(classid);
 	$.ajax({
 		url:'attendance.php',
		type:'POST',
		data:'classid='+classid+'&getStudentsAttendanceData='+1,
		success:function(result){
			// alert(result);
			$('#dynamic-data').html(result);
		}
 	});
 }

	</script>

</body>
</html>