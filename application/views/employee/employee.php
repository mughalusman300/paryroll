
<?php
	// echo '<pre>'; print_r($_SESSION); die;
	$form_type = ($page_type == 'Add') ? $page_type : 'Update';
	$form_url = URL.'employee/record_insert/'.strtolower($form_type);
	if ($form_type == 'Update') {
		$form_url = URL.'employee/record_insert/'.strtolower($form_type).'/'.$id;
		$user = $this->Commonmodel->getRows(array('returnType' => 'single', 'conditions' => array('id' => $id)), 'user');
	}
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
	              			<li class="breadcrumb-item active"><?= $page_type;?> Employee</li>
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
					  		<div class="col-xl-6 col-lg-6 ">
					    		<div class="card card-transparent">
					      			<div class="card-header">
								        <div class="card-title">
								          Validation
								        </div>
					      			</div>
									<div class="card-body">
										<h3>Showcase and guide users with a<br>
											better User Interface &amp; Experience.</h3>
										<p>Forms are one of the most important components
										  <br> when it comes to a dashboard. Recognizing that fact, users are
										  <br> able work in a maximum content width.</p>
										<br>
										<p class="small hint-text m-t-5">VIA senior product manager
										  <br> for UI/UX at REVOX</p>
										<a type="button" href="<?=URL?>employee" class="btn btn-complete btn-cons">Employees</a>
									</div>
					    		</div>
					  		</div>
					  		<div class="col-xl-6 col-lg-6 ">
					    		<!-- START card -->
					    		<div class="card">
					      			<div class="card-header ">
					       		 		<div class="card-title mw-80"> <h2> <?= $page_type;?> Employee </h2></div>
					      			</div>
						      		<div class="card-body">
						        		<!-- <h2 class="mw-80">Add Employee.</h2> -->
						        		<p class="fs-16 mw-80 m-b-40">Fill All Required Fields</p>
						        		<form id="employee-form" action="<?= $form_url?>" method="post" role="form"   autocomplete="off">
						          			<div class="row clearfix">
						            			<div class="col-xl-6">
						              				<div class="form-group form-group-default required">
						                				<label>Employee name</label>
						                				<input type="text" class="form-control validate-input" name="username" value="<?= isset($user) ? $user->fullname : '';?>" required>
						              				</div>
						            			</div>
						            			<div class="col-xl-6">
						              				<div class="form-group form-group-default required">
										                <label>Employee Code</label>
										                <input type="text" class="form-control validate-input" name="usercode" value="<?= isset($user) ? $user->usercode : '';?>" required>
						              				</div>
						            			</div>
						          			</div>
						          			<div class="row">
						          				<div class="col-md-12">
						          			 		<div class="form-group form-group-default required">
						          			    		<label>Employee Email</label>
						          			    		<input type="email" class="form-control validate-input" name="email" value="<?= isset($user) ? $user->email : '';?>" required>
						          			  		</div>
						          				</div>
						          			</div>
						          			<div class="row">
						          				<div class="col-md-12">
						          			 		<div class="form-group form-group-default required">
						          			    		<label>Employee Address</label>
						          			    		<input type="text" class="form-control validate-input" name="address" value="<?= isset($user) ? $user->address : '';?>" required>
						          			  		</div>
						          				</div>
						          			</div>
						          			<div class="row">
						          				<div class="col-md-12">
						          			 		<div class="form-group form-group-default required">
						          			    		<label>Designation</label>
						          			    		<input type="text" class="form-control validate-input" name="designation" value="<?= isset($user) ? $user->designation : '';?>" required>
						          			  		</div>
						          				</div>
						          			</div>

						          			<div class="row">
						          				<div class="col-md-12">
						          			 		<div class="form-group form-group-default required">
						          			    		<label>Joining Date</label>
						          			    		<input type="date" class="form-control validate-input" name="dateofjoining" value="<?= isset($user) ? $user->dateofjoining : '';?>" required>
						          			  		</div>
						          				</div>
						          			</div>
						          			<div class="row">
						          				<div class="col-md-12">
						          			 		<div class="form-group form-group-default required">
						          			    		<label>Location</label>
						          			    		<input type="text" class="form-control validate-input" name="location" value="<?= isset($user) ? $user->location : '';?>" required>
						          			  		</div>
						          				</div>
						          			</div>
						          			<div class="row">
          			                            <div class="col-md-6">
          			                              	<div class="form-group form-group-default form-check-group d-flex align-items-center p-15">
          			                                	<div class="form-check switch switch-lg complete full-width right m-b-0">
          			                                  		<input type="checkbox" <?= (isset($user) && $user->isadmin) ? 'checked' : '';?> id="isadmin" name="isadmin" aria-invalid="false" value="1">
          			                                  		<label for="isadmin">Is Admin</label>
          			                                	</div>
          			                              	</div>
          			                            </div>
          			                            <div class="col-md-6">
          			                              	<div class="form-group form-group-default form-check-group d-flex align-items-center p-15">
          			                                	<div class="form-check switch switch-lg complete full-width right m-b-0">
          			                                  		<input type="checkbox" <?= (isset($user) && $user->isnotify) ? 'checked' : '';?> id="isnotify" name="isnotify" aria-invalid="false" value="1">
          			                                  		<label for="isnotify" >Notify Via Email On Pay</label>
          			                                	</div>
          			                              	</div>
          			                            </div>
          			                        </div>
						          			<div class="clearfix"></div>
									        <div class="row m-t-25">
									            <div class="col-xl-12">
									              	<button aria-label="" class="btn btn-complete pull-right btn-lg btn-block add-form" data-type ='<?= $form_type;?>' type="submit"><?= $form_type;?> </button>
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
