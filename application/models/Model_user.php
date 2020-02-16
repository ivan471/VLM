<?php
class Model_user extends CI_Model{
  public function __construct(){
    parent::__construct();
  }

  public function signin($email,$pass){
    $query = $this->db->query("SELECT * FROM users WHERE email='".$email."' and password='".$pass."'");
    return $query->row_array();
  }
  public function profil($id){
    $query = $this->db->query("SELECT * FROM users WHERE id_user='".$id."'");
    return $query->row_array();
  }
  public function all_user(){
    $query = $this->db->query("SELECT * FROM users WHERE status='2'");
    return $query->result_array();
  }
  public function register(){
    $data = [
      'nama' => $this->input->post('nama'),
      'password' => md5($this->input->post('password')),
      'tgl_lahir' => $this->input->post('tgl_lahir'),
      'tempat_lahir' => $this->input->post('tmpt_lahir'),
      'no_hp' => $this->input->post('no_hp'),
      'umur' => $this->input->post('umur'),
      'email' => $this->input->post('email'),
      'status' => "2"
    ];
    $this->db->insert( 'users', $data );
  }
  public function simpan($file,$id){
    $data = array('gambar' => $file['file_name']);
    $this->db->where('id_user', $id);
    $this->db->update('users', $data);
  }
}
