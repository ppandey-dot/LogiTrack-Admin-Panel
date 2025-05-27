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
	<title>Truck Owner</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="../../cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
	<link href="vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	
	<!-- tagify-css -->
	<link href="vendor/tagify/dist/tagify.css" rel="stylesheet">
	
	<!-- Style css -->
    <link href="css/style.css" rel="stylesheet">


	
</head>
<body>

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
            Header start
        ***********************************-->
		<?php include("include/header.php");?>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

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
					<li><h5 class="bc-title">Party</h5>
					</li>
					</ol>
					<div>
                   <a class="btn btn-primary btn-m" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"> Add Party </a>
                              </div>					
				
			</div>
			<div class="container-fluid">
				<div class="row">
				  
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive active-projects style-1">
								
									<table id="example" class="table" style="width:100%;background: white;" >
										<thead>
											<tr>
												<th style="display: none;">xyz</th>
												<th>S.No</th>
												<th>Party Name</th>
												<th>Phone</th>
												<th>Email</th>
												
												<th>Identity No.</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
		<?php 
                 $query="SELECT * from party";
                 $smtp=$conn->prepare($query);
                 $smtp->execute();
                 $row_active =$smtp->rowCount();
                    $count=1;
                 ?>
               
                 <?php while($result=$smtp->fetch()){?>
						<tr>
							<td style="display: none;"><span><?php echo $result['party_id'];?></span></td>
						<td><span><?php echo $count;;?></span></td>
						<td><span><?php echo $result['name'];?></span></td>
						
						
						<td><span><?php echo $result['phone'];?></span></td>
						<td><span><?php echo $result['email'];?></span></td>
						<td><span><?php echo $result['identity_no'];?></span></td>
						
						<?php if($result['status'] =='Active'){?>
							<td><span class="badge badge-success light border-0">Active</span></td>
						<?php } else{ ?>
		                <td><span class="badge badge-danger light border-0">Inactive</span></td>
                        <?php } ?>
                          <!-- edit -->
		                <td>
                              <a class="btn btn-primary  btn-sm" href="view_party.php?id=<?php echo $result['party_id'];?>">  <i class="fa fa-eye m-r-5"></i> </a>
		                	
		                	<a class="btn btn-secondary  btn-sm" href="edit_party.php?id=<?php echo $result['party_id'];?>"> <i class="fa fa-pencil m-r-5"></i> </a>
                                                      <!-- delete -->
                       
                        <a class="btn btn-danger deletebtn btn-sm" data-bs-toggle="modal"   role="button" > <i class="fa fa-trash m-r-5"></i> </a>


                     </td>
												
											</tr>
										<?php  $count++;}?>
										</tbody>
										
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			 
			</div>
				
        </div>
					
        <!--**********************************
            Content body end
        ***********************************-->
		
		
		
        <!--**********************************
            Footer start
        ***********************************-->
      <?php include("include/footer.php");?>

        <!--**********************************
            Footer end
        ***********************************-->

        
		<div class="modal fade" id="delete-model" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-center">
			<div class="modal-content">
			  <div class="modal-header">
			  	
				<h1 class="modal-title fs-5 text-danger" id="exampleModalLabel2">
             If you delete this data it may affect database make sure there is no entry with this record.
				<div class="text-primary">Are you sure want to delete?</div></h1>
             </div>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="party_id" class="form-control" placeholder="" id="delete_id">
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="delete" class="btn btn-primary">Delete</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		<div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample">
		  <div class="offcanvas-header">
		  <h5 class="modal-title" id="#gridSystemModal">Add Party</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
				<i class="fa-solid fa-xmark"></i>
			</button>
		  </div>
		  <div class="offcanvas-body">
			<div class="container-fluid">
				
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						
						<div class="col-xl-6 mb-3">
							<label for="exampleFormControlInput2" class="form-label">Party Name<span class="text-danger">*</span></label>
							<input type="text" name="name" class="form-control"  placeholder="" required=required>
						</div>	
						<div class="col-xl-6 mb-3">
							<label for="exampleFormControlInput3" class="form-label">Phone<span class="text-danger">*</span></label>
							<input type="number" name="phone" class="form-control" placeholder="" required=required>
						</div>

						<div class="col-xl-6 mb-3">
							<label for="exampleFormControlInput2" class="form-label">Email</label>
							<input type="email" name="email" class="form-control"  placeholder="">
						</div>

						<div class="col-xl-6 mb-3">
							<label for="exampleFormControlInput2" class="form-label">Identity No.</label>
							<input type="text" name="identity_no" class="form-control"  placeholder="">
						</div>	 
						<div class="col-xl-6 mb-3">
							<label for="exampleFormControlInput2" class="form-label">Address</label>
							<textarea type="text" name="address" class="form-control"  placeholder=""></textarea> 
						</div>

						<div class="col-xl-6 mb-3">
							<label for="exampleFormControlInput2" class="form-label">Identity/img</label>
							<input type="file" name="image" class="form-control" value="" style="";>
						</div>	
						<div class="col-md-6 mb-3">
										<label class="control-label">Status</label>
										<select name="status" class="form-control" required="required">
											<option value="">--Select Status--</option>
											<option value="Active">Active</option>
											<option value="Inactive">Inactive</option>
										</select>
										
									</div>

						
					
					
					
					<div>
						<button class="btn btn-primary me-1 " type="submit" name="submit">Add Party</button>
						<button class="btn btn-danger light ms-1">back</button>
					</div>
				</form>
			  </div>
		  </div>
		</div>	



		





		
		

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
	 
	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/js/dataTables.buttons.min.js"></script>
	
	<script src="vendor/datatables/js/jszip.min.js"></script>
	<script src="js/plugins-init/datatables.init.js"></script>
   
	<!-- Apex Chart -->
    <script src="js/custom.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="js/demo.js"></script>
    
	
	<!-- tagify -->
	<script src="vendor/tagify/dist/tagify.js"></script>
	
	
	
</body>


</html>


<?php



// add truck owner
if(isset($_POST['submit'])){

echo $name=$_POST['name'];
echo $address=$_POST['address'];
echo $identity_no=$_POST['identity_no'];
echo $phone=$_POST['phone'];
echo $email=$_POST['email'];
$file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $profile = "images/".$unique_image;

    move_uploaded_file($file_temp, $profile);
      if($file_name == ''){
	$unique_image="";
}
echo $status=$_POST['status'];


 $query2="INSERT into party(name,address,identity_no, identity, phone, email, status) values('$name','$address','$identity_no','$unique_image','$phone','$email','$status')";

$smtp2=$conn->prepare($query2);
if($smtp2->execute()){
	echo "<script>alert(' Successfully Added!!');</script>";
	echo "<script>window.location='party.php'</script>";
}
else{
	
}

}

?>



<script type="text/javascript">
        $(document).ready(function(){
          $('.deletebtn').on('click',function(){
            $('#delete-model').modal('show');
             
             $tr=$(this).closest('tr');
             var data=$tr.children("td").map(function(){
               return $(this).text();
             }).get();
             console.log(data);
             $('#delete_id').val(data[0]);
          });
        });
    </script>

<?php
// delete truck route
if(isset($_POST['delete'])){
$id=$_POST['party_id'];
$query4="DELETE  from party where party_id='$id'";
$smtp4=$conn->prepare($query4);
if($smtp4->execute()){
     echo "<script>alert('Deleted!!');</script>";
	echo "<script>window.location='party.php'</script>";
}

}
?> 
 