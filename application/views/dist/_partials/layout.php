<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<div id="app">
<?php if (!$_landing): ?>
  <div class="main-wrapper main-wrapper-1">
  <div class="navbar-bg"></div>
  <nav class="navbar navbar-expand-lg main-navbar fixed-top">
    <div class="mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </div>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $nama ?></div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="<?php echo site_url('profile'); ?>" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('logout'); ?>" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </div>
      </li>
    </ul>
  </nav>
<?php else : ?>
  
<?php endif ?>