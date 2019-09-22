<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MF_Produk');
    $this->load->model('MA_Slide');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
      $load=$this->load;
      $load->model('MF_Menu');
          $lisslide= $this->MA_Slide->list_slide()->result_array();
      $ketegori= $this->MF_Menu->kategori()->result_array();
      $listproduk=$this->MF_Produk->list_produk_pupuler()->result_array();
      $lissemuatproduk=$this->MF_Produk->list_produk()->result_array();
      foreach ($ketegori as $row1) {

      $idkat=$row1['id_ketegori'];

      // echo "$idkat";
        $subketegori= $this->MF_Menu->sub_kategori($idkat)->result_array();
        foreach ($subketegori as $row2) {
        // echo $row2['id_subketegori'];
        }
      }
      $data=array(
            'halaman' => 'home.php',
            'kat' => $ketegori,
            'daftar_produk_populer'=> $listproduk,
            'daftar_produk'=> $lissemuatproduk,
            'daftarslide'=>$lisslide,
            'subkat'=>$subketegori
      );
    $load->view('frontend/dasbord',$data);
  }

}
