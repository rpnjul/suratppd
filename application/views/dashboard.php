          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user" style="margin-top: 25px"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pegawai</h4>
                  </div>
                  <div class="card-body">
                    <?php echo number_format($jml_pgw,0,',','.') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"  style="margin-top: 25px"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Permohonan</h4>
                  </div>
                  <div class="card-body">
                   <?php echo number_format($jml_psl,0,',','.') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file" style="margin-top: 25px"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Masuk</h4>
                  </div>
                  <div class="card-body">
                    <?php echo number_format($jml_sm,0,',','.') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle" style="margin-top: 25px"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Tugas</h4>
                  </div>
                  <div class="card-body">
                   <?php echo number_format($jml_st,0,',','.') ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <?php if ($level!='Pejabat Lelang'): ?>
             <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Top 5 Surat Permohonan</h4>
                  </div>
                  <div class="card-body">         
                    <ul class="list-unstyled list-unstyled-border">
                      <?php foreach ($permohonan as $key => $var): ?>
                        <li class="media">
                          <img class="mr-3 rounded-circle" width="50" src="<?php echo site_url('resources/stisla/assets/img/avatar/avatar-'.rand(1, 5).'.png') ?>" alt="avatar">
                          <div class="media-body">
                            <div class="float-right text-primary"><?php echo $this->loader->konversi_tanggal($var['psl_tgl']); ?></div>
                            <div class="media-title"><?php echo $var['direktur_nm'] ?> [<?php echo $var['psl_no'] ?>]</div> 
                            <span class="text-small text-muted"><?php echo $var['psl_prh'] ?></span>
                          </div>
                        </li>
                      <?php endforeach ?>
                    </ul>
                    <div class="text-center pt-1 pb-1">
                      <a href="<?php echo site_url('permohonan'); ?>" class="btn btn-primary btn-lg btn-round">
                        Lihat semua
                      </a>
                    </div>
                  </div>
                </div>
              </div>               
            </div> 
          <?php endif ?>   
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Top 10 Status Surat</h4>
                  <!-- <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div> -->
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No. Permohonan</th>
                          <th>Tgl. Permohonan</th>
                          <th>Perihal</th>
                          <th>No. Surat masuk</th>
                          <th>Tgl. Surat masuk</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>    

                      <?php foreach ($surat as $i => $value) { ++$i; ?>                    
                        <tr>
                          <td>
                            <?php echo $i ?>
                            <!-- <div class="table-links">
                              in <a href="#">Web Development</a>
                              <div class="bullet"></div>
                              <a href="#">View</a>
                            </div> -->
                          </td>
                          <td><?php echo $value['psl_no'] ?></td>
                          <td><?php echo $value['psl_tgl']=='-'?'-':$this->loader->konversi_tanggal($value['psl_tgl']); ?></td>
                          <td><?php echo $value['psl_prh'] ?></td>
                          <td><?php echo $value['srtms_no'] ?></td>
                          <td><?php echo $value['srtms_tgl']=='-'?'-':$this->loader->konversi_tanggal($value['srtms_tgl']); ?></td>
                          <!-- <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div> -->
                          <td><div class="<?php echo 'badge badge-pill '.($value['srtgs_sts']==0?'badge-warning':($value['srtgs_sts']==1?'badge-secondary':'badge-primary')); ?> mb-1 float-right icon-left"><i class="fas fa-<?php echo ($value['srtgs_sts']==0?'circle-notch':($value['srtgs_sts']==1?'gavel':'check')); ?>"></i> <?php echo ($value['srtgs_sts']==0?'Belum ':($value['srtgs_sts']==1?'Dalam ':'Selesai')); ?> bertugas</div></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>