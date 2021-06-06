<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Anggaran Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('data_anggaran/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-responsive display responsive" id="tableData">
                    <tr>
						<th>Da Id</th>
						<th>Da Thn</th>
						<th>Da Plun</th>
						<th>Da Pdan</th>
						<th>Da Pdka</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($data_anggaran as $D){ ?>
                    <tr>
						<td><?php echo $D['da_id']; ?></td>
						<td><?php echo $D['da_thn']; ?></td>
						<td><?php echo $D['da_plun']; ?></td>
						<td><?php echo $D['da_pdan']; ?></td>
						<td><?php echo $D['da_pdka']; ?></td>
						<td>
                            <a href="<?php echo site_url('data_anggaran/edit/'.$D['da_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('data_anggaran/remove/'.$D['da_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
<script>
    $(function() {
        $('#tableData').DataTable({
            	ordering: false,
		responsive:true
        });
    });
</script>
