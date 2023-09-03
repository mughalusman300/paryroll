  
  <?php
    $fullname = ucfirst($_SESSION['employee']->fullname);
    $date = $_SESSION['employee']->lastloggedindate;
    $count = $_SESSION['employee']->loggedincount;
    if ($count == NULL || $count == 0) { 
       $count = "1";
       $date = date('Y-m-d');
    } else {
      $count = ($count+1);
    }

    $welcomeMessage= "Welcome $fullname you last signed in on $date, you have signed in $count time(s)";
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
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class=" no-padding    container-fixed-lg bg-white">
              <div class="container">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-header" style="text-align: center">
                      <div class=""><h3><?php echo $welcomeMessage; ?></h3></div>
                      <div class="clearfix"></div>
                    </div>
                  <div class="card-body">
                  </div>
              </div>
              <!-- END card -->
            </div>
          </div>
          <!-- END PLACE PAGE CONTENT HERE -->
        </div>
        <!-- END CONTAINER FLUID -->
      </div>
      <!-- END PAGE CONTENT -->
      <!-- START COPYRIGHT -->
      <!-- START CONTAINER FLUID -->
      <!-- START CONTAINER FLUID -->
      <div class=" container   container-fixed-lg footer">
        <div class="copyright sm-text-center">
          <p class="small-text no-margin pull-left sm-pull-reset">
            ©Copyright TECHLINKS GLOBAL (PVT.) LIMITED. All rights reserved.
            <!-- <span class="hint-text m-l-15">Pages v05.23 20201105.r.190</span> -->
          </p>
          <p class="small no-margin pull-right sm-pull-reset">
            <!-- Hand-crafted <span class="hint-text">&amp; made with Love</span> -->
          </p>
          <div class="clearfix"></div>
        </div>
      </div>
      <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
  </div>