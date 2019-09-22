<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MP_User extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_user(){
  $query1=$this->db->select('*')
     ->from('user')
     ->where('level', '1')
     ->where('status', 'aktif')
     ->get();
  return $query1;
  }
  function input_data($dataform){
    $this->db->insert('user',$dataform);
  }
  function list_edit($id){

    $query1=$this->db->select('*')
       ->from('user')
       ->where('username', $id)
       ->get();

      return $query1;
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('user',$dataform);
  }
  function delete($where){
    $this->db->where($where);
    $this->db->delete('user');
  }



}
