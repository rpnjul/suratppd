<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">User Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Usr Id</th>
						<th>Usr Lvl</th>
						<th>Pgw Nip</th>
						<th>Usr Eml</th>
						<th>Usr Snd</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($user as $U){ ?>
                    <tr>
						<td><?php echo $U['usr_id']; ?></td>
						<td><?php echo $U['usr_lvl']; ?></td>
						<td><?php echo $U['pgw_nip']; ?></td>
						<td><?php echo $U['usr_eml']; ?></td>
						<td><?php echo $U['usr_snd']; ?></td>
						<td>
                            <a href="<?php echo site_url('user/edit/'.$U['usr_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('user/remove/'.$U['usr_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
