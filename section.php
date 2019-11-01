<?php
include('classes/sectionclass.php');

$obj=new SectionData();
session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}
if (isset($_POST['submit'])) {
	$sectionname=$_POST['sectionname'];
	$degreename=$_POST['degreename'];
	$student=$_POST['studentname'];

	$obj->SavesectionData($sectionname,$degreename,$student);
}
$point=$obj->getAllsectionData();
$degreename=$obj->getAlldegreeData();
$student=$obj->getAllstudentData();

if (isset($_GET['delid'])) 
{
	$obj->deletesectionData($_GET['delid']);
	header( "location:section.php");
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



	<title></title>

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
	<a href="logout.php">LogOut</a>
			<!-- working place -->
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							<h1 style="margin-left:200px; font-size: 50px;  ">Add Section</h1>
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form action="section.php" method="POST" role="form" class="form-horizontal form-groups-bordered">


							<div class="form-group">
								<label class="col-sm-3 control-label">Class</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="degreename"required>
										<option>Choose Class</option>
										<?php foreach($degreename as $degreename):?>
											<option value="<?php echo $degreename['degree_id'];?>"><?php echo $degreename['degreename'];?></option>
											<?php endforeach;?>
										
										
									</select>
								</div>
							</div>
			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">session</label>
								
								<div class="col-sm-5">
									<input type="text" name="sectionname" class="form-control" id="field-1" placeholder="section"required>
								</div>
							</div>
								<div class="form-group">
								<label class="col-sm-3 control-label">Student</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="studentname"   id="student"required>
										<option>Choose student</option>
										<?php foreach($student as$student):?>
											<option value="<?php echo $student['student_id'];?>"><?php echo $student['studentname'];?> </option>
										<?php endforeach;?>
										
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-default">submit</button>
								</div>
							</div>
							
		
						</form>
						
					</div>
					<div class="col-md-6">
				
				
				
				<table class="table table-hover" style="margin-left: 100px; margin-top: 50px;">
					<thead>
						<tr>
							<th>#</th>
							<th>Section</th>
							<th>degree</th>
							<th>Student</th>
							<th colspan="2"> Action</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($point as $point):?>
						<tr>
							
							<td><?php echo $point['section_id'] ;?></td>
							<td><?php echo $point['sectionname'] ;?></td>
							<td><?php echo $point['degree'] ;?></td>
							<td><?php echo $point['student'] ;?></td>
							<td><a class="icon" id="delete" href="section.php?delid=<?php echo $point['section_id' ];?>"><i style="font-size: 20px; color: #000;" class="glyphicon glyphicon-trash" ></i></a></td>

							<td><a href="editsection.php?editid=<?php echo $point['section_id' ];?>"><i style="font-size: 20px; color: #000;" class="glyphicon glyphicon-edit "></i></a></td>
							
						</tr>
						<?php endforeach;?>
						
						
						
					</tbody>
				</table>
				
			</div>
				
				</div>
			
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