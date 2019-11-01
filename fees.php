<?php
include('classes/feesclass.php');
$obj=new Data;
session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}

if (isset($_POST['submit'])) {
	$feestype=$_POST['feestype'];
	$obj->savefees($feestype);
}
$point=$obj->getAllfeesData();
if (isset($_GET['delid'])) 
{
	$obj->deletefeesData($_GET['delid']);
	header( "location:fees.php");
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

	

	<title>Fees</title>

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
		<h2 style="margin-left: 200px;font-size: 50px;">Fees</h2>
		<br />
				<a style="margin-left: 850px;" href="logout.php">Log Out <span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a>
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form role="form" action="fees.php" method="POST" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">

													
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Fees </label>
								
								<div class="col-sm-5">
									<input type="text" name="feestype" class="form-control" id="field-1" placeholder=" Enter FeesType...." required>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-success">submit</button>
								</div>
							</div>
						</form>
							
				
				
				
				<table class="table table-hover" style="margin-top: 100px;">
					<thead>
						<tr>
							<th>#</th>
							<th>FeesType</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
							<?php foreach ($point as $point):?>
						<tr>
							<td><?php echo $point['fees_id'];?></td>
							<td><?php echo $point['feestype'];?></td>
							<td><a class="btn  btn-danger" class="icon" href="fees.php?delid=<?php echo $point['fees_id'];?>"><i style="font-size: 20px;" class="glyphicon glyphicon-trash"></i></a></td>
							<td><a class="btn btn-success" class="icon" href="editfees.php?editid=<?php echo $point['fees_id'];?>"><i style="font-size: 20px;" class="glyphicon glyphicon-edit"></i></a>
								</td>
							
						</tr>
						
						<?php endforeach;?>
						
						
					</tbody>
				</table>
				
			
						
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