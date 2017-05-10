<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
            
            $dat['data'] = $this->model_user->tampilartikel();
		$this->load->view('coba',$dat);
	}
}
