<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title><?= (isset($page_title) ) ? $page_title : 'Fragomen';?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="<?=base_url()?>assets/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>assets/pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/favicon.ico" />
    <link href="<?= base_url()?>assets/css/custom-theme.css" rel="stylesheet" type="text/css" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Meet pages - The simplest and fastest way to build web UI for your dashboard or app." name="description" />
    <meta content="Ace" name="author" />
    <link href="<?=base_url()?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url()?>assets/plugins/alerts/sweet-alert.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="<?=base_url()?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    <!-- Please remove the file below for production: Contains demo classes -->
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>
  <style type="text/css">
    .form-group-default.focused {
      border: 1px solid #0072EC !important;
    }
  </style>
  <body class="fixed-header ">
    <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
          <h1 class="semi-bold text-white">
					Meet pages - The simplest and fastest way to build web UI for your dashboard or app.</h1>
          <p class="small">
            Our beautifully-designed UI Framework come with hundreds of customizable features. Every Layout is just a starting point. ©2019-2020 All Rights Reserved. Pages® is a registered trademark of Revox Ltd.
          </p>
        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-50 p-r-50 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <img src="<?=base_url()?>assets/images/logo.png" alt="logo" data-src="<?=base_url()?>assets/images/logo.png" data-src-retina="<?=base_url()?>assets/images/logo.png" >
          <h2 class="p-t-25">Change Password</h2>
<!--           <p class="mw-80 m-t-5">Sign in to your account</p> -->
          <!-- START Login Form -->
          <form id="form-login" class="p-t-15" method="post" role="form" action="<?= URL;?>login/change_password_authenticate">
            <!-- START Form Control-->
            <input type="hidden" name="id" value="<?= $change_password->id;?>">
            <?php if($old_password) :?>
              <div class="form-group form-group-default">
                <label>Old Password</label>
                <div class="controls">
                  <input type="password" name="oldpassword" class="form-control oldpassword validate-input" required>
                </div>
              </div>
            <?php endif;?>

            <div class="form-group form-group-default">
              <label>New Password</label>
              <div class="controls">
                <input type="password" name="password" class="form-control pass password validate-input" required>
              </div>
            </div>
            <span style="color: red" id="errorPassword"></span>
            <div class="form-group form-group-default">
              <label>Confirm Password</label>
              <div class="controls">
                <input type="password" name="confirmpassword" class="form-control pass confirmpassword validate-input" required>
              </div>
            </div>
            <?php if (!$only_password) { ?>
              <div class="form-group form-group-default">
                <label>Enter your favourite car</label>
                <div class="controls">
                  <input type="password" name="favoritecar" class="form-control validate-input" required>
                </div>
              </div>
            <?php }?>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-6 d-flex align-items-center justify-content-end">
                <?php if (!$only_password) { ?>
                  <a href="<?= URL?>login/logout" class="btn btn-default btn-lg m-t-10 mr-1" type="submit">Cancel</a>
                <?php }?>
                <button aria-label="" id="submit" disabled class="btn btn-complete btn-lg m-t-10" type="submit">Submit</button>
              </div>
            </div>
            <!-- END Form Control-->
          </form>
          <!--END Login Form-->

        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
    <!-- START OVERLAY -->
    <div class="overlay hide" data-pages="search">
      <!-- BEGIN Overlay Content !-->
      <div class="overlay-content has-results m-t-20">
        <!-- BEGIN Overlay Header !-->
        <div class="container-fluid">
          <!-- BEGIN Overlay Logo !-->
          <img class="overlay-brand" src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="<?=base_url()?>assets/img/logo_2x.png" width="78" height="22">
          <!-- END Overlay Logo !-->
          <!-- BEGIN Overlay Close !-->
          <a href="#" class="close-icon-light btn-link btn-rounded  overlay-close text-black">
            <i class="pg-icon">close</i>
          </a>
          <!-- END Overlay Close !-->
        </div>
        <!-- END Overlay Header !-->
        <div class="container-fluid">
          <!-- BEGIN Overlay Controls !-->
          <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
          <br>
          <div class="d-flex align-items-center">
            <div class="form-check right m-b-0">
              <input id="checkboxn" type="checkbox" value="1">
              <label for="checkboxn">Search within page</label>
            </div>
            <p class="fs-13 hint-text m-l-10 m-b-0">Press enter to search</p>
          </div>
          <!-- END Overlay Controls !-->
        </div>
        <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
        <div class="container-fluid p-t-20">
          <span class="hint-text">
                suggestions :
            </span>
          <span class="overlay-suggestions"></span>
          <br>
          <div class="search-results m-t-30">
            <p class="bold">Pages Search Results: <span class="overlay-suggestions"></span></p>
            <div class="row">
              <div class="col-md-6">
                <!-- BEGIN Search Result Item !-->
                <div class="d-flex m-t-15">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-success text-white ">
                    <img width="36" height="36" src="<?=base_url()?>assets/img/profiles/avatar.jpg" data-src="<?=base_url()?>assets/img/profiles/avatar.jpg" data-src-retina="<?=base_url()?>assets/img/profiles/avatar2x.jpg" alt="">
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10">
                    <h5 class="no-margin "><span class="semi-bold result-name">ice cream</span> on pages</h5>
                    <p class="small-text hint-text">via john smith</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
                <!-- BEGIN Search Result Item !-->
                <div class="d-flex m-t-15">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-success text-white ">
                    <div>T</div>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10">
                    <h5 class="no-margin "><span class="semi-bold result-name">ice cream</span> related topics</h5>
                    <p class="small-text hint-text">via pages</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
                <!-- BEGIN Search Result Item !-->
                <div class="d-flex m-t-15">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-success text-white ">
                    <div>M
                    </div>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10">
                    <h5 class="no-margin "><span class="semi-bold result-name">ice cream</span> music</h5>
                    <p class="small-text hint-text">via pagesmix</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
              </div>
              <div class="col-md-6">
                <!-- BEGIN Search Result Item !-->
                <div class="d-flex m-t-15">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-info text-white d-flex align-items-center">
                    <i class="pg-icon">facebook</i>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10">
                    <h5 class="no-margin "><span class="semi-bold result-name">ice cream</span> on facebook</h5>
                    <p class="small-text hint-text">via facebook</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
                <!-- BEGIN Search Result Item !-->
                <div class="d-flex m-t-15">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-complete text-white d-flex align-items-center">
                    <i class="pg-icon">twitter</i>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10">
                    <h5 class="no-margin ">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
                    <p class="small-text hint-text">via twitter</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
                <!-- BEGIN Search Result Item !-->
                <div class="d-flex m-t-15">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular text-white bg-danger d-flex align-items-center">
                    <i class="pg-icon">google_plus</i>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10">
                    <h5 class="no-margin ">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
                    <p class="small-text hint-text">via google plus</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
              </div>
            </div>
          </div>
        </div>
        <!-- END Overlay Search Results !-->
      </div>
      <!-- END Overlay Content !-->
    </div>
    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
    <script src="<?=base_url()?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="<?=base_url()?>assets/plugins/liga.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/popper/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/plugins/classie/classie.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/plugins/alerts/sweet-alert.min.js"></script>
    <!-- END VENDOR JS -->
    <script src="<?=base_url()?>assets/pages/js/pages.min.js"></script>
    <script type="text/javascript" src="<?=URL?>assets/mainjs/validation.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
         $(".pass").keyup(validate);
          function validate() {
            var password1 = $(".password").val();
            var password2 = $(".confirmpassword").val();

            if (password1 != "" && password2 != ""){
              if (password1 == password2) {
                  $("#errorPassword").text("");  
                  $("#submit").attr('disabled',false); 
               
              } else {
                  $("#errorPassword").text("Password didn't match");  
                  $("#submit").attr('disabled',true); 
              }
            } else {
              $("#submit").attr('disabled',true); 
            }
        }
      });
    </script>

    <?php 
        $message = $this->session->flashdata('message');
        $message_type = $this->session->flashdata('message_type');
        if (isset($message)){ ?>
            <script type="text/javascript">
                var message_type = "<?php echo $message_type;?>";
                var message = "<?php echo $message;?>";
                console.log(message);
                $(document).ready(function() {
                    swal({
                        title  : 'Alert...!',
                        position: 'top-end',
                        icon: message_type,
                        text: message,
                        // timer: 1500
                    });
                });
            </script>
    <?php } ?> 
  </body>
</html>