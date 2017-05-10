<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    
	public function index() {
		$this->load->view('login');
	}
	public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
                              'pass' => md5($this->input->post('pass', TRUE))
			);
		$this->load->model('model_user'); // load model_user
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				//$sess_data['uid'] = $sess->uid;
				$sess_data['username']      = $sess->username;
                                $sess_data['pass']      = $sess->password;
                                $sess_data['nama_lengkap']  = $sess->nama_lengkap;
                                //$sess_data['waktu_daftar']  = $sess->waktu_daftar;
				$sess_data['stts']          = $sess->stts;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('stts')=='admin') {
				redirect('admin/c_admin',$sess_data);
			}
			elseif ($this->session->userdata('stts')=='member') {
				redirect('member/c_member');
			}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

}

?>