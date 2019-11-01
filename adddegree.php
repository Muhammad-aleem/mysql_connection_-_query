<?php
include('classes/adddegreeclass.php');
$obj=new DegreeData();
session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}
if (isset($_POST['submit'])) {
	$degreename=$_POST['degreename'];
	$obj->SavedegreeData($degreename);
}
$point=$obj->getAlldegreeData();

if (isset($_GET['delid'])) 
{
	$obj->deletedegreeData($_GET['delid']);
	header( "location:adddegree.php");
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

	<title> Add Degree</title>

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
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							<h1 style="margin-left: 300px; font-size: 40px ">Add Degree</h1>
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form action="adddegree.php" method="POST" role="form" class="form-horizontal form-groups-bordered">
			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">degree</label>
								
								<div class="col-sm-5">
									<input type="text" name="degreename" class="form-control" id="field-1" placeholder="Degree">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-success">submit</button>
								</div>
							</div>
							
		
						</form>
						<div class="col-md-6">
				
				
				
				<table class="table table-hover" style="margin-left: 200px; margin-top: 50px;" >
					<thead>
						<tr>
							<th>#</th>
							<th>degree</th>
							<th colspan="2">Action</th>
							
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($point as $point):?>
						<tr>
							<td><?php echo $point['degree_id'];?></td>
							<td><?php echo $point['degreename'];?></td>
					<td><a href="adddegree.php?delid=<?php echo $point['degree_id' ];?>" class="btn btn-danger">Delete</a></td>

							<td><a href="editadddegree.php?editid=<?php echo $point['degree_id' ];?>" class="btn btn-success">Edit</a></td>
						</tr>
					<?php endforeach;?>
					
						
					</tbody>
				</table>
				
			</div>
						
					</div>
				
				</div>
			
			</div>
		</div>						
								
		
		<!-- Footer -->
		
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