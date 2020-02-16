<?php
class Model_user extends CI_Model{
  public function __construct(){
    parent::__construct();
  }

	public function signin($email,$pass){
		$query = $this->db->query("SELECT * FROM users WHERE email='".$email."' and password='".$pass."'");
		return $query->row_array();
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
}
