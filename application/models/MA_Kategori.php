<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Kategori extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_ketegori(){
    $query1 = $this->db->get('kategori');
    return $query1;
  }
  function input_data($dataform){
    $this->db->insert('kategori',$dataform);
  }
  function list_edit($id){
      return $this->db->get_where('kategori',array('id_ketegori'=>$id));
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('kategori',$dataform);
  }
  function delete($where){
    $this->db->where($where);
    $this->db->delete('kategori');
  }

}
