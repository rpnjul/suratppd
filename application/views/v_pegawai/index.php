<div class="section-header">
  <h1>Pegawai</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Pegawai</h4>
        <div class="card-header-action">
          <?php if ($level=='Admin'||$level=='Kepala Kantor'): ?>
            <a href="<?php echo base_url();?>/pegawai/add" class="btn btn-success">Tambah</a>
            <a href="<?php echo base_url();?>/pegawai/cetak" class="btn btn-light">Cetak</a>
          <?php else: ?>
          <?php endif ?>
        </div>
      </div>
      <div class="card-body">
        <div class="">
          <table class="table table-striped" id="tableData">
            <thead>
              <tr>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Gol dan Pangkat</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>     
              <?php foreach($pegawai as $i => $P){  ++$i; ?>
              <tr>
                <td <?php echo(($P['pgw_nip']==$nip) ? "class='bg-secondary text-dark'" :  "" ); ?>><?php echo $P['pgw_nip']; ?></td>
                <td <?php echo(($P['pgw_nip']==$nip) ? "class='bg-secondary text-dark'" : "" ); ?>><?php echo $P['pgw_nm']; ?></td>
                <td <?php echo(($P['pgw_nip']==$nip) ? "class='bg-secondary text-dark'" :  "" ); ?>><?php echo $P['pgw_jnk']; ?></td>
                <td <?php echo(($P['pgw_nip']==$nip) ? "class='bg-secondary text-dark'" :  "" ); ?>><?php echo $P['pgw_gpt']; ?></td>
                <td <?php echo(($P['pgw_nip']==$nip) ? "class='bg-secondary text-dark'" : "" ); ?>><?php echo $P['pgw_jab']; ?></td>
                <td>
                  <?php if (($level == 'Kepala Kantor' || $level == 'Admin') & ($P['pgw_jab']!='Kepala Sub Bagian Umum' && $P['pgw_jab']!='Kepala Kantor' )):  //$P['pgw_jab']!='Admin' &&  ?>
                  <a class="btn btn-sm btn-primary btn-action mr-1" href="<?php echo site_url('pegawai/'.($P['pgw_id']==$id_login? 'profile' : 'edit').'/'.$P['pgw_id']) ?>" data-toggle="tooltip" title="" data-original-title="<?php echo($P['pgw_id']==$id_login ? 'Profile' :'Edit') ?>"><i class="fas fa-pencil-alt"></i></a>
                    
                  <?php endif ?>
                  <a href="<?php echo site_url('pegawai/info/'.$P['pgw_id']) ?>" class="btn btn-sm btn-info btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Detail"><i class="fas fa-info"></i></a>
                  <!-- <a href="" class="btn btn-danger btn-action" ><i class="fas fa-trash"></i></a> -->
                
                   <?php if ($level == 'Kepala Kantor' && ($P['pgw_jab']!='Kepala Sub Bagian Umum' && $P['pgw_jab']!='Kepala Kantor')): ?>
                     <a id="sts<?php echo $P['pgw_id'] ?>" onclick="return cek(this)" status="<?php echo ($P['pgw_sts'])?>" class="btn-sts btn btn-sm <?php echo $P['pgw_sts']==0 ? 'btn-success':'btn-danger' ?> btn-action"  ><i id="icon-sts-<?php echo ($P['pgw_id'])?>" class="fas fa-<?php echo ($P['pgw_sts']==0?'check':'power-off') ?>"></i></a>
                 <?php endif ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if ($level=='Kepala Kantor'): ?>
  <script>

    function cek(btn){
        var sts = $(btn).attr('status');
        var id = $(btn).attr('id').substring(3);
        if(sts==0){
          activedata(id);
        }else{
          nonactivedata(id);
        }
    }
    function activedata(id){
      $.ajax({
          url: "<?php echo base_url('pegawai/active/') ?>",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Berhasil mengaktifkan pegawai', ' ', 'success');
            $("#sts"+id).fadeTo("slow", 0.7, function(){
                $(this).attr({
                  class: 'btn btn-sm btn-danger btn-action',
                  status: '1'
                });
                $('#icon-sts-'+id).attr({
                  class: 'fas fa-power-off'
                });
            })
          },
          error:function(){
            swal('data gagal di aktifkan', 'error');
          }
      });
    }

    function nonactivedata(id){
      swal({
        title: "Anda Yakin?",
        text: "Data yang dipilih akan di non-aktifkan !",
        type: 'warning', 
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        showCancelButton: true,
        
       }).then((result) => {
        if (result.value) {
            $.ajax({
              url: "<?php echo base_url('pegawai/nonactive/') ?>",
              type: "post",
              data: {id:id},
              success:function(){
                swal('Data Berhasil di non-aktifkan', ' ', 'success');
                $("#sts"+id).fadeTo("slow", 0.7, function(){
                    $(this).attr({
                      class: 'btn btn-sm btn-success btn-action',
                      status: '0'
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
          }else{
              //alert("Batal");
          }
      });
    }
  </script>
             
<?php endif ?>