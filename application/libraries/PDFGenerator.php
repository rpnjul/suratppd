<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'views/vendor/autoload.php');
/**
 * 
 */

use Dompdf\Dompdf;

class PDFGenerator extends Dompdf
{

	public function __construct()
	{
		parent::__construct();
	}

	public function generate($html,$filename)
  {
  	//$this->options->set(array("PhpIsEnabled"=>true));
  	$this->set_option("isPhpEnabled", true);
  	$this->load_html($html);
    $this->render();
    $this->stream($filename.'.pdf',array("Attachment"=>0));
  }

}

/* End of file PDFGenerator.php */
/* Location: ./application/libraries/PDFGenerator.php */