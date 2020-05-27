<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
	}
	public function index(){
		$data['kq'] ="0";
		$data['event']= $this->model_data->event();
		$this->load->template('event',$data);
	}
	public function editevent($id){
		if ($this->session->status == '1') {
			$data['event']= $this->model_data->eventid($id);
			$this->load->template('editevent',$data);
		}
	}
	public function hapus($id){
		if ($this->session->status == '1') {
			$this->model_data->hapus_event($id);
			redirect('/event');
		}
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
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = '0';
		$config['remove_space']					= TRUE;
		$this->upload->initialize($config);
		$this->load->library('upload', $config); //load konfigurasi uploadnya
		if ($this->upload->do_upload('foto')){ //lakukan upload dan cek jika berhasil
			$file = $this->upload->data();
			// redirect('/');
			if (isset($file)) {
				$this->model_data->simpan($file);
				$umur = $this->input->post('umur');
				if ($umur == '1') {
					$query = $this->db->query("SELECT * FROM users where status='2'");
					foreach ($query->result_array() as $row) {
						$email = $row['email'];
						$this->send($email);
					}
				}else {
					$awal = $this->input->post('umur1');
					$akhir = $this->input->post('umur2');
					$query = $this->db->query("SELECT * FROM users where status='2' and umur between '".$awal."' and '".$akhir."'");
					foreach ($query->result_array() as $row) {
						$email = $row['email'];
						$this->send($email);
					}
				}
				$data['kq']="1";
				$data['event']= $this->model_data->event();
				$this->load->template('event',$data);
			}else {
				echo "batal";
			}
		}else{
			$data['kq']="2";
			$data['event']= $this->model_data->event();
			$this->load->template('event',$data);
		}
	}
	public function send($email){
		$this->load->library('mailer');
		$email_penerima = $email;
		$subjek = "Pemberitahuan";
		$pesan = $this->input->post('deskripsi');
		$attachment = $_FILES['foto'];
		$content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
		$sendmail = array(
			'email_penerima'=>$email_penerima,
			'subjek'=>$subjek,
			'content'=>$content,
			'attachment'=>$attachment
		);
		if(empty($attachment['name'])){ // Jika tanpa attachment
			$send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
		}else{ // Jika dengan attachment
			$send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
		}
	}

}
