<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		$this->load->model('model_user');
	}

	public function index(){
		if ($this->session->status == '1') {
			$this->model_user->tambah_umur();
			$data['judul'] = "List Admin";
			$data['list'] = $this->model_user->data_admin();
			$data['admin'] = $this->model_user->admin();
			$this->load->template('admin/list_admin', $data);
		}
	}
	function save(){
		$this->model_user->add_admin();
		redirect('/');
	}
	function ubah($id){
		$this->model_user->ubah_admin($id);
		redirect('/list_admin');
	}
}
