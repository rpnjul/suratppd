<div class="section-header">
  <h1>Nota Dinas</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Nota Dinas</h4>
                <?php if( $level=='Kepala Sub Bagian Umum' OR $level=='Direktur'){ ?>
                <div class="card-header-action">
                    <a href="<?php echo site_url('nota_dinas/add'); ?>" class="btn btn-success btn-sm">Tambah</a> 
                </div>
                <?php } ?>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="tableData">
                    <thead>
                        <tr>
                        <th>Nomor Nota</th>
                        <th>Ref. Surat Tugas</th>
                        <th>No Kwitansi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($nota_dinas as $N){ ?>
                        <tr>
                            <td><?php echo $N['nds_no']; ?></td>
                            <td><?php echo $N['srtgs_no']; ?></td>
                            <td><?php echo $N['nds_dsr']; ?></td>
                            <td><?php echo $this->loader->konversi_tanggal($N['nds_tgl']); ?></td>
                            <td>
                                <div class="btn-group">
                                    <a  href="<?php echo site_url('nota_dinas/cetak/'.$N['nds_id']); ?>" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> Cetak</a> 
                                    <?php if ($nip==$N['pgw_nip']): ?>
                                        <a href="<?php echo site_url('nota_dinas/edit/'.$N['nds_id']); ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> Ubah</a> 
                                        <a href="<?php echo site_url('nota_dinas/remove/'.$N['nds_id']); ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Hapus</a>
                                    <?php endif ?>
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

