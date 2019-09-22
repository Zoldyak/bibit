<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Tentang extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_tentang(){

    return $this->db->get('tentang');
  }
  function input_data($dataform){
    $this->db->insert('tentang',$dataform);
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('tentang',$dataform);

}
function list_edit($id){
  $query1=$this->db->get_where('tentang',array('id_tentang'=>$id));

  return $query1;

}  function delete($where){
    $this->db->where($where);
    $this->db->delete('tentang');
  }
}
