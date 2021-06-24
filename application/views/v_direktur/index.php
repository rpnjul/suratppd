<div class="section-header">
  <h1>Direktur</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Direktur</h4>
        <div class="card-header-action">
          <?php if ($level=='Admin'||$level=='Kepala Kantor' ||$level=='Kepala Sub Bagian Umum'): ?>
            <a href="<?php echo site_url('direktur/add') ?>" class="btn btn-success">Tambah</a>
            <a href="<?php echo site_url('direktur/cetak') ?>" class="btn btn-light">Cetak</a>
          <?php else: ?>
          <?php endif ?>
        </div>
      </div>
      <div class="card-body">
        <div class="">
          <table class="table table-striped display" id="tableData">
            <thead>
              <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>     
              <?php foreach($direktur as $i => $P){  ++$i; ?>
              <tr id="direktur<?php echo($P['direktur_id']); ?>"  <?php echo(($P['direktur_sts']==0) ? "class='direktur bg-danger text-light'" :  "" ); ?>>
                <td><?php echo $i; ?></td>
                <td><?php echo $P['direktur_no']; ?></td>
                <td><?php echo $P['direktur_nm']; ?></td>
                <td><?php echo ($level=='Pejabat Lelang'?substr_replace($P['direktur_tlp'], str_repeat('X', 6),strlen($P['direktur_tlp'])-6):$P['direktur_tlp']); ?></td>
                <td><?php echo ($level=='Pejabat Lelang'?substr_replace(explode('@', $P['direktur_eml'])[0], str_repeat('X', 4), 0,4).'@'.explode('@', $P['direktur_eml'])[1]:$P['direktur_eml']) ?></td>
                <td><?php echo (strlen($P['direktur_alm'])>30 ? substr($P['direktur_alm'], 0,28).'...' : $P['direktur_alm']); ?></td>
                <td>
                  <div class="btn-group">
                      <?php if ($level=='Admin' || $level=='Kepala Kantor'): ?>
                      <a type="button" class="btn btn-sm btn-success btn-action mr-1" href="<?php echo site_url('permohonan/add?direktur='.$P['direktur_id']) ?>"><i class="fas fa-plus"></i></a>
                      <a type="button" class="btn btn-sm btn-primary btn-action mr-1" href="<?php echo site_url('direktur/edit/'.$P['direktur_id']) ?>"><i class="fas fa-pencil-alt"></i></a>
                        
                      <?php endif ?>
                      <a type="button" class="btn btn-sm btn-info btn-action mr-1" href="<?php echo site_url('direktur/info/'.$P['direktur_id']) ?>"><i class="fas fa-info"></i></a>
                      <!-- <a type="button" href="" class="btn btn-danger btn-action" ><i class="fas fa-trash"></i></a> -->                
                    <?php if ($level=='Kepala Kantor' ): ?>
                         <a type="button" id="sts<?php echo $P['direktur_id'] ?>" status="<?php echo($P['direktur_sts']); ?>" class="btn-sts btn btn-sm <?php echo $P['direktur_sts']==0 ? 'btn-success':'btn-danger' ?> btn-action"  ><i id="icon-sts-<?php echo ($P['direktur_id'])?>" class="fas fa-<?php echo ($P['direktur_sts']==0?'check':'power-off') ?>"></i></a>
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
</div>

<?php if ($level='Kepala Kantor'): ?>
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
    function activedata(id){
      $.ajax({
          url: "<?php echo base_url('direktur/active/') ?>",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Berhasil mengaktifkan Direktur', ' ', 'success');
            $("#sts"+id).fadeTo("slow", 0.7, function(){
                $(this).attr({
                  class: 'btn btn-sm btn-danger btn-action',
                  status:'1'
                });
                $('#direktur'+id).attr({
                  class: 'direktur'
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
        icon: "warning",
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        buttons:true,
        dangerMode:true
           }).then((result) => {
        if (result.value) {
          $.ajax({
              url: "<?php echo base_url('direktur/nonactive/') ?>",
              type: "post",
              data: {id:id},
              success:function(){
                swal('Data Berhasil di non-aktifkan', ' ', 'success');
                $("#sts"+id).fadeTo("slow", 0.7, function(){
                    $(this).attr({
                      class: 'btn btn-sm btn-success btn-action',
                      status:'0'
                    });
                    $('#direktur'+id).attr({
                      class: 'direktur bg-danger text-light'
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
      }
      );
    }
  </script>
<?php endif ?>