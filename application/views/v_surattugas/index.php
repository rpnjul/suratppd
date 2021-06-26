<div class="section-header">
  <h1>Surat Tugas</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Surat Tugas</h4>
            	<?php if ($level=='Admin' | $level=='Direktur' | $level=='Pegawai' | $level =='Admin') {?>
                    <div class="card-header-action">
                        <a class="btn btn-success btn-sm" href="<?php echo site_url('surat_tugas/add'); ?>" > <span class="fa fa-plus"></span> Tambah</a> 
                    </div>
                <?php } ?>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="tableData">
                <thead>
                    <tr>
                        <th>No. Surat Tugas</th>
                        <th>No. Surat Masuk</th>
                        <th>NIP Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Berangkat</th>
                        <th>Kembali</th>
                        <th>Tujuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($surat_tugas as $key => $S){ ?>
                        <tr id="srtgs<?php echo $S['srtgs_id'];?>">
                            <td><?php echo $S['srtgs_no']; ?></td>
                            <td><?php echo $S['srtms_no']; ?></td>
                            <td><?php echo $S['pgw_nip']; ?></td>
                            <td><?php echo $S['pgw_nm']; ?></td>
                            <td><?php echo $this->loader->konversi_tanggal($S['srtgs_tgl']); ?></td>
                            <td><?php echo $this->loader->konversi_tanggal($S['srtgs_kmb']); ?></td>
                            <td><?php echo $S['srtgs_tmt']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a target="_blank" href="<?php echo site_url('surat_tugas/cetak/'.$S['srtgs_id']); ?>" class="btn btn-primary btn-sm"><span class="fa fa-print"></span> Cetak</a>     
                                    <?php if ($level=='Direktur' | $level=='Admin' | ($S['pgw_nip'] == $this->session->userdata('nip'))) { ?>
                                        <a href="<?php echo site_url('surat_tugas/edit/'.$S['srtgs_id']); ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> Ubah</a> 
                                        <a onclick="deletesrtgs(<?php echo $S['srtgs_id'] ?>)" class="btn btn-danger text-white btn-sm"><span class="fa fa-trash"></span> Hapus</a>
                                    <?php } ?> 
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
<?php if ($level=='Direktur' | $level=='Pegawai' | $level =='Admin'): ?>
    <script>
   function deletesrtgs(a) {
    swal({ title: "Anda Yakin?", text: "Data yang dipilih akan di hapus, termasuk data yang berkaitan dengan ini !",        type: 'warning', 
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        showCancelButton: true,
        
       }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?php echo base_url();?>surat_tugas/remove/",
                type: "post",
                data: { id: a },
                success: function () {
                    swal("Data Berhasil di hapus", " ", "success"),
                        $("#srtgs" + a).fadeTo("slow", 0.7, function () {
                            $(this).remove();
                        });
                },
                error: function () {
                    swal("data gagal di hapus", "error");
                },
            });
        }
    });
}
    </script>
<?php endif ?>