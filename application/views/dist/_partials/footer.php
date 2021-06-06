<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <footer class="main-footer">
        <div class="footer-left">
        	Copyright &copy; <?php echo date('Y'); ?> 
    	</div>
        <div class="footer-right">
          
        </div>
      </footer>
      <?php if (!$_landing): ?>
    </div>
      <?php endif ?>



<?php $this->load->view('dist/_partials/js'); ?>

<?php if (!$_landing): ?>
<script src="<?php echo base_url('assets/js/page/index.js'); ?>"></script>
<?php endif ?>
