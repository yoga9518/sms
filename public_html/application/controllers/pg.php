<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pg extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('model_user');
	}

	public function index(){
		//$this->load->database();
            
		$jumlah_data = $this->model_user->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/pg/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['ys_login'] = $this->model_user->data($config['per_page'],$from);
		$this->load->view('test_pg',$data);
	}
}