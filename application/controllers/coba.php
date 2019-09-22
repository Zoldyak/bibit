<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $data=array(
      'halaman' => 'coba.php'
    );
  $load->view('frontend/coba.php');
  }
  function waktu(){
    $load=$this->load;
    $data=array(
      'halaman' => 'coba0.php'
    );
  $load->view('frontend/coba0.php');
  }
  function load_data(){
    $i = $this->input;
    $isi=$i->post('user_name');
    if (empty($isi)) {
      $hasil="tidak ada data";
    }
    else{
      $hasil="datanya adalah".$isi;
    }
     echo json_encode($hasil);
  }

}
