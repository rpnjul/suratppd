<div class="section-header">
  <h1>Data Pegawai</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-header">
          <h4>Detail Data Pegawai</h4>
          <div class="card-header-action">
              <a href="<?php echo base_url('pegawai') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
              <label for="pgw_nip" class="control-label">NIP</label>
                <input readonly="" type="text" name="pgw_nip" value="<?php echo ($pegawai['pgw_nip']); ?>" class="form-control" id="pgw_nip" />
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="pgw_nm" class="control-label">Nama Lengkap</label>
              <div class="form-group">
                <input readonly="" type="text" name="pgw_nm" value="<?php echo ($pegawai['pgw_nm']); ?>" class="form-control" id="pgw_nm" />
              </div>                     
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <label for="pgw_jnk" class="control-label">Jenis Kelamin</label>
                  <div class="form-group">
                  	<input readonly="" type="text" name="pgw_jnk" value="<?php echo ($pegawai['pgw_jnk']); ?>" class="form-control" id="pgw_nm" />
                    <div class="text-danger"><?php echo form_error('pgw_jnk');?></div>
                  </div>
                </div>
                <div class="col-6">
                  <label for="pgw_tlp" class="control-label">Nomor Telepon</label>
                  <div class="form-group">
                    <input readonly="" type="text" name="pgw_tlp" value="<?php echo ($pegawai['pgw_tlp']); ?>" class="form-control" id="pgw_tlp" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <label for="pgw_tlh" class="control-label">Tempat Lahir</label>
                  <div class="form-group">
                    <input readonly="" type="text" name="pgw_tlh" value="<?php echo ($pegawai['pgw_tlh']); ?>" class="form-control" id="pgw_tlh" />
                  </div>
                </div>
                <div class="col-6">
                  <label for="pgw_tll" class="control-label">Tanggal Lahir</label>
                  <div class="form-group">
                    <input readonly="" type="text" name="pgw_tll" value="<?php echo ($pegawai['pgw_tll']); ?>" class="form-control" id="pgw_tll" />
                  </div>
                </div> 
              </div>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-md-6">
                  <label for="pgw_gpt" class="control-label">Golongan</label>
                  	<div class="form-group">
                   		<input readonly="" type="text" name="pgw_gpt" value="<?php echo ($pegawai['pgw_gpt']); ?>" class="form-control" id="pgw_gpt" />
                	</div>
                </div>
                <div class="col-md-6">
                  	<label for="pgw_jab" class="control-label">Jabatan</label>
                  	<div class="form-group">
                    	<input readonly="" type="text" name="pgw_jab" value="<?php echo ($pegawai['pgw_jab']); ?>" class="form-control" id="pgw_jab" />
                 	</div>
                </div>  
              </div>
            </div>
            <div class="col-md-6">
              <label for="pgw_eml" class="control-label">Alamat Email</label>
              <div class="form-group">
                <input readonly="" type="text" name="pgw_eml" value="<?php echo ($pegawai['pgw_eml']); ?>" class="form-control" id="pgw_eml" />
                <div class="text-danger"><?php echo form_error('pgw_eml');?></div>
              </div>
            </div>
            <?php if (($level=='Kepala Kantor' || $level=='Admin') && $pegawai['pgw_jab']!='Kepala Kantor'): ?> 

                <div class="col-md-6">
                  <label for="pgw_snd" class="control-label">Kata sandi</label>
                  <input disabled=""  autocomplete="off" name="pgw_snd" class="form-control" id="pgw_snd" type="password"  value="<?php echo ($pegawai['pgw_snd']) ?>" />
                  <div class="text-danger"><?php echo form_error('pgw_snd');?></div>
                </div>

            <?php endif ?>
          </div> <!-- row -->
        </div>
    </div> 
  </div>
</div>
<script>

</script>