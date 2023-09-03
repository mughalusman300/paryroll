
<?php
	// $form_type = ($page_type == 'Add') ? $page_type : 'Update';
	// $form_url = URL.'employee/record_insert/'.strtolower($form_type);
	// if ($form_type == 'Update') {
	// 	$form_url = URL.'employee/record_insert/'.strtolower($form_type).'/'.$id;
	// 	$user = $this->Commonmodel->getRows(array('returnType' => 'single', 'conditions' => array('id' => $id)), 'user');
	// }
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
										<a type="button" href="<?=URL?>payroll" class="btn btn-complete btn-cons">Payroll</a>
									</div>
					    		</div>
					  		</div>
					  		<div class="col-xl-6 col-lg-6 ">
					    		<!-- START card -->
					    		<div class="card">
					      			<div class="card-header ">
					       		 		<div class="card-title mw-80"> <h2> Contact Us </h2></div>
					      			</div>
						      		<div class="card-body">
						        		<!-- <h2 class="mw-80">Add Employee.</h2> -->
						        		<p class="fs-16 mw-80 m-b-40">Fill All Required Fields</p>
						        		<form id="add-form" action="<?= URL;?>/contactus/insert" method="post" role="form"   autocomplete="off">

						          			<div class="row">
						          				<div class="col-md-12">
				          			 				<div class="form-group form-group-default required">
					          			 		   		<label>Name</label>
					          			 		   		<input type="text" class="form-control validate-input" name="name" required>
				          			 		 		</div>
						          				</div>
						          			</div>

      					          			<div class="row">
      					          				<div class="col-md-12">
      			          			 				<div class="form-group form-group-default required">
					          			 		   		<label>Subject</label>
					          			 		   		<input type="text" class="form-control validate-input" name="subject" required>
				          			 		 		</div>
      					          				</div>
      					          			</div>

						          			<div class="row">
          			                            <div class="col-md-12">
      			                                	<div class="form-group form-group-default required">
					          			 		   		<label>Message</label>
					          			 		   		<input type="text" class="form-control validate-input" name="message" required>
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

	<script type="text/javascript">
		$(document).ready(function () {
			$('.add-form').on('click', function (e){
				var check = checkValidation('#add-form');
				console.log(check);
				if(check) {

				} else {
					e.preventDefault();
				}
			});
		});
	</script>
