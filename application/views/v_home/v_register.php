<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/* End of file v_register.php */
/* Location: ./application/views/v_home/v_register.php */?>
	<div class="container mt-5">
	  <div class="row">
	    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
	      <div class="card card-primary">
	      	<div class="login-brand">
	      	  <img src="<?php echo base_url(); ?>resources/img/logo.png" alt="logo" width="100">
	      	  <br><a href="<?php echo base_url(); ?>"><strong>SPPD KPKNL BEKASI</strong></a>
	      	</div>
	        <div class="card-header"><h4><?php echo $judul ?></h4></div>

	        <div class="card-body">
	          <?php $attributes = array('class' => 'needs-validation','novalidate'=> '','autocomplete'=>'off');
	                     echo form_open('register/head-office',$attributes); ?>
	            <div class="row">
	              <div class="form-group col-6">
	            	<label for="pgw_nip" class="control-label"><span class="text-danger">*</span>NIP</label>
	            	<div class="form-group">
	            		<input type="text" name="pgw_nip" value="<?php echo $this->input->post('pgw_nip'); ?>" class="form-control" id="pgw_nip" />
	            		<span class="text-danger"><?php echo form_error('pgw_nip');?></span>
	            	</div>
	              </div>
	              <div class="form-group col-6">
	                <label for="pgw_nm" class="control-label"><span class="text-danger">*</span>Nama Lengkap</label>
		  			<div class="form-group">
		  				<input type="text" name="pgw_nm" value="<?php echo $this->input->post('pgw_nm'); ?>" class="form-control" id="pgw_nm" />
		  				<span class="text-danger"><?php echo form_error('pgw_nm');?></span>
		  			</div>
	              </div>
	            </div>

	            <div class="row">
	              <div class="form-group col-6">
	            	<label for="pgw_jnk" class="control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
		  			<div class="form-group">
		  				<select name="pgw_jnk" class="form-control">
		  				    <option value="">Pilih</option>
		  				        <?php 
		  				        $pgw_jnk_values = array(
		  				            'Laki-laki'=>'Laki-laki',
		  				            'Perempuan'=>'Perempuan'
		  				        );

		  				        foreach($pgw_jnk_values as $value => $display_text)
		  				        {
		  				            $selected = ($display_text == $this->input->post('pgw_jnk')) ? ' selected="selected"' : "";
		  				            echo '<option value="'.$display_text.'" '.$selected.'>'.$display_text.'</option>';
		  				        } 
		  				        ?>
		  				</select>	
		  				<span class="text-danger"><?php echo form_error('pgw_jnk');?></span>
		  			</div>
	              </div>
	              <div class="form-group col-6">
	                <label for="pgw_tlp" class="control-label"><span class="text-danger">*</span>Nomor Telepon</label>
		  			<div class="form-group">
		  				<input type="text" name="pgw_tlp" value="<?php echo $this->input->post('pgw_tlp'); ?>" class="form-control" id="pgw_tlp" />
		  				<span class="text-danger"><?php echo form_error('pgw_tlp');?></span>
		  			</div>
	              </div>
	            </div>

	            <div class="row">
	              <div class="form-group col-6">
	            	<label for="pgw_tlh" class="control-label"><span class="text-danger">*</span>Tempat Lahir</label>
		  			<div class="form-group">
		  				<input type="text" name="pgw_tlh" value="<?php echo $this->input->post('pgw_tlh'); ?>" class="form-control" id="pgw_tlh" />
		  				<span class="text-danger"><?php echo form_error('pgw_tlh');?></span>
		  			</div>
	              </div>
	              <div class="form-group col-6">
	              	<label for="pgw_tll" class="control-label"><span class="text-danger">*</span>Tanggal Lahir</label>
	              	<div class="form-group">
	              		<input type="text" name="pgw_tll" value="<?php echo $this->input->post('pgw_tll'); ?>" class="form-control" id="pgw_tll" />
	              		<span class="text-danger"><?php echo form_error('pgw_tll');?></span>
	              	</div>
	              </div>
	            </div>

	            <div class="row">

	              <div class="form-group col-6">
	              	<label for="pgw_gpt" class="control-label"><span class="text-danger">*</span>Pangkat &amp; Golongan</label>
		  			<div class="form-group">
		  			    <select name="pgw_gpt" class="form-control">
		  			        <option value="">Pilih</option>
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
		  			            $selected = ($display_text == $this->input->post('pgw_gpt')) ? ' selected="selected"' : "";
		  			            echo '<option value="'.$display_text.'" '.$selected.'>'.$display_text.'</option>';
		  			        } 
		  			        ?>
		  				</select>
		  				<span class="text-danger"><?php echo form_error('pgw_gpt');?></span>
		  			</div>
	              </div>
	              <div class="form-group col-6">
	              	<label for="pgw_jab" class="control-label"><span class="text-danger">*</span>Jabatan</label>
		  			<div class="form-group">
		  				<input type="text" name="pgw_jab" value="Kepala Kantor" readonly="" class="form-control" id="pgw_jab" />
		  			</div>
	              </div>

	            </div>

	        	<div class="row">

	              <div class="form-group col-12">
	            	<label for="pgw_eml" class="control-label"><span class="text-danger">*</span>Alamat Email</label>
		  			<div class="form-group">
		  				<input type="text" name="pgw_eml" value="<?php echo $this->input->post('pgw_eml'); ?>" class="form-control" id="pgw_eml" />
		  				<span class="text-danger"><?php echo form_error('pgw_eml');?></span>
		  			</div>
	              </div>
	              

	            </div>

	            <div class="row">
	              <div class="form-group col-6">
	                <label for="pgw_snd" class="control-label d-block"><span class="text-danger">*</span>Kata Sandi</label>
	                <div class="form-group">
	                	<input type="password" name="pgw_snd" value="<?php echo $this->input->post('pgw_snd'); ?>" data-toggle="password" class="form-control pwstrength" id="pgw_snd" data-indicator="pwindicator"  />
	                	<span class="text-danger"><?php echo form_error('pgw_snd');?></span>
	                	<div id="pwindicator" class="pwindicator">
	                	  <div class="bar"></div>
	                	  <div class="label"></div>
	                	</div>
	                </div>
	              </div>
	              <div class="form-group col-6">
	                <label for="pgw_konsnd" class="control-label d-block"><span class="text-danger">*</span>Konfirmasi Sandi</label>
		  			<div class="form-group">
		  				<input type="password" name="pgw_konsnd" value="<?php echo $this->input->post('pgw_konsnd'); ?>" class="form-control" id="pgw_konsnd" />
		  				<span class="text-danger"><?php echo form_error('pgw_konsnd');?></span>
		  			</div>
	              </div>
	            </div>


	            <div class="form-group">
	              <button type="submit" class="btn btn-info btn-lg btn-block">
	                Konfirmasi
	              </button>
	            </div>
	          <?php form_close(); ?>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

<script>
	$('#pgw_tll').datepicker({
	    dateFormat:"yy-mm-dd",
	    changeMonth: true,
	    changeYear: true
	});
	$("#pgw_nip").on("input", function(evt) {
	      var self = $(this);
	      self.val(self.val().replace(/[^0-9\.]/g, ''));
	      if ((evt.which < 48 || evt.which > 57)) 
	       {
	       evt.preventDefault();
	       }
	   });
	  $("#pgw_nip").focusout(function() {
	    $(this).val(($("#pgw_nip").val().replace(/\s+/g,'')));
	    //replace(/\s+/g, '');
	  });
	  $("#pgw_tlp").focusout(function() {
	     $(this).val(($("#pgw_tlp").val().replace(/\s+/g,'')));
	  });
</script>