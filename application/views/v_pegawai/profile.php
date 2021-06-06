<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script> -->
<div class="section-header">
  <h1>Data Pegawai</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
     <?php echo form_open('pegawai/profile/'.$pegawai['pgw_id']); ?>
        <div class="card-header">
          <h4>Profil Pegawai - <?php echo $pegawai['pgw_nm'] ?></h4>
          <div class="card-header-action">
              <a href="<?php echo base_url('pegawai') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
              <label for="pgw_nip" class="control-label">NIP</label>
                <input required autocomplete="off" type="text" name="pgw_nip" value="<?php echo ($this->input->post('pgw_nip')?$this->input->post('pgw_nip'):$pegawai['pgw_nip']); ?>" class="form-control" id="pgw_nip" />
                <div class="text-danger"><?php echo form_error('pgw_nip');?></div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="pgw_nm" class="control-label">Nama Lengkap</label>
              <div class="form-group">
                <input required autocomplete="off" type="text" name="pgw_nm" value="<?php echo ($this->input->post('pgw_nm')?$this->input->post('pgw_nm'):$pegawai['pgw_nm']); ?>" class="form-control" id="pgw_nm" />
                <div class="text-danger"><?php echo form_error('pgw_nm');?></div>
              </div>                     
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <label for="pgw_jnk" class="control-label">Jenis Kelamin</label>
                  <div class="form-group">
                    <select name="pgw_jnk" class="form-control">
                      <?php 
                      $pgw_jnk_values = array(
                        'Laki-laki'=>'Laki-laki',
                        'Perempuan'=>'Perempuan'
                      );

                      foreach($pgw_jnk_values as $value => $display_text)
                      {
                        $selected = ($display_text == ($this->input->post('pgw_jnk')?$this->input->post('pgw_jnk'):$pegawai['pgw_jnk'])) ? ' selected="selected"' : "";

                        echo '<option value="'.$display_text.'" '.$selected.'>'.$display_text.'</option>';
                      } 
                      ?>
                    </select>
                    <div class="text-danger"><?php echo form_error('pgw_jnk');?></div>
                  </div>
                </div>
                <div class="col-6">
                  <label for="pgw_tlp" class="control-label">Nomor Telepon</label>
                  <div class="form-group">
                    <input required autocomplete="off" type="text" name="pgw_tlp" value="<?php echo ($this->input->post('pgw_tlp')?$this->input->post('pgw_tlp'):$pegawai['pgw_tlp']); ?>" class="form-control" id="pgw_tlp" />
                    <div class="text-danger"><?php echo form_error('pgw_tlp');?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <label for="pgw_tlh" class="control-label">Tempat Lahir</label>
                  <div class="form-group">
                    <input required autocomplete="off" type="text" name="pgw_tlh" value="<?php echo ($this->input->post('pgw_tlh')?$this->input->post('pgw_tlh'):$pegawai['pgw_tlh']); ?>" class="form-control" id="pgw_tlh" />
                    <div class="text-danger"><?php echo form_error('pgw_tlh');?></div>
                  </div>
                </div>
                <div class="col-6">
                  <label for="pgw_tll" class="control-label">Tanggal Lahir</label>
                  <div class="form-group">
                    <input required autocomplete="off" type="text" name="pgw_tll" value="<?php echo ($this->input->post('pgw_tll')?$this->input->post('pgw_tll'):$pegawai['pgw_tll']); ?>" class="form-control" id="pgw_tll" />
                    <div class="text-danger"><?php echo form_error('pgw_tll');?></div>
                  </div>
                </div> 
              </div>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-md-6">
                  <label for="pgw_gpt" class="control-label">Golongan</label>
                  <div class="form-group">
                    <?php if ($pegawai['pgw_jab']=='Kepala Kantor'): ?>
                      <select name="pgw_gpt" class="form-control">
                        <?php 
                        $pgw_gpt_values = array(
                          'Juru Muda (I/a)',
                          'Juru Muda Tk. I (I/b)',
                          'Juru (I/c)',
                          'Juru Tk. I (I/d)',
                          'Pengatur Muda (II/a)',
                          'Pengatur Muda Tk. I (II/b)',
                          'Pengatur (II/c)',
                          'Pengatur Tk. I (II/d)',
                          'Penata Muda (III/a)',
                          'Penatar Muda Tk. I (III/b)',
                          'Penata (III/c)',
                          'Penata Tk. I (III/d)',
                          'Pembina (IV/a)',
                          'Pembina Tk. I (IV/b)',
                          'Pembina Utama Muda (IV/c)',
                          'Pembina Utama Madya (IV/d)',
                          'Pembina Utama (IV/e)'
                        );

                        foreach($pgw_gpt_values as $value => $display_text)
                        {
                          $selected = ($display_text == ($this->input->post('pgw_gpt')?$this->input->post('pgw_gpt'):$pegawai['pgw_gpt'])) ? ' selected="selected"' : "";

                          echo '<option value="'.$display_text.'" '.$selected.'>'.$display_text.'</option>';
                        } 
                        ?>
                      </select>
                    <?php else: ?>
                      <input type="text" class="form-control" value="<?php echo $pegawai['pgw_gpt'] ?>" readonly disabled="">
                    <?php endif ?>
                    <div class="text-danger"><?php echo form_error('pgw_gpt');?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="pgw_jab" class="control-label">Jabatan</label>
                  <div class="form-group">
                  	<input type="text" class="form-control" id="pgw_jab" value="<?php echo $pegawai['pgw_jab'] ?>" disabled>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="pgw_eml" class="control-label">Alamat Email</label>
                  <div class="form-group">
                    <input required autocomplete="off" type="text" name="pgw_eml" value="<?php echo ($this->input->post('pgw_eml')?$this->input->post('pgw_eml'):$pegawai['pgw_eml']); ?>" class="form-control" id="pgw_eml" />
                    <div class="text-danger"><?php echo form_error('pgw_eml');?></div>
                  </div>
                </div>
                  <div class="col-md-6">
                    <label for="pgw_snd" class="control-label">Kata sandi</label>
                    <input required  autocomplete="off" name="pgw_snd" class="form-control" id="pgw_snd" type="password" maxlength="30"  value="<?php echo ($this->input->post('pgw_snd')?$this->input->post('pgw_snd'):$pegawai['pgw_snd']) ?>" />
                    <div class="text-danger"><?php echo form_error('pgw_snd');?></div>
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
