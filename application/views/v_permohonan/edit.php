
<div class="section-header">
  <h1><?php echo $judul ?></h1>
</div>
<div class="row">
  	<div class="col-12">
	    <div class="card">
	        <div class="card-header">
	          <h4>Ubah <?php echo $judul ?></h4>
	          <div class="card-header-action">
	              <a href="<?php echo base_url('permohonan') ?>" class="btn btn-sm btn-light"><span class="fas fa-chevron-left"></span> Kembali</a>
	          </div>
	        </div>
	        <div class="card-body">
	            <form method='post' action='<?php echo site_url('permohonan/re_upload/'.$permohonan['psl_id']) ?>' enctype='multipart/form-data'>
	          		<div class="row clearfix">
	          			<div class="col-12 ">
	          				<div class="row">
	          					<div class="col-md-6">
	          						<div class="form-group">
	          							<label for="#psl_no" class="control-label"><span class="text-danger">*</span> Nomor Permohonan</label>
	          							<input readonly="" disabled autocomplete="off" type="text" id="psl_no" name="psl_no" value="<?php echo $permohonan['psl_no']?>" class="form-control" />
	          							<span class="text-danger"><?php echo form_error('psl_no');?></span>
	          						</div>
	          					</div>
	          					<div class="col-md-6">
	          						<div class="form-group">
	          							<label for="#psl_tgl" class="control-label"><span class="text-danger">*</span> Tanggal Permohonan</label>
	          							<input disabled autocomplete="off" type="text" id="psl_tgl" name="psl_tgl" readonly="" value="<?php echo $this->loader->konversi_tanggal($permohonan['psl_tgl']); ?>" class="form-control" />
	          							<span class="text-danger"><?php echo form_error('psl_tgl');?></span>
	          						</div>
	          					</div>
	          				</div>
	          			</div>
						<div class="col-sm-12">
							<div class="row">
								<div class="col-md-4 col-sm-12">
									<div class="form-group">
										<label for="#direktur_no" class="control-label"><span class="text-danger">*</span> NIP Direktur</label>
										<div class="input-group">
											<input autocomplete="off" type="text" id="direktur_no" name="direktur_no" value="<?php echo ($this->input->post('direktur_no') ? $this->input->post('direktur_no') : $permohonan['direktur_no']  ); ?>" class="form-control" />
											<div class="input-group-append">
											  <button class="btn btn-warning" type="button" id="cek_direktur">Cek</button>
											</div>
										</div>
										<span class="text-danger"><?php echo form_error('direktur_no');?></span>
									</div>
								</div>
								<div class="col-md-4 col-sm-12">
									<div class="form-group">
										<label for="#direktur_nm" class="control-label"><span class="text-danger">*</span> Nama Direktur</label>
										<input readonly="" disabled autocomplete="off" type="text" id="direktur_nm" name="direktur_nm" value="<?php echo (isset($permohonan['direktur_nm']) ? $permohonan['direktur_nm'] : $this->input->post('direktur_nm') ); ?>" class="form-control" />
										<span class="text-danger"><?php echo form_error('direktur_nm');?></span>
									</div>
								</div>
								<div class="col-md-4 col-sm-12">
									<div class="form-group">
									<label for="#psl_prh" class="control-label"><span class="text-danger">*</span> Perihal</label>
									<input type="text" placeholder="Pelaksanaan Lelang" id="psl_prh" name="psl_prh" value="<?php echo ($this->input->post('psl_prh')?$this->input->post('psl_prh'):$permohonan['psl_prh']); ?>" class="form-control" />
									<span class="text-danger"><?php echo form_error('psl_prh');?></span>
								</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
										<label for="#dok1" class="control-label"><span class="text-danger">*</span> Ubah Lmp. Data Barang</label>
										<input type="file" class="form-control-file" id="dok1" name="files[0]" accept=".jpg, .png, .jpeg, .bmp">
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
										<label for="#dok2" class="control-label"><span class="text-danger">*</span> Ubah Lmp. Nomor rekenking piutang</label>
										<input type="file" class="form-control-file" id="dok2" name="files[1]" accept=".jpg, .png, .jpeg, .bmp">
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
										<label for="#dok3" class="control-label"><span class="text-danger">*</span> Ubah Lmp. Sertifikat Hak Tanah</label>
										<input type="file" class="form-control-file" id="dok3" name="files[2]" accept=".jpg, .png, .jpeg, .bmp">
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
										<label for="#dok4" class="control-label"><span class="text-danger">*</span> Ubah Lmp. Perjanjian Pengalihan Piutang</label>
										<input type="file" class="form-control-file" id="dok4" name="files[3]" accept=".jpg, .png, .jpeg, .bmp">
									</div>
								</div>
							</div>
							<?php if (!empty($dok)): ?>
								<div class="row mb-4 mt-8">
									<?php if (isset($dok['psllmp_dok1'])): ?>
										<div class="col-sm-3">
											<div class="alert alert-success" role="alert">
											  Telah tersedia <a href="<?php echo base_url('/upload/'.$dok['psllmp_dok1']) ?>" class="alert-link">Lihat</a>
											</div>
										</div>
									<?php endif ?>
									<?php if (isset($dok['psllmp_dok2'])): ?>
										<div class="col-sm-3">
											<div class="alert alert-success" role="alert">
											  Telah tersedia <a href="<?php echo base_url('/upload/'.$dok['psllmp_dok2']) ?>" class="alert-link">Lihat</a>
											</div>
										</div>
									<?php endif ?>
									<?php if (isset($dok['psllmp_dok3'])): ?>
										<div class="col-sm-3">
											<div class="alert alert-success" role="alert">
											  Telah tersedia <a href="<?php echo base_url('/upload/'.$dok['psllmp_dok3']) ?>" class="alert-link">Lihat</a>
											</div>
										</div>
									<?php endif ?>
									<?php if (isset($dok['psllmp_dok4'])): ?>
										<div class="col-sm-3">
											<div class="alert alert-success" role="alert">
											  Telah tersedia <a href="<?php echo base_url('/upload/'.$dok['psllmp_dok4']) ?>" class="alert-link">Lihat</a>
											</div>
										</div>
									<?php endif ?>
								</div>
							<?php endif ?>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="#psl_srt" class="control-label"><span class="text-danger">*</span> Isi Surat</label>
								<textarea type="text" id="psl_srt" name="psl_srt" rows="4" ><?php echo ($this->input->post('psl_srt')?$this->input->post('psl_srt'):$permohonan['psl_srt']) ?></textarea>
								<span class="text-danger"><?php echo form_error('psl_srt');?></span>
							</div>
						</div>

	          		</div>	   	          		
	        </div>
	    <div class="card-footer text-right">
	      <button type="submit" class="btn btn-success" id="confirm" name="upload">
	            <i class="fas fa-check"></i> Simpan
	      </button>
	    </div>
	    
	    </form>
	    </div>
	</div>

</div>

<script src="<?php echo site_url('resources/ckeditor/ckeditor.js') ?>"></script>
<script>
	CKEDITOR.replace( 'psl_srt' );
	$(function(){

		$('#direktur_no').keyup(function(event) {
			$.ajax({
				url: '<?php echo site_url('direktur/get_direktur') ?>',
				type: 'GET',
				dataType:'json',
				data: {direktur_no: $('#direktur_no').val()},
				success: function(data) {
					//var ret = JSON.parse(data);
					//var foo = ;
				     if (data) {
				     	$('#direktur_no').val(data.direktur_no);
				     	$('#direktur_nm').val(data.direktur_nm);
				     } else {
				     	$('#direktur_nm').val('-');
				     }

				}
			});
		});

		$('#direktur_no').focusout(function(event) {
			$.ajax({
				url: '<?php echo site_url('direktur/get_direktur') ?>',
				type: 'GET',
				dataType:'json',
				data: {direktur_no: $('#direktur_no').val()},
				success: function(data) {
					//var ret = JSON.parse(data);
					//var foo = ;
				     if (data) {
				     	$('#direktur_no').val(data.direktur_no);
				     	$('#direktur_nm').val(data.direktur_nm);
				     } else {
				     	$('#direktur_nm').val('-');
				     }

				}
			})
			.done(function() {
			
			})
			.fail(function() {
				
			})
			.always(function() {
				console.log("complete");
			});
		});

		$('#cek_direktur').click(function(event) {
			$.ajax({
				url: '<?php echo site_url('direktur/get_direktur') ?>',
				type: 'GET',
				dataType:'json',
				data: {direktur_no: $('#direktur_no').val()},
				success: function(data) {
					//var ret = JSON.parse(data);
					//var foo = ;
				     if (data) {
				     	swal('Nomor terdaftar','Cek nomor direktur', 'success');
				     	$('#direktur_nm').val(data.direktur_nm);
				     } else {
				     	swal('Cek nomor direktur','Nomor tidak terdaftar', 'error');
				     	$('#direktur_nm').val('-');
				     }

				}
			})
			.done(function() {
			
			})
			.fail(function() {
				
			})
			.always(function() {
				console.log("complete");
			});
			
		});

		$('#direktur_no').autocomplete({
			source: "<?php echo site_url('direktur/get_autocomplete'); ?>",
			open:function(event,ui){
				$('[name="direktur_no"]').val(ui.item.label);
				if (ui.item) {
            		$('[name="direktur_nm"]').val(ui.item.description);
		        } else {
		            $('[name="direktur_nm"]').val("-");
		        }
			},
			select:function(event,ui){
				$('[name="direktur_no"]').val(ui.item.label);
				if (ui.item) {
            		$('[name="direktur_nm"]').val(ui.item.description);
		        } else {
		            $('[name="direktur_nm"]').val("-");
		        }
				//$('[name="direktur_nm"]').val(ui.item.description);
				event.preventDefault();
			},
/*			change:function(event,ui){
				if (ui.item) {
            		$('[name="direktur_nm"]').val(ui.item.description);
		        } else {
		            $('[name="direktur_nm"]').val("-");
		        }
		        event.preventDefault();
			},*/
/*			close:function(event,ui){
				if (ui.item) {
            		$('[name="direktur_nm"]').val(ui.item.description);
		        } else {
		            $('[name="direktur_nm"]').val("-");
		        }
			}*/
		});
	});
</script>

