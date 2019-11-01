<?php
include('classes/studentclass.php');
$obj=new Data;
session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}

if (isset($_POST['submit'])) {
	$sessionname=$_POST['sessionname'];
	
	$degreename=$_POST['degreename'];
	$sectionname=$_POST['sectionname'];
	$student=$_POST['studentname'];
	$fathername=$_POST['fathername'];
	$address=$_POST['address'];
	$rollno=$_POST['rollno'];

	 $banner=$_FILES['image']['name']; 
 $expbanner=explode('.',$banner);
 $bannerexptype=$expbanner[1];
 
 $rand=rand(10000,99999);
  $bannername=$rand.'.'.$bannerexptype;

 $bannerpath="banners/".$bannername;
 move_uploaded_file($_FILES["image"]["tmp_name"],$bannerpath);
 	$obj->saveStudentData($sessionname,$degreename,$sectionname,$student,$fathername,$address,$rollno,$bannername);
}
$point=$obj->getAllstudentData();

// echo "<pre>";
// print_r($point);
// echo "</pre>";
//  die();

$session=$obj->getAllsessionData();
$degreename=$obj->getAlldegreeData();
$section=$obj->getAllsectionData();




if (isset($_GET['delid'])) 
{
	$obj->deletestudentData($_GET['delid']);
	header( "location:showdata.php");
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

	

	<title>Student</title>

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
		<h2 style="margin-left: 200px;font-size: 50px;">Student</h2>
		
		<a style="margin-left: 850px;" href="logout.php">Log Out <span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a>
		<br><br>


		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					
					<div class="panel-body">
						
						<form role="form" action="student.php" method="POST" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
						
							<div class="form-group">
								<label class="col-sm-3 control-label">Session</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="sessionname" required>
										<option>Choose session</option>
										<?php foreach($session as $session):?>

											<option value="<?php echo $session['session_id'];?>"><?php echo $session['sessionname'];?></option>
											<?php endforeach;?>
								
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Degree</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="degreename" required>
										<option value="">Choose Degree</option>
										<?php foreach($degreename as $degreename):?>
											<option value="<?php echo $degreename['degree_id'];?>"><?php echo $degreename['degreename'];?></option>
											<?php endforeach;?>
										
										
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Section</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="sectionname" required>
										<option>Choose Section</option>
										<?php foreach($section as$section):?>
											<option value="<?php echo $section['section_id'];?>"><?php echo $section['sectionname'];?> </option>
										<?php endforeach;?>
										
										
									</select>
								</div>
							</div>
								<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"> student </label>
								
								<div class="col-sm-5">
									<input type="text" name="studentname"class="form-control" id="field-1" placeholder="student Name" required>
								</div>
							</div>
			
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Father Name </label>
								
								<div class="col-sm-5">
									<input type="text" name="fathername"class="form-control" id="field-1" placeholder="Your Father Name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Address </label>
								
								<div class="col-sm-5">
									<input type="text" name="address" class="form-control" id="field-1" placeholder="Your Address"required>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Roll No </label>
								
								<div class="col-sm-5">
									<input type="text"  name="rollno" class="form-control" id="field-1" placeholder="Your Roll No" required>
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Student Image</label>
								
								<div class="col-sm-5">
									<input type="file" name="image" class="form-control" id="field-file" placeholder=""required>
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-success">submit</button>
								</div>
							</div>
						</form>
						
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