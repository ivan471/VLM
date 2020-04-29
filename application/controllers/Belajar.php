<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
	}
	public function index(){
		$data['pesan'] ="0";
		$data['files']= $this->model_data->tampilkan_file();
		$this->load->template('belajar', $data);
	}
	public function save(){
		$config['upload_path']          = './assets/pdf/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = '0';
		$config['remove_space']					= TRUE;
		$this->upload->initialize($config);
		$this->load->library('upload', $config); //load konfigurasi uploadnya
		if ($this->upload->do_upload('file')){ //lakukan upload dan cek jika berhasil
			$file = $this->upload->data();
			if (isset($file)) {
				$this->model_data->save($file);
				$data['pesan']="1";
				$data['files']= $this->model_data->tampilkan_file();
				$this->load->template('belajar',$data);
			}else {
				$data['pesan']="2";
				$data['files']= $this->model_data->tampilkan_file();
				$this->load->template('belajar',$data);
			}
		}else{
			$data['pesan']="2";
			$data['files']= $this->model_data->tampilkan_file();
			$this->load->template('belajar',$data);
		}
	}
	public function download($id){
		$this->load->helper('download');
		$fileinfo = $this->model_data->download($id);
		$file = './assets/pdf/'.$fileinfo ['nama_file'];
		force_download($file, NULL);
	}

}
