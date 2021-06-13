<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h4>Ubah Surat Tugas Pegawai</h4>
                <div class="card-header-action">
                    <a class="btn btn-default btn-sm" href="<?php echo site_url('surat_tugas'); ?>"><span class="fa fa-chevron-left"></span> Kembali</a> 
                </div>
            </div>
			<?php echo form_open('surat_tugas/edit/'.$surat_tugas['srtgs_id']); ?>
			<?php $jml = intval($count_ikut['cnt']); //echo($jml) ?>
			<div class="card-body">
				<div class="row clearfix">
          <div class="col-md-6">
            <div class="form-group">
                <label for="#srtms_no"><span class="text-danger">*</span> Ref. Surat Masuk</label>
                <input required="" class="form-control" type="text" id="srtms_no" name="srtms_no" value="<?php echo ($this->input->post('srtms_no')?$this->input->post('srtms_no'):$surat_tugas['srtms_no']); ?>">
                <span class="text-danger"><?php echo form_error('srtms_no');?></span>
            </div>
            <div class="form-group">
                <label for="#srtgs_no"><span class="text-danger">*</span> Nomor Surat Tugas</label>
                <input class="form-control" type="text" id="srtgs_no" disabled="" name="srtgs_no" value="<?php echo ($this->input->post('srtgs_no')?$this->input->post('srtgs_no'):$surat_tugas['srtgs_no']); ?>">
                <span class="text-danger"><?php echo form_error('srtgs_no');?></span>
            </div>
            <div class="form-group">
                <label for="#srtgs_tmt"><span class="text-danger">*</span> Tempat Bertugas</label>
                <input  required="" class="form-control" type="text" id="srtgs_tmt" name="srtgs_tmt" value="<?php echo ($this->input->post('srtgs_tmt')?$this->input->post('srtgs_tmt'):$surat_tugas['srtgs_tmt']); ?>">
                <span class="text-danger"><?php echo form_error('srtgs_tmt');?></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="#pgw_nip"><span class="text-danger">*</span> Pegawai Ditugaskan</label>
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" name="pgw_nip" id="pgw_nip" value="<?php echo ($this->input->post('pgw_nip')?$this->input->post('pgw_nip'):$surat_tugas['pgw_nip']); ?>" />
                    <span class="text-danger"><?php echo form_error('pgw_nip');?></span>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" id="pgw_nm" name="pgw_nm" disabled="" value="<?php echo $this->M_pegawai->search_pegawai(($this->input->post('pgw_nip')?$this->input->post('pgw_nip'):$surat_tugas['pgw_nip']))[0]->pgw_nm ?>" />
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label for="#srtgs_tgl"><span class="text-danger">*</span> Tanggal Bertugas</label>
                <input required="" class="form-control" type="text" id="srtgs_tgl" autocomplete="" name="srtgs_tgl" value="<?php echo ($this->input->post('srtgs_tgl')?$this->input->post('srtgs_tgl'):$surat_tugas['srtgs_tgl']); ?>">
                <span class="text-danger"><?php echo form_error('srtgs_tgl');?></span>
            </div>
            <div class="form-group">
                <label for="#srtgs_kmb"><span class="text-danger">*</span> Tanggal Kembali</label>
                <input required="" class="form-control" type="text" id="srtgs_kmb" autocomplete="" name="srtgs_kmb" value="<?php echo ($this->input->post('srtgs_kmb')? $this->input->post('srtgs_kmb'):$surat_tugas['srtgs_kmb']); ?>">
                <span class="text-danger"><?php echo form_error('srtgs_kmb');?></span>
            </div>
            <div class="form-group">
                <label for="#pengikut"><span class="text-danger">*</span>Pengikut bertugas</label>
                <div class="float-right">
                  <button type="button" name="add" id="add" class="btn btn-success btn-sm"><span class="fas fa-plus"></span></button>
                </div>
                <div class="table-responsive">  
                    <table class="table table-bordered">  
                      <tbody id="pengikutField">
                          <?php
                          //echo ($jml);
                          if($jml>0) {?>
                          <?php foreach ($pengikut_tugas as $i => $value){// echo ($pengikut_tugas['pgw_nip']);?>
                            <?php $pgk = $this->M_pegawai->get_pegawai_by_nip($value->pgw_nip); 
                            // echo ($value->pgw_nip);
                              ?>
                            <tr id="row<?php echo($i) ?>">  
                                <td>
                                  <div class="input-group">
                                    <input type="text" name="pengikut[][pgw_nip]" value="<?php echo ($pgk['pgw_nip']); ?>" placeholder="Masukan NIP" class="form-control " />
                                    <span class="input-group-append">
                                      <button type="button" name="remove" id="<?php echo $i; ?>" class="btn btn-danger btn_remove"><span class="fas fa-times"></span></button>                      
                                    </span>
                                  </div>
                                </td>                                       
                            </tr>  
                          <?php } ?>
                          <?php }else {?>
                          <tr id="row1">  
                            <td>
                              <div class="input-group">
                              <input type="text" name="pengikut[][pgw_nip]" id="pengikut" placeholder="Masukan NIP" class="form-control " required />
                              <span class="input-group-append">
                                <button type="button" name="remove" id="1" class="btn btn-danger btn_remove"><span class="fas fa-times"></span></button>
                                </span>
                              </div>
                            </td>
                          </tr>  
                          <?php } ?>
                      </tbody>
                    </table> 
                </div>
                <span class="text-danger"><?php echo form_error('pengikut[]');?></span>
            </div>
          </div>
				</div>
			</div>
			<div class="card-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>

<script>
  $(function(){
    var min_date = new Date();
    $('#srtgs_tgl').datepicker({
            dateFormat:"yy-mm-dd",changeYear: true,
            changeMonth: true,
            onSelect: function(dateStr) {
            var max = $(this).datepicker('getDate');
              $('#srtgs_kmb').datepicker('option', {minDate: max});
            }
    });
    $('#srtgs_kmb').datepicker({
      dateFormat:"yy-mm-dd",changeYear: true,
      changeMonth: true
    });
    var i=1;  
    $('#add').click(function(){  
         i++;  
         $('#pengikutField').append(`
              <tr id="row`+i+`">
                <td>
                  <div class="input-group">
                  <input type="text" name="pengikut[][pgw_nip]" id="pengikut[]" placeholder="Masukan NIP" class="form-control " required />
                  <span class="input-group-append">
                    <button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove"><span class="fas fa-times"></span></button>
                    </span>
                  </div>
                </td>
              </tr>`);  
         $('input[name^="pengikut"').autocomplete({
            source:"<?php echo site_url('pegawai/get_autocomplete/?'); ?>"
         }); 
    });
    $('input[name^="pengikut"').each(function() {
      $(this).autocomplete({
        source:"<?php echo site_url('pegawai/get_autocomplete/?'); ?>"
      });
    }); 
    $(document).on('click', '.btn_remove', function(){  
         var button_id = $(this).attr("id");   
         $('#row'+button_id+'').remove();  
         i--;
    });  

    $('#pgw_nip').autocomplete({
      source:"<?php echo site_url('pegawai/get_autocomplete'); ?>",
      open:function(event,ui){
        $('[name="pgw_nip"]').val(ui.item.label);
        $('[name="pgw_nm"]').val(ui.item.description);
      },
      select:function(event,ui){
        $('[name="pgw_nip"]').val(ui.item.label);
        $('[name="pgw_nm"]').val(ui.item.description);
        event.preventDefault();
      }
    });
    $('#srtms_no').autocomplete({
      source:"<?php echo site_url('surat_masuk/get_autocomplete/?'); ?>",
      select:function(event,ui){
       $( "#srtgs_tgl" ).datepicker( "option", "minDate", new Date(ui.item.description));
       $( "#srtgs_kmb" ).datepicker( "option", "minDate", $('#srtgs_tgl').datepicker('getDate'));
        event.preventDefault();
      }
    });
  });
</script>