<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MF_carabelanja extends CI_Model{

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
}
