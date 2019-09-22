<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Register extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_data($where){
   $query1=$this->db->get_where('user',$where);
   return $query1;

  }
  function input_data($dataform){
      $this->db->insert('user',$dataform);
  }
  function update_data($where,$dataform){
    $this->db->where($where);
  $this->db->update('user',$dataform);
  }
}
