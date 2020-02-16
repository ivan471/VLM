<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		$this->load->model('model_user');
	}

	public function add_admin(){
		if ($this->session->status == '1') {
			$this->load->template('admin/add_admin');
		}
	}
	function save(){
		$this->model_user->add_admin();
		redirect('/');
	}
	public function members(){
		if ($this->session->status == '1') {
			$data['members'] = $this->model_user->all_user();
			$this->load->template('admin/members', $data);
		}
	}

}
