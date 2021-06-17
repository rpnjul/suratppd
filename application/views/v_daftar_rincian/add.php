<div class="row">
    <div class="col-md-12">
      	<div class="card card-info">
            <div class="card-header with-border">
              	<h4>Tambah Daftar Rincian</h4>
              	<div class="card-header-action">
              	    <a class="btn btn-secondary text-dark btn-sm" href="<?php echo site_url('rincian'); ?>" >Kembali</a> 
              	</div>
            </div>

          	<div class="card-body">
          		<?php echo form_open('rincian/add'); ?>
          		<div class="row clearfix">
					<div class="col-md-12 row">
						<div class="col-md-6">
							<label for="srtgs_no" class="control-label"><span class="text-danger">* </span> Ref. Surat Tugas</label>
							<div class="form-group">
								<input autocomplete="off" name="srtgs_no" class="form-control" id="srtgs_no" value="<?php echo $this->input->post('srtgs_no'); ?>"/>
								<span class="text-danger"><?php echo form_error('srtgs_no'); ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="rcn_tgl" class="control-label">Tanggal</label>
							<div class="form-group">
								<input autocomplete="off" name="rcn_tgl" class="form-control" id="rcn_tgl" readonly="" value="<?php echo $this->loader->konversi_tanggal(date('Y-m-d')); ?>" />
								<span class="text-danger"><?php echo form_error('rcn_tgl'); ?></span>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row clearfix">
					<div class="col-12">
						<h6>Rincian Biaya</h6>
					</div>
					<div class="col-md-12 row">
						<div class="col-md-4">
							<label for="rnd_binap" class="control-label"><span class="text-danger">* </span> Biaya Inap</label>
							<div class="form-group">
								<input autocomplete="off" name="rnd_binap" maxlength="14" class="form-control rupiah" id="rnd_binap" value="<?php echo $this->input->post('rnd_binap')??0; ?>"/>
								<span class="text-danger"><?php echo form_error('rnd_binap'); ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<label for="rnd_jmlinap" class="control-label"><span class="text-danger">* </span> Jml. Hari</label>
							<div class="form-group">
								<input type="number" autocomplete="off" name="rnd_jmlinap" maxlength="14" class="form-control rupiah" id="rnd_jmlinap" value="<?php echo $this->input->post('rnd_jmlinap')??0; ?>"/>
								<span class="text-danger"><?php echo form_error('rnd_jmlinap'); ?></span>
							</div>			
						</div>
						<div class="col-md-4">
							<label for="rnd_ketinap" class="control-label">Keterangan Tambahan</label>
							<div class="form-group">
								<input autocomplete="off" name="rnd_ketinap"  class="form-control" id="rnd_ketinap" value="<?php echo $this->input->post('rnd_ketinap'); ?>" placeholder="Kosongkan Jika Tidak Diperlukan"/>
								<span class="text-danger"><?php echo form_error('rnd_ketinap'); ?></span>
							</div>
						</div>
					</div>
					<div class="col-md-12 row">
						<div class="col-md-4">
							<label for="rnd_btrkt" class="control-label"><span class="text-danger">* </span> Biaya Berangkat</label>
							<div class="form-group">
								<input type="number" autocomplete="off" name="rnd_btrkt" maxlength="14" class="form-control rupiah" id="rnd_btrkt" value="<?php echo $this->input->post('rnd_btrkt')??0; ?>"/>
								<span class="text-danger"><?php echo form_error('rnd_btrkt'); ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<label for="rnd_bplg" class="control-label"><span class="text-danger">* </span> Biaya Pulang</label>
							<div class="form-group">
								<input type="number" autocomplete="off" name="rnd_bplg" maxlength="14" class="form-control rupiah" id="rnd_bplg" value="<?php echo $this->input->post('rnd_bplg')??0; ?>"/>
								<span class="text-danger"><?php echo form_error('rnd_bplg'); ?></span>
							</div>			
						</div>
						<div class="col-md-4">
							<label for="rnd_ttype" class="control-label"><span class="text-danger">* </span> Jenis Transportasi</label>
							<div class="form-group">
								<select name="rnd_ttype" id="rnd_ttype" class="form-control">
									<option value="" disabled selected>Mohon Pilih Salah Satu</option>
									<option value="kereta">Kereta</option>
									<option value="klaut">Kapal Laut</option>
									<option value="pudara">Pesawat Udara</option>
									<option value="tonline">Transportasi Online</option>
									<option value="tkonvensional">Transportasi Konvensional</option>
									<option value="dll">Lain-lain</option>
								</select>
								<span class="text-danger"><?php echo form_error('rnd_ttype'); ?></span>
							</div>		
						</div>
						<div class="col-md-12" id="jtype" style="display:none;">
							<label for="jtypefill" class="control-label"><span class="text-danger">* </span> Sebutkan Jenis Transportasi Lain</label>
							<input type="text" class="form-control" id="jtypefill">
						</div>
					</div>
					<div class="col-md-12 row">
						<div class="col-md-4">
							<label for="rnd_sku" class="control-label">Uang Saku</label>
							<div class="form-group">
								<input autocomplete="off" name="rnd_sku" maxlength="14" class="form-control rupiah" id="rnd_sku" value="<?php echo $this->input->post('rnd_sku')??0; ?>"/>
								<span class="text-danger"><?php echo form_error('rnd_sku'); ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<label for="rnd_jmlsaku" class="control-label">Jml. Hari</label>
							<div class="form-group">
								<input type="number" autocomplete="off" name="rnd_jmlsaku" maxlength="14" class="form-control rupiah" id="rnd_jmlsaku" value="<?php echo $this->input->post('rnd_jmlsaku')??0; ?>"/>
								<span class="text-danger"><?php echo form_error('rnd_jmlsaku'); ?></span>
							</div>			
						</div>
						<div class="col-md-4">
							<label for="rnd_ketsaku" class="control-label">Keterangan Tambahan</label>
							<div class="form-group">
								<input autocomplete="off" name="rnd_ketsaku"  class="form-control" id="rnd_ketsaku" value="<?php echo $this->input->post('rnd_ketsaku'); ?>" placeholder="Kosongkan Jika Tidak Diperlukan"/>
								<span class="text-danger"><?php echo form_error('rnd_ketsaku'); ?></span>
							</div>
						</div>
					</div>
					<div class="col-md-12 row">
						<div class="col-md-4">
							<label for="rnd_tmbhn" class="control-label">Tambahan</label>
							<div class="form-group">
								<input autocomplete="off" name="rnd_tmbhn" type="text" class="form-control" id="rnd_tmbhn" value="<?php echo $this->input->post('rnd_tmbhn'); ?>"/>
								<span class="text-danger"><?php echo form_error('rnd_tmbhn'); ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<label for="rnd_btmbhn" class="control-label">Biaya Tambahan</label>
							<div class="form-group">
								<input autocomplete="off" name="rnd_btmbhn" maxlength="14" class="form-control rupiah" id="rnd_btmbhn" value="<?php echo $this->input->post('rnd_btmbhn'); ?>"/>
								<span class="text-danger"><?php echo form_error('rnd_btmbhn'); ?></span>
							</div>			
						</div>
						<div class="col-md-4">
							<label for="rnd_kettmbhn" class="control-label">Keterangan Tambahan</label>
							<div class="form-group">
								<input type="text" autocomplete="off" class="form-control" name="rnd_kettmbhn" id="rnd-ketlln" placeholder="Kosongkan Jika Tidak Diperlukan">
								<span class="text-danger"><?php echo form_error('rnd_kettmbhn'); ?></span>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row clearfix">
					<div class="col-12">
						<h6>Dokumen Pendukung</h6>
					</div>
					<div class="col-12">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<label for="#dok1" class="control-label">Dokumen Pendukung 1</label>
									<input type="file"  class="form-control-file" id="dok1" name="files[]" accept=".pdf, .jpe, .jpg, .jpeg .png, .bmp, .svg, .svgz">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<label for="#dok2" class="control-label"> Dokumen Pendukung 2</label>
									<input type="file"  class="form-control-file" id="dok2" name="files[]" accept=".pdf, .jpe, .jpg, .jpeg .png, .bmp, .svg, .svgz">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<label for="#dok3" class="control-label"> Dokumen Pendukung 3</label>
									<input type="file"  class="form-control-file" id="dok3" name="files[]" accept=".pdf, .jpe, .jpg, .jpeg .png, .bmp, .svg, .svgz">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<label for="#dok4" class="control-label"> Dokumen Pendukung 4</label>
									<input type="file"  class="form-control-file" id="dok4" name="files[]" accept=".pdf, .jpe, .jpg, .jpeg .png, .bmp, .svg, .svgz">
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
	$('#rnd_ttype').on('change blur',function(){
		if($(this).val() == "dll"){
			$('#jtype').removeAttr('style');
			$('#rnd_ttype').removeAttr('name');
			$('#jtypefill').attr('name','rnd_ttype');
			$('#jtypefill').attr('required');
		}else{
			$('#jtype').css('display','none');
			$('#jtypefill').removeAttr('name');
			$('#rnd_ttype').attr('name','rnd_ttype');
		}
	});
</script>