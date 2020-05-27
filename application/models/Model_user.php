<?php
class Model_user extends CI_Model{

  public function all_user($limit, $start, $keyword = null){
    if( $keyword ){
      $query = $this->db->query("SELECT * From users where nama like '%$keyword%' and status='2' order by nama asc limit $start,$limit");
    }else {
      $query = $this->db->query("SELECT * From users where status='2' order by nama asc limit $start, $limit");
    }
    return $query->result_array();
    $query = $this->db->query("SELECT * FROM users WHERE status='2'");
    return $query->result_array();
  }
  public function signin($email,$pass){
    $query = $this->db->query("SELECT * FROM users WHERE email='".$email."' and password='".$pass."'");
    return $query->row_array();
  }
  public function profil($id){
    $query = $this->db->query("SELECT * FROM users WHERE id_user='".$id."'");
    return $query->row_array();
  }
  public function getuserdata($id){
    $query = $this->db->query("SELECT * FROM users WHERE id_user='".$id."'");
    return $query->row_array();
  }
  public function data_admin(){
    $query = $this->db->query("SELECT * FROM users WHERE status='1'");
    return $query->result_array();
  }
  public function admin(){
    $query = $this->db->query("SELECT count(*) FROM users WHERE status='1'");
    return $query->row_array();
  }
  public function register(){
    $data = [
      'nama' => $this->input->post('nama'),
      'password' => md5($this->input->post('password')),
      'tgl_lahir' => $this->input->post('tgl_lahir'),
      'tempat_lahir' => $this->input->post('tmpt_lahir'),
      'no_hp' => $this->input->post('no_hp'),
      'umur' => $this->input->post('umur'),
      'jenis_kelamin' => $this->input->post('jk'),
      'email' => $this->input->post('email'),
      'status' => "2"
    ];
    $this->db->insert( 'users', $data );
  }
  public function simpan($file,$id){
    $this->db->where('id_user',$id);
    $query = $this->db->get('users');
    $row = $query->row();
    $gambar = $row->gambar;
    if ($gambar != "default.png") {
      unlink("./asset/profil/$gambar");
    }
    $data = array('gambar' => $file['file_name']);
    $this->db->where('id_user', $id);
    $this->db->update('users', $data);
  }
  public function tambah_umur(){
    $sql = $this->db->query("SELECT * FROM users");
    foreach ($sql->result_array() as $row) {
      $tgl = $row['tgl_lahir'];
      $usia = $row['umur'];
      $id = $row['id_user'];
      $bln = date('m',strtotime($tgl));
      $bln1 = date('m');
      $biday = new DateTime($tgl);
      $today = new DateTime();
      $diff =$today->diff($biday);
      $cek = $diff->y;
      if ($bln == $bln1 && $cek =! $usia) {
        $hsl = $usia + 1;
        $data = array('umur' => $hsl);
        $this->db->where('id_user', $id);
        $this->db->update('users', $data);
      }
    }
  }
}
