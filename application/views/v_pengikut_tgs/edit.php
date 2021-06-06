<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pengikut Spd Edit</h3>
            </div>
			<?php echo form_open('pengikut_spd/edit/'.$pengikut_spd['pspd_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="sppd_no" class="control-label"><span class="text-danger">*</span>Sppd No</label>
						<div class="form-group">
							<input type="text" name="sppd_no" value="<?php echo ($this->input->post('sppd_no') ? $this->input->post('sppd_no') : $pengikut_spd['sppd_no']); ?>" class="form-control" id="sppd_no" />
							<span class="text-danger"><?php echo form_error('sppd_no');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="pgw_nip" class="control-label"><span class="text-danger">*</span>Pgw Nip</label>
						<div class="form-group">
							<input type="text" name="pgw_nip" value="<?php echo ($this->input->post('pgw_nip') ? $this->input->post('pgw_nip') : $pengikut_spd['pgw_nip']); ?>" class="form-control" id="pgw_nip" />
							<span class="text-danger"><?php echo form_error('pgw_nip');?></span>
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