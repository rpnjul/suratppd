<div class="modal fade" id="ModalForm" tabindex="-1" role="dialog" aria-labelledby="ModalForm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah data pegawai</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="tutupForm">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('pegawai/add'); ?>
                <div class="form-group">
                    <label for="pgw_nip" class="control-label"><span class="text-danger">*</span>NIP</label>
                    <input type="text" name="pgw_nip" value="<?php echo  ($this->input->post('pgw_nip')); ?>" class="form-control" id="pgw_nip" />
                    <span class="text-danger"><?php echo form_error('pgw_nip');?></span>
                </div>
                <div class="form-group">
                    <label for="pgw_nm" class="control-label"><span class="text-danger">*</span>Nama Lengkap</label>
                    <input type="text" name="pgw_nm" value="<?php echo ($this->input->post('pgw_nm')); ?>" class="form-control" id="pgw_nm" />
                    <span class="text-danger"><?php echo form_error('pgw_nm');?></span>
                </div>
                <div class="form-group">
                    <label for="pgw_jnk" class="control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
                    <select name="pgw_jnk" class="form-control">
                            <option value="">select</option>
                            <?php 
                            $pgw_jnk_values = array(
                                'Laki-laki'=>'Laki-laki',
                                'Perempuan'=>'Perempuan'
                            );

                            foreach($pgw_jnk_values as $value => $display_text)
                            {
                                $selected = ($display_text == $this->input->post('pgw_jnk')) ? ' selected="selected"' : "";
                                echo '<option value="'.$display_text.'" '.$selected.'>'.$display_text.'</option>';
                            } 
                            ?>
                        </select>
                    <span class="text-danger"><?php echo form_error('pgw_jnk');?></span>
                </div>
                    <div class="form-group">
                    <label for="pgw_tlh" class="control-label"><span class="text-danger">*</span>Tempat Lahir</label>
                        <input type="text" name="pgw_tlh" value="<?php echo ( $this->input->post('pgw_tlh') ); ?>" class="form-control" id="pgw_tlh" />
                        <span class="text-danger"><?php echo form_error('pgw_tlh');?></span>
                    </div>
                    <div class="form-group">
                        <label for="pgw_tll" class="control-label"><span class="text-danger">*</span>Tanggal Lahir</label>
                        <input type="text" name="pgw_tll" value="<?php echo ($this->input->post('pgw_tll') ); ?>" class="form-control" id="pgw_tll" />
                        <span class="text-danger"><?php echo form_error('pgw_tll');?></span>
                    </div>   
                <div class="form-group">
                    <label for="pgw_gol" class="control-label"><span class="text-danger">*</span>Golongan</label>
                        <select name="pgw_gol" class="form-control">
                            <option value="">select</option>
                            <?php 
                            $pgw_gpt_values = array(
                                'Juru Muda (I/a)',
                                'Juru Muda Tk. I (I/b)',
                                'Juru (I/c)',
                                'Juru Tk. I (I/d)',
                                'Pengatur Muda (II/a)',
                                'Pengatur Muda Tk. I (II/b)',
                                'Pengatur (II/c)',
                                'Pengatur Tk. I (II/d)',
                                'Penata Muda (III/a)',
                                'Penatar Muda Tk. I (III/b)',
                                'Penata (III/c)',
                                'Penata Tk. I (III/d)',
                                'Pembina (IV/a)',
                                'Pembina Tk. I (IV/b)',
                                'Pembina Utama Muda (IV/c)',
                                'Pembina Utama Madya (IV/d)',
                                'Pembina Utama (IV/e)'
                            );

                            foreach($pgw_gpt_values as $value => $display_text)
                            {
                                $selected = ($display_text == $this->input->post('pgw_gpt')) ? ' selected="selected"' : "";
                                echo '<option value="'.$display_text.'" '.$selected.'>'.$display_text.'</option>';
                            } 
                            ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('pgw_gpt');?></span>
                    </div>
                    <div class="form-group">
                       <label for="pgw_jab" class="control-label"><span class="text-danger">*</span>Jabatan</label>
                        <select name="pgw_jab" class="form-control">
                        <?php 
                        $pgw_jab_values = array(
                            'Admin',
                            'Kepala Sub Bagian Umum',
                            'Pejabat Lelang'
                        );

                        foreach($pgw_jab_values as $value => $display_text)
                        {
                            $selected = ($display_text == $pegawai['pgw_jab']) ? ' selected="selected"' : "";

                            echo '<option value="'.$display_text.'" '.$selected.'>'.$display_text.'</option>';
                        } 
                        ?>
                       </select>
                       <span class="text-danger"><?php echo form_error('pgw_jab');?></span>
                    </div>
                    <div class="form-group"> 
                        <label for="pgw_eml" class="control-label"><span class="text-danger">*</span>Email</label>
                        <input type="text" name="pgw_eml" value="<?php echo ( $this->input->post('pgw_eml') ); ?>" class="form-control" id="pgw_eml" required/>
                        <span class="text-danger"><?php echo form_error('pgw_eml');?></span>
                    </div>
                    <div class="form-group"> 
                        <label for="pgw_snd" class="control-label"><span class="text-danger">*</span>Kata sandi</label>
                        <input type="text" readonly name="pgw_snd" class="form-control" id="pgw_snd" />
                        <span class="text-danger"><?php echo form_error('pgw_snd');?></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="confirm">
                        <i class="fa fa-check"></i> Simpan
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#ModalForm').modal("toggle");
        $('#tutupForm').click(function() {
            $("#Modal .close").click();
        });
        $('#pgw_tll').datepicker({
            dateFormat:"yy-mm-dd",
            onSelect: function(dateText, inst) {
              $("input[name='pgw_snd']").val(dateText);
            }
        });
    });
</script>