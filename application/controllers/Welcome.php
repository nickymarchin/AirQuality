<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	    $json_data = file_get_contents('http://api.airvisual.com/v2/countries?key=10f1d96a-f8d1-4d1a-bd75-8fbd21b32228');
	    $data = json_decode($json_data);
	    //var_dump($data);

		$this->load->view('header');
		$this->load->view('mila_page');
		$this->load->view('footer');
		
	}
}
