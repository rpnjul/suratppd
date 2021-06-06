<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Data Anggaran Edit</h3>
            </div>
			<?php echo form_open('data_anggaran/edit/'.$data_anggaran['da_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="da_thn" class="control-label"><span class="text-danger">*</span>Da Thn</label>
						<div class="form-group">
							<input type="text" name="da_thn" value="<?php echo ($this->input->post('da_thn') ? $this->input->post('da_thn') : $data_anggaran['da_thn']); ?>" class="form-control" id="da_thn" />
							<span class="text-danger"><?php echo form_error('da_thn');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="da_plun" class="control-label"><span class="text-danger">*</span>Da Plun</label>
						<div class="form-group">
							<input type="text" name="da_plun" value="<?php echo ($this->input->post('da_plun') ? $this->input->post('da_plun') : $data_anggaran['da_plun']); ?>" class="form-control" id="da_plun" />
							<span class="text-danger"><?php echo form_error('da_plun');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="da_pdan" class="control-label"><span class="text-danger">*</span>Da Pdan</label>
						<div class="form-group">
							<input type="text" name="da_pdan" value="<?php echo ($this->input->post('da_pdan') ? $this->input->post('da_pdan') : $data_anggaran['da_pdan']); ?>" class="form-control" id="da_pdan" />
							<span class="text-danger"><?php echo form_error('da_pdan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="da_pdka" class="control-label"><span class="text-danger">*</span>Da Pdka</label>
						<div class="form-group">
							<input type="text" name="da_pdka" value="<?php echo ($this->input->post('da_pdka') ? $this->input->post('da_pdka') : $data_anggaran['da_pdka']); ?>" class="form-control" id="da_pdka" />
							<span class="text-danger"><?php echo form_error('da_pdka');?></span>
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