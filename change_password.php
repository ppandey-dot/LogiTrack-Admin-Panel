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
     $username=$result['username'];
     
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
				<li class="breadcrumb-item"><a href="index.php">
						<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						Home </a>
					</li>				
			</div>
			<div class="container-fluid">
				<div class="col-xl-6  ">
                        <div class="card">
                            <div class="card-header" >
                                <h4 class="card-title">CHANGE PASSWORD</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">


                                        <div class="row" >
                                         <form  action="" id="submit-form" method="post">
                                    	 <div id="error" style="font-size: 18px;text-align: center;padding: 10px 0px;"></div>
                                           
                                            <div class="mb-3">
                                                <label class="form-label"></label>
                                                <input name="oldmail" id="oldmail" type="text" class="form-control" placeholder="old password">
                                            </div>
                                             <div class="mb-3 ">
                                                <label class="form-label"></label>
                                                <input name="newpass" id="newpass" type="text" class="form-control" placeholder="new password">
                                            </div>
                                             <div class="mb-3 ">
                                                <label class="form-label"></label>
                                                <input name="confirm" id="confirm" type="text" class="form-control" placeholder="confirm">
                                            </div>
                                        <button class= "btn btn-primary btn-block account-btn" name="btn-save" id="btn-submit"  type="submit">Change Password</button>
                                        </form>
                                   
                                          </div>

                                </div>
                            </div>
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

	    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/validation-min.js"></script>

	
	
	
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#submit-form').validate({
      rules:
          {
            oldmail :{
                required: true,
                     },
            newpass :{
                required: true,
                minlength: 8,
                maxlength: 15
                     },
            confirm :{
               required: true,
               equalTo: '#newpass' 
                    }
          },
      messages :
          {
            oldmail : "Please Enter old password",
            newpass :{
                required: "please provide new password",
                minlength: "password at least have 8 characters"
                   },
            confirm:
                   {
                required: "please confirm password",
                equalTo: "password doesn't match !"
                    }
          },
      submitHandler: submitForm
    });
/* handle form submit */
function submitForm(){

var data = $("#submit-form").serialize();
$.ajax({
type : 'POST',
url : 'update_password.php',
data : data,
success: function(data){
   $("form").trigger("reset");
   $('#error').fadeIn().html(data);
   setTimeOut(function(){
      $('#error').fadeOut('slow');
   },2000);
}
});
}
return false;
  });
</script>