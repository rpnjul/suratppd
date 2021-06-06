<div class="row">
    <div class="col-md-12">
      	<div class="card card-info">
            <div class="card-header with-border">
              	<h4>Daftar Rincian Edit</h4>
              	<div class="card-header-action">
              	    <a class="btn btn-secondary text-dark btn-sm" href="<?php echo site_url('rincian'); ?>" >Kembali</a> 
              	</div>
            </div>
			<?php echo form_open('rincian/edit/'.$daftar_rincian['rcn_id']); ?>
			<div class="card-body">
          		<div class="row clearfix">
					<div class="col-md-3">
						<label for="srtgs_no" class="control-label">Ref. Surat Tugas</label>
						<div class="form-group">
							<input autocomplete="off" name="srtgs_no" class="form-control" id="srtgs_no" value="<?php echo ($this->input->post('srtgs_no')?$this->input->post('srtgs_no'):$daftar_rincian['srtgs_no']); ?>"/>
							<span class="text-danger"><?php echo form_error('srtgs_no'); ?></span>
						</div>
						<label for="rcn_tgl" class="control-label">Tanggal</label>
						<div class="form-group">
							<input autocomplete="off" name="rcn_tgl" class="form-control" id="rcn_tgl" readonly="" value="<?php echo $this->loader->konversi_tanggal($daftar_rincian['rcn_tgl']); ?>" />
							<span class="text-danger"><?php echo form_error('rcn_tgl'); ?></span>
						</div>
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-9">
										<label for="rnd_binap" class="control-label">Biaya Inap</label>
										<div class="form-group">
											<input autocomplete="off" name="rnd_binap" maxlength="14" class="form-control rupiah" id="rnd_binap" value="<?php echo ($this->input->post('rnd_binap')?$this->input->post('rnd_binap'):$daftar_rincian['rnd_binap']); ?>"/>
											<span class="text-danger"><?php echo form_error('rnd_binap'); ?></span>
										</div>
									</div>
									<div class="col-md-3">
										<label for="rnd_jmlinap" class="control-label">Jml. Hari</label>
										<div class="form-group">
											<input autocomplete="off" name="rnd_jmlinap" maxlength="14" class="form-control" id="rnd_jmlinap" value="<?php echo ($this->input->post('rnd_jmlinap')?$this->input->post('rnd_jmlinap'):$daftar_rincian['rnd_jmlinap']); ?>"/>
											<span class="text-danger"><?php echo form_error('rnd_jmlinap'); ?></span>
										</div>			
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="rnd_brkt" class="control-label">Biaya Berangkat</label>
										<div class="form-group">
											<input autocomplete="off" name="rnd_btrkt" maxlength="14" class="form-control rupiah" id="rnd_btrkt" value="<?php echo ($this->input->post('rnd_btrkt')?$this->input->post('rnd_btrkt'):$daftar_rincian['rnd_btrkt']); ?>"/>
											<span class="text-danger"><?php echo form_error('rnd_btrkt'); ?></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="rnd_bplg" class="control-label">Biaya Pulang</label>
										<div class="form-group">
											<input autocomplete="off" name="rnd_bplg" maxlength="14" class="form-control rupiah" id="rnd_bplg" value="<?php echo ($this->input->post('rnd_bplg')?$this->input->post('rnd_bplg'):$daftar_rincian['rnd_bplg']); ?>"/>
											<span class="text-danger"><?php echo form_error('rnd_bplg'); ?></span>
										</div>			
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<label for="rnd_sku" class="control-label">Uang Saku</label>
								<div class="form-group">
									<input autocomplete="off" name="rnd_sku" maxlength="14" class="form-control rupiah" id="rnd_sku" value="<?php echo ($this->input->post('rnd_sku')?$this->input->post('rnd_sku'):$daftar_rincian['rnd_sku']); ?>"/>
									<span class="text-danger"><?php echo form_error('rnd_sku'); ?></span>
								</div>
								<div class="row">
									<div class="col-md-8">
										<label for="rnd_ketlln" class="control-label">Keterangan Lain</label>
										<div class="form-group">
											<input autocomplete="off" name="rnd_ketlln" type="text" class="form-control" id="rnd_ketlln" value="<?php echo ($this->input->post('rnd_ketlln')?$this->input->post('rnd_ketlln'):$daftar_rincian['rnd_ketlln']); ?>"/>
											<span class="text-danger"><?php echo form_error('rnd_ketlln'); ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<label for="rnd_lln" class="control-label">Biaya Lain</label>
										<div class="form-group">
											<input autocomplete="off" name="rnd_lln" maxlength="14" class="form-control rupiah" id="rnd_lln" value="<?php echo ($this->input->post('rnd_lln')?$this->input->post('rnd_lln'):$daftar_rincian['rnd_lln']); ?>"/>
											<span class="text-danger"><?php echo form_error('rnd_lln'); ?></span>
										</div>			
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="card-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Simpan
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>
<script>
	$(function(){
		$('#srtgs_no').autocomplete({
		  	source:"<?php echo ($level!='Pejabat Lelang'?site_url('surat_tugas/get_autocomplete'):site_url('surat_tugas/get_autocomplete_by_nip')); ?>",
		});
		$('.rupiah').keyup(function(event) {
			$(this).val(formatRupiah($(this).val()));
		});
		$('.rupiah').focusout(function(event) {
			$(this).val(formatRupiah($(this).val()));
		});
	});
	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
	 
		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
	 
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>