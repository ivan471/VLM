<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Belajar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
	}
	public function index(){
		$data['pesan'] ="0";
		$data['judul'] = "Belajar";
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
				$query = $this->db->query("SELECT * FROM users where status='2'");
				foreach ($query->result_array() as $row) {
					$email = $row['email'];
					$this->send($email);
				}
				$data['pesan']="1";
				$data['judul'] = "Belajar";
				$data['files']= $this->model_data->tampilkan_file();
				$this->load->template('belajar',$data);
			}else {
				$data['pesan']="2";
				$data['judul'] = "Belajar";
				$data['files']= $this->model_data->tampilkan_file();
				$this->load->template('belajar',$data);
			}
		}else{
			$data['pesan']="3";
			$data['judul'] = "Belajar";
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
	public function send($email){
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
		$pesan = '';
		// Email body content
		$content = $this->load->view('content', array('pesan'=>$pesan,'id'=>'3'), true); // Ambil isi file content.php dan masukan ke variabel $content
		$mail->Body = $content;
		$mail->send();
	}
}
