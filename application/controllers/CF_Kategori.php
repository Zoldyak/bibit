<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Kategori extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MF_Produk');
    //Codeigniter : Write Less Do More
  }

  function kategori()
  {
      $id=$this->uri->segment(3);
    
      $listprodukkategori=$this->MF_Produk->list_produk_ketegori($id)->result_array();
      $jumlah=$this->MF_Produk->list_produk_ketegori($id)->num_rows();

      $data=array(
            'halaman' => 'kategori.php',
            'jumlahdata'=>$jumlah,
            'daftar_produk_kategori'=> $listprodukkategori

      );
      $this->load->view('frontend/dasbord',$data);
  }

}
