<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VLM extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
	}


	public function index()
	{
		$this->load->template('index');
	}
	public function login_page()
	{
		$this->load->template('auth/login');
	}
	public function register_page()
	{
		$this->load->template('auth/register');
	}
	public function signin()
	{
		$pass = md5($this->input->post('password'));
		$this->load->template('auth/register');
	}
}
