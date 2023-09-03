<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title><?= (isset($page_title) ) ? $page_title : 'Fragomen';?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="<?= base_url()?>assets/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url()?>assets/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url()?>assets/pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url()?>assets/pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="<?= base_url()?>assets/favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Meet pages - The simplest and fastest way to build web UI for your dashboard or app." name="description" />
    <meta content="Ace" name="author" />
    <link href="<?= base_url()?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url()?>assets/plugins/alerts/sweet-alert.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url()?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">

    <link href="<?= base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>assets/css/custom-theme.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url()?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url()?>assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="<?= base_url()?>/assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    
    <script src="<?= base_url()?>assets/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>

    <script type="text/javascript"> 
        var base = '<?= AJAXURL  ?>';
    </script>
</head>

<style type="text/css">
    
    .form-group-default.focused {
        border: 1px solid #50a2c8 !important;
    }
  .btn-outline-complete:hover {
        background: #50a2c8 !important;
        color: white !important;
    }
  .dataTables_filter {
        margin-right: 28px !important;
        /*margin-top: 5px !important;*/
    }
    .datepicker thead tr .next, .datepicker thead tr .prev, .datepicker thead tr .prev:before ,.datepicker thead tr .next:before {
        color: #50a2c8 !important;
    }
</style>

    <?php if(!isset($_SESSION['user_id'])): ?>
        <?php header("Location:".URL);
            exit();
        ?>
    <?php endif;?>