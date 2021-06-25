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
                        <th class="text-center">Nomor Nota</th>
                        <th class="text-center">Ref. Surat Tugas</th>
                        <th class="text-center">No Kwitansi</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($nota_dinas as $N){ ?>
                        <tr <?php if($N['status']==0): ?> class="bg-danger text-light"<?php endif; ?> >
                            <td class="text-center"><?php echo $N['nds_no']; ?></td>
                            <td class="text-center"><?php echo $N['srtgs_no']; ?></td>
                            <td class="text-center" class="text-center"><?php echo $N['nds_dsr']?$N['nds_dsr']:'Tidak ada Kwitansi'; ?></td>
                            <td class="text-center"><?php echo $this->loader->konversi_tanggal($N['nds_tgl']); ?></td>
                            <td class="text-center"><?php if($N['status']==0): ?> Belum Disetujui <?php else: ?> Disetujui <?php endif; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a  href="<?php echo site_url('nota_dinas/cetak/'.$N['nds_id']); ?>" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> Cetak</a> 
                                    <?php if ($nip==$N['pgw_nip']): ?>
                                        <a href="<?php echo site_url('nota_dinas/edit/'.$N['nds_id']); ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> Ubah</a> 
                                        <a href="<?php echo site_url('nota_dinas/remove/'.$N['nds_id']); ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Hapus</a>
                                    <?php endif ?>
                                    <?php if($level=='Kepala Sub Bagian Umum' && $N['status'] == 0): ?>
                                    <a class="btn btn-sm btn-success btn-action mr-1" href="<?php echo site_url('nota_dinas/accept/'.$N['nds_id']) ?>"><i class="fa fa-check"></i></a>
                                    <?php endif; ?>
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

