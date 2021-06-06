<!--DOCTYPE html-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SPPD KPKNL - Kota Bekasi</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo site_url('resources/img/apple-icon-57x57.png'); ?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo site_url('resources/img/apple-icon-60x60.png'); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo site_url('resources/img/apple-icon-72x72.png'); ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url('resources/img/apple-icon-76x76.png'); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo site_url('resources/img/apple-icon-114x114.png'); ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url('resources/img/apple-icon-120x120.png'); ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo site_url('resources/img/apple-icon-144x144.png'); ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo site_url('resources/img/apple-icon-152x152.png'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url('resources/img/apple-icon-180x180.png'); ?> ">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo site_url('resources/img/android-icon-192x192.png'); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('resources/img/favicon-32x32.png'); ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url('resources/img/favicon-96x96.png'); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('resources/img/favicon-16x16.png'); ?>">
<link rel="icon" type="image/png" href="<?php echo site_url('resources/img/logo.png'); ?>">
<link rel="shortcut icon" href="<?php echo site_url('resources/img/favicon.ico'); ?>" type="image/x-icon" />
	<link rel="manifest" href="<?php echo site_url('resources/img/manifest.json'); ?>">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo site_url('resources/img/ms-icon-144x144.png'); ?>">
<meta name="theme-color" content="#ffffff">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('resources/jquery-ui/jquery-ui-1.12.1/jquery-ui.min.css'); ?>" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/fontawesome/font-awesome/css/all.min.css');?>">
        <script type="text/javascript" src="<?php echo site_url('resources/fontawesome/font-awesome/js/all.min.js');?>"></script>
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/stisla/assets/css/style.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('resources/stisla/assets/css/components.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('resources/css/custom.min.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('resources/datatables/DataTables-1.10.21/css/jquery.dataTables.min.css');?>">
        
        <!-- jQuery 2.2.3 -->
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo site_url('resources/jquery-ui/jquery-ui-1.12.1/jquery-ui.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/stisla/assets/js/stisla.js');?>"></script>
         <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    </head>
    <?php  if(!$_landing) { ?>     
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">SPD KPKNL</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">SPD KPKNL</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                    <span class="hidden-xs"><?php echo $nama;?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <i class="fa fa-user"></i>
                                    <p>
                                        <small><?php echo $nama; ?></small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo site_url('profile/'.$id_login); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/img/26ce8716.png');?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $nama; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <?php $uri = $this->uri->segment(1); ?>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="<?php echo $uri == '' | $uri === '/' | $uri ==='dash'| $uri ==='dashboard' ? 'active' : '' ?>">
                            <a href="<?php echo site_url();?>" >
                                <i class="fa fa-home"></i> <span>Dashboard</span>
                            </a>
                        </li>
						<li class="<?php echo $uri === 'pgw' || $uri === 'pegawai' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('pgw'); ?>"  >
                                <i class="fa fa-id-card"></i> <span>Pegawai</span>
                            </a>
                        </li>
                        <li class="<?php echo $uri === 'surat_masuk' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('surat_masuk') ?> " >
                                <i class="fa fa-envelope"></i> <span>Surat Masuk</span>
                            </a>
                        </li>
                        <li class="<?php echo $uri === 'surat_tugas' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('surat_tugas') ?> " >
                                <i class="fa fa-envelope-open"></i> <span>Surat Tugas</span>
                            </a>
                        </li>
                        <li class="<?php echo $uri === 'rincian' || $uri === 'rincian' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('rincian') ?>" >
                                <i class="fa fa-sticky-note"></i> <span>Daftar Rincian</span>
                            </a>
                        </li>
                        <li class="<?php echo $uri === 'nota' || $uri === 'nota_dinas' ? 'active' : '' ?>">
                            <a href="<?php echo site_url('nota_dinas') ?>" >
                                <i class="fa fa-sticky-note"></i> <span>Nota Dinas</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active"><?php echo $judul; ?></li>
                    </ol>
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>SPPD KPKNL Bekasi </strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

    </body>
    <?php }else{ ?>
        <body style="background-color: #003366;">
            <?php                    
                $this->load->view($_view);
            ?>                  
        </body>
    <?php } ?>
</html>
