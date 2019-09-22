<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Beli_bibit extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  $this->load->model('MF_Produk');
    //Codeigniter : Write Less Do More
  }

  function form_pemesanan()
  {
      $username=$this->session->userdata('nama_lengkap');
      if (!empty($username)) {
        $id=$this->uri->segment(3);
        $listdetailproduk=$this->MF_Produk->list_detail($id)->result_array();
        $load=$this->load;
        $data=array(
              'halaman' => 'beli_bibit.php',
              'daftar_detail_produk'=> $listdetailproduk
        );
      $load->view('frontend/dasbord',$data);

      }
      else{
      $this->session->set_flashdata('msg',
              '<div class="alert alert-danger">
                  <h4>Silakan</h4>
                  <p>Login terlebih dahulu</p>
              </div>');
      $load=$this->load;
      $load->view('login');
      }

  }

}
