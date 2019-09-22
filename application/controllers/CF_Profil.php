<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Profil extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MA_Tentang');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $listdata= $this->MA_Tentang->list_tentang()->result_array();
    $data=array(
      'halaman' => 'profil.php',
        'daftar'  => $listdata

    );
  $load->view('frontend/dasbord',$data);
  }

}
