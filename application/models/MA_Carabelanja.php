<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Carabelanja extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_pembayaran(){
    return $this->db->get_where('carabelanja',array('tipe_carabelanja'=>'Pembayaran'));
  }
  function list_pengiriman(){
    return $this->db->get_where('carabelanja',array('tipe_carabelanja'=>'Pengiriman'));
  }
  function input_data($dataform){
    $this->db->insert('carabelanja',$dataform);
  }
  function list_edit($id){
      return $this->db->get_where('carabelanja',array('id_carabelanja'=>$id));
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('carabelanja',$dataform);
  }
  function delete($where){
    $this->db->where($where);
    $this->db->delete('carabelanja');
  }
}
