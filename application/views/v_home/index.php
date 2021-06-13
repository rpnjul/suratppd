<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

    <div class="card card-primary">
        <div class="login-brand">
          <br><strong>Surat Perintah Perjalanan Dinas</strong>
        </div>
      <div class="card-header d-none" id="alert">
        <div class="alert " role="alert" id="alertinf" style="width:100%;"></div>
      </div>
      <div class="card-body">
      <form class="needs-validation novalidate" id="loginfrm">
            <div class="form-group">
              <label for="email">Email / NIP</label>
              <input type="text" class="form-control" placeholder="Email / NIP" name="u_email" id="u_email" required autofocus>
              <div class="invalid-feedback">
                Masukan Email / NIP
              </div>
            </div>
            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">Kata sandi</label>
              </div>
              <input type="password" class="form-control" placeholder="Kata sandi" name="u_password" id="u_password" required>
              <div class="invalid-feedback">
                Masukan Kata sandi
              </div>
              <div class="d-block">
              <div class="float-right" style="padding-top: 10px; padding-bottom:10px;">
                  <a href="<?php echo site_url('forgot'); ?>" class="text-small">
                    Lupa katasandi ?
                  </a>
                </div>
              </div>
            </div>
            <div class="form-group">
                <button type="submit" id="submitlgn" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Masuk
                </button>
            </div>
            <!-- php echo form_close(); ?> -->
        </div>
    </div>
    </div>
</div>
<script>
$('#loginfrm').on('submit',function(e){
  var email = $('#u_email').val();
  var password = $('#u_password').val();
  if(email!='' || password!=''){
    $('#submitlgn').html('<i class="fa fa-spinner"></i>');
    $.post("<?php echo base_url();?>pegawai/login", {u_email:email,u_password:password},
      function (data) {
        // console.log(data);
        $('#alert').removeClass('d-none');
        $('#alertinf').removeAttr('class');
        $('#alertinf').addClass('alert alert'+data.class);
        $('#alertinf').html(data.desc);
        if(data.code==200){
          location.reload("<?php echo base_url();?>dash");
          e.preventDefault();
        }
      },
    );
  } 
  
  e.preventDefault();
})
</script>