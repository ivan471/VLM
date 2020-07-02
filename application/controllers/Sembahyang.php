<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Sembahyang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		$this->load->model('model_user');
		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
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
		$content = $this->load->view('content', array('pesan'=>$pesan,'id'=>'1'), true); // Ambil isi file content.php dan masukan ke variabel $content
		$mail->Body = $content;
		$mail->send();
	}
}
