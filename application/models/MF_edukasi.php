<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MF_edukasi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_edukasi(){
    $query1 = $this->db->get('edukasi');
    return $query1;
  }
  function pilih_video($id_vid){
            return $this->db->get_where('edukasi',array('id_edukasi'=>$id_vid));
          // return $query->result();
        }
}
