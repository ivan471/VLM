<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VLM extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		$this->load->model('model_user');
	}

	public function index()
	{
		$this->model_user->tambah_umur();
		$this->load->template('index');
	}
	public function profil($id)
	{
		$data['profil'] = $this->model_user->profil($id);
		$this->load->template('profil',$data);
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
		$data['cek']= "0";
		$this->load->template('auth/login', $data);
	}
	public function register_page()
	{
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
			redirect('/', $data);
		} else {
			$data['cek']= "1";
			$this->load->template('auth/login',$data);
		}
	}
	public function req(){
		$pass = $this->input->post('password');
		$pass1 = $this->input->post('password1');
		if ($pass == $pass1) {
			$this->model_user->register();
			$data['cek']= "2";
			$this->load->template('auth/register',$data);
		}else {
			$data['cek']= "1";
			redirect('/register_page');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
