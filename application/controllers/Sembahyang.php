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
		$data['judul'] = "Sembayang";
		$data['pemberitahuan'] = $this->model_data->tampilkan_pemberitahuan();
		$this->load->template('sembahyang', $data);
	}
	public function tambah(){
		$this->model_data->simpan_pemberitahuan();
		$query = $this->db->query("SELECT * FROM users where status='2'");
		foreach ($query->result_array() as $row) {
			$email = $row['email'];
			$this->send($email);
		}
		redirect('/sembahyang');
	}
	public function delete($id){
		$this->model_data->delete_sembayang($id);
		redirect('/sembahyang');
	}
	public function send($email){
		$this->load->library('mailer');
		$email_penerima = $email;
		$subjek = "Pemberitahuan";
		$pesan = $this->input->post('pemberitahuan');
		$content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
		$sendmail = array(
			'email_penerima'=>$email_penerima,
			'subjek'=>$subjek,
			'content'=>$content
		);
		$send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
	}
}
