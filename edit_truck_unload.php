<?php
include('include/connection.php');
session_start();
if(!isset($_SESSION['log-admin'])) {
    header('location: login.php');
} else {
}
?>

 <?php
$get_id=$_GET['id'];
$query2="SELECT * from truck_unload_point where unload_id='$get_id'";
$smtp2=$conn->prepare($query2);
$smtp2->execute();
$result2=$smtp2->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:title" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Panel</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="vendor/jvmap/jquery-jvectormap.css" rel="stylesheet">
	<link href="../../cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
	<link href="vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	
	<!-- tagify-css -->
	<link href="vendor/tagify/dist/tagify.css" rel="stylesheet">
	
	<!-- Style css -->
    <link href="css/style.css" rel="stylesheet">
	
</head>
<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
             header start
        ***********************************-->
        <?php include("include/header.php");?>
             
        <!--**********************************
            Sidebar start
        ***********************************-->
		<?php include("include/sidebar.php");?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
       <div class="content-body">
            <!-- row -->	
			<div class="page-titles">
				<ol class="breadcrumb">
					<li><h5 class="bc-title">Edit Truck Unload Point </h5></li>
					
				</ol>
				
			</div>

			<div class="container-fluid">
				<div class="row">
							  
			<div class="col-xl-6 col-lg-12">
			  <div class="card">
			  	
				<div class="card-header">
                                <h4 class="card-title">Edit Truck Unload Point </h4>
                            </div>
				
			  
			  <div class="card-body">
                                <div class="basic-form">
			  <form action="" method="POST" enctype="multipart/form-data">
			 
						</div>
							
							<div class="col-md-12 mb-3" >
							<label class="form-label"> Truck Unload Point Name<span class="text-danger">*</span></label>
							<input type="text" name="truck_unload" class="form-control" placeholder=""value ="<?php echo $result2['truck_unload_point'];?>">
                            </div>


							
					
						    



						     <div class="col-md-12 mb-3">
							
							<label class="control-label">Truck Route</label>
										<select name="truck_route_id" class="form-control" required="required">
											       <?php 
					$tRouteID=$result2['truck_route_id'];
                 $queryw="SELECT * from truck_route where route_id='$tRouteID'";
                 $smtpw=$conn->prepare($queryw);
                 $smtpw->execute();
                 $resultw=$smtpw->fetch()
                 ?>
                      <option  value="<?php echo $resultw['route_id'];?>"><?php echo $resultw['route_name'];?></option>

                                    

											<option value="">--Select Truck Route--</option>
											<?php 
                 $query="SELECT * from truck_route where route_status='Active'";
                 $smtp=$conn->prepare($query);
                 $smtp->execute();
                 ?>

                 <?php while($result=$smtp->fetch()){?>

											<option value="<?php echo $result['route_id'];?>" ><?php echo $result['route_name'];?></option>
											<?php }?>
										</select>
						</div>

							<div class="col-md-12 mb-3">
										<label class="control-label">Status</label>
										<select name="status"  class="form-control" required="required">
											<option value="">--Select Status--</option>
											<option value="Active" <?php if($result2['status']=='Active'){echo "selected";} ?>>Active</option>
											<option value="Inactive" <?php if($result2['status']=='Inactive') {echo "selected";} ?>>Inactive</option>
										</select>
										</div>
										<div class="col-md-12 mb-3">
										<!--<button type="button" class="btn btn-danger light" data-bs-dismiss="">Close</button>-->
				<button type="submit" name="update" class="btn btn-primary">Update Truck Unload Point</button></div>
						</div>
	                     
					</div>
				 </div>
			</form>
			</div>
		</div>
	</div>
		
		
 
		
        <!--**********************************
            Footer start
        ***********************************-->
       <?php include("include/footer.php");?>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>
	<script src="vendor/draggable/draggable.js"></script>
	
	
	<!-- tagify -->
	<script src="vendor/tagify/dist/tagify.js"></script>
	 
	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/js/dataTables.buttons.min.js"></script>
	<script src="vendor/datatables/js/buttons.html5.min.js"></script>
	<script src="vendor/datatables/js/jszip.min.js"></script>
	<script src="js/plugins-init/datatables.init.js"></script>
   
	<!-- Apex Chart -->
	
	<script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>
	<script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	

	<!-- Vectormap -->
    <script src="vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="js/demo.js"></script>

	
	
	
</body>
</html>







<?php
// update truck owner

if(isset($_POST['update'])){

$truck_unload=$_POST['truck_unload'];


$truck_route_id=$_POST['truck_route_id'];


$status=$_POST['status'];

$query1="UPDATE truck_unload_point set  truck_unload_point='$truck_unload',truck_route_id='$truck_route_id',status='$status' where unload_id='$get_id'";

$smtp1=$conn->prepare($query1);

if($smtp1->execute()){
     echo "<script>alert('Updated!!');</script>";
	echo "<script>window.location='truck_unload.php'</script>";
}

}
?>

 