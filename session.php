<?php
include('classes/sessionclass.php');
$obj=new SessionData();
session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}

if (isset($_POST['submit'])) {
	$sessionname=$_POST['sessionname'];
	$obj->SavesessionData($sessionname);
}
$point=$obj->getAllsessionData();

if (isset($_GET['delid'])) 
{
	$obj->deletesessionData($_GET['delid']);
	header( "location:session.php");
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

	<title>session</title>

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
				
		<a href="logout.php">LogOut</a>
		<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
		
						<ul class="dropdown-menu">
		
							<!-- Reverse Caret -->
							<li class="caret"></li>
		
							<!-- Profile sub-links -->
							<li>
								<a href="extra-timeline.html">
									<i class="entypo-user"></i>
									Edit Profile
								</a>
							</li>
		
							<li>
								<a href="mailbox.html">
									<i class="entypo-mail"></i>
									Inbox
								</a>
							</li>
		
							<li>
								<a href="extra-calendar.html">
									<i class="entypo-calendar"></i>
									Calendar
								</a>
							</li>
		
							<li>
								<a href="#">
									<i class="entypo-clipboard"></i>
									Tasks
								</a>
							</li>
						</ul>
					</li>
		
				</ul>
				
				
		
					
					
		
			</div>
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							<h1 style="margin-left: 300px; font-size: 40px ">Add Session</h1>
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form action="session.php" method="POST" role="form" class="form-horizontal form-groups-bordered">
			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">session</label>
								
								<div class="col-sm-5">
									<input type="text" name="sessionname" class="form-control" id="field-1" placeholder="session"required>
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
							<th>session</th>
							<th colspan="2">Action</th>
							
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($point as $point):?>
						<tr>
							<td><?php echo $point['session_id'];?></td>
							<td><?php echo $point['sessionname'];?></td>
					<td><a href="session.php?delid=<?php echo $point['session_id' ];?>" class="btn btn-danger">Delete</a></td>

							<td><a href="editsession.php?editid=<?php echo $point['session_id' ];?>" class="btn btn-success">Edit</a></td>
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