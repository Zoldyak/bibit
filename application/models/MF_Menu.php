<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MF_Menu extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
function kategori(){
  $query1 = $this->db->get('kategori');
  return $query1;
}
function sub_kategori($idkat){
    // $query2 = $this->db->get('sub_ketegori ');
  $query2 = $this->db->get_where('sub_ketegori',array('id_ketegori' =>$idkat));
  return $query2;
}
}
