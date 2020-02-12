<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
	}
	public function index(){
		$data['event']= $this->model_data->event();
		$this->load->template('event',$data);
	}
	public function editevent($id){
		$data['event']= $this->model_data->eventid($id);
		$this->load->template('editevent',$data);
	}
	public function hapus($id){
		$this->model_data->hapus_event($id);
		redirect('/event');
	}
	public function edit($id){
		$this->model_data->edit_event($id);
		redirect('/event');
	}
	public function get_data(){
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT * from event where id='".$id."'");
		$row = $query->row();
		$gambar = $row->gambar;
		$response .="<img src=".base_url().'gambar_kegiatan/'.$gambar.">";
		echo $response;
	}
	public function gambar(){
		$config['upload_path']          = './assets/gambar_kegiatan/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = '0';
		$config['remove_space']					= TRUE;
		$this->upload->initialize($config);
		$this->load->library('upload', $config); //load konfigurasi uploadnya
		if ($this->upload->do_upload('foto')){ //lakukan upload dan cek jika berhasil
			$file = $this->upload->data();
			// redirect('/');
			if (isset($file)) {
				$this->model_data->simpan($file);
				redirect('/event');
			}else {
				echo "batal";
			}
		}else{
			//jika gagal :
			echo "Gagal Upload";
		}
	}
}
