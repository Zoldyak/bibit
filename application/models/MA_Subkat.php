<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Subkat extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_subketegori(){
    $this->db->select('*');
    $this->db->from('sub_ketegori');
    $this->db->join('kategori', 'kategori.id_ketegori = sub_ketegori.id_ketegori');
    $query1 = $this->db->get();
    return $query1;
  }
  function input_data($dataform){
    $this->db->insert('sub_ketegori',$dataform);
  }
  function list_edit($id){
      return $this->db->get_where('sub_ketegori',array('id_subketegori'=>$id));
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('sub_ketegori',$dataform);
  }
  function delete($where){
    $this->db->where($where);
    $this->db->delete('sub_ketegori');
  }
}
