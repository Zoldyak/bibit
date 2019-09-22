<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_search extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MF_Produk');
    //Codeigniter : Write Less Do More
  }

  function search()
  {

$namabibit=$this->input->post('bibit');
    $listprodukkategori=$this->MF_Produk->list_search($namabibit)->result_array();
    $jumlah=$this->MF_Produk->list_search($namabibit)->num_rows();

    $data=array(
          'halaman' => 'search.php',
          'jumlahdata'=>$jumlah,
          'daftar_produk_kategori'=> $listprodukkategori

    );
    $this->load->view('frontend/dasbord',$data);
  }

}
