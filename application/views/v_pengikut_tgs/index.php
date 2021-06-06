<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pengikut Spd Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pengikut_spd/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Pspd Id</th>
						<th>Sppd No</th>
						<th>Pgw Nip</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($pengikut_spd as $P){ ?>
                    <tr>
						<td><?php echo $P['pspd_id']; ?></td>
						<td><?php echo $P['sppd_no']; ?></td>
						<td><?php echo $P['pgw_nip']; ?></td>
						<td>
                            <a href="<?php echo site_url('pengikut_spd/edit/'.$P['pspd_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pengikut_spd/remove/'.$P['pspd_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
