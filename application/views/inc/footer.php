
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
<!--START QUICKVIEW -->
    
    <!-- BEGIN VENDOR JS -->
    <script src="<?= base_url()?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="<?= base_url()?>assets/plugins/liga.js" type="text/javascript"></script>
    <!-- <script src="<?= base_url()?>assets/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script> -->
    <script src="<?= base_url()?>assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/popper/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/plugins/classie/classie.js"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url()?>assets/pages/js/pages.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url()?>assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->


    <script src="<?= base_url()?>assets/plugins/jquery-datatable/media/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/plugins/alerts/sweet-alert.min.js"></script>
    <script type="text/javascript" src="<?=URL?>assets/mainjs/validation.js"></script>
    <script src="<?= base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <?php if (in_array($page, array('employee/employeeList'))) { ?>
        <script type="text/javascript" src="<?=URL?>assets/mainjs/employee/employeeList.js"></script>
    <?php } ?>

    <?php if (in_array($page, array('employee/employee'))) { ?>
        <script type="text/javascript" src="<?=URL?>assets/mainjs/employee/employee.js"></script>
    <?php } ?>

    <?php if (in_array($page, array('payroll/payrollList'))) { ?>
        <script type="text/javascript" src="<?=URL?>assets/mainjs/payroll/payrollList.js"></script>
    <?php } ?>

    <?php if (in_array($page, array('payroll/payrollMonthList'))) { ?>
        <script type="text/javascript" src="<?=URL?>assets/mainjs/payroll/payrollMonthList.js"></script>
    <?php } ?>

    <?php if (in_array($page, array('contactus/contactusList'))) { ?>
        <script type="text/javascript" src="<?=URL?>assets/mainjs/contactus/contactusList.js"></script>
    <?php } ?>

    <?php if (in_array($page, array('payroll/addPayroll'))) { ?>
        <script type="text/javascript" src="<?=URL?>assets/mainjs/payroll/addPayroll.js"></script>
    <?php } ?>