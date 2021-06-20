<div class="row">
    <div class="col-md-12">
      	<div class="card card-info">
      		<div class="card-header">
			  <h4>Coming Soon</h4>
			</div>
		</div>
	</div>
</div>
<!-- <div class="row">
    <div class="col-md-12">
      	<div class="card card-info">
      		<div class="card-header">
      		  <h4>Tambah Data Nota Dinas</h4>
      		  <div class="card-header-action">
      		      <a href="<?php echo base_url('nota_dinas') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
      		  </div>
      		</div>
            <?php echo form_open('nota_dinas/add'); ?>
          	<div class="card-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<label for="srtgs_no" class="control-label">Ref. Nomor Surat Tugas</label>
							<input autocomplete="off" type="text" name="srtgs_no" value="<?php echo $this->input->post('srtgs_no'); ?>" class="form-control" id="srtgs_no" />
							<span class="text-danger"><?php echo form_error('srtgs_no');?></span>
						</div>
						<div class="form-group">
							<label for="nds_no" class="control-label">Nomor Surat Dinas</label>
							<input autocomplete="off" type="text" name="nds_no" disabled="" value="<?php echo $kode; ?>" class="form-control" id="nds_no" />
							<span class="text-danger"><?php echo form_error('nds_no');?></span>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="nds_prh" class="control-label">Perihal Surat</label>
							<input autocomplete="off" type="text" name="nds_prh" value="<?php echo $this->input->post('nds_prh'); ?>" class="form-control" id="nds_prh" />
							<span class="text-danger"><?php echo form_error('nds_prh');?></span>
						</div>
						<label for="nds_tgl" class="control-label">Tanggal</label>
						<div class="form-group">
							<input autocomplete="off"  disabled type="text" name="nds_tgl" value="<?php echo $this->loader->konversi_tanggal(date("Y-m-d")); ?>" readonly class="form-control" id="nds_tgl" />
							<span class="text-danger"><?php echo form_error('nds_tgl');?></span>
						</div>
					</div>
					<div class="col-md-12">
						<label for="nds_dsr" class="control-label">Isi surat</label>
						<div class="form-group">
							<textarea name="nds_dsr" autocomplete="true" class="form-control" id="nds_dsr"><?php echo $this->input->post('nds_dsr'); ?></textarea>
							<span class="text-danger"><?php echo form_error('nds_dsr');?></span>
						</div>
					</div>
				</div>
				<div class="page-header">
				  <h4>Pegawai yang melakukan Perjalanan Dinas : </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
			    <div class="float-right">
						      <button type="button" name="add" id="add" class="btn btn-success btn-sm"><span class="fas fa-plus"></span></button>
						    </div>
						    <div class="table-responsive">  
						        <table class="table table-bordered"> 
									<tbody id="pengikutField">
							            <tr id="row1">    
							                <td>
							                	<label for="pgw_nip[]" class="control-label" ><span class="text-danger">*</span>Pegawai :</label>
							                	<input autocomplete="off" type="text" name="pgw_nip[]" placeholder="Masukan NIP" class="form-control" required="" />
							                </td>  
							                <td>
							                	<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Tanggal Perjalanan:</label>
							                	<input autocomplete="off" type="text" name="pgwnds_tgl[]" placeholder="Tanggal Perjalanan" class="form-control" required="" />
							                </td>  
							                <td>
							                	<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Tempat Perjalanan :</label>
							                	<input autocomplete="off" type="text" name="pgwnds_tmt[]" placeholder="Tempat Perjalanan" class="form-control" required="" />
							                </td> 
							            	<td>
								            	<label for="#pengikut" class="control-label" ><span class="text-danger">*</span>Keterangan :</label>
								            	<div class="input-group">
								            		<input autocomplete="off" type="text" name="pgwnds_ket[]" placeholder="Keterangan" class="form-control" />
								            		<span class="input-group-append">
								            			<button type="button"  name="remove" id="1" class="btn btn-danger btn_remove">&times;</button>
								            		</span>
								            	</div>
							            	</td>  
							            </tr> 
							              
									</tbody>
						        </table> 
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
<script>
	CKEDITOR.replace( 'nds_dsr' );
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
	})
</script> -->