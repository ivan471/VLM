<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class VLM extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		$this->load->model('model_user');
		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
	}

	public function index()
	{
		$data['judul'] = "Vihara Lahuta Maitreya";
		$this->model_user->tambah_umur();
		$this->load->template('index',$data);
	}
	public function profil($id)
	{
		if (isset($this->session->uid)) {
			$data = [
				'profil' => $this->model_user->profil($id),
				'hasil' => '0',
				'judul'=>'profil'
			];
			$this->load->template('profil',$data);
		}
	}
	public function upload($id)
	{
		$config['upload_path'] = './assets/profil/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = '0';
		$config['remove_space'] = TRUE;
		$this->upload->initialize($config);
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$file=$this->upload->data();
			$this->model_user->simpan($file,$id);
			redirect('/');
			// echo "Berhasil";
		}else{
			// Jika gagal :
			echo "Gagal";
		}
	}
	public function login_page()
	{
		$data['judul'] = "Login Akun";
		$data['cek']= "0";
		$this->load->template('auth/login', $data);
	}
	public function register_page()
	{
		$data['judul'] = "Register Akun";
		$data['cek']= "0";
		$this->load->template('auth/register',$data);
	}
	public function signin()
	{
		$email = $this->input->post('email');
		$pass = md5($this->input->post('password'));
		$user = $this->model_user->signin($email,$pass);
		if( isset($user)){
			// password cocok, login berhasil
			// simpan data session untuk mengenali user di setiap halaman
			$this->session->uid = $user['id_user'];
			$this->session->status = $user['status'];
			$this->session->nama = $user['nama'];
			// kembali ke halaman depan
			redirect('/');
		} else {
			$data['cek']= "1";
			$data['judul'] = "Login Akun";
			$this->load->template('auth/login',$data);
		}
	}
	public function req(){
		$pass = $this->input->post('password');
		$pass1 = $this->input->post('password1');
		if ($pass == $pass1) {
			$this->model_user->register();
			$data['cek']= "2";
			$data['judul'] = "Register Akun";
			$this->load->template('auth/register',$data);
		}else {
			$data['cek']= "1";
			$data['judul'] = "Register Akun";
			$this->load->template('auth/register',$data);
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	public function lupa_password(){
		$data['cek'] = '0';
		$data['judul'] = "Lupa Password";
		$this->load->template('auth/lupa_password_page', $data);
	}
	function get_link_forget($email){
		$data_email = $this->modal_data->get_user($email);
		$email = $row['email'];
		// $this->send($email);
	}
	function ganti($id){
		$pass1 = $this->input->post('pass1');
		$pass2 = $this->input->post('pass2');
		if ($pass1 == $pass2) {
			$this->model_user->change_pass($id);
			$data = [
				'profil' => $this->model_user->profil($id),
				'hasil' => '1',
				'judul'=>'Profil'
			];
			$this->load->template('profil', $data);
		}
	}
	function changepass($id){
		$pass1 = $this->input->post('pass1');
		$pass2 = $this->input->post('pass2');
		if ($pass1 == $pass2) {
			$this->model_user->change_pass($id);
			$data = [
				'cek' => '2',
				'form1' => '1',
				'judul'=>'Ganti Password'
			];
			$this->load->template('auth/change_password', $data);
		}else {
			$data = [
				'cek' => '1',
				'form1' => '0',
				'id' => $id,
				'judul'=>'Ganti Password'
			];
			$this->load->template('auth/change_password', $data);
		}
	}
	function change_password($id){
		$data = [
			'cek' => '0',
			'form1' => '0',
			'id' => $id,
			'judul'=>'Ganti Password'
		];
		$this->load->template('auth/change_password', $data);
	}
	public function send(){
		$email = $this->input->post('email');
		$row = $this->model_user->get_user($email);
		$nama = $row['nama'];
		$id = $row['id_user'];
		$response = false;
		$mail = new PHPMailer();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = true;
		// $mail->SMTPDebug = 2;
		$mail->Username 			= 'viharalahutamaitreya@gmail.com'; // user email
		$mail->Password 			= 'oitwrjvqvfbazxnr'; // password email
		$mail->SMTPSecure	 		= 'ssl';
		$mail->Port     			= 465;
		$mail->setFrom('viharalahutamaitreya@gmail.com', ''); // user email
		$mail->addAddress($email); //email tujuan pengiriman email
		// Email subject
		$mail->Subject = 'Lupa Password Akun'; //subject email
		// Set email format to HTML
		$mail->isHTML(true);
		// Email body content
		$content = $this->load->view('forget_password', array('pesan'=>$id,'nama'=>$nama), true); // Ambil isi file content.php dan masukan ke variabel $content
		$mail->Body = $content;
		if ($mail->send()) {
			$data['cek'] = '2';
			$data['judul'] = "Lupa Password";
			$this->load->template('auth/lupa_password_page', $data);
		}else {
			$data['cek'] = '1';
			$data['judul'] = "Lupa Password";
			$this->load->template('auth/lupa_password_page', $data);
		}
	}
}
