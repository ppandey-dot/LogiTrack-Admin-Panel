<?php
include('include/connection.php');
session_start();
if(!isset($_SESSION['log-admin'])) {
    header('location: login.php');
} else {
}
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
					<li><i class="fa fa-home fa-1x text-primary"> </i></li>
					<li><h5 class="bc-title p-2 text-primary"> <b>Dashboard</b></h5></li>

					
				</ol>
				
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fa fa-user fa-2x text-primary"> </i>
									</div>
									<div class="total-projects ms-3">

										  <?php
            $querys="SELECT * FROM truck_owner where truck_owner_status='Active'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_owner=$stmts->rowCount();
           ?>
										<h3 class="text-primary count text-primary"><?php echo $nums_owner;?></h3> 
										<a href="truck_owner.php"><b> Owner</b> </a>
									</div>
								</div>
							</div>
						</div>
					</div>
							<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fa fa-user-circle fa-2x text-primary"> </i>
									</div>
									<div class="total-projects ms-3">

										  <?php
            $querys="SELECT * FROM truck_driver where driver_status='Active'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_driver=$stmts->rowCount();
           ?>
										<h3 class="text-primary count text-primary"><?php echo $nums_driver;?></h3> 
										<a href="truck_driver.php"><b> Driver</b></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fa fa-location-arrow fa-2x text-primary"> </i>
									</div>
									<div class="total-projects ms-3">

										 <?php
            $querys="SELECT * FROM truck_route where route_status='Active'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_route=$stmts->rowCount();
           ?>
										<h3 class="text-dark count text-primary"><?php echo $nums_route;?></h3> 
										<a href="truck_route.php"><b> Route</b></a>
									</div>
								</div>
							</div>
						</div>
					</div>
							<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fa fa-weight-scale fa-2x text-primary"> </i>
									</div>
									<div class="total-projects ms-3">

										 <?php
            $querys="SELECT * FROM truck_unit where unit_status='Active'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_unit=$stmts->rowCount();
           ?>
										<h3 class="text-dark count text-primary"><?php echo $nums_unit;?></h3> 
										<a href="truck_unit.php"><b> Unit</b></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fa fa-truck fa-2x text-primary"> </i>

									</div>
									<div class="total-projects ms-3">

										 <?php
            $querys="SELECT * FROM truck where truck_status='Active'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_truck=$stmts->rowCount();
           ?>
										<h3 class="text-dark count text-primary"><?php echo $nums_truck;?></h3> 
										<a href="truck.php"><b> Truck</b></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fas fa-truck-loading fa-2x text-primary"> </i>

									</div>
									<div class="total-projects ms-3">

										 <?php
            $querys="SELECT * FROM truck_load_point where status='Active'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_load=$stmts->rowCount();
           ?>
										<h3 class="text-dark count text-primary"><?php echo $nums_load;?></h3> 
										<a href="truck_load.php"><b> Truck Load Point</b></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fas fa-truck-loading fa-2x text-primary"> </i>

									</div>
									<div class="total-projects ms-3">

										 <?php
            $querys="SELECT * FROM truck_unload_point where status='Active'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_unload=$stmts->rowCount();
           ?>
										<h3 class="text-tark count text-primary"><?php echo $nums_unload;?></h3> 
										<a href="truck_unload.php"><b> Truck Unload Point</b></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fa fa-clone fa-2x text-primary"> </i>

									</div>
									<div class="total-projects ms-3 ">

										 <?php
            $querys="SELECT * FROM truck_booking where booking_status='Booked'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_booking=$stmts->rowCount();
           ?>
										<h3 class="text-tark count text-primary"><?php echo $nums_booking;?></h3> 
										<a href="truck_booking.php"><b>  Booked</b></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<i class="fa fa-user-secret fa-2x text-primary"> </i>

									</div>
									<div class="total-projects ms-3 ">

										 <?php
            $querys="SELECT * FROM party where status='Active'";
            $stmts=$conn->prepare($querys);
            $stmts->execute();
            $nums_party=$stmts->rowCount();
           ?>
										<h3 class="text-tark count text-primary"><?php echo $nums_party;?></h3> 
										<a href="party.php"><b> Party</b></a>
									</div>
								</div>
							</div>
						</div>
					</div>
						<!--<div class="col-xl-3 col-sm-6">-->
						<!--<div class="card box-hover">-->
						<!--	<div class="card-body">-->
						<!--		<div class="d-flex align-items-center">-->
						<!--			<div class="">-->
						<!--				<i class="fa fa-truck-fast fa-2x text-primary"> </i>-->

						<!--			</div>-->
						<!--			<div class="total-projects ms-3">-->

								 <?php
        //     $querys="SELECT * FROM truck_booking where booking_status='Departure'";
        //     $stmts=$conn->prepare($querys);
        //     $stmts->execute();
        //     $nums_booking=$stmts->rowCount();
        //   ?>
					<!--					<h3 class="text-dark count text-primary"><?php echo $nums_booking;?></h3> -->
					<!--					<a href="truck_booking.php"><b> Departure</b></a>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					<!--<div class="col-xl-3 col-sm-6">-->
					<!--	<div class="card box-hover">-->
					<!--		<div class="card-body">-->
					<!--			<div class="d-flex align-items-center">-->
					<!--				<div class="">-->
					<!--					<i class="fa fa-truck-front fa-2x text-primary"> </i>-->

					<!--				</div>-->
					<!--				<div class="total-projects ms-3">-->

									 <?php
        //     $querys="SELECT * FROM truck_booking where booking_status='Arrived'";
        //     $stmts=$conn->prepare($querys);
        //     $stmts->execute();
        //     $nums_booking=$stmts->rowCount();
        //   ?>
					<!--					<h3 class="text-dark count text-primary"><?php echo $nums_booking;?></h3> -->
					<!--					<a href="truck_booking.php"><b> Arrived</b></a>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					<!--<div class="col-xl-3 col-sm-6">-->
					<!--	<div class="card box-hover">-->
					<!--		<div class="card-body">-->
					<!--			<div class="d-flex align-items-center">-->
					<!--				<div class="">-->
					<!--					<i class="fa fa-check-circle fa-2x text-primary"> </i>-->

					<!--				</div>-->
					<!--				<div class="total-projects ms-3">-->

								 		<?php
        //     $querys="SELECT * FROM truck_booking where booking_status='Completed'";
        //     $stmts=$conn->prepare($querys);
        //     $stmts->execute();
        //     $nums_booking=$stmts->rowCount();
        //   ?>
										<!--<h3 class="text-dark count text-primary"><?php echo $nums_booking;?></h3> -->
					<!--					<a href="truck_booking.php"><b> Booking Completed</b></a>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					
					
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


	</div>
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