<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends CI_Controller {

    public function _construct()
    {
        session_start();
    }
    public function index() {
        $this->session->userdata('logged_in');
        if(empty($cek))
        {
            $this->load->view('tampilan_login');
        }
        else
        {
            $st = $this->session->userdata('stts');
            if($st=='admin')
            {
                header('location:'.base_url().'index.php/tampilan_admin');
            }
            else if($st=='pegawai')
            {
                header('location:'.base_url().'index.php/tampilan_pegawai');
            }
        }
    }
    public function login()
    {
        $u = $this->input->post('username');
        $p = $this->input->post('password');
        $this->web_app_model->getLoginData($u,$p);
    }
    
    

}
