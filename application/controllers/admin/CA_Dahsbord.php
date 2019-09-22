<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Dahsbord extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $i = $this->input;
    $tahun= $i->post('pilih');
    $jenis=$i->post('jenis');
    if (empty($tahun)) {
      // code...
      $plilihantahun=date("Y");
    }
    else {
      // code...
      $plilihantahun=$tahun;
    }
        $this->load->model('MA_Dashbord');

          $graphpemjualan= $this->MA_Dashbord->list_produk_pupuler($plilihantahun)->result_array();


            $graphpemjualanlaris= $this->MA_Dashbord->list_produk_pupuler($plilihantahun)->result_array();



      $data=array(
              'graphlaris'=>$graphpemjualanlaris,
            'grapjual'  => $graphpemjualan,
            'tahunke'=> $plilihantahun,
            'jenis' =>$jenis
      );
    $load=$this->load;
      $load->view('admin/dashbord.php',$data);
  }


}
