<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_user extends CI_Model {

    public function save_log($param) {
        $sql = $this->db->insert_string('ys_log', $param);
        $ex = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function cek_user($data) {
        $query = $this->db->get_where('tbl_user', $data);
        return $query;
    }

    public function getAll($data) {
        return $this->db->get($data);
    }

    public function getAllDataLimited($table, $limit, $offset) {
        return $this->db->get($table, $limit, $offset);
    }

    public function insertData($tabelName, $data) {
        $res = $this->db->insert($tabelName, $data);
        return $res;
    }

    function user() {
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }
    function pengguna() {
        $query = $this->db->get('tbl_user');
        //$query = $this->db->get('pbk');
        return $query->result_array();
    }
    //Model sentitems
    function sentitems() {
        $query = $this->db->get('sentitems');
        //$query = $this->db->get('pbk');
        return $query->result_array();
    }
    //Model Pesan Masuk
    function pesan_masuk() {
        $query = $this->db->get('inbox');
        //$query = $this->db->get('pbk');
        return $query->result_array();
    }
    //Model Pesan Keluar
    function pesan_keluar() {
        $query = $this->db->get('outbox');
        return $query->result_array();
    }
    //Model Pesan Terkirim
    function pesan_terkirim() {
        $this->db->select('*');
        $this->db->from('pbk');
        $this->db->join('sentitems', 'pbk.Number = sentitems.DestinationNumber');
        $query = $this->db->get();
        return $query->result_array();
    }
    //Model Phonebook
    function pbk() {
        $this->db->select('*');
        $this->db->from('pbk');
        $this->db->join('pbk_groups', 'pbk.GroupID = pbk_groups.GroupID');
        $query = $this->db->get();
        return $query->result_array();
    }
    //Model pbk_groups
    function pbk_groups() {
        $query = $this->db->get('pbk_groups');
        return $query->result_array();
    }
    //Model Pesan Siaran
    function siaran() {
        $sql   = "SELECT * FROM pbk_groups";
        
        $query = $this->db->query($sql);
        $data=$query->result_array();
        return $data;
    }
    //Model Siaran
    function status() {
        $sql   = "SELECT * FROM tbl_status";
        
        $query = $this->db->query($sql);
        $data=$query->result_array();
        return $data;
    }
    //kirim pesan
    function kirim_pesan($data) {
        $this->db->insert('outbox', $data);
        return TRUE;
    }
    //Kirim Siaran
    function kirim_siaran($data) {
        $this->db->insert('outbox', $data);
        return TRUE;
    }
    //Model Get balas Pesan
    public function GetBalas($where,$table){
        return $this->db->get_where($table,$where);
    }
    //Model Get Phonebook
    public function getdata($where,$table){
        return $this->db->get_where($table,$where);
    }
    //Model Eksekusi tambah pbk
    function dotambahpbk($data) {
        $this->db->insert('pbk', $data);
        return TRUE;
    }
    //Model Eksekusi tambah Pengguna
    function dotambahpengguna($data) {
        $this->db->insert('tbl_user', $data);
        return TRUE;
    }
    //Model Eksekusi tambah grup
    function dotambahgrup($data) {
        $this->db->insert('pbk_groups', $data);
        return TRUE;
    }
    //Model Eksekusi Edit Phonebook
    public function doeditpbk($where,$data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //Model Eksekusi Edit Grup
    public function doeditgrup($where,$data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //Model Menghapus Pesan Masuk
    public function hapus_inbox($tabelName, $where) {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }
    //Model Menghapus Pesan Keluar
    public function hapus_outbox($tabelName, $where) {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }
    //Model Menghapus Pesan Terkirim
    public function hapus_sentitems($tabelName, $where) {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }
    //Menghapus Phonebook
    public function deletepbk($tabelName, $where) {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }

    public function UpdateData($tabelName, $data, $where) {
        $res = $this->db->update($tabelName, $data, $where);
        return $res;
    }

    function tambah($data) {
        $this->db->insert('ys_login', $data);
        return TRUE;
    }

    function edit($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('ys_login', $data);
        return TRUE;
    }

    public function deletedata($tabelName, $where) {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }

    public function getakun($table, $data) {
        return $this->db->get_where($table, $data);
    }

    function updateakun($table, $data, $field_key) {
        $this->db->update($table, $data, $field_key);
    }

    function ambildata($perPage, $uri, $ringkasan) {
        $this->db->select('*');
        $this->db->from('ys_login');
        if (!empty($ringkasan)) {
            $this->db->like('username', $ringkasan);
        }
        $this->db->order_by('id', 'asc');
        $getData = $this->db->get('', $perPage, $uri);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }
    function getArtikel()
    {
        $query = $this->db->get('ys_berita');
        return $query->result_array();
    }
    function new_artikel($data) {
        $this->db->insert('ys_berita', $data);
        return TRUE;
    }
    function tampilartikel() {
        $this->db->where('stts','aktif');
        $query = $this->db->get('ys_berita');        
        return $query->result_array();
    }
    //pagination
    function data($number,$offset){
        return $query = $this->db->get('pbk',$number,$offset)->result();
        
    }
    function jumlah_data(){
        return $this->db->get('pbk')->num_rows();
    }
    public function editArtikel($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function do_edit_artikel($where,$data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // public function status() {
    //     $query = $this->db->get('status');
    //     return $query->result_array();
    // }
}

?>