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
$query2="SELECT * from truck_driver where driver_id='$get_id'";
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
	<meta name="format-detection" content="telemobile=no">
	
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
					<li><h5 class="bc-title">Edit Truck Driver</h5></li>
					
				</ol>
				
			</div>

			<div class="container-fluid">
				<div class="row">
							  
			<div class="col-xl-6 col-lg-12">
			  <div class="card">
			  	
				<div class="card-header">
                                <h4 class="card-title">Edit Truck Driver</h4>
                            </div>
				
			  
			  <div class="card-body">
                                <div class="basic-form">
			  <form action="" method="POST" enctype="multipart/form-data">
			                 <div class="col-md-12 mb-3" >
			               <label class="form-label">Driver Name</label>
							<input value="<?php echo $result2['driver_name'];?>" type="text" name="driver_name" class="form-control" placeholder="" >
						</div>
						 <div class="col-md-12 mb-3">
							<label class="form-label mt-3">Mobile</label>
							<input value="<?php echo $result2['driver_mobile']; ?>" class="form-control" type="number" name="driver_mobile" >
						</div>

							
							<div class="col-md-12 mb-3" >
							<label class="form-label"> Address<span class="text-danger">*</span></label>
							<textarea  type="text" name="driver_address" class="form-control" placeholder="" ><?php echo $result2['driver_address'];?></textarea>
                            </div>

                             <div class="col-md-12 mb-3">
							<label class="form-label mt-3">Identity No.</label>
							<input value="<?php echo $result2['identity_number']; ?>" class="form-control" type="text" name="identity_number" >
						</div>
						<div class="col-md-12 mb-3">
							<label class="form-label mt-3">Driving Licence</label>
							<input value="<?php echo $result2['dl']; ?>" class="form-control" type="text" name="dl" >
						</div>

                              <div class="col-md-12 mb-3">
							<label class="form-label">Identity/img</label>


                              
							<input value="<?php echo $result2['driver_identity'];?>"  type="file" name="image" class="form-control" style="margin-bottom:10px;" 
                              >
                               	<?php 
								if($result2['driver_identity']==''){
									echo '';
								}else{?>
								<img  src="images/<?php echo $result2['driver_identity'];?>" width="400px;" >

								<?php } ?>

                          </div>

							
					
						     

						 <div class="col-md-12 mb-3">
							<label class="form-label">Photo<span class="text-danger">*</span></label>


                              
							<input value="<?php echo $result2['driver_photo'];?>"  type="file" name="img" class="form-control" style="margin-bottom:10px;" 
                              >
                               	<?php 
								if($result2['driver_photo']==''){
									echo '';
								}else{?>
								<img  src="images/<?php echo $result2['driver_photo'];?>" width="400px;" >

								<?php } ?>

                          </div>

						     

							<div class="col-md-12 mb-3">
										<label class="control-label">Status</label>
										<select name="status"  class="form-control" required="required">
											<option value="">--Select Status--</option>
											<option value="Active" <?php if($result2['driver_status']=='Active'){echo "selected";} ?>>Active</option>
											<option value="Inactive" <?php if($result2['driver_status']=='Inactive') {echo "selected";} ?>>Inactive</option>
										</select>
										</div>
										<div class="col-md-12 mb-3">
										<!--<button type="button" class="btn btn-danger light" data-bs-dismiss="">Close</button>-->
				<button type="submit" name="update" class="btn btn-primary">Update driver</button></div>
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
// update truck driver

if(isset($_POST['update'])){

$name=$_POST['driver_name'];
$address=$_POST['driver_address'];

$mobile=$_POST['driver_mobile'];
$identity=$_POST['identity_number'];
$dl=$_POST['dl'];


$status=$_POST['status'];


    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $profile = "images/".$unique_image;

    move_uploaded_file($file_temp, $profile);

if($file_name == ''){
	$unique_image=$result2['driver_identity'];
}



$file_name = $_FILES['img']['name'];
    $file_size = $_FILES['img']['size'];
    $file_temp = $_FILES['img']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
    $profile = "images/".$unique_img;

    move_uploaded_file($file_temp, $profile);

if($file_name == ''){
	$unique_img=$result2['driver_photo'];
}

$query1="UPDATE truck_driver set driver_name='$name', driver_address='$address',driver_identity='$unique_image',driver_mobile='$mobile',driver_photo='$unique_img',driver_status='$status',identity_number='$identity', dl='$dl' where driver_id='$get_id'";

$smtp1=$conn->prepare($query1);
if($smtp1->execute()){
	 echo "<script>alert('Updated!!');</script>";
	echo "<script>window.location='truck_driver.php'</script>";
}

}
?>

 