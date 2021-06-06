<div class="row">
    <div class="col-md-12">
      	<div class="card card-info">
                <div class="card-header">
      		  <h4>Ubah Data Nota Dinas</h4>
      		  <div class="card-header-action">
      		      <a href="<?php echo base_url('nota_dinas') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
      		  </div>
      		</div>
			<?php echo form_open('nota_dinas/edit/'.$nota_dinas['nds_id']); ?>
			<?php $jml = intval($count_pgw); ?>
			<div class="card-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<label for="srtgs_no" class="control-label">Ref. Nomor Surat Tugas</label>
							<input autocomplete="off" type="text" name="srtgs_no" value="<?php echo ($this->input->post('srtgs_no')?$this->input->post('srtgs_no'):$nota_dinas['srtgs_no']); ?>" class="form-control" id="srtgs_no" />
							<span class="text-danger"><?php echo form_error('srtgs_no');?></span>
						</div>
						<div class="form-group">
							<label for="nds_no" class="control-label">Nomor Surat Dinas</label>
							<input autocomplete="off" type="text" name="nds_no" value="<?php echo ($this->input->post('nds_no')?$this->input->post('nds_no'):$nota_dinas['nds_no']); ?>" class="form-control" id="nds_no" />
							<span class="text-danger"><?php echo form_error('nds_no');?></span>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="nds_prh" class="control-label">Perihal Surat</label>
							<input autocomplete="off" type="text" name="nds_prh" value="<?php echo ($this->input->post('nds_prh')?$this->input->post('nds_prh'):$nota_dinas['nds_prh']); ?>" class="form-control" id="nds_prh" />
							<span class="text-danger"><?php echo form_error('nds_prh');?></span>
						</div>
						<label for="nds_tgl" class="control-label">Tanggal</label>
						<div class="form-group">
							<input autocomplete="off" type="text" name="nds_tgl" value="<?php echo $this->loader->konversi_tanggal($nota_dinas['nds_tgl']); ?>" readonly class="form-control" id="nds_tgl" />
							<span class="text-danger"><?php echo form_error('nds_tgl');?></span>
						</div>
					</div>
					<div class="col-md-12">
						<label for="nds_dsr" class="control-label">Isi surat</label>
						<div class="form-group">
							<textarea name="nds_dsr" class="form-control" id="nds_dsr" ><?php echo ($this->input->post('nds_dsr')?$this->input->post('nds_dsr'):$nota_dinas['nds_dsr']); ?></textarea>
							<span class="text-danger"><?php echo form_error('nds_dsr');?></span>
						</div>
					</div>
				</div>
				<div class="page-header">
				  <h4>Pegawai yang menghadiri perkara sidang lanjutan : </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						    <label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Pegawai :</label>
						    <div class="btn-group">
						      <button type="button" name="add" id="add" class="btn btn-success btn-xs">Tambah pegawai</button>
						    </div>
						    <div class="table-responsive">  
						        <table class="table table-bordered"> 
									<tbody  id="pengikutField">
										    <?php if($jml>0) {?>
										    	<?php foreach ($pengikut_dinas as $i => $value){ ?>
										    		<?php $pgk = $this->M_pegawai->get_pegawai_by_nip($value->pgw_nip); ?>
										    <tr id="row<?php echo($i) ?>">  
										        <td><label for="pgw_nip[]" class="control-label" ><span class="text-danger">*</span>Pegawai :</label>
										        	<input autocomplete="off" type="text" name="pgw_nip[]" placeholder="Masukan NIP" class="form-control" required="" value="<?php echo ($pgk['pgw_nip'].' - '.$pgk['pgw_nm'].' ('.$pgk['pgw_jab'].')'); ?>" />
										        </td>  
										        <td>
										        	<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Tanggal Sidang:</label>
										        	<input autocomplete="off" type="text" name="pgwnds_tgl[]" placeholder="Tanggal sidang" class="form-control" required="" value="<?php echo($value->pgwnds_tgl) ?>" />
										        </td>  
										        <td>
										        	<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Tempat Sidang :</label>
										        	<input autocomplete="off" type="text" name="pgwnds_tmt[]" placeholder="Tempat sidang" class="form-control" required="" value="<?php echo($value->pgwnds_tmt) ?>" />
										        </td> 
										    	<td>
										    		<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>No. perkara &amp; acara :</label>
										    		<input autocomplete="off" type="text" name="pgwnds_pkr[]" placeholder="Nomor perkara dan acara sidang" class="form-control" required="" value="<?php echo($value->pgwnds_pkr) ?>" />
										    	</td>
										    	<td>
										    		<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Keterangan :</label>
										    			
										    		<div class="input-group">
										    			<input autocomplete="off" type="text" name="pgwnds_ket[]" placeholder="Keterangan" class="form-control" value="<?php echo(!empty($value->pgwnds_ket)?$value->pgwnds_ket:'') ?>" />
										    			<span class="input-group-btn">
										    				<button type="button"  name="remove" id="<?php echo $i; ?>" class="btn btn-danger btn_remove">&times;</button>
										    			</span>
										    		</div>
										    	</td>  
										   	
										    </tr> 
										<?php } ?>

										<?php }else{ ?>
											<tr id="row1">  
											    <td><label for="pgw_nip[]" class="control-label" ><span class="text-danger">*</span>Pegawai :</label>
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
														<div class="input-group-btn">
															<button type="button"  name="remove" id="1" class="btn btn-danger btn_remove">&times;</button>
														</div>
													</div>
												</td>
											</tr> 
										<?php } ?>
										      
									</tbody>
						        </table> 
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
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
<script>
	CKEDITOR.replace( 'nds_dsr' );
	$(function() {
		$('#srtgs_no').autocomplete({
		  	source:"<?php echo site_url('surat_tugas/get_autocomplete/?'); ?>",
		});
		$('input[name^="pgwnds_tgl"').datepicker({
		                dateFormat:"yy-mm-dd",changeYear: true,
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
						<span class="input-group-btn">
							<button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove">&times;</button>
						</span>
					</div>
	     		</td>  
	     		</tr>`);  
			$('input[name^="pgw_nip"]').each(function() {
			  $(this).autocomplete({
			    source:"<?php echo site_url('pegawai/get_autocomplete/?'); ?>"
			  });
			}); 
			$('input[name^="pgwnds_tgl"]').datepicker({
			                dateFormat:"yy-mm-dd",changeYear: true,
            changeMonth: true
			});
		});
		$('input[name^="pgw_nip"]').each(function() {
		  $(this).autocomplete({
		    source:"<?php echo site_url('pegawai/get_autocomplete/?'); ?>"
		  });
		}); 
	})
</script>