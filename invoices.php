<?php
require'classes/invoicesclass.php';
$obj=new InvoicesData;
session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}

if (isset($_POST['submit'])) {
	$class=$_POST['degreename'];
	$sectionname=$_POST['sectionname'];
	$student=$_POST['studentname'];
	$phone=$_POST['phone'];
	$rollno=$_POST['rollno'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];

 	$obj->SaveinvoicesData($class,$sectionname,$student,$phone,$rollno,$amount,$date);
}
$point=$obj->getAllinvoiceData();
// echo "<pre>";
// print_r($point);
// echo "</pre>";
//  die();

$degreename=$obj->getAlldegreeData();
$section=$obj->getAllsectionData();
$student=$obj->getAllstudentData();

// ajax part
if(isset($_POST['getData'])){
	$invoices=$obj->getinvoicesData($_POST['degree']);
	


	$html='';
	$html.='<option value="">Select Section</option>';
	foreach($invoices as $section)
	{
		$html.='<option value="'.$section['section_id'].'">'.$section['sectionname'].'</option>';
	}
	echo $html;
	exit;

}

if(isset($_POST['getData2'])){
	$student=$obj->getinvoicesData2($_POST['degreeid'],$_POST['sectionid']);
	


	$html1='';
	foreach($student as $section)
	{
		$html1.='<option value="'.$section['student_id'].'">'.$section['studentname'].'</option>';
	}
	echo $html1;
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

	

	<title>Invoices</title>

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
		<h2 style="margin-left: 200px;font-size: 40px;">Add Invoices</h2>
		<br />
				<a style="margin-left: 850px;" href="logout.php">Log Out <span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a>
				<br><br>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					
					
					<div class="panel-body">
						
						<form role="form" action="invoices.php" method="POST" class="form-horizontal form-groups-bordered">

							
							<div class="form-group">
								<label class="col-sm-3 control-label">Class</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="degreename"  onchange="myFunction()" id="degreename"required>
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
									<select class="form-control" name="sectionname" onchange="myFunction1()" id="section"required>
										<option>Choose Section</option>
										<?php foreach($section as$section):?>
											<option value="<?php echo $section['section_id'];?>"><?php echo $section['sectionname'];?> </option>
										<?php endforeach;?>
										
										
									</select>
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
								<label for="field-1" class="col-sm-3 control-label">Phone </label>
								
								<div class="col-sm-5">
									<input type="text"  name="phone" class="form-control" id="field-1" placeholder="Your phone No"required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Roll No </label>
								
								<div class="col-sm-5">
									<input type="text"  name="rollno" class="form-control" id="field-1" placeholder="Your Roll No"required>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Amount </label>
								
								<div class="col-sm-5">
									<input type="text"  name="amount" class="form-control" id="field-1" placeholder="type Amount" required>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Date </label>
								
								<div class="col-sm-5">
									<input type="date"  name="date" class="form-control" id="field-1" placeholder=""required>
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

	<script type="text/javascript">
		function myFunction()
	{
		var degree = $('#degreename :selected').val();  
			
		// onchange ajax function call
		$.ajax({
				url:'invoices.php',
				type:'POST',
				data:'degree='+degree+'&getData='+1,
				success:function(result)

				{
					
					$('#section').html(result);

        

				}
				});

	}
	function myFunction1()
	{
		var degreeid = $('#degreename :selected').val();  
		var sectionid = $('#section :selected').val();  
		// alert(degreeid);
		// alert(sectionid);
		

			
	
		$.ajax({
				url:'invoices.php',
				type:'POST',
				data:'degreeid='+degreeid+'&sectionid='+sectionid+'&getData2='+1,
				success:function(result)

				{
					alert(result);
					$('#student').html(result);

        

				}
				});

	}
		

	</script>
		


</body>
</html>







