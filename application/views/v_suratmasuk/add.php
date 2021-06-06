<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/* End of file add.php */
/* Location: ./application/views/v_suratmasuk/add.php */
?>
<div class="section-header">
  <h1>Data Surat Masuk</h1>
</div>
<div class="row">
  	<div class="col-12">
	    <div class="card">
	        <div class="card-header">
	          <h4>Tambah Data Surat Masuk</h4>
	          <div class="card-header-action">
	              <a href="<?php echo base_url('surat_masuk') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
	          </div>
	        </div>
	        <div class="card-body">
	        	<?php echo form_open('surat_masuk/add'); ?>
	          		<div class="row clearfix">
						<div class="col-sm-12 col-md-6">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="#psl_no" class="control-label"><span class="text-danger">*</span> Nomor Surat Permohonan</label>
										<input autocomplete="off" type="text" id="psl_no" name="psl_no" value="<?php echo ($this->input->post('psl_no')); ?>" class="form-control" />
										<span class="text-danger"><?php echo form_error('psl_no');?></span>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="#psl_nm" class="control-label"><span class="text-danger">*</span> Pejabat (pemberi perintah)</label>
										<input autocomplete="off" disabled="" type="text"  readonly="" id="psl_nm" name="psl_nm" class="form-control" value="-" />
										<span class="text-danger"><?php echo form_error('psl_nm');?></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">						
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="form-group">
										<label for="#srtms_no" class="control-label"><span class="text-danger">*</span> Nomor Surat</label>
										<input autocomplete="off" disabled="" type="text" id="srtms_no" name="srtms_no" value="<?php echo $kode; ?>" class="form-control" />
										<span class="text-danger"><?php echo form_error('srtms_no');?></span>
									</div>
								</div>
								<div class="col-sm-12 col-md-6">
									<div class="form-group">
									<label for="#srtms_sft" class="control-label"><span class="text-danger">*</span> Sifat Surat</label>
										<select name="srtms_sft" class="form-control">
											<option value="">Pilih</option>
											<?php 
											$sifat_surat = array(
												'Biasa'=>'Biasa',
												'Segera'=>'Segera',
												'Sangat Segera'=>'Sangat Segera'
											);

											foreach($sifat_surat as $value => $display_text)
											{
												$selected = ($display_text ==$this->input->post('srtms_sft')) ? ' selected="selected"' : "";

												echo '<option value="'.$display_text.'" '.$selected.'>'.$display_text.'</option>';
											} 
											?>
										</select>
										<span class="text-danger"><?php echo form_error('srtms_sft');?></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="form-group">
										<label for="#srtms_tgl" class="control-label"><span class="text-danger">*</span> Tanggal Terima</label>
										<input autocomplete="off" disabled="" type="text" id="srtms_tgl" name="srtms_tgl" readonly="" value="<?php echo $this->loader->konversi_tanggal(date('Y-m-d')); ?>" class="form-control" />
										<span class="text-danger"><?php echo form_error('srtms_tgl');?></span>
									</div>
								</div>
								<div class="col-sm-12 col-md-6">					
									<div class="form-group">
										<label for="#srtms_trm" class="control-label"><span class="text-danger">*</span> Di Setujui melalui</label>
										<input autocomplete="off" disabled="" type="text" id="srtms_trm" name="srtms_trm" value="<?php echo $level; ?>" class="form-control" readonly />
										<span class="text-danger"><?php echo form_error('srtms_prh');?></span>
									</div>
								</div>
							</div>
						</div>
						
	          		</div>	   	          		
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
	$(function(){
		$('#psl_no').autocomplete({
			source: "<?php echo site_url('permohonan/get_autocomplete'); ?>",
			open:function(event,ui){
				$('[name="psl_no"]').val(ui.item.label);
				$('[name="psl_nm"]').val(ui.item.description);
			},
			select:function(event,ui){
				$('[name="psl_no"]').val(ui.item.label);
				$('[name="psl_nm"]').val(ui.item.description);
				event.preventDefault();
			}
		});
	});
</script>

