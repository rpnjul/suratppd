<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
		 $url = base_url('api/json');
		 $curl = curl_init(); 
		 curl_setopt($curl, CURLOPT_URL, $url);
		     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		 curl_setopt($curl, CURLOPT_HTTPHEADER, [
		   'Content-Type: application/json'
		 ]);
		$response = curl_exec($curl);

		   curl_close($curl);
		   $data = json_decode($response, true);
		   echo($data["b"]['msg']);
	}
	  public function json()
    {
        $arr = array('a' => 1, 'b' => array('msg'=>'OK'));

        echo json_encode($arr);
    }

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */