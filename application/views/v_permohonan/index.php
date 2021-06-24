<div class="section-header">
  <h1>Permohonan</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Permohonan</h4>
        <div class="card-header-action">
<!--           <div class="form-group-inline">
              <label for="">Cari</label>
              <input type="text" class="form-control" id="cari_periode">
          </div>  -->
          <?php if ($this->session->userdata('level')=='Admin' || $this->session->userdata('level')=='Kepala Kantor' || $this->session->userdata('level')=='Direktur'): ?>
            <a href="<?php echo site_url('permohonan/add') ?>" class="btn btn-success">Tambah</a>
          <?php else: ?>
          <?php endif ?>
        </div>
      </div>
      <div class="card-body">
        <?php if ($this->session->flashdata('pesan_success')!=null): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('pesan_success') ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php elseif ($this->session->flashdata('pesan_error')!=null): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php echo $this->session->flashdata('pesan_error') ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php else: ?>
        <?php endif ?>
        <div class="">
          <table class="table table-striped" id="tableData">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Direktur</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Perihal</th>
                <th>Status</th>
                <?php if ($level=='Direktur' OR $level == 'Admin' OR $level=='Kepala Kantor' OR $level=='Kepala Sub Bagian Umum' OR $level == 'Admin'): ?>
                <th>Aksi</th>
                <?php endif ?>
              </tr>
            </thead>
            <tbody>     
              <?php foreach($permohonan as $i => $P){  ++$i; ?>
              <tr id="psl<?php echo($P['psl_id']); ?>" class="permohonan <?php echo ($P['psl_sts']==0? 'bg-danger text-light':null) ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $P['direktur_nm']; ?></td>
                <td><?php echo $P['psl_no']; ?></td>
                <td><?php echo $this->loader->konversi_tanggal($P['psl_tgl']); ?></td>
                <td><?php echo (strlen($P['psl_prh'])>30 ? substr($P['psl_prh'], 0,28).'...' : $P['psl_prh']); ?></td>
                <td id="psl-sts-<?php echo $P['psl_id'] ?>"><?php echo ($P['psl_sts']==0?'Belum Disetujui':'Telah Disetujui'); ?></td>
                
                  <?php if ($level=='Direktur'): ?>
                    <td>
                      <!-- <a class="btn btn-sm btn-success btn-action mr-1" href="<?php echo site_url('permohonan/edit/'.$P['psl_id']) ?>"><i class="fas fa-pencil-alt"></i></a> -->
                      <a class="btn btn-sm btn-info btn-action mr-1" href="<?php echo site_url('permohonan/info/'.$P['psl_id']) ?>"><i class="fas fa-info"></i></a>
                    </td>
                  <?php endif ?>
                <?php if ($level=='Kepala Kantor' OR $level=='Kepala Sub Bagian Umum'): ?>
                  <td>
                     <a id="sts<?php echo $P['psl_id'] ?>" status="<?php echo($P['psl_sts']); ?>" class="btn-sts btn btn-sm <?php echo $P['psl_sts']==0 ? 'btn-success':'btn-danger' ?> btn-action"  ><i id="icon-sts-<?php echo ($P['psl_id'])?>" class="fas fa-<?php echo ($P['psl_sts']==0?'check':'power-off') ?>"></i></a>
                     <a id="remove<?php echo $P['psl_id'] ?>" onclick="return hapus(this)" class="btn btn-sm btn-danger btn-action"  ><i class="fas fa-trash ?>"></i></a>
                </td>
                <?php endif ?>
                <?php if ($level=='Admin'): ?>
                  <td>
                    <a class="btn btn-sm btn-success btn-action mr-1" href="<?php echo site_url('permohonan/edit/'.$P['psl_id']) ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-sm btn-info btn-action mr-1" href="<?php echo site_url('permohonan/info/'.$P['psl_id']) ?>"><i class="fas fa-info"></i></a>
                    <a id="sts<?php echo $P['psl_id'] ?>" status="<?php echo($P['psl_sts']); ?>" class="btn-sts btn btn-sm <?php echo $P['psl_sts']==0 ? 'btn-success':'btn-danger' ?> btn-action"  ><i id="icon-sts-<?php echo ($P['psl_id'])?>" class="fas fa-<?php echo ($P['psl_sts']==0?'check':'power-off') ?>"></i></a>
                    <a id="remove<?php echo $P['psl_id'] ?>" onclick="return hapus(this)" class="btn btn-sm btn-danger btn-action"  ><i class="fas fa-trash ?>"></i></a>
                </td>
                <?php endif ?>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

  $('.btn-sts').each(function() {
    $(this).click(function() {
      var sts = $(this).attr('status');
      var id = $(this).attr('id').substring(3);
      if(sts=='0'){
        activedata(id);
      }else{
        nonactivedata(id);
      }
     // alert(id);
    });
  });
  $('.btn-remove').each(function() {
    $(this).click(function() {
      var id = $(this).attr('id').substring(6);
      hapus(id);
     // alert(id);
    });
  });
  function activedata(id){
    $.ajax({
        url: "<?php echo base_url('permohonan/active/') ?>",
        type: "post",
        data: {id:id},
        beforeSend: function() {
            swal({
                title: 'Menunggu',
                html: 'Memproses data',
                onOpen: () => {
                    swal.showLoading()
                }
            })
        },
        success:function(){
          swal(
              'Berhasil !',
              'Berhasil diaktifkan.',
              'success'
          );
          $("#sts"+id).fadeTo("slow", 0.7, function(){
              $(this).attr({
                class: 'btn btn-sm btn-danger btn-action',
                status:'1'
              });
              $('#psl'+id).attr({
                class: 'permohonan'
              });
              $('#psl-sts-'+id).text('Telah Disetujui');
              $('#icon-sts-'+id).attr({
                class: 'fas fa-power-off'
              });
          })
        },
        error:function(){
           swal(
                    '!',
                    'Tidak dapat menonaktifkan.',
                    'error'
              );
        }
    });
  }


  function hapus(par){
     var id = $(par).attr('id').substring(6);
    swal({
      title: "Anda Yakin?",
      text: "Data yang dipilih akan di hapus !",
      icon: "warning",
      showCancelButton: true,
      // confirmButtonColor: "#DD6B55",
      buttons:true,
      dangerMode:true
         }).then((result) => {
        if (result.value) {
        $.ajax({
            url: "<?php echo base_url('permohonan/remove/') ?>",
            type: "post",
            data: {id:id},
            beforeSend: function() {
                swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                        swal.showLoading()
                    }
                })
            },
            success:function(){
              //swal('Data Berhasil di non-aktifkan', ' ', 'success');
              swal(
                    'Dihapus!',
                    'Data yang dipilih telah dihapus.',
                    'success'
              );
              $("#remove"+id).fadeTo("slow", 0.7, function(){
                  $("#psl"+id).remove();
              })
            },
            error:function(){
              swal('data gagal di hapus', 'error');
            }
        });
       } else {
        // swal("Your imaginary file is safe!");
       }
    });
  }

  function nonactivedata(id){
    
    swal({
      title: "Anda Yakin?",
      text: "Data yang dipilih akan di non-aktifkan !",
      icon: "warning",
      showCancelButton: true,
      // confirmButtonColor: "#DD6B55",
      buttons:true,
      dangerMode:true
         }).then((result) => {
        if (result.value) {
        $.ajax({
            url: "<?php echo base_url('permohonan/nonactive/') ?>",
            type: "post",
            data: {id:id},
            beforeSend: function() {
                swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                        swal.showLoading()
                    }
                })
            },
            success:function(){
              //swal('Data Berhasil di non-aktifkan', ' ', 'success');
              swal(
                    'Dinonaktifkan!',
                    'Data yang dipilih telah dinonaktifkan.',
                    'success'
              );
              $("#sts"+id).fadeTo("slow", 0.7, function(){
                  $(this).attr({
                    class: 'btn btn-sm btn-success btn-action',
                    status:'0'
                  });
                  $('#psl-sts-'+id).text('Belum Disetujui');
                  $('#psl'+id).attr({
                    class: 'permohonan bg-danger text-light'
                  });
                  $('#icon-sts-'+id).attr({
                    class: 'fas fa-check'
                  });
              })
            },
            error:function(){
              swal('data gagal di non-aktifkan', 'error');
            }
        });
       } else {
        // swal("Your imaginary file is safe!");
       }
    });
  }
</script>
           