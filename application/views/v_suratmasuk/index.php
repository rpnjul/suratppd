<?php
defined('BASEPATH') OR exit('No direct script access allowed');



?>
<div class="section-header">
  <h1>Surat Masuk</h1>
</div>
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h4>Data Surat Masuk</h4>
      <div class="card-header-action">
        <?php if ($level=='Admin'||$level=='Kepala Kantor'): ?>
          <a href="surat_masuk/add" class="btn btn-success">Tambah</a>
        <?php else: ?>
        <?php endif ?>
      </div>
    </div>
    <div class="card-body">
        <div class="">
            <table class="table table-striped" id="tableData">
               <thead>
                    <tr>
                        <th>No Surat</th>
                        <th>Sifat</th>
                        <th>Tanggal</th>
                        <th>Perihal Permohonan</th>
                        <th>Pemohon</th>
                        <th>Di Terima</th>
                        <th>Aksi</th>
                    </tr>
               </thead>
                <tbody>
                    <?php foreach($surat_masuk as $i => $S):  ?>
                    <tr id="srtms<?php echo $S['srtms_id'] ?>">
                        <td><?php echo $S['srtms_no']; ?></td>
                        <td><?php echo $S['srtms_sft']; ?></td>
                        <td><?php echo $this->loader->konversi_tanggal($S['srtms_tgl']); ?></td>
                        <td><?php echo (strlen($S['psl_prh'])>30?substr($S['psl_prh'], 0,30).'...':$S['psl_prh']); ?></td>
                        <td><?php echo $S['direktur_nm']; ?></td>
                        <td><?php echo $this->M_pegawai->get_pegawai_by_nip($S['pgw_nip'])['pgw_jab']; ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <?php if ($level=='Kepala Kantor' | $level=='Admin'): ?>
                                    <a type="button" href="<?php echo site_url('surat_masuk/edit/'.$S['srtms_id']); ?>" class="btn btn-info btn-sm btn-action mr-1"><span class="fas fa-pencil-alt"></span></a> 
                                    <a type="button" id="sts<?php echo $S['srtms_id'] ?>" status="<?php echo($S['srtms_sts']); ?>" class="btn-sts btn btn-sm btn-danger btn-action" onclick="deletesrtms(<?php echo $S['srtms_id'] ?>)" ><i class="fas fa-trash"></i></a>    
                                <?php endif ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>                   
        </div>
    </div>
    </div>
</div>
<?php if ($level=='Kepala Kantor' | $level=='Admin'): ?>
    <script>
   function deletesrtms(a) {
    swal({ title: "Anda Yakin?", text: "Data yang dipilih akan di hapus, termasuk data yang berkaitan dengan ini !", type: 'warning', 
          showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        showCancelButton: true,
        
       }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?php echo base_url('surat_masuk/remove/') ?>",
                type: "post",
                data: { id: a },
                success: function () {
                    swal("Data Berhasil di hapus", " ", "success"),
                        $("#srtms" + a).fadeTo("slow", 0.7, function () {
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