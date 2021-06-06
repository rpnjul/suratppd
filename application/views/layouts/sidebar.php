<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>">SPPD</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>">SPPD</a>
          </div>
          <ul class="sidebar-menu">
            <li class="<?php echo $this->uri->segment(1) == 'dash' || $this->uri->segment(1) == '' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dash"><i class="fas fa-home"></i> <span>Beranda</span></a></li>
            <li class="<?php echo $this->uri->segment(1) == 'pegawai' || $this->uri->segment(1) == 'pgw' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pegawai"><i class="fas fa-building"></i> <span>Pegawai</span></a></li>
            <li class="<?php echo $this->uri->segment(1) == 'direktur' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>direktur"><i class="fas fa-user-tie"></i> <span>Direktur</span></a></li>
            <li class="<?php echo $this->uri->segment(1) == 'surat_masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>surat_masuk"><i class="fas fa-envelope"></i> <span>Surat Masuk</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div>
        </aside>
      </div>
