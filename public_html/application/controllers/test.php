<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    function index() {
        $data = array(
            'data' => $this->model_user->user()
        );
        $this->load->view('view_admin', $data);
    }

    function tambah() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan')
        );
        $this->model_admin->tambah($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin');
    }

    function ubah() {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan')
        );
        $this->model_admin->ubah($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin');
    }

    public function akun() { {
            $cek = $this->session->userdata('logged_in');
            $stts = $this->session->userdata('stts');
            if (!empty($cek) && $stts == 'admin') {
                $bc['nama'] = $this->session->userdata('nama');
                $bc['status'] = $this->session->userdata('stts');
                $bc['username'] = $this->session->userdata('username');

                $bc['navbar_header'] = $this->load->view('t_admin/menu/navbar_header', $bc, true);
                $bc['menu'] = $this->load->view('t_admin/menu/menu', $bc, true);
                $bc['isi'] = $this->load->view('t_admin/setting', $bc, true);
                $bc['judul'] = $this->load->view('t_admin/menu/judul', $bc, true);
                $bc['head'] = $this->load->view('t_admin/menu/head', $bc, true);
                $bc['script_bawah'] = $this->load->view('t_admin/menu/script_bawah', $bc, true);

                $this->load->view('coba', $bc);
            } else {
                header('location:' . base_url() . 'index.php/web');
            }
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
            $data['password'] = md5($pass_lama);
            $cek = $this->model_user->getSelectedDataMultiple('ys_login', $data);
            if ($cek->num_rows() > 0) {
                if ($pass_baru == $ulangi_pass) {
                    $simpan['password'] = md5($pass_baru);
                    $where = array('username' => $username);
                    $this->model_user->updateDataMultiField("ys_login", $simpan, $where);
                    $this->session->set_flashdata("save_akun", "
					<div class='alert alert-info'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>
										<strong>Selamat!</strong>

										Anda berhasil mengubah password
										<br />
									</div>");
                    header('location:' . base_url() . 'index.php/test/akun');
                } else {
                    $this->session->set_flashdata("save_akun", "
						<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Terjadi Kesalahan!
										</strong>

										Password yang Anda input tidak sama
										<br />
									</div>");
                    header('location:' . base_url() . 'index.php/test/akun');
                }
            } else {
                $this->session->set_flashdata("save_akun", "
				<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Terjadi Kesalahan!
										</strong>

										Password lama Anda salah, mohon periksa kembali password lama Anda
										<br />
									</div>");
                header('location:' . base_url() . 'index.php/test/akun');
            }
        } else {
            header('location:' . base_url() . 'index.php/web');
        }
    }

}
