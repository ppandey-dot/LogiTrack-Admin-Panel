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
$query2="SELECT * from truck_booking where booking_id='$get_id'";
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
					<li><h5 class="bc-title">Edit Truck Booking </h5></li>
					
				</ol>
				
			</div>

			<div class="container-fluid">
				<div class="row">
							  
			<div class="col-xl-6 col-lg-12">
			  <div class="card">
			  	
				<div class="card-header">
                                <h4 class="card-title">Edit Truck Booking </h4>
                            </div>
				
			  
			  <div class="card-body">
                                <div class="basic-form">
			  <form action="" method="POST" enctype="multipart/form-data">
			              <div class="col-md-12 mb-3" >
			               <label class="form-label">Booking Date</label>
							<input value="<?php echo $result2['booking_date'];?>" type="date" name="booking_date" class="form-control" placeholder="" >
						
                            </div>
                            <div class="col-xl-12 mb-3">
							<label for="exampleFormControlInput2" class="form-label">Bilty Number</label>
							<input type="text" value="<?php echo $result2['bilty_no'];?>"  name="bilty_no" class="form-control " placeholder="">
						</div>
                            
                              <div class="col-md-12 mb-3">
							
							<label class="control-label">Truck Route</label>
										<select name="booking_route_id" class="form-control" required="required" onchange="myfunn(this.value),myfunn2(this.value)">
											       <?php 
					$tRouteID=$result2['booking_route_id'];
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


							   <?php 
				           	$tOwnerID=$result2['booking_loading_point_id'];
                            $queryw="SELECT * from truck_load_point where load_id='$tOwnerID'";
                            $smtpw=$conn->prepare($queryw);
                            $smtpw->execute();
                            $resultw=$smtpw->fetch()
                            ?>

								       
										<label class="control-label">Truck Loading Point</label>
										<select name="booking_loading_point_id"
										 class="form-control dataload"
										 required="required" >
											<option value="<?php echo $resultw['load_id'];?>"><?php echo $resultw['truck_load_point'];?></option>
											</select>
										
									</div>
						<div class="col-md-12 mb-3">
								        <?php 
				           	$tOwnerID=$result2['booking_unloading_point_id'];
                            $queryw="SELECT * from truck_unload_point where unload_id='$tOwnerID'";
                            $smtpw=$conn->prepare($queryw);
                            $smtpw->execute();
                            $resultw=$smtpw->fetch()
                            ?>
										<label class="control-label">Truck Unload Point</label>
										<select name="booking_unloading_point_id" class="form-control dataload2" required="required">
											<option value="<?php echo $resultw['unload_id'];?>"><?php echo $resultw['truck_unload_point'];?></option>
									

									
										</select>
										
									</div>
                         

							
						<!-- 	<div class="col-xl-12 mb-3">
							<label for="exampleFormControlInput2" class="form-label">Weight(Kg)</label>
							<input value="<?php echo $result2['booking_weight'];?>" type="number" id="Weight_id" name="booking_weight" class="form-control " required="required" onchange="myfunn3(this.value),myfunns(this.value), myfunn5(this.value)"  placeholder=""  >
						</div> -->


<!-- 
                           	<div class="col-xl-12 mb-3">
							<label  for="exampleFormControlInput2" class="form-label">Booking Fare</label>
							<input value="<?php echo $result2['booking_fare'];?>"type="number" id="fare_id" name="booking_fare" class="form-control dataload3  " readonly="readonly" placeholder="">
						</div> -->



                            
                       
						<!-- 
                            <?php 
					
                           $queryw="SELECT * from gst where gst_id='1'";
                            $smtpw=$conn->prepare($queryw);
                               $smtpw->execute();
                                    $resultw=$smtpw->fetch()
                                         ?>
						 -->
						<!-- 	<input value="<?php echo $resultw['gst_percentage'];?>" type="hidden" id="gst_id"  name="gst_p" class="form-control" readonly=readonly     placeholder="">
					
						
						<div class="col-xl-6 mb-3">
							
							<input value="<?php echo $result2['gst_amount'];?>"type="hidden" name="gst_amount" class="form-control dataload5"  placeholder="" readonly="readonly">
						</div> -->



                              <div class="col-md-12 mb-3">
							
							<label class="control-label">Truck Number</label>
										<select name="booking_truck_id" class="form-control" required="required">

                                       <?php 
					$tOwnerID=$result2['booking_truck_id'];
                 $queryw="SELECT * from truck where truck_id_number='$tOwnerID'";
                 $smtpw=$conn->prepare($queryw);
                 $smtpw->execute();
                 $resultw=$smtpw->fetch()
                 ?>
					
						<option  value="<?php echo $resultw['truck_id_number'];?>"><?php echo $resultw['truck_number'];?></option>




											<option value="">--Select Truck No.--</option>
											<?php 
                 $query="SELECT * from truck where truck_status='Active'";
                 $smtp=$conn->prepare($query);
                 $smtp->execute();
                 ?>

                 <?php while($result=$smtp->fetch()){?>

											<option value="<?php echo $result['truck_id_number'];?>" ><?php echo $result['truck_number'];?></option>
											<?php }?>
										</select>
						</div>

						 <div class="col-md-12 mb-3">
							
							<label class="control-label">Truck driver</label>
										<select name="booking_driver_id" class="form-control" required="required" onchange="myfunns6(this.value)">

                                       <?php 
					$tOwnerID=$result2['booking_driver_id'];
                 $queryw="SELECT * from truck_driver where driver_id='$tOwnerID'";
                 $smtpw=$conn->prepare($queryw);
                 $smtpw->execute();
                 $resultw=$smtpw->fetch()
                 ?>
					
						<option  value="<?php echo $resultw['driver_id'];?>"><?php echo $resultw['driver_name'];?></option>




											<option value="">--Select Truck Driver--</option>
											<?php 
                 $query="SELECT * from truck_driver where driver_status='Active'";
                 $smtp=$conn->prepare($query);
                 $smtp->execute();
                 ?>

                 <?php while($result=$smtp->fetch()){?>

											<option value="<?php echo $result['driver_id'];?>" ><?php echo $result['driver_name'];?></option>
											<?php }?>
										</select>
						</div>

                      
                            


						 <div class="col-md-12 mb-3">
							
							<label class="control-label">Truck Owner</label>
										<select name="booking_truck_owner_id" class="form-control" required="required">

                                       <?php 
					$tOwnerID=$result2['booking_truck_owner_id'];
                 $queryw="SELECT * from truck_owner where truck_owner_id='$tOwnerID'";
                 $smtpw=$conn->prepare($queryw);
                 $smtpw->execute();
                 $resultw=$smtpw->fetch()
                 ?>
					
						<option  value="<?php echo $resultw['truck_owner_id'];?>"><?php echo $resultw['truck_owner_name'];?></option>




											<option value="">--Select Truck Owner--</option>
											<?php 
                 $query="SELECT * from truck_owner where truck_owner_status='Active'";
                 $smtp=$conn->prepare($query);
                 $smtp->execute();
                 ?>

                 <?php while($result=$smtp->fetch()){?>

											<option value="<?php echo $result['truck_owner_id'];?>" ><?php echo $result['truck_owner_name'];?></option>
											<?php }?>
										</select>
						</div>

	                <div class="col-md-12 mb-3">
							
							<label class="control-label">Party</label>
										<select name="booking_party_name" class="form-control" required="required">

                                       <?php 
					$tOwnerID=$result2['booking_party_name'];
                 $queryw="SELECT * from party where party_id='$tOwnerID'";
                 $smtpw=$conn->prepare($queryw);
                 $smtpw->execute();
                 $resultw=$smtpw->fetch()
                 ?>
					
						<option  value="<?php echo $resultw['party_id'];?>"><?php echo $resultw['name'];?></option>




											<option value="">--Select Party--</option>
											<?php 
                 $query="SELECT * from party where status='Active'";
                 $smtp=$conn->prepare($query);
                 $smtp->execute();
                 ?>

                 <?php while($result=$smtp->fetch()){?>

											<option value="<?php echo $result['party_id'];?>" ><?php echo $result['name'];?></option>
											<?php }?>
										</select>
						</div>

						 



						 

					

						


                            <div class="col-md-12 mb-3" >
							<label class="form-label"> Booking Unloading Sort Weight</label>
							<input type="text" name="booking_unloading_short_weight" class="form-control" placeholder=""value ="<?php echo $result2['booking_unloading_short_weight'];?>">
                            </div>


						 <div class="col-md-12 mb-3" >
							<label class="form-label"> Booking Unloading Sort Amount</label>
							<input type="text" name="booking_unloading_short_amount" class="form-control" placeholder=""value ="<?php echo $result2['booking_unloading_short_amount'];?>">
                            </div>

                           <div class="col-md-12 mb-3">
										<label class="control-label">Status</label>
										<select name="booking_status"  class="form-control" required="required">
											<option value="">--Select Status--</option>
											<option value="Booked" <?php if($result2['booking_status']=='Booked'){echo "selected";} ?>>Booked</option>
											<option value="Departure" <?php if($result2['booking_status']=='Departure') {echo "selected";} ?>>Departure</option>
											<option value="Arrived" <?php if($result2['booking_status']=='Arrived') {echo "selected";} ?>>Arrived</option>
											<option value="Completed" <?php if($result2['booking_status']=='Completed') {echo "selected";} ?>>Completed</option>
										</select>
										</div>
										<div class="col-md-12 mb-3">
										
				<button type="submit" name="update" class="btn btn-primary">Update Truck Booking</button></div>
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
<script type="text/javascript">
  function myfunn(valuedata){
   $.ajax({
         url:'select_load.php', 
         method:'post',
         data: {datapost:valuedata},
         success : function(result){
            $('.dataload').html(result);
         }
     });
    }
</script>
<script type="text/javascript">
  function myfunn2(valuedata){
   $.ajax({
         url:'select_unload.php', 
         method:'post',
         data: {datapost:valuedata},
         success : function(result){
            $('.dataload2').html(result);
         }
     });
    }
</script>

<script type="text/javascript">
  function myfunns(valuedata){
   $.ajax({
         url:'select_unit.php', 
         method:'post',
         data: {datapost:valuedata},
         success : function(result){
            $('.dataloads').val(result);
         }
     });
    }
</script>

<script type="text/javascript">
  function myfunn3(valuedata){
  	let gst_id = document.getElementById('gst_id').value
  	
  	alert()
     $.ajax({
         url:'select_fare.php', 
         method:'post',
         data: {datapost:valuedata,
                datapost3:gst_id,
                datapost4:advance_id},
         success : function(result){
            $('.dataload3').val(result);
         }
     });
    }
</script>

<script type="text/javascript">
  function myfunn4(valuedata){
  	let fare_id = document.getElementById('fare_id').value
  	let gst_id = document.getElementById('gst_id').value
  	let Weight_id = document.getElementById('Weight_id').value
        
  	     $.ajax({
         url:'select_advance.php', 
         method:'post',
         data: {datapost:fare_id,
                datapost2:valuedata,
                datapost3:gst_id,
                datapost4:Weight_id},
         success : function(result){
            $('.dataload4').val(result);
         }
     });
    }
</script>

<script type="text/javascript">
  function myfunn5(valuedata){
  	let fare_id = document.getElementById('fare_id').value
  	let gst_id = document.getElementById('gst_id').value
  	let Weight_id = document.getElementById('Weight_id').value
        
  	     $.ajax({
         url:'select_gst.php', 
         method:'post',
         data: {datapost:fare_id,
                datapost2:valuedata,
                datapost3:gst_id,
                datapost4:Weight_id},
         success : function(result){
            $('.dataload5').val(result);
         }
     });
    }
</script>
<script type="text/javascript">
  function myfunns6(valuedata){
   $.ajax({
         url:'select_driver.php', 
         method:'post',
         data: {datapost:valuedata},
         success : function(result){
            $('.dataloads6').val(result);
         }
     });
    }
</script>






<?php
// update truck owner

if(isset($_POST['update'])){
$bilty_no=$_POST['bilty_no'];
$booking_date=$_POST['booking_date'];
$booking_route_id=$_POST['booking_route_id'];
// $booking_weight=$_POST['booking_weight'];
// $booking_fare=$_POST['booking_fare'];

$booking_truck_id=$_POST['booking_truck_id'];
$booking_driver_id=$_POST['booking_driver_id'];
$booking_truck_owner_id=$_POST['booking_truck_owner_id'];
$booking_party_name=$_POST['booking_party_name'];
$booking_loading_point_id=$_POST['booking_loading_point_id'];
$booking_unloading_point_id=$_POST['booking_unloading_point_id'];
$booking_unloading_short_weight=$_POST['booking_unloading_short_weight'];
$booking_unloading_short_amount=$_POST['booking_unloading_short_amount'];
$booking_status=$_POST['booking_status'];




    




$query1="UPDATE truck_booking set booking_date='$booking_date', booking_route_id='$booking_route_id',booking_weight='$booking_weight',booking_fare='$booking_fare',booking_truck_id='$booking_truck_id', booking_driver_id='$booking_driver_id',	booking_truck_owner_id='$booking_truck_owner_id', booking_party_name='$booking_party_name',booking_loading_point_id='$booking_loading_point_id',booking_unloading_point_id='$booking_unloading_point_id',booking_unloading_short_weight='$booking_unloading_short_weight',booking_unloading_short_amount='$booking_unloading_short_amount',booking_status='$booking_status',bilty_no='$bilty_no'  where booking_id='$get_id'";

$smtp1=$conn->prepare($query1);
if($smtp1->execute()){
	 echo "<script>alert('Updated!!');</script>";
	echo "<script>window.location='truck_booking.php'</script>";
}

}
?>

 