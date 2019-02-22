<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bessproject extends CI_Controller {

	public function index()
	{
		 $data = array ('title' 	=> 'Bess Project',
                       'content'	=> 'bessproject');
	      
		$this->load->view('setup/conected',$data);
	}
}
