<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Dinas Pegawai Add</h3>
            </div>
            <?php echo form_open('dinas_pegawai/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="ndi_no" class="control-label"><span class="text-danger">*</span>Ndi No</label>
						<div class="form-group">
							<input type="text" name="ndi_no" value="<?php echo $this->input->post('ndi_no'); ?>" class="form-control" id="ndi_no" />
							<span class="text-danger"><?php echo form_error('ndi_no');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="pgw_nip" class="control-label"><span class="text-danger">*</span>Pgw Nip</label>
						<div class="form-group">
							<input type="text" name="pgw_nip" value="<?php echo $this->input->post('pgw_nip'); ?>" class="form-control" id="pgw_nip" />
							<span class="text-danger"><?php echo form_error('pgw_nip');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dnpgw_tgl" class="control-label"><span class="text-danger">*</span>Dnpgw Tgl</label>
						<div class="form-group">
							<input type="text" name="dnpgw_tgl" value="<?php echo $this->input->post('dnpgw_tgl'); ?>" class="has-datepicker form-control" id="dnpgw_tgl" />
							<span class="text-danger"><?php echo form_error('dnpgw_tgl');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dnpgw_tmp" class="control-label"><span class="text-danger">*</span>Dnpgw Tmp</label>
						<div class="form-group">
							<input type="text" name="dnpgw_tmp" value="<?php echo $this->input->post('dnpgw_tmp'); ?>" class="form-control" id="dnpgw_tmp" />
							<span class="text-danger"><?php echo form_error('dnpgw_tmp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="no_pkr" class="control-label"><span class="text-danger">*</span>No Pkr</label>
						<div class="form-group">
							<input type="text" name="no_pkr" value="<?php echo $this->input->post('no_pkr'); ?>" class="form-control" id="no_pkr" />
							<span class="text-danger"><?php echo form_error('no_pkr');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>