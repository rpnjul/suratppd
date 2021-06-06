<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/* End of file v_login.php */
/* Location: ./application/views/v_home/v_login.php */?>

<div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <!-- <div class="login-brand">
          <img src="" alt="logo" width="100">
        </div> -->

        <div class="card card-primary">
          <div class="card-header"><h4>Lupa Kata Sandi</h4></div>

          <div class="card-body">
             <form id="forget">
                <!-- //$attributes = array('class' => 'form-signin');
                echo form_open('forgot'); ?> -->
              <div class="form-group">
                <label for="email">NIP</label>
                <input type="text" class="form-control" placeholder="NIP" name="u_nip" required autofocus>
              </div>              
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" placeholder="Email" name="u_email" tabindex="1" required autofocus>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Konfirmasi
                </button>
                <!-- <a class="btn btn-success btn-lg btn-block" tabindex="4" href="<?php echo base_url('login'); ?>">
                    Masuk
                </a> -->
              </div>
            <? form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  $('#forget').submit(function(e){
    alert('Coming Soon');
    e.preventDefault();
  })
  </script>