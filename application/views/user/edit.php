<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Edit</h3>
            </div>
			<?php echo form_open('user/edit/'.$user['usr_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="usr_lvl" class="control-label"><span class="text-danger">*</span>Usr Lvl</label>
						<div class="form-group">
							<select name="usr_lvl" class="form-control">
								<option value="">select</option>
								<?php 
								$usr_lvl_values = array(
									'Pegawai'=>'Pegawai',
									'Admin'=>'Admin',
								);

								foreach($usr_lvl_values as $value => $display_text)
								{
									$selected = ($value == $user['usr_lvl']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('usr_lvl');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="pgw_nip" class="control-label"><span class="text-danger">*</span>Pgw Nip</label>
						<div class="form-group">
							<input type="text" name="pgw_nip" value="<?php echo ($this->input->post('pgw_nip') ? $this->input->post('pgw_nip') : $user['pgw_nip']); ?>" class="form-control" id="pgw_nip" />
							<span class="text-danger"><?php echo form_error('pgw_nip');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="usr_eml" class="control-label"><span class="text-danger">*</span>Usr Eml</label>
						<div class="form-group">
							<input type="text" name="usr_eml" value="<?php echo ($this->input->post('usr_eml') ? $this->input->post('usr_eml') : $user['usr_eml']); ?>" class="form-control" id="usr_eml" />
							<span class="text-danger"><?php echo form_error('usr_eml');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="usr_snd" class="control-label"><span class="text-danger">*</span>Usr Snd</label>
						<div class="form-group">
							<input type="text" name="usr_snd" value="<?php echo ($this->input->post('usr_snd') ? $this->input->post('usr_snd') : $user['usr_snd']); ?>" class="form-control" id="usr_snd" />
							<span class="text-danger"><?php echo form_error('usr_snd');?></span>
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