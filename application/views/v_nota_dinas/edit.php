<div class="row">
    <div class="col-md-12">
      	<div class="card card-info">
      		<div class="card-header">
      		  <h4>Tambah Data Nota Dinas</h4>
      		  <div class="card-header-action">
      		      <a href="<?php echo base_url('nota_dinas') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
      		  </div>
      		</div>
            <?php echo form_open_multipart('nota_dinas/add'); ?>
          	<div class="card-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<label for="srtgs_no" class="control-label">Ref. Nomor Surat Tugas <i class="text-danger">*</i></label>
							<input autocomplete="off" type="text" name="srtgs_no" value="<?php echo ($this->input->post('srtgs_no')?$this->input->post('srtgs_no'):$nota_dinas['srtgs_no']); ?>" placeholder="Ketik 3 digit surat tugas" class="form-control" id="srtgs_no" readonly/>
							<span class="text-danger"><?php echo form_error('srtgs_no');?></span>
						</div>
						<div class="form-group">
							<label for="nds_no" class="control-label">Nomor Surat Dinas <i class="text-danger">*</i></label>
							<input autocomplete="off" type="text" name="nds_no" readonly value="<?php echo ($this->input->post('nds_no')?$this->input->post('nds_no'):$nota_dinas['nds_no']); ?>" class="form-control" id="nds_no" />
							<span class="text-danger"><?php echo form_error('nds_no');?></span>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="rcn_no" class="control-label">Ref. Nomor Rincian <i class="text-danger">*</i></label>
							<input autocomplete="off" type="text" name="rcn_no" readonly value="<?php echo ($this->input->post('rcn_no')?$this->input->post('rcn_no'):$nota_dinas['rcn_no']); ?>" class="form-control" id="rcn_no" />
							<span class="text-danger"><?php echo form_error('rcn_no');?></span>
						</div>
						<label for="nds_tgl" class="control-label">Tanggal</label>
						<div class="form-group">
							<input autocomplete="off"  readonly type="text" name="nds_tgl" value="<?php echo $this->loader->konversi_tanggal(date("Y-m-d")); ?>" readonly class="form-control" id="nds_tgl" />
							<span class="text-danger"><?php echo form_error('nds_tgl');?></span>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<label for="nds_dsr" class="control-label">Nomor Kwitansi</label>
							<input autocomplete="off" type="text" name="nds_dsr" value="<?php echo ($this->input->post('nds_dsr')?$this->input->post('nds_dsr'):$nota_dinas['nds_dsr']); ?>" placeholder="Masukan Nomor Kwitansi" class="form-control" id="nds_dsr" />
							<span class="text-danger"><?php echo form_error('nds_dsr');?></span>
						</div>
					</div>
					<?php if($nota_dinas['file_ext']!=null): ?>
						<?php
							$images = json_decode($nota_dinas['file_ext']);
						?>
					<?php endif;?>
					<div class="col-12">
						<div class="row">
							<div class="col-3">
								<label for="" class="control-label">Gambar Tambahan 1</label>
								<input type="file" id="dok1" name="files[]" value="<?php if($images->image1!=null): ?><?php echo 'upload/nota/'.$images->image1 ?> <?php endif; ?>" class="form-control-file"  accept=".jpe, .jpg, .jpeg .png, .bmp">
							</div>
							<div class="col-3">
								<label for="" class="control-label">Gambar Tambahan 2</label>
								<input type="file" id="dok2" name="files[]" value="<?php if($images->image2!=null): ?><?php echo 'upload/nota/'.$images->image1 ?> <?php endif; ?>" class="form-control-file"  accept=".jpe, .jpg, .jpeg .png, .bmp">
							</div>
							<div class="col-3">
								<label for="" class="control-label">Gambar Tambahan 3</label>
								<input type="file" id="dok3" name="files[]" value="<?php if($images->image3!=null): ?><?php echo 'upload/nota/'.$images->image1 ?> <?php endif; ?>" class="form-control-file"  accept=".jpe, .jpg, .jpeg .png, .bmp">
							</div>
							<div class="col-3">
								<label for="" class="control-label">Gambar Tambahan 4</label>
								<input type="file" id="dok4" name="files[]" value="<?php if($images->image4!=null): ?><?php echo 'upload/nota/'.$images->image1 ?> <?php endif; ?>" class="form-control-file"  accept=".jpe, .jpg, .jpeg .png, .bmp">
							</div>
						</div>
					</div>
					
				</div>
			</div>
          	<div class="card-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Tambah
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
<script src="<?php echo site_url('resources/ckeditor/ckeditor.js') ?>"></script>
<script src="<?php echo site_url('resources/ckeditor/adapters/jquery.js') ?>"></script>
<script src="<?php echo site_url('resources/ckeditor/config.js') ?>"></script>
<script src="<?php echo site_url('resources/ckeditor/styles.js') ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/select2/css/select2.min.css') ?>">
<script src="<?php echo site_url('assets/select2/js/select2.min.js') ?>"></script>

<script>
	// CKEDITOR.replace( 'nds_dsr' );
	$(function() {
		$('#srtgs_no').autocomplete({
		  	source:"<?php echo site_url('surat_tugas/get_autocomplete/?'); ?>",
		});
		$('input[name^="pgwnds_tgl"]').datepicker({
		    dateFormat:"yy-mm-dd",
		    changeYear: true,
		    changeMonth: true
		});
		var i=1;  
		$(document).on('click', '.btn_remove', function(){  
		     var button_id = $(this).attr("id");   
		     $('#row'+button_id+'').remove();  
		     i--;
		});  

		$('#add').click(function(){  
		     i++;  
		     $('#pengikutField').append(`
		     	<tr id="row`+i+`">
		     	    <td>
		     	    	<label for="pgw_nip[]" class="control-label" ><span class="text-danger">*</span>Pegawai :</label>
		     	    	<input autocomplete="off" type="text" name="pgw_nip[]" placeholder="Masukan NIP" class="form-control" required="" />
		     	    </td>  
		     	    <td>
		     	    	<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Tanggal Sidang:</label>
		     	    	<input autocomplete="off" type="text" name="pgwnds_tgl[]" placeholder="Tanggal sidang" class="form-control" required="" />
		     	    </td>  
		     	    <td>
		     	    	<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Tempat Sidang :</label>
		     	    	<input autocomplete="off" type="text" name="pgwnds_tmt[]" placeholder="Tempat sidang" class="form-control" required="" />
		     	    </td> 
		     		<td>
		     			<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>No. perkara &amp; acara :</label>
		     			<input autocomplete="off" type="text" name="pgwnds_pkr[]" placeholder="Nomor perkara dan acara sidang" class="form-control" required="" />
		     		</td>
		     		<td>
		     			<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Keterangan :</label>
						<div class="input-group">
							<input autocomplete="off" type="text" name="pgwnds_ket[]" placeholder="Keterangan" class="form-control" />
							<div class="input-group-append">
								<button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove">&times;</button>
							</div>
						</div>
		     		</td>  
		     		</tr>`);  
			$('input[name^="pgw_nip"]').each(function() {
			  $(this).autocomplete({
			    source:"<?php echo site_url('pegawai/get_autocomplete/?'); ?>"
			  });
			}); 
			$('input[name^="pgwnds_tgl"]').datepicker({
			    dateFormat:"yy-mm-dd",
			    changeYear: true,
			    changeMonth: true
			});
		});
		$('input[name^="pgw_nip"]').each(function() {
		  $(this).autocomplete({
		    source:"<?php echo site_url('pegawai/get_autocomplete/?'); ?>"
		  });
		}); 
		$('#srtgs_no').on('change blur',function(){
		
			$('#rcn_no').select2({
				ajax: {
					url: '<?php echo site_url('rincian/ajax_select2/'); ?>',
					dataType: 'json',
					data: { id :$('#srtgs_no').val() },
				}
			});
		});
	});
	// $('#srtgs_no').on('change blur',function(){
		
	// });
	// $('#rcn_no').select2();
</script>