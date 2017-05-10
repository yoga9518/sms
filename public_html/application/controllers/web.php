<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
            
            $dat['data'] = $this->model_user->tampilartikel();
		$this->load->view('v_web',$dat);
	}
}
