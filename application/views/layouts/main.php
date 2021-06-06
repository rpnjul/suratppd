<!--DOCTYPE html-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SPPD</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="theme-color" content="#ffffff">  	
        <!---  theme        --->
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/stisla/assets/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/stisla/assets/modules/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/stisla/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/stisla/assets/css/components.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/jquery-ui/jquery-ui-1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <?php if (!$_landing): ?>
            <link rel="stylesheet" href="<?php echo site_url('resources/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css');?>">
        <?php endif ?>
        <script src="<?php echo base_url(); ?>resources/stisla/assets/modules/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/jquery-ui/jquery-ui-1.12.1/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/pegawai.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/stisla/assets/modules/popper.js"></script>
        <script src="<?php echo base_url(); ?>resources/stisla/assets/modules/tooltip.js"></script>
        <script src="<?php echo base_url(); ?>resources/stisla/assets/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/stisla/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('resources/js/bootstrap-show-password.min.js');  ?>" ></script>
        <script src="<?php echo base_url(); ?>resources/stisla/assets/modules/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/stisla/assets/js/stisla.js"></script>
        <script src="<?php echo base_url(); ?>resources/stisla/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
        <!---  end-theme    --->

    </head>
    <?php  if(!$_landing) { ?>     
    <body>
      <div id="app">
          <div class="main-wrapper main-wrapper-1">
              <?php         
                $this->load->view('layouts/stisla/dist/_partials/layout');
                $this->load->view('layouts/sidebar');
                 ?>
            <div class="main-content" style="min-height: 561px;">
                <section class="section">
                <?php $this->load->view($_view); ?>
                </section>
            </div>
          </div>
      </div>
      
    </body>
    <?php }else{ ?>
        <body style="background-color: #003366;">

            <?php                    
                $this->load->view($_view);
            ?>                  
            <script src="<?php echo base_url('assets/modules/sweetalert/sweetalert.min.js'); ?>"></script>
        </body>
    <?php } ?>
</html>