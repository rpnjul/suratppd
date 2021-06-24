<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-1">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>">SPPD</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>">SPPD</a>
          </div>
          <ul class="sidebar-menu">
            <li class="<?php echo $this->uri->segment(1) == 'dash' || $this->uri->segment(1) == '' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dash"><i class="fas fa-home"></i> <span>Beranda</span></a></li>
            <?php if($level!='Pegawai'): ?>
            <li class="<?php echo $this->uri->segment(1) == 'pegawai' || $this->uri->segment(1) == 'pgw' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pegawai"><i class="fas fa-building"></i> <span>Pegawai</span></a></li>
            <?php endif;?>
            <?php if($level!='Pegawai' && $level!='Direktur'): ?>
            <li class="<?php echo $this->uri->segment(1) == 'direktur' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>direktur"><i class="fas fa-user-tie"></i> <span>Direktur</span></a></li>
            <?php endif;?>
            <li class="<?php echo $this->uri->segment(1) == 'permohonan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>permohonan"><i class="fas fa-pen-alt"></i> <span>Data Permohonan</span></a></li>

            <li class="<?php echo $this->uri->segment(1) == 'surat_masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>surat_masuk"><i class="fas fa-envelope"></i> <span>Surat Masuk</span></a></li>

            <li class="<?php echo $this->uri->segment(1) == 'surat_tugas' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>surat_tugas"><i class="fas fa-plane"></i> <span>Surat Tugas</span></a></li>

            <li class="<?php echo $this->uri->segment(1) == 'rincian' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>rincian"><i class="fas fa-money-check-alt"></i> <span>Rincian Perjalanan</span></a></li>

            <li class="<?php echo $this->uri->segment(1) == 'nota_dinas' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>nota_dinas"><i class="fas fa-sticky-note"></i> <span>Nota Dinas</span></a></li>

          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?php echo base_url('logout'); ?>" class="btn btn-danger btn-lg btn-block btn-icon-split">
              <i class="fas fa-power-off"></i> Keluar
            </a>
          </div>
        </aside>
      </div>
