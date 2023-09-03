<div class="page-container ">
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
          <div class="content ">
            <div class="bg-white">
                <div class="container">
                  <ol class="breadcrumb breadcrumb-alt">
                      <li class="breadcrumb-item"><a href="#">Pages</a></li>
                      <li class="breadcrumb-item active">Change Car</li>
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
                    <button class="btn btn-complete btn-cons">More</button>
                  </div>
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 ">
                  <!-- START card -->
                  <div class="card">
                      <div class="card-header ">
                        <div class="card-title mw-80"> <h2> Change Car </h2></div>
                      </div>
                      <div class="card-body">
                        <!-- <h2 class="mw-80">Add Employee.</h2> -->
                        <p class="fs-16 mw-80 m-b-40">Fill All Required Fields</p>
                        <form id="form" class="p-t-15" method="post" role="form" action="<?= URL;?>login/change_car_authenticate">
                          <!-- START Form Control-->
                            <div class="form-group form-group-default">
                                <label>Old Car</label>
                                <div class="controls">
                                    <input type="hidden" name="id" value="<?= $employee->id;?>">
                                    <input type="text" name="old_favoritecar" class="form-control old_favoritecar validate-input" required>
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <label>New Car</label>
                                <div class="controls">
                                    <input type="text" name="favoritecar" class="form-control favoritecar car validate-input" required>
                                </div>
                            </div>
                            <span style="color: red" id="error_car"></span>
                            <div class="form-group form-group-default">
                                <label>Confirm New Car</label>
                                <div class="controls">
                                    <input type="text" name="confirm_favoritecar" class="form-control confirm_favoritecar car validate-input" required>
                                </div>
                            </div>
                            <!-- END Form Control-->
                            <!-- START Form Control-->
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6 d-flex align-items-center justify-content-end">
                                    <button aria-label="" id="submit" disabled class="btn btn-complete btn-lg m-t-10" type="submit">Submit</button>
                                </div>
                            </div>
                            <!-- END Form Control-->
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
      $(document).ready(function() {
         $(".car").keyup(validate);
          function validate() {
            var favoritecar = $(".favoritecar").val();
            var confirm_favoritecar = $(".confirm_favoritecar").val();

          
          if(favoritecar != "" && confirm_favoritecar != ""){
            if (favoritecar == confirm_favoritecar) {
                $("#error_car").text("");  
                $("#submit").attr('disabled',false); 
             
            } else {
                $("#error_car").text("Car didn't match");  
                $("#submit").attr('disabled',true); 
            }
          } else {
            $("#submit").attr('disabled',true); 
          }
        }
      });
    </script>
