<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {


	public function index()
	{
		$this->load->template('member');
	}


}
