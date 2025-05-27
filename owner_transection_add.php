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
												<th>Owner Name</th>
												<th>Transaction Date</th>
												<th>Truck Number</th>
												<th>Route</th>
												<th>Credit</th>
												<th>Debit</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
		<?php 
                 $query="SELECT * from owner_tranc";
                 $smtp=$conn->prepare($query);
                 $smtp->execute();
                 $row_active =$smtp->rowCount();
                    $count=1;
                 ?>
               
                 <?php while($result=$smtp->fetch()){?>
						<tr>
							<td style="display: none;"><span><?php echo $result['tranc_id'];?></span></td>
						<td><span><?php echo $count;;?></span></td>
						
						<?php 
					$tOwnerID=$result['owner_id'];
                 $queryw="SELECT * from truck_owner where truck_owner_id='$tOwnerID'";
                 $smtpw=$conn->prepare($queryw);
                 $smtpw->execute();
                 $resultw=$smtpw->fetch()
                 ?>
					
						<td><span><?php echo $resultw['truck_owner_name'];?></span></td>
						
						
						<td><span><?php echo $result['owner_tranc_date'];?></span></td>
						
					
						   <?php 
					$tOwnerID=$result['owner_truck_no'];
                 $queryw="SELECT * from truck where truck_id_number='$tOwnerID'";
                 $smtpw=$conn->prepare($queryw);
                 $smtpw->execute();
                 $resultw=$smtpw->fetch()
                 ?>
					
						<td><span><?php echo $resultw['truck_number'];?></span></td>
					   <?php 
					$tOwnerID=$result['route'];
                 $queryw="SELECT * from truck_route where route_id='$tOwnerID'";
                 $smtpw=$conn->prepare($queryw);
                 $smtpw->execute();
                 $resultw=$smtpw->fetch()
                 ?>
					
						<td><span><?php echo $resultw['route_name'];?></span></td>
					<td><span><?php echo $result['credit'];?></span></td>
					<td><span><?php echo $result['debit'];?></span></td>
		                <td>
                             <a class="btn btn-primary  btn-sm" href="view_owner_tranc.php?id=<?php echo $result['tranc_id'];?>"> <i class="fa fa-eye m-r-5"></i> </a>
		                	
		                	<a class="btn btn-secondary  btn-sm" href="edit_owner_tranc.php?id=<?php echo $result['tranc_id'];?>"> <i class="fa fa-pencil m-r-5"></i> </a>
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