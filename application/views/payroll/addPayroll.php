
<?php

?>

	<div class="page-container ">
	    <!-- START PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrapper ">
	      <!-- START PAGE CONTENT -->
	      	<div class="content ">
	        	<div class="bg-white">
	          		<div class="container">
	            		<ol class="breadcrumb breadcrumb-alt">
	              			<li class="breadcrumb-item"><a href="#">Pages</a></li>
	              			<li class="breadcrumb-item active">Add Pays</li>
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
					<div class=" container p-t-30   container-fixed-lg">
						<!-- START BREADCRUMB -->
						<div class="row">
					  		<div class="col-xl-6 col-lg-6 " style="">
					    		<div class="card card-transparent">
					      			<div class="card-header">
								        <div class="card-title">
								          Add New Payroll
								        </div>
					      			</div>
									<div class="card-body">
										<h3>Add Monthly Payroll<br>
											Fill All Required Fields <span style="color: red">*</span></h3>
										<p>
											Add Monthly Payroll by uploading CSV file and see uploading list of employees payroll in Payroll List.
										</p>
										<br>
										<p class="small hint-text m-t-5">Navigate to payroll list</p>
										<a type="button" href="<?=URL?>payroll" class="btn btn-complete btn-cons m-t-5">Payroll</a>
									</div>
					    		</div>
					  		</div>
					  		<div class="col-xl-6 col-lg-6 ">
					    		<!-- START card -->
					    		<div class="card">
					      			<div class="card-header ">
					       		 		<div class="card-title mw-80"> <h2> Add New Payroll </h2></div>
					      			</div>
						      		<div class="card-body">
						        		<!-- <h2 class="mw-80">Add Employee.</h2> -->
						        		<!-- <p class="fs-16 mw-80 m-b-40">Fill All Required Fields</p> -->
						        		<form id="payroll-form" action="<?=URL;?>Payroll/add_payroll"method="POST" enctype="multipart/form-data" role="form"   autocomplete="off">

						          			<div class="row">
						          				<div class="col-md-12">
				          			 				<div class="form-group form-group-default required">
					          			 		   		<label>Salary Month</label>
					          			 		   		<input type="text" class="form-control validate-input salarymonth" name="salarymonth" placeholder="01-2023" required>
				          			 		 		</div>
						          				</div>
						          			</div>

      					          			<div class="row">
      					          				<div class="col-md-12">
      			          			 				<div class="form-group form-group-default required">
      				          			 		   		<label>File Upload</label>
      				          			 		   		<input type="file" class="form-control validate-input mt-1" name="fileUpload" required accept=".csv">
      			          			 		 		</div>
      					          				</div>
      					          			</div>

						          			<div class="row">
          			                            <div class="col-md-12">
          			                              	<div class="form-group form-group-default form-check-group d-flex align-items-center p-15">
          			                                	<div class="form-check switch switch-lg complete full-width right m-b-0">
          			                                  		<input type="checkbox"  id="notify_to_all" name="notify_to_all" aria-invalid="false" value="1">
          			                                  		<label for="notify_to_all">Send notification to all employees</label>
          			                                	</div>
          			                              	</div>
          			                            </div>
          			                        </div>
						          			<div class="clearfix"></div>
									        <div class="row m-t-25">
									            <div class="col-xl-12">
									              	<button aria-label="" class="btn btn-complete pull-right btn-lg btn-block add-form" type="submit">Add </button>
									            </div>
									        </div>
						        		</form>
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
