<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CP_Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('MP_Laporan');
    //Codeigniter : Write Less Do More
  }

  function index()
  {

    $i = $this->input;
    $load=$this->load;
    $idkat=1;
    $listdata= $this->MP_Laporan->list_laporan()->result_array();
    // print_r($listdata);

    $data=array(
          'halaman' => 'laporan/list.php',
          'daftar'  => $listdata

    );
    $load->view('pemilik/dashbord',$data);
  }
  function detaillaporan1(){

    $bulan=$this->uri->segment(5);
    $tahun=$this->uri->segment(6);
    $sisa=$this->uri->segment(7);

    $i = $this->input;
    $load=$this->load;
    $load->model('MA_Edukasi');
    $idkat=1;

    $listdata= $this->MP_Laporan->list_detaillaporan($bulan,$tahun)->result_array();
    // print_r($listdata);
    $data=array(
          'halaman' => 'laporan/detaillist.php',
          'daftar1'  => $listdata,
          'jumlahsisabulanini' => $sisa,
          'bulan' => $bulan,
          'tahun' =>$tahun

    );
    $load->view('pemilik/dashbord',$data);
  }

}
