<!DOCTYPE html>
<html lang="en">
  <!-- /*---------head-----------------*/ -->
  <?php $this->load->view('inc/head.php'); ?>
  <!-- /*---------head-----------------*/ -->
    <body class="fixed-header horizontal-menu horizontal-app-menu ">
        <!-- START PAGE-CONTAINER -->
        <?php $this->load->view('inc/header.php'); ?>
        <!-- /*---------page-----------------*/ -->
        <?php $this->load->view($page); ?>
        <!-- /*---------page-----------------*/ -->

        <?php $this->load->view('inc/footer.php'); ?>
    </body>
</html>