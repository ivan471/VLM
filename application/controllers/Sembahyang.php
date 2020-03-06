<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sembahyang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		$this->load->model('model_user');
	}

	public function index(){
		$this->model_user->tambah_umur();
		$data['pemberitahuan'] = $this->model_data->tampilkan_pemberitahuan();
		$this->load->template('sembahyang', $data);
	}
	public function tambah(){
		$this->model_data->simpan_pemberitahuan();
		redirect('/sembahyang');
	}

}
