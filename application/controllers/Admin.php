<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_data');
		$this->load->model('model_user');
	}

	public function add_admin(){
		if ($this->session->status == '1') {
			$data['list'] = $this->model_user->data_admin();
			$this->load->template('admin/list_admin', $data);
		}
	}
	function save(){
		$this->model_user->add_admin();
		redirect('/');
	}
	public function members(){
		if ($this->session->status == '1') {
			$data['members'] = $this->model_user->all_user();
			$this->load->template('admin/members', $data);
		}
	}
	public function kirim(){
		if ($this->session->status == '1') {
			$data['members'] = $this->model_user->all_user();
			$this->load->template('admin/send');
		}
	}
	public function perubahan($id){
		if ($this->session->status == '1') {
			$data['members'] = $this->model_user->all_user();
			$this->load->template('admin/perubahan');
		}
	}
	public function send(){
		$this->load->library('mailer');
		$email_penerima = $this->input->post('email_penerima');
		$subjek = $this->input->post('subjek');
		$pesan = $this->input->post('pesan');
		//$attachment = $_FILES['attachment'];
		$content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
		$sendmail = array(
			'email_penerima'=>$email_penerima,
			'subjek'=>$subjek,
			'content'=>$content
			// 'attachment'=>$attachment
		);
		if(empty($attachment['name'])){ // Jika tanpa attachment
			$send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
		}else{ // Jika dengan attachment
			$send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
		}
    if ($send['status'] == "Sukses") {
      $data['pesan']='2';
      $data['judul']= 'Kirim Email';
        $data['konsumen'] = $this->Konsumen_model->getKonsumenById($id);
      $this->load->view('templates/header', $data);
      $this->load->view('email',$data);
      $this->load->view('templates/footer', $data);
    }else {
      $data['pesan']='1';
      $data['judul']= 'Kirim Email';
        $data['konsumen'] = $this->Konsumen_model->getKonsumenById($id);
      $this->load->view('templates/header', $data);
      $this->load->view('email',$data);
      $this->load->view('templates/footer', $data);
    }
  	// echo "<b>".$send['status']."</b><br />";
		// echo $send['message'];
		// echo "<br /><a href='".base_url("konsumen")."'>Kembali ke Form</a>";
	}

}
