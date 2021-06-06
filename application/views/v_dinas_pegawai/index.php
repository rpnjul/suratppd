<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Dinas Pegawai Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('dinas_pegawai/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Dnpgw Id</th>
						<th>Ndi No</th>
						<th>Pgw Nip</th>
						<th>Dnpgw Tgl</th>
						<th>Dnpgw Tmp</th>
						<th>No Pkr</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($dinas_pegawai as $D){ ?>
                    <tr>
						<td><?php echo $D['dnpgw_id']; ?></td>
						<td><?php echo $D['ndi_no']; ?></td>
						<td><?php echo $D['pgw_nip']; ?></td>
						<td><?php echo $D['dnpgw_tgl']; ?></td>
						<td><?php echo $D['dnpgw_tmp']; ?></td>
						<td><?php echo $D['no_pkr']; ?></td>
						<td>
                            <a href="<?php echo site_url('dinas_pegawai/edit/'.$D['dnpgw_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('dinas_pegawai/remove/'.$D['dnpgw_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
