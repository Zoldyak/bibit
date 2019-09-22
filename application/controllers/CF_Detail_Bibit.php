<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Detail_Bibit extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MF_Produk');
    //Codeigniter : Write Less Do More
  }

  function detail()
  {

    $id=$this->uri->segment(3);

    $load=$this->load;
    $listdetailproduk=$this->MF_Produk->list_detail($id)->result_array();
    $data=array(
          'halaman' => 'detail_bibit.php',
          'daftar_detail_produk'=> $listdetailproduk
    );
  $load->view('frontend/dasbord',$data);
  }

}
