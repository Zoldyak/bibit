<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Cara_belanjar extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $load->model('MF_carabelanja');
      $listpembayran= $this->MF_carabelanja->list_pembayaran()->result_array();
      $listpengiriman= $this->MF_carabelanja->list_pengiriman()->result_array();
    $data=array(
          'halaman' => 'cara_belanjar.php',
          'Pembayaran'=>$listpembayran,
          'Pengiriman'=>$listpengiriman
    );
  $load->view('frontend/dasbord',$data);
  }

}
