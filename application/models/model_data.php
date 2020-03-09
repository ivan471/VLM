<?php
class Model_data extends CI_Model{
  public function __construct(){
    parent::__construct();
  }
  public function simpan($file){
    $data=[
      'deskripsi' => $this->input->post('deskripsi'),
      'gambar' =>$file['file_name']
    ];
    $this->db->insert('event',$data);
  }
  public function simpan_pemberitahuan(){
    $data=[
      'isi' => $this->input->post('pemberitahuan'),
      'tanggal' => date('Y-m-d')
    ];
    $this->db->insert('pemberitahuan',$data);
  }
  public function event(){
    $query = $this->db->query("SELECT * FROM event order by id desc");
    return $query->result_array();
  }
  public function tampilkan_pemberitahuan(){
    $query = $this->db->query("SELECT * FROM pemberitahuan order by id desc");
    return $query->result_array();
  }
  public function eventid($id){
    $query = $this->db->query("SELECT * FROM event where id='".$id."'");
    return $query->row_array();
  }
  public function hapus_event($id){
    $this->db->where('id',$id);
    $query = $this->db->get('event');
    $row = $query->row();
    unlink("./asset/gambar_kegiatan/$row->gambar");
    $this->db->delete('event', array('id' => $id));
  }
  public function delete_sembayang($id){
      $this->db->delete('pemberitahuan', array('id' => $id));
  }
  public function edit_event($id){
    $data = array('deskripsi' =>$this->input->post('deskripsi'));
    $this->db->where('id',$id);
    $this->db->update('event',$data);
  }
}




?>
