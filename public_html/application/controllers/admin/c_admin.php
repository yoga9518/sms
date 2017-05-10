<?php

class C_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect('auth');
        }
        $this->load->helper('text');
    }

    public function index() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts = "admin") {
            $data['judul_menu'] = 'Dashboard Sistem';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['pass'] = $this->session->userdata('pass');
            $data['act'] = 10;

            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/dashboard', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    public function blank() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['pengguna'] = "Blank";
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 1;

            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/menu/isi', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('t_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    public function tabel() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Data Pengguna Sistem';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 2;

            $dat = array(
                'data' => $this->model_user->user()
            );
            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/isi_menu/isi_tabel', $dat, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('t_admin/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('t_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    function tambah() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data = array(
                'username'      => $this->input->post('username'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'stts'          => $this->input->post('stts'),
                'password'      => md5($this->input->post('username'))
            );
            $this->model_user->tambah($data);
            helper_log("add", "menambahkan data");
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/tabel');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    public function edit_user() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $id = $this->input->post('id');
            $data = array(
                'username'      => $this->input->post('username'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'password'      => md5($this->input->post('password')),
                'stts'          => $this->input->post('stts'),
                'last_update'   => $this->input->post('last_update')
            );
            $this->model_user->edit($data, $id);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> '
                    . 'Data Berhasil Di Update <button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/tabel');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    public function delete($id) {
        $where = array('id' => $id);
        $res = $this->model_user->deletedata('ys_login', $where);
        if ($res >= 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
            redirect('admin/c_admin/tabel');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    // Pengguna Sistem
    public function pengguna() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Setting Pengguna Sistem';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 20;

            $dat = array(
                'data' => $this->model_user->pengguna()
            );
            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/pengguna', $dat, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('t_admin/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Tambah Pengguna Sistem

    public function tambah_pengguna() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Tambah Pengguna Sistem';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 2;

            $dat = array(
                'status' => $this->model_user->status(),
                'data' => $this->model_user->pengguna()
            );
            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/isi_menu/tambah_pengguna', $dat, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('t_admin/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    //Kirim pesan satuan

    public function new_pesan() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Kirim Pesan Satuan';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 30;

            $data['data'] = $this->model_user->pbk();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/new_pesan', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Pesan Siaran
    public function siaran() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Kirim Siaran';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 4;

            $data['data'] = $this->model_user->siaran();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/siaran', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Pesan masuk
    public function pesan_masuk() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Pesan Masuk';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 2;

            $dat = array(
                'data' => $this->model_user->pesan_masuk()
            );
            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/isi_menu/pesan_masuk', $dat, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('t_admin/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Pesan Keluar
    public function pesan_keluar() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Pesan Keluar';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 6;

            $dat = array(
                'data' => $this->model_user->pesan_keluar()
            );
            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/isi_menu/pesan_keluar', $dat, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('t_admin/isi_menu/modal_tambah',$data, true);
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
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Pesan Terkirim';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 7;

            $dat = array(
                'dataa' => $this->model_user->sentitems(),
                'data' => $this->model_user->pesan_terkirim()
            );
            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/isi_menu/pesan_terkirim', $dat, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('t_admin/isi_menu/modal_tambah',$data, true);
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
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Daftar Phonebook';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 1;

            $dat = array(
                'data' => $this->model_user->pbk()
            );
            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/isi_menu/pbk', $dat, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('t_admin/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Semua Groups
    public function grup() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Grup';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['act'] = 4;

            $dat = array(
                'data' => $this->model_user->pbk_groups()
            );
            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/isi_menu/grup', $dat, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);
            //$data['m']              = $this->load->view('t_admin/isi_menu/modal_tambah',$data, true);
            //$this->load->view('view_admin', $data);
            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Kirim Pesan
    public function kirim_pesan()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
        $udh ="050003A70101";
        
            $data = array(
                'DestinationNumber' => $this->input->post('nohp'),
                'UDH'               => $this->input->post($udh),
                'TextDecoded'       => $this->input->post('pesan'),
                'Multipart'         => "true",
                'CreatorID'         => "Gammu"
            );
            $this->model_user->kirim_pesan($data);
            //helper_log("add", "menambahkan data");
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Pesan Berhasil di kirim '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/pesan_keluar');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Kirim Pesan Siaran
    public function kirim_siaran()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") 
        {
            $group      = $_POST['group'];
            

            $query = $this->db->query("SELECT * FROM pbk WHERE GroupID=$group");
            foreach ($query->result_array() as $row)
            {
                $message = $_POST['pesan'];
                // echo var_dump($row['Number']);
                $data = array(
                    'DestinationNumber' => $row['Number'],
                    // 'UDH'               => $this->input->post($udh),
                    'TextDecoded'       => $message,
                    // 'Multipart'         => "true",
                    'CreatorID'         => "Gammu"
                );
                // echo var_dump($data);
                $a = $this->model_user->kirim_siaran($data);
                // $this->load->view('t_admin/isi_menu/pesan_keluar');

                // echo anchor("dsadas","h");
                if($a > 0 ){
                    // echo "redirect('admin/c_admin/pesan_keluar')";
                    // echo "Pesan berhasil di kirim";

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Pesan Berhasil terkirim '.$row['Number'].' '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
                    // $this->load->view('t_admin/isi_menu/pesan_keluar');

                    // echo base_url();"admin/c_admin";
                    // redirect('admin/c_admin/pesan_keluar');
                    header('location:'.base_url().'index.php/admin/c_admin/pesan_keluar');
                    
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Gagal ditambahkan '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
                    redirect('admin/c_admin/pesan_keluar');
                }
                // redirect('admin/c_admin/pesan_keluar');
                // echo $row['Name'];; // access attributes
                // echo $row->reverse_name();
                // echo var_dump($test);
            
            } 
        }
        else 
        {
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }

    }
    //Balas pesan masuk
    public function balas($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Balas Pesan';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 3;

            $where = array('id' => $id);

            $data['data'] = $this->model_user->pesan_masuk();
            $data['balas'] = $this->model_user->GetBalas($where,'inbox')->result();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/balas', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //kirim Phonebook
    public function kirimpbk($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Kirim Pesan';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 3;

            $where = array('id' => $id);

            // $data['data'] = $this->model_user->pesan_masuk();
            $data['balas'] = $this->model_user->GetBalas($where,'pbk')->result();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/kirimpbk', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Tambah pbk
    public function tambah_pbk() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Tambah Phonebook';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 3;

            $data['data'] = $this->model_user->siaran();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/tambah_pbk', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    //tambah grup
    public function tambah_grup() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Tambah Group';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 3;

            $data['data'] = $this->model_user->siaran();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/tambah_grup', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Tambah Kontak telepon
    public function editpbk($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Edit Phonebook';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 3;

            $where = array('id' => $id);

            $data['grup'] = $this->model_user->siaran();
            $data['pbk'] = $this->model_user->Getdata($where,'pbk')->result();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/editpbk', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Edit Grup Phonebook
    public function editgrup($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Edit Phonebook';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 3;

            $where = array('GroupID' => $id);

            // $data['grup'] = $this->model_user->siaran();
            $data['data'] = $this->model_user->Getdata($where,'pbk_groups')->result();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/edit_grup', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Edit Pengguna Sistem
    public function editpengguna($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Edit Pengguna';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 3;

            $where = array('id_user' => $id);

            $data['status'] = $this->model_user->status();
            $data['pengguna'] = $this->model_user->Getdata($where,'tbl_user')->result();
            
            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/editpengguna', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Eksekusi tambah kontak
    public function dotambahpbk()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
       
            $data = array(
                'Name'          => $this->input->post('nama'),
                'Number'        => $this->input->post('nohp'),
                'GroupID'       => $this->input->post('group'),
                'alamat'        => $this->input->post('alamat')
                // 'CreatorID'         => "Gammu"
            );
            echo var_dump($data);
            $this->model_user->dotambahpbk($data);
            //helper_log("add", "menambahkan data");
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Phonebook Berhasil ditambahkan '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/pbk');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Eksekusi tambah pengguna
    public function dotambahpengguna()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
       
            $data = array(
                'username'      => $this->input->post('username'),
                'nama_lengkap'  => $this->input->post('nohp'),
                'email'         => $this->input->post('email'),
                // 'status'        => $this->input->post('status'),
                'stts'          => $this->input->post('status'),
                'nohp'          => $this->input->post('nohp'),
                'pass'          => md5('123')
                // 'CreatorID'         => "Gammu"
            );
            // echo var_dump($data);
            $this->model_user->dotambahpengguna($data);
            //helper_log("add", "menambahkan data");
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Pengguna Berhasil ditambahkan '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/pengguna');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Eksekusi tambah Group
    public function dotambahgrup()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
       
            $data = array(
                'NameGroup'          => $this->input->post('nama')
                // 'Number'        => $this->input->post('nohp'),
                // 'GroupID'       => $this->input->post('group'),
                // 'alamat'        => $this->input->post('alamat')
                // 'CreatorID'         => "Gammu"
            );
            echo var_dump($data);
            $this->model_user->dotambahgrup($data);
            //helper_log("add", "menambahkan data");
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Group Berhasil ditambahkan '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/grup');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    //Eksekusi Edit Phonebook
    public function doeditpbk()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if(!empty($cek) && $stts == "admin"){
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $nohp = $this->input->post('nohp');
            $group = $this->input->post('group');
            $alamat = $this->input->post('alamat');
            $data = array(
                'Name'     => $nama,
                'Number'       => $nohp,
                'GroupID'      => $group,
                'alamat'    => $alamat
                //'kategori'  => $this->input->post('kategori')
            );
            $where = array(
                'ID' => $id
            );
            // echo var_dump($data);
            $res = $this->model_user->doeditpbk($where, $data, 'pbk');
            $res = $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Phonebook Berhasil diupdate '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/pbk');
            
        }
    }
    //Eksekusi Edit Grup
    public function doeditgrup()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if(!empty($cek) && $stts == "admin"){
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            // $nohp = $this->input->post('nohp');
            // $group = $this->input->post('group');
            // $alamat = $this->input->post('alamat');
            $data = array(
                'NameGroup'     => $nama,
                // 'Number'       => $nohp,
                // 'GroupID'      => $group,
                // 'alamat'    => $alamat
                //'kategori'  => $this->input->post('kategori')
            );
            $where = array(
                'GroupID' => $id
            );
            echo var_dump($data,$where);
            $res = $this->model_user->doeditgrup($where, $data, 'pbk_groups');
            $res = $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Group Berhasil diupdate '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/grup');
            
        }
    }
    //Eksekusi Edit Pengguna
    public function doeditpengguna()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if(!empty($cek) && $stts == "admin"){
            $id             = $this->input->post('id');
            $username       = $this->input->post('username');
            $namalengkap    = $this->input->post('namalengkap');
            $email          = $this->input->post('email');
            $status         = $this->input->post('status');
            $nohp           = $this->input->post('nohp');
            
            $data = array(
                'username'      => $username,
                'nama_lengkap'  => $namalengkap,
                'stts'          => $status,
                'email'         => $email,
                'nohp'          => $nohp
            );
            $where = array(
                'id_user' => $id
            );
            // echo var_dump($data,$where);
            $res = $this->model_user->doeditgrup($where, $data, 'tbl_user');
            $res = $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pengguna Berhasil diupdate '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/pengguna');
            
        }
    }
    //Menghapus Pesan masuk
    public function hapus_inbox($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $where = array('id' => $id);
            $res = $this->model_user->hapus_inbox('inbox', $where);
            if ($res >= 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Pesan Masuk Berhasil Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pesan_masuk');
            }
            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Pesan Masuk Gagal Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pesan_masuk');
            }
        }
        else 
        {
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    // Menghapus Pesan Keluar
    public function hapus_outbox($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $where = array('id' => $id);
            $res = $this->model_user->hapus_outbox('outbox', $where);
            if ($res >= 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Pesan Keluar Berhasil Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pesan_keluar');
            }
            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Pesan Keluar Gagal Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pesan_keluar');
            }
        }
        else 
        {
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Menghapus Pesan Terkirim
    public function hapus_sentitems($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $where = array('id' => $id);
            $res = $this->model_user->hapus_sentitems('sentitems', $where);
            if ($res >= 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Pesan Terkirim Berhasil Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pesan_terkirim');
            }
            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Pesan Terkirim Gagal Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pesan_terkirim');
            }
        }
        else 
        {
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    //Menghapus Phonebok
    public function deletepbk($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $where = array('id' => $id);
            var_dump($where);
            $res = $this->model_user->deletedata('pbk_groups', $where);
            if ($res >= 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Phonebook Berhasil Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pbk');
            }
            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Phonebook Gagal Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pbk');
            }
        }
        else 
        {
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    //Menghapus Grup Kontak
    public function deletegrup($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $where = array('GroupID' => $id);
            var_dump($where);
            $res = $this->model_user->deletedata('pbk_groups', $where);
            if ($res >= 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Group Berhasil Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/grup');
            }
            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Group Gagal Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/grup');
            }
        }
        else 
        {
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    // Menghapus Pengguna Sistem
    public function hapuspengguna($id) {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $where = array('id_user' => $id);
            var_dump($where);
            $res = $this->model_user->deletedata('tbl_user', $where);
            if ($res >= 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Pengguna Berhasil Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pengguna');
            }
            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Pengguna Gagal Di Hapus '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                redirect('admin/c_admin/pengguna');
            }
        }
        else 
        {
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    public function artikel(){
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu'] = 'Daftar Artikel';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 4;
            $dat = array(
                'data'  => $this->model_user->getArtikel()
            );

            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/isi_menu/article', $dat, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('t_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }

    public function setting() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['judul_menu'] = 'Setting user';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['password'] = $this->session->userdata('password');
            $data['act'] = 0;

            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/setting', $data, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        }
        else{
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
        public function simpan_akun() {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == 'admin') {
            $username = $this->session->userdata('username');

            $pass_lama = $this->input->post('pass_lama');
            $pass_baru = $this->input->post('pass_baru');
            $ulangi_pass = $this->input->post('ulangi_pass');

            $data['username'] = $username;
            $data['pass'] = md5($pass_lama);
            $cek = $this->model_user->getakun('tbl_user', $data);
            if ($cek->num_rows() > 0) {
                if ($pass_baru == $ulangi_pass) {
                    $simpan['pass']         = md5($pass_baru);
                    $where = array('username'   => $username);
                    $this->model_user->updateakun("tbl_user", $simpan, $where);
                    $this->session->set_flashdata("pesan", '<div class="alert alert-success" role="alert"> Password Berhasil di Update '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button>'
                    . '</div>');
                    header('location:' . base_url() . 'index.php/admin/c_admin/setting');
                } else {
                    $this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissable'>"
                            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"
                            . "Password yang anda masukkan tidak sama</div>");
                    header('location:' . base_url() . 'index.php/admin/c_admin/setting');
                }
            } else {
                $this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissable'>"
                            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"
                            . "Terjadi kesalahan mohon periksa kembali password lama anda</div>");
                header('location:' . base_url() . 'index.php/admin/c_admin/setting');
            }
        } else {
            header('location:' . base_url() . 'index.php/auth');
        }
    }

    public function profil()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul_menu']     = 'Profil pengguna';
            $data['username']       = $this->session->userdata('username');
            $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
            $data['stts']           = $this->session->userdata('stts');
            $data['waktu_daftar']   = $this->session->userdata('waktu_daftar');
            
            $data['act']            = 88;

            $data['navbar_header']  = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu']           = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi']            = $this->load->view('t_admin/profil', $data, true);
            $data['judul']          = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head']           = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah']   = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('tampilan_admin', $data);
        }
        else{
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function simpan_artikel()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data = array(
                'judul'         => $this->input->post('judul'),
                'isi'           => $this->input->post('editor1'),
                'stts'          => $this->input->post('stts'),
                //'password'      => md5($this->input->post('username'))
            );
            $this->model_user->new_artikel($data);
            //helper_log("add", "menambahkan data");
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/artikel');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function edit_artikel($id)
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if (!empty($cek) && $stts == "admin") {
            $data['judul'] = 'Edit Artikel';
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['act'] = 4;
            $where = array('id' => $id);
            $data['data'] = $this->model_user->status();
            $dat['ys_berita'] = $this->model_user->editArtikel($where,'ys_berita')->result();

            $data['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $data, true);
            $data['menu'] = $this->load->view('t_admin/menu/menu', $data, true);
            $data['isi'] = $this->load->view('t_admin/edit_artikel', $dat, true);
            $data['judul'] = $this->load->view('t_admin/menu/judul', $data, true);
            $data['head'] = $this->load->view('t_admin/menu/head', $data, true);
            $data['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $data, true);

            $this->load->view('t_admin', $data);
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function do_edit_artikel()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        if(!empty($cek) && $stts == "admin"){
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $status = $this->input->post('status');
            $isi    = $this->input->post('editor1');
            $kategori = $this->input->post('kategori');
            $data = array(
                'judul'     => $judul,
                'isi'       => $isi,
                'status'      => $status
                //'kategori'  => $this->input->post('kategori')
            );
            $where = array(
                'id' => $id
            );
            //echo var_dump($data);
            $res = $this->model_user->do_edit_artikel($where, $data, 'ys_berita');
            $res = $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Artikel Berhasil diupdate '
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/c_admin/artikel');
            
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('stts');
        session_destroy();
        redirect('auth');
    }

}

//	public function indexc() {
//            $cek  = $this->session->userdata('logged_in');
//            $stts = $this->session->userdata('stts');
//            if(!empty($cek) && $stts=="admin")
//            {
//		$data['username']       = $this->session->userdata('username');
//                $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
//                $data['act']= 0;
//                
//                $data['menu']       = $this->load->view('admin/menu',$data, true);
//                $data['profil']     = $this->load->view('admin/profil',$data, true);
//                $data['header']     = $this->load->view('admin/header',$data, true);
//                $data['isi']        = $this->load->view('admin/isi', $data,true);
//                $data['head']       = $this->load->view('admin/head', $data,true);
//		
//		$this->load->view('admin/index', $data);
//                //$this->load->view('admin/menu',$data);
//                
//            }
//            else
//            {
//                echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
//            }
//	}
//        public function pengguna() {
//            $cek  = $this->session->userdata('logged_in');
//            $stts = $this->session->userdata('stts');
//            if(!empty($cek) && $stts=="admin")
//            {
//                $data['pengguna']       = "User";
//		$data['username']       = $this->session->userdata('username');
//                $data['nama_lengkap']   = $this->session->userdata('nama_lengkap');
//                $data['act']= 1;
//                
//                $data['menu']       = $this->load->view('admin/menu',$data, true);
//                $data['profil']     = $this->load->view('admin/profil',$data, true);
//                $data['header']     = $this->load->view('admin/header',$data, true);
//                $data['head']       = $this->load->view('admin/head', $data,true); 
//                $data['script']       = $this->load->view('admin/script', $data,true); 
//		$data['isi_pengguna'] = $this->load->view('admin/isi_pengguna',$data, true);
//                
//		$this->load->view('admin/pengguna', $data);
//                //$this->load->view('admin/menu',$data);
//                
//            }
//            else
//            {
//                echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
//            }
//	}
//    public function tambah_tabel() {
//        $cek = $this->session->userdata('logged_in');
//        $cek = $this->session->userdata('logged_in');
//        $stts = $this->session->userdata('stts');
//        if (!empty($cek) && $stts == "admin") {
//            $username = $_POST['username'];
//            $nama_lengkap = $_POST['nama_lengkap'];
//            $stts = $_POST['stts'];
//            $data = array(
//                'username' => $username,
//                'nama_lengkap' => $nama_lengkap,
//                'stts' => $stts,
//                'password' => md5($username)
//            );
//            $res = $this->model_user->insertData('ys_login', $data);
//            if ($res >= 1) {
//                $this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissable'>
//                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
//                                Data Pengguna berhasil di Tambah
//                            </div>");
//                redirect('admin/c_admin/tabel');
//            } else {
//                echo "insert data gagal";
//            }
//        }
//    }
?>