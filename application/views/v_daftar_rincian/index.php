<div class="section-header">
  <h1>Rincian Perjalanan</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Rincian Perjalanan</h4>
                <?php if ($level=='Admin' | $level=='Direktur'): ?>
                  <div class="card-header-action">
                    <a href="<?php echo site_url('rincian/add'); ?>" class="btn btn-success btn-sm">Tambah</a> 
                  </div>
                <?php endif ?>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="tableData">
                   <thead>
                        <tr>
                            <th>No. Surat Tugas</th>
                            <th>Tanggal</th>
                            <th>Pegawai</th>
                            <th>Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                   </thead>
                   <tbody>
                       <?php foreach ($daftar_rincian as $value): ?>
                           <tr id="rincian<?php echo $value['rcn_id']; ?>">
                               <td><?php echo ($value['srtgs_no']); ?></td>
                               <td><?php echo $this->loader->konversi_tanggal($value['rcn_tgl']); ?></td>
                               <td><?php echo ($value['pgw_nm']); ?></td>
                               <td><?php echo $this->loader->rupiah($value['total']); ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a target="_blank" href="<?php echo site_url('rincian/cetak/'.$value['rcn_id']); ?>" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> Cetak</a> 
                                        <?php if ($nip==$value['pgw_nip'] | ($level=='Admin' | $level=='Direktur')): ?>
                                            <a href="<?php echo site_url('rincian/edit/'.$value['rcn_id']); ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> Ubah</a> 
                                            <a onclick="deleterincian(<?php echo $value['rcn_id']; ?>)" class="btn btn-danger text-white btn-sm"><span class="fa fa-trash"></span> Hapus</a>
                                        <?php endif ?>
                                    </div>
                                </td>
                           </tr>
                       <?php endforeach ?>
                   </tbody>
                </table>          
            </div>
        </div>
    </div>
</div>
<?php if (isset($value['pgw_nip']) && $nip==$value['pgw_nip'] | ($level=='Admin' | $level=='Direktur')): ?>
<script>
function deleterincian(a) {
    swal({ 
        title: "Anda Yakin?", 
        text: "Data yang dipilih akan di hapus, termasuk data yang berkaitan dengan ini !", 
       type: 'warning', 
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        showCancelButton: true,
        
       }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?php echo base_url('rincian/remove/') ?>", 
                type: "post",
                data: { id: a },
                success: function () {
                    swal("Data Berhasil di hapus", " ", "success"),
                         $("#rincian"+a).remove();
                },
                error: function () {
                    swal("data gagal di hapus", "error");
                },
            });
        }else{

        }      
    });
}

</script>
<?php endif ?>