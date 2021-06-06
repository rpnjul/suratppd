<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header'); 
?>
<!-- <div id="app"> -->
	<?php echo ($_landing ?'<section class="section">' : '<div class="main-content">'); ?>
	  <?php echo (($_landing ? '<div class="container mt-5">':'<section class="section">')) ?>
			<?php $this->load->view($_view); ?>	
		<?php echo ($_landing ?'</div>' : '</section>'); ?>
	<?php echo (($_landing ? '</section>':'</div>')) ?>		
<!-- </div> -->
<?php $this->load->view('dist/_partials/footer'); ?>