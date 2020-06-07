<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_user');
	}

	public function index(){
		if ($this->session->status == '1') {
			$this->model_user->tambah_umur();
			$this->load->library('pagination');
			// ambil data keyword
			if ($this->input->post('submit')){
				$data['keyword'] = $this->input->post('keyword');
				$this->session->set_userdata('keyword', $data['keyword']);
			} else {
				$data['keyword'] = '' ;
			}
			$this->db->like('nama', $data['keyword']);
			$this->db->where('status', '2');
			$this->db->from('users');
			$config['total_rows'] = $this->db->count_all_results();
			$config['per_page'] = 30;
			//initialize
			$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
			$config['full_tag_close'] = '</ul></nav>';
			$this->pagination->initialize($config);
			$data['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
			$data['members'] = $this->model_user->all_user($config['per_page'], $data['start'], $data['keyword']);
			$data['pagination'] = $this->pagination->create_links();
			$this->load->template('admin/members', $data);
		}
	}
	public function perubahan($id){
		if ($this->session->status == '1') {
			$data['members'] = $this->model_user->getuserdata($id);
			$this->load->template('admin/perubahan', $data);
		}
	}
	public function simpan($id){
		if ($this->session->status == '1') {
			$this->model_user->simpan_kondisi($id);
			redirect('/members');
		}
	}
	public function ubah($id){
		if ($this->session->status == '1') {
			$this->model_user->simpan_status($id);
			redirect('/members');
		}
	}
}
