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
			$data['list'] = $this->model_user->data_admin();
			$this->load->template('admin/list_admin', $data);
		}
	}
	public function add_admin(){
		if ($this->session->status == '1') {
			$this->model_user->tambah_umur();
			$this->load->template('admin/add_admin');
		}
	}
	function save(){
		$this->model_user->add_admin();
		redirect('/');
	}
	
}
