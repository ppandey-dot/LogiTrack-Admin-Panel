<?php
include('include/connection.php');
session_start();
if(!isset($_SESSION['log-admin'])) {
    header('location: login.php');
} else {
}


$query="SELECT * FROM login WHERE id='1'";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
  

//edit and update query
   if(isset($_POST['update'])){
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    
 if($_FILES['pic']['name']==''){
    $unique_image=$result['img'];
      
  }
  else
  {
    $file_name = $_FILES['pic']['name'];
    $file_size = $_FILES['pic']['size'];
    $file_temp = $_FILES['pic']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $profile = "images/".$unique_image;

    move_uploaded_file($file_temp, $profile);
}   
    
   $update_query = "UPDATE login SET username='$uname',email='$email', img='$unique_image' WHERE id='1'";
if ($conn->query($update_query)) {
   header('location:admin-profile.php');
}else{
  echo "<script type= 'text/javascript'>alert('Data Not Successfully Updated. Please Try Again!!);</script>";
}
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
					<li><h5 class="bc-title">Edit Admin Profile</h5></li>
					
				</ol>
				
			</div>

			<div class="container-fluid">
				<div class="row">
							  
			<div class="col-xl-6 col-lg-12">
			  <div class="card">
			  	
				<div class="card-header">
                                <h4 class="card-title">Edit Admin Profile</h4>
                            </div>
				
			  
			  <div class="card-body">
                                <div class="basic-form">
			  <form action="" method="POST" enctype="multipart/form-data">
                   <div  class=" col-md-12 mb-3">
			  	 <label class="form-label">User Name*</label>
			    <input class="form-control" type="text" name="uname" required="required" value="<?php echo $result['username'];?>" />
                       </div>

                       <div  class=" col-md-12 mb-3">
                        <label class="foem_label">E-mail*</label>
                          
                        <input class="form-control" type="email" name="email"  required="required" value="<?php echo $result['email'];?>"/>
                          
                          </div>
                         <div  class=" col-md-12 mb-3">
                          <label class="form-label">Profile Picture*</label>
                          <img src="images/<?php echo $result['img'];?>" style="width:400px;"><br><br>
                        <input type="file" name="pic"  style="margin-bottom:10px;">
                        </div>
                        
                
            
                         
                     
                     <button class="btn btn-secondary "><a href='admin-profile.php' style="color:white;">Back</a></button>
                     <button class="btn btn-primary mr-2  " type="submit" name="update">Update</button>

			            
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