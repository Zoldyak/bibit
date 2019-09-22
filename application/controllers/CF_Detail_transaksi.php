<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Detail_transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MF_Produk');
  }

  function index()
  {
    $id=$this->uri->segment(3);
  }

}
