<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Edukasi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_edukasi(){
    $query1 = $this->db->get('edukasi');
    return $query1;
  }
  function input_data($dataform){
    $this->db->insert('edukasi',$dataform);
  }
  function list_edit($id){
      return $this->db->get_where('edukasi',array('id_edukasi'=>$id));
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('edukasi',$dataform);
  }
  function delete($where){
    $this->db->where($where);
    $this->db->delete('edukasi');
  }
}
