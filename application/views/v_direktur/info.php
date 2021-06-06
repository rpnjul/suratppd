<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/* End of file info.php */
/* Location: ./application/views/v_direktur/info.php */
?>

<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script> -->
<script type="text/javascript" src="<?php echo site_url('resources/js/bootstrap-show-password.min.js');  ?>" ></script>
<div class="section-header">
  <h1>Data Direktur</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-header">
          <h4>Info Data Direktur - <?php echo $direktur['direktur_no'] ?></h4>
          <div class="card-header-action">
              <a href="<?php echo base_url('direktur') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <label for="direktur_nm" class="control-label">Nama Lengkap / Instansi</label>
              <div class="form-group">
                <input readonly autocomplete="off" type="text" name="direktur_nm" maxlength="55" value="<?php echo ($direktur['direktur_nm']); ?>" class="form-control" id="direktur_nm" />
                <div class="text-danger"><?php echo form_error('direktur_nm');?></div>
              </div>                     
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="direktur_tlp" class="control-label">Nomor Telepon</label>
              <div class="form-group">
                <input readonly autocomplete="off" type="text" name="direktur_tlp" maxlength="12" value="<?php echo ($level=='Pejabat Lelang'?substr_replace($direktur['direktur_tlp'], str_repeat('X', 6),strlen($direktur['direktur_tlp'])-6):$direktur['direktur_tlp']); ?>" class="form-control" id="direktur_tlp" />
                <div class="text-danger"><?php echo form_error('direktur_tlp');?></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="direktur_tlp" class="control-label">Alamat</label>
              <div class="form-group">
                <input readonly autocomplete="off" type="text" name="direktur_alm" maxlength="255" value="<?php echo ($direktur['direktur_alm']); ?>" class="form-control" id="direktur_tlp" />
                <div class="text-danger"><?php echo form_error('direktur_alm');?></div>
              </div>
            </div>
            <div class="<?php  echo ($level!='Pejabat Lelang')? 'col-md-6' : 'col-md-6' ?> col-sm-12">
              <div class="row">
              <div class="<?php  echo ($level=='Pejabat Lelang')? 'col-md-12' : 'col-md-6' ?>">
                <label for="direktur_eml" class="control-label">Alamat Email</label>

                <div class="form-group">
                  <input readonly autocomplete="off" type="text" name="direktur_eml" value="<?php echo ($level=='Pejabat Lelang'?substr_replace(explode('@', $direktur['direktur_eml'])[0], str_repeat('X', 4), 0,4).'@'.explode('@', $direktur['direktur_eml'])[1]:$direktur['direktur_eml']); ?>" class="form-control" id="direktur_eml" />
                  <div class="text-danger"><?php echo form_error('direktur_eml');?></div>
                </div>
              </div>
            <?php if ($level!='Pejabat Lelang'): ?>
              <div class="col-md-6">
                <label for="direktur_snd" class="control-label">Kata sandi</label>
                <input readonly  autocomplete="off" name="direktur_snd" class="form-control" id="direktur_snd" type="password" maxlength="30" value="<?php echo ($direktur['direktur_snd']) ?>"  />
                <div class="text-danger"><?php echo form_error('direktur_snd');?></div>
              </div>
            <?php endif ?>
              </div>
            </div>
          </div> <!-- row -->
        </div>
    </div> 
  </div>
</div>
<script>
</script>