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
		$this->load->template('index');
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
			$this->load->template('auth/register_page',$data);
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
