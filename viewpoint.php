<?php
include('classes/invoicesclass.php');
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

 
 		$obj->editInvoicesData($class,$sectionname,$studen,$phone,$rollno,$amount,$date,$_GET['viewid']);
 	header( "location:viewinvoices.php");
}
$point=$obj->getAllinvoiceData();


$degreename=$obj->getAlldegreeData();
$section=$obj->getAllsectionData();

if(isset($_GET['viewid']))
{
	$singledata = $obj->getSingleinvoiceData2($_GET['viewid']);
	
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

	

	<title>view</title>

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
	
	<div class="container">			
		<a style="margin-left: 850px;" href="logout.php">Log Out<span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a>

      <div class="container">
      	<div class="row bottom-div">
      		<center>
      		<div class="btn-group btn-group-lg">
      				<a href="#" type="button" class="btn btn-info btn-outline-warning" onclick="myFunction()"><span class="glyphicon glyphicon-print"></span>Print</a>

      				<a href="#" type="button" class="btn btn-info btn-outline-warning"><span class="glyphicon glyphicon-file"></span>PDF Preview</a>

      				<a href="#" type="button" class="btn btn-info btn-outline-warning"><span class="glyphicon glyphicon-comment"></span>Send Mail</a>

      
      			


      		</div>
      		</center>
      		
      	</div>
      </div>
      <br>
  </div><hr>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
		        <h2 class="page-header">
		            <img src="https://school.kmunir38.com/uploads/images/1fe17794df6276f48017eb79b36dbc93b6cc92f3a0b4dbac4ef30d9eff54d6c1e33434183b1aeed22bf057c901e6ef81fa3cf2e337b30b4a105d9871d2079fcf.png" width="25px" height="25px" class="img-circle" alt="">	                School		            <small class="pull-right">Create Date : <?php echo $singledata['date'];?></small>
		        </h2>
		    </div>
		</div>
	</div>
	<hr>
	<table width="1700" style="font-size: 14px">
		<tr>
			<td style="padding-left: 30px">From</td>
			<td>To</td>
			<td>
				
<b>	Invoice #<?php echo $singledata['invoices_id'];?></b>
			</td>
			

		</tr>
		<tr>
			<td style="padding-left: 30px"><b>School</b></td>
			<td style="padding-right: 50px">Roll:<?php echo $singledata['rollno'];?></td></td>
			<td>Payment Status : <?php 
								if($singledata['paid']==0)
								{
									echo '<button class="btn btn-danger">Not paid</button>';
								}
								else
								{
									echo '<button class="btn btn-success">paid</button>';
								}
								?></td>
		</tr>
		<tr>
			<td style="padding-left: 30px">Phone:<?php echo $singledata['phone'];?></td>
			<td style="padding-right: 50px">Class:<?php echo $singledata['degreename'];?></td>
		</tr>
	

	</table>
		
		<hr>
   <div class="col-xs-12" id="hide-table">
		        <table class="table table-striped" style="background-color:#2E3E4E;color:#FFF;font-size: 14px;">
		            <thead>
		                <tr>
		                    <th class="col-lg-1" style="color: white">#</th>
		                    <th class="col-lg-5" style="color: white">Fee Type</th>
                            <th class="col-lg-4"style="color: white">Discount (%)</th>
		                    <th class="col-lg-2" style="text-align: right;color: white;">Total</th>
		                </tr>
		            </thead>
		            <tbody style="color:#707478">
		                <tr>
		                    <td data-title="#">
		                      		<?php echo $singledata['invoices_id'];?>                    </td>
		                    <td data-title="Fee Type">
		                        school		                    </td>
                            <td data-title="Discount (%)">
                                00                            </td>
		                    <td class="invoice-td" data-title="Sub Total ">
                             	             <?php echo $singledata['amount'];?>       </td>
		                </tr>
		            </tbody>
		        </table>
		    </div>
		    
     <br>

     <div class="container">
     	<div class="row">
     		<div class="col-md-6">
     			
     		</div>
     		<div class="col-md-6">
     		<table class="table" style="font-size: 14px;">

		                <tbody><tr>
                            <th class="col-sm-8 col-xs-8">Sub Total</th>
                            <td style="text-align: right;" class="col-sm-4 col-xs-4"><b><?php echo $singledata['amount'];?></b></td>
		                </tr>
                                                <tr>
                            <th class="col-sm-8 col-xs-8">Discount (%)</th>
                            <td style="text-align: right;" class="col-sm-4 col-xs-4"><b>Rs.00</b></td>
                        </tr>
                        <tr>
                            <th class="col-sm-8 col-xs-8">Total (1)</th>
                            <td style="text-align: right;" class="col-sm-4 col-xs-4"><b><?php echo $singledata['amount'];?></b></td>
                        </tr>
                                                     <tr>
                                <th class="col-sm-8 col-xs-8">Cash Payment Made</th>
                                <td style="text-align: right;" class="col-sm-4 col-xs-4"><b><?php echo $singledata['amount'];?></b></td>
                            </tr>

		            </tbody></table>
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
			$('.bottom-div').hide();
			window.print();
		}
	</script>

</body>
</html>







