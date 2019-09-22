<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Edukasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $id=$this->uri->segment(3);
    if (empty($id)) {
    $id_vid=1;
    }
    else {
      $id_vid=$this->uri->segment(3);
    }
    // $id=$this->uri->segment(3);
    $load=$this->load;
    $load->model('MF_edukasi');
      $listedukasi= $this->MF_edukasi->list_edukasi()->result_array();
    $pilihan= $this->MF_edukasi->pilih_video($id_vid)->result_array();
      $jumlah= $this->MF_edukasi->pilih_video($id_vid)->num_rows();
      $data=array(
        'halaman' => 'edukasi.php',
        'list' => $listedukasi,
        'pilih' => $pilihan,
        'total'=> $jumlah
      );
  $load->view('frontend/dasbord',$data);
  }

}
