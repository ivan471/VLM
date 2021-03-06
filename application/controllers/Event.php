<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Event extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
	}
	public function index(){
		$data['kq'] ="0";
		$data['judul'] = "Event";
		$data['event']= $this->model_data->event();
		$this->load->template('event/event',$data);
	}
	public function add_event(){
		$data['kq'] ="0";
		$data['judul'] = "Tambah Event Baru";
		$this->load->template('admin/add_event',$data);
	}
	public function editevent($id){
		if ($this->session->status == '1') {
			$data['judul'] = "Edit Event";
			$data['event']= $this->model_data->eventid($id);
			$this->load->template('event/edit',$data);
		}
	}
	public function detail($id){
		$data['judul'] = "Detail Event";
		$data['event']= $this->model_data->eventid($id);
		$this->load->template('event/detail',$data);
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
		// echo '123';
		// The name of the directory that we need to create.
		$directoryName = './assets/gambar_kegiatan/';
		if(!is_dir($directoryName)){
			//Directory does not exist, so lets create it.
			mkdir($directoryName, 0755, true);
		}
		$config['upload_path']          = './assets/gambar_kegiatan/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = '0';
		$config['remove_space']					= TRUE;
		$this->upload->initialize($config);
		$this->load->library('upload', $config); //load konfigurasi uploadnya
		if ($this->upload->do_upload('foto')){ //lakukan upload dan cek jika berhasil
			$file = $this->upload->data();
			if (isset($file)) {
				$this->model_data->simpan($file);
				$query = $this->db->query("SELECT * FROM event ORDER BY id DESC LIMIT 1");
				$row = $query->row();
				$id = $row->id;
				$umur = $this->input->post('umur');
				if ($umur == '1') {
					$query = $this->db->query("SELECT * FROM users where status='2'");
					foreach ($query->result_array() as $row) {
						$email = $row['email'];
						// echo $email;
						$this->send($email,$id);
					}
				}else{
					$umur1 = $this->input->post('umur1');
					if ($umur1 == '1') {
						$awal = '6';
						$akhir = '16';
						$query = $this->db->query("SELECT * FROM users where status='2' and umur between '".$awal."' and '".$akhir."'");
					}elseif ($umur1 == '2') {
						$awal = '17';
						$akhir = '40';
						$query = $this->db->query("SELECT * FROM users where status='2' and umur between '".$awal."' and '".$akhir."'");
					}else {
						$awal = '40';
						$query = $this->db->query("SELECT * FROM users where status='2' and umur > '".$awal."'");
					}
					foreach ($query->result_array() as $row) {
						$email = $row['email'];
						$this->send($email,$id);
					}
				}
				$data['kq']="1";
				$data['judul'] = "Tambah Event Baru";
				$data['event']= $this->model_data->event();
				$this->load->template('admin/add_event',$data);
			}else {
				echo "batal";
			}
		}else{
			$data['kq']="2";
			$data['judul'] = "Tambah Event Baru";
			$data['event']= $this->model_data->event();
			$this->load->template('admin/add_event',$data);
		}
	}
	public function send($email,$id){
		$response = false;
		$mail = new PHPMailer();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = true;
		// $mail->SMTPDebug = 2;
		$mail->Username = 'viharalahutamaitreya@gmail.com'; // user email
		$mail->Password = 'oitwrjvqvfbazxnr'; // password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;
		$mail->setFrom('viharalahutamaitreya@gmail.com', ''); // user email
		$mail->addAddress($email); //email tujuan pengiriman email
		// Email subject
		$mail->Subject = 'Pemberitahuan'; //subject email
		// Set email format to HTML
		$mail->isHTML(true);
		// Email body content
		$pesan = $id;
		$content = $this->load->view('content', array('pesan'=>$pesan,'id'=>'0'), true); // Ambil isi file content.php dan masukan ke variabel $content
		$mail->Body = $content;
		$mail->send();

	}

}
