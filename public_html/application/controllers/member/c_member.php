<?php
class C_member extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('auth');
		}
		$this->load->helper('text');
	}
	public function index() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts = "member") {
            $data['judul_menu'] = 'Dashboard Sistem';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['pass'] = $this->session->userdata('pass');
            $data['act'] = 10;

            $data['navbar_header'] = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('member/menu/menu', $data, true);
            $data['isi'] = $this->load->view('member/isi_menu/dashboard', $data, true);
            $data['judul'] = $this->load->view('member/menu/judul', $data, true);
            $data['head'] = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('member/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Kirim Pesan
    public function new_pesan() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['judul_menu'] = 'Kirim Pesan Satuan';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 30;

            $data['data'] = $this->model_user->pbk();
            
            $data['navbar_header'] = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('member/menu/menu', $data, true);
            $data['isi'] = $this->load->view('member/isi_menu/new_pesan', $data, true);
            $data['judul'] = $this->load->view('member/menu/judul', $data, true);
            $data['head'] = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('member/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Pesan Siaran
    public function siaran() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['judul_menu'] = 'Kirim Siaran';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 4;

            $data['data'] = $this->model_user->siaran();
            
            $data['navbar_header'] = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('member/menu/menu', $data, true);
            $data['isi'] = $this->load->view('member/isi_menu/siaran', $data, true);
            $data['judul'] = $this->load->view('member/menu/judul', $data, true);
            $data['head'] = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('member/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Pesan masuk
    public function pesan_masuk() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['judul_menu']     = 'Pesan Masuk';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 2;

            $dat = array(
                'data' => $this->model_user->pesan_masuk()
            );
            $data['navbar_header']  = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('member/menu/menu', $data, true);
            $data['isi']            = $this->load->view('member/isi_menu/pesan_masuk', $dat, true);
            $data['judul']          = $this->load->view('member/menu/judul', $data, true);
            $data['head']           = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('member/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('member/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function pesan_keluar() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['judul_menu']     = 'Pesan Keluar';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 6;

            $dat = array(
                'data' => $this->model_user->pesan_keluar()
            );
            $data['navbar_header']  = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('member/menu/menu', $data, true);
            $data['isi']            = $this->load->view('member/isi_menu/pesan_keluar', $dat, true);
            $data['judul']          = $this->load->view('member/menu/judul', $data, true);
            $data['head']           = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('member/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('member/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Pesan Terkirim
    public function pesan_terkirim() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['judul_menu']     = 'Pesan Terkirim';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 7;

            $dat = array(
                'dataa' => $this->model_user->sentitems(),
                'data' => $this->model_user->pesan_terkirim()
            );
            $data['navbar_header']  = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('member/menu/menu', $data, true);
            $data['isi']            = $this->load->view('member/isi_menu/pesan_terkirim', $dat, true);
            $data['judul']          = $this->load->view('member/menu/judul', $data, true);
            $data['head']           = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('member/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('member/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Semua kontak Telepon
    public function pbk() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['judul_menu']     = 'Daftar Phonebook';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 1;

            $dat = array(
                'data' => $this->model_user->pbk()
            );
            $data['navbar_header']  = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('member/menu/menu', $data, true);
            $data['isi']            = $this->load->view('member/isi_menu/pbk', $dat, true);
            $data['judul']          = $this->load->view('member/menu/judul', $data, true);
            $data['head']           = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('member/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('member/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function tambah_pbk() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['judul_menu'] = 'Tambah Phonebook';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 3;

            $data['data'] = $this->model_user->siaran();
            
            $data['navbar_header'] = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('member/menu/menu', $data, true);
            $data['isi'] = $this->load->view('member/isi_menu/tambah_pbk', $data, true);
            $data['judul'] = $this->load->view('member/menu/judul', $data, true);
            $data['head'] = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('member/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function profil()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['judul_menu']     = 'Profil pengguna';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['stts']           = $this->session->userdata('stts');
            $data['waktu_daftar']   = $this->session->userdata('waktu_daftar');
            
            $data['act']            = 88;

            $data['navbar_header']  = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('member/menu/menu', $data, true);
            $data['isi']            = $this->load->view('member/profil', $data, true);
            $data['judul']          = $this->load->view('member/menu/judul', $data, true);
            $data['head']           = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('member/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        }
        else{
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function setting() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "member") {
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['judul_menu'] = 'Setting user';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['password'] = $this->session->userdata('password');
            $data['act'] = 0;

            $data['navbar_header'] = $this->load->view('member/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('member/menu/menu', $data, true);
            $data['isi'] = $this->load->view('member/setting', $data, true);
            $data['judul'] = $this->load->view('member/menu/judul', $data, true);
            $data['head'] = $this->load->view('member/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('member/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        }
        else{
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('stts');
		session_destroy();
		redirect('auth');
	}
}
?>