<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CP_Dahsbord extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $i = $this->input;
    $tahun= $i->post('pilih');
    if (empty($tahun)) {
      // code...
      $plilihantahun=date("Y");
    }
    else {
      // code...
      $plilihantahun=$tahun;
    }
        $this->load->model('MP_Dashbord');
        $graphpemjualan= $this->MP_Dashbord->listgrappenjualan($plilihantahun)->result_array();

      $data=array(
            'grapjual'  => $graphpemjualan,
            'tahunke'=> $plilihantahun
      );
    $load=$this->load;
      $load->view('pemilik/dashbord.php',$data);
  }


}
