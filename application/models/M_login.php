<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function cek_row($where){
    $query1 = $this->db->get_where('user',$where);
    return $query1;
  }
  function cek_list($where){
    $query2 = $this->db->get_where('user',$where);
    return $query2;
  }
}
