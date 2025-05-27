<?php include('include/connection.php');
session_start();
if(!empty($_SESSION['log-admin'])) {
header('location:index.php');
}
?>
 <?php
if(isset($_POST['login'])){
 $uname=$_POST['uname'];
 $upass=$_POST['password'];

$query="SELECT * FROM login WHERE (username='$uname' or email='$uname')  and password='$upass'";
  $stmt=$conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetch();
  $admin_name=$result['username'];
  if($stmt->rowCount() > 0){
    echo "<script>window.location='index.php'</script>";

    $_SESSION['log-admin']=$uname;
    $_SESSION['admin-name']=$admin_name;
    
  }
  else{
    echo "<script>alert('Username or Password did not match Please try again');</script>";
    echo "<script>window.location='login.php'</script>";
  }
}
?> 
<!DOCTYPE html>
<html lang="en" class="h-100">



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
	<title>login</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
	<div class="page-wraper">

		<!-- Content -->
		<div class="browse-job login-style3">
			<!-- Coming Soon -->
			<div class="bg-img-fix overflow-hidden" style="background:#fff url(images/background/bg6.jpg); background-repeat: no-repeat; background-size:100% ; height: 100vh;">
				<div class="row gx-0">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
						<div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 653px;" tabindex="0">
							<div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
								<div class="login-form style-2">
									
									
									<div class="card-body">
										<div class="logo-header">
											<img src="images/logo/logo-full.png" alt="" class="width-230 light-logo">
											<img src="images/logo/logofull-white.png" alt="" class="width-230 dark-logo">
										</div>
									
										<nav>
											<div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
												
										<div class="tab-content w-100" id="nav-tabContent">
										  <div class="tab-pane fade show active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">
											<form action="" method="POST" class=" dz-form pb-3">
													<h3 class="form-title m-t0">Admin Panel</h3>
													<div class="dz-separator-outer m-b5">
														<div class="dz-separator bg-primary style-liner"></div>
													</div>
													<p>Enter your username or email and password </p>
													<div class="form-group mb-3" >
														<input type="text" name="uname" class="form-control" value="" placeholder="enter username or email" >
													</div>
													<div class="form-group mb-3">
														<input type="password" name="password" class="form-control" placeholder="Password">
													</div>
													<div class="text-center bottom"> 
													<button class="btn btn-primary button-md btn-block" id="nav-sign-tab" data-bs-toggle="tab" data-bs-target="#nav-sign" type="submit" name="login" role="tab" aria-controls="nav-sign" aria-selected="false">Log in</button> 
													
												</div>
													
													
												</form>
												
										  </div>
										  
												
												
											</form>
										  </div>
										  
										</div>
										
										</div>
									</nav>
									</div>
										
											
								</div>
							</div>
							<div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;">
								<div class="mCSB_draggerContainer">
								<div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
								<div class="mCSB_dragger_bar" style="line-height: 0px;"></div><div class="mCSB_draggerRail"></div></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Full Blog Page Contant -->
		</div>
		<!-- Content END-->
	</div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="js/deznav-init.js"></script>
 <script src="js/custom.js"></script>
<script src="js/demo.js"></script>
</body>

</html>
 
 
