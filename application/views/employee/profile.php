<style type="text/css">
	tr {
  		border-spacing: 5em !important;
	}
</style>
<?php
	$message="";

	$employee =$_SESSION['employee'];
	if (!empty($employee)) {
		$name = $employee->fullname;
		$email = $employee->email;
		$username = $employee->username;
		$code = $employee->usercode;
		$address = $employee->address;
		$designation = $employee->designation;
		$location = $employee->location;
		$dateofjoining = $employee->dateofjoining;
 	}
?>
	<div class="page-container " style="background: #fafafa;">
	    <!-- START PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrapper ">
	      <!-- START PAGE CONTENT -->
	      	<div class="content " >
	        	<div class="bg-white">
	          		<div class="container">
	            		<ol class="breadcrumb breadcrumb-alt">
	              			<li class="breadcrumb-item"><a href="#">Pages</a></li>
	              			<li class="breadcrumb-item active">Profile</li>
	            		</ol>
	          		</div>
	        	</div>
		        <!-- START JUMBOTRON -->
		        <div class="jumbotron">
		          	<div class=" container p-l-0 p-r-0   container-fixed-lg sm-p-l-0 sm-p-r-0">
		            	<div class="inner">
		              <!-- START BREADCRUMB -->
		            	</div>
		          	</div>
		        </div>
		        <!-- END JUMBOTRON -->
		        <!-- START CONTAINER FLUID -->
		        <div class=" container    container-fixed-lg">
		          	<!-- BEGIN PlACE PAGE CONTENT HERE -->

		      		<!-- START CONTAINER FLUID -->
					<div class=" container container-fixed-lg">
						<!-- START BREADCRUMB -->
						<h2 style="margin: 0"> Profile </h2>
						<div class="row mt-1">
					  		<div class="col-xl-12 col-lg-12 ">
					    		<!-- START card -->
					    		<div class="card" style="border-radius: 5px;height: 300px;box-shadow: 5px 15px 20px rgb(0 0 0 / 30%);">
					      			<div class="card-header ">
					       		 		<!-- <div class="card-title mw-80"> <h3 style="font-family: math; margin-top: 50px;"> Profile </h3></div> -->
					      			</div>
						      		<div class="card-body" style="margin-top: 40px;">
						      			<div style="">
						      			<div class="row mb-2">
						      				<div class="col-md-3"><b>Name:</b></div>
						      				<div class="col-md-3"><?= $name;?></div>
						      				<div class="col-md-3"><b>Payroll Code:</b></div>
						      				<div class="col-md-3"><?= $code;?></div>
						      			</div>

						      			<div class="row mb-2">
						      				<div class="col-md-3"><b>Login Name:</b></div>
						      				<div class="col-md-3"><?= $username;?></div>
						      				<div class="col-md-3"><b>Location:</b></div>
						      				<div class="col-md-3"><?= $location;?></div>
						      			</div>

						      			<div class="row mb-2">
						      				<div class="col-md-3"><b>Emai:</b></div>
						      				<div class="col-md-3"><?= $email;?></div>
						      				<div class="col-md-3"><b>Joining Date:</b></div>
						      				<div class="col-md-3"><?= $dateofjoining;?></div>
						      			</div>

						      			<div class="row mb-2">
						      				<div class="col-md-3"><b>Address:</b></div>
						      				<div class="col-md-3"><?= $address;?></div>
						      				<div class="col-md-3"><b>Designation:</b></div>
						      				<div class="col-md-3"><?= $designation;?></div>
						      			</div>
						      			</div>

						      			<!-- <table border="0" width="100%" cellpadding="" cellspacing="0" id="content-table">
							      			<tr>
							      				<th rowspan="3" class="sized"><img src="<?=URL;?>assets/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
							      				<th class="topleft"></th>
							      				<td id="tbl-border-top">&nbsp;</td>
							      				<th class="topright"></th>
							      				<th rowspan="3" class="sized"><img src="<?=URL;?>assets/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
							      			</tr>
							      			<tr>
							      				<td id="tbl-border-left"></td>
							      				<td>
							      				<div id="content-table-inner">
							      				
							      					<tr>
							      					  
							      						<td valign="top"  width="200px;"  style="font-weight: 500;">Name:</td>
							      						
							      						<td valign="top" width="200px;">
							      						<?php echo $name;?></td>
							      						<td width="20px">&nbsp;</td>
							      						<td width="200px;" style="font-weight: 500;"> Payroll code: </td>
							      						<td width="200px;">
							      						<?php echo $code;?></td>
							      						
							      					</tr>
							      					<tr>
							      					  
							      						<td width="200px;" style="font-weight: 500;">Login name:</td>
							      						
							      						<td width="200px;">
							      						<?php echo $username;?>
							      						</td>
							      						<td width="20px">&nbsp;</td>
							      						<td width="200px;" style="font-weight: 500;"> Location: </td>
							      						<td width="200px;">
							      						<?php echo $location;?>
							      						</td>
							      					</tr>
							      					<tr>
							      					  
							      						<td width="200px;" style="font-weight: 500;">Email:</td>
							      						
							      						<td width="200px;">
							      						<?php echo $email;?></td>
							      						<td width="20px">&nbsp;</td>
							      						<td width="200px;" style="font-weight: 500;"> Joining date: </td>
							      						<td width="200px;">
							      						<?php echo $dateofjoining;?>
							      						</td>
							      						
							      					</tr>
							      					
							      					<tr>
							      					  
							      						<td width="200px;" style="font-weight: 500;">Address:</td>
							      						
							      						<td width="200px;">
							      						<?php echo $address;?></td>
							      						<td width="20px">&nbsp;</td>
							      						<td width="200px;" style="font-weight: 500;"> Designation: </td>
							      						<td width="200px;">
							      						<?php echo $designation;?></td>
							      					</tr>
							      				
							      					
							      					<tr>
							      					
							      					<td><br/></td>
							      					<td><br/></td>
							      					<td valign="top">
							      					
							      					
							      					</td>
							      					<td><br/></td>
							      				</tr>
							      				<tr>
							      					
							      					<td><br/></td>
							      					<td><br/></td>
							      					<td valign="top">
							      						
							      					
							      					</td>
							      					<td><br/></td>
							      				</tr>
							      				
							      				</table>



							      			 
							      			<div class="clear"></div>
							      			 

							      			</div>
							      			</td>
							      			<td id="tbl-border-right"></td>
							      			</tr>
							      			<tr>
							      				<th class="sized bottomleft"></th>
							      				<td id="tbl-border-bottom">&nbsp;</td>
							      				<th class="sized bottomright"></th>
							      				<a href=""></a>
							      			</tr>
						      			</table> -->
						      		</div>
					    		</div>
					    		<!-- END card -->
					  		</div>
						</div>
					</div>

		      		<!-- END CONTAINER FLUID -->

		          	<!-- END PLACE PAGE CONTENT HERE -->
		        </div>
		        <!-- END CONTAINER FLUID -->
		    </div>
	      <!-- END PAGE CONTENT -->
	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->
	</div>
