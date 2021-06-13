<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script> -->
<script type="text/javascript" src="<?php echo site_url('resources/js/bootstrap-show-password.min.js');  ?>" ></script>
<div class="section-header">
  <h1>Data Direktur</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
     <?php echo form_open('direktur/add'); ?>
        <div class="card-header">
          <h4>Tambah Data Direktur</h4>
          <div class="card-header-action">
              <a href="<?php echo base_url('direktur') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <label for="direktur_nm" class="control-label">NIP Direktur</label>
              <div class="form-group">
                <input autocomplete="off" type="text" name="direktur_kd" placeholder="Masukan NIP Direktur" class="form-control" id="direktur_kd" />
                <div class="text-danger"><?php echo form_error('direktur_kd');?></div>
              </div>                     
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="direktur_nm" class="control-label">Nama Lengkap</label>
              <div class="form-group">
                <input required autocomplete="off" type="text" name="direktur_nm" maxlength="55" value="<?php echo $this->input->post('direktur_nm'); ?>" class="form-control" id="direktur_nm" />
                <div class="text-danger"><?php echo form_error('direktur_nm');?></div>
              </div>                     
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="direktur_tlp" class="control-label">Nomor Telepon</label>
              <div class="form-group">
                <input required autocomplete="off" type="text" name="direktur_tlp" maxlength="12" value="<?php echo $this->input->post('direktur_tlp'); ?>" class="form-control" id="direktur_tlp" />
                <div class="text-danger"><?php echo form_error('direktur_tlp');?></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="direktur_tlp" class="control-label">Alamat</label>
              <div class="form-group">
                <input required autocomplete="off" type="text" name="direktur_alm" maxlength="255" value="<?php echo $this->input->post('direktur_alm'); ?>" class="form-control" id="direktur_tlp" />
                <div class="text-danger"><?php echo form_error('direktur_alm');?></div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="row">
              <div class="col-md-6">
                <label for="direktur_eml" class="control-label">Alamat Email</label>
                <div class="form-group">
                  <input required autocomplete="off" type="text" name="direktur_eml" value="<?php echo $this->input->post('direktur_eml'); ?>" class="form-control" id="direktur_eml" />
                  <div class="text-danger"><?php echo form_error('direktur_eml');?></div>
                </div>
              </div>
                <div class="col-md-6">
                  <label for="direktur_snd" class="control-label">Kata sandi</label>
                  <input required  autocomplete="off" name="direktur_snd" class="form-control" id="direktur_snd" type="password" maxlength="30"  />
                  <div class="text-danger"><?php echo form_error('direktur_snd');?></div>
                </div>
              </div>
            </div>
          </div> <!-- row -->
        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-success" id="confirm">
                <i class="fas fa-check"></i> Komfirmasi
          </button>
        </div>
      <?php echo form_close(); ?>
    </div> 
  </div>
</div>
<script>
</script>