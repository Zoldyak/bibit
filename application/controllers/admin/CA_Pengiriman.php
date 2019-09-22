<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Pengiriman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MA_Carabelanja');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $load->model('MA_Carabelanja');
    $idkat=1;
      $listdata= $this->MA_Carabelanja->list_pengiriman()->result_array();

    $data=array(
          'halaman' => 'pengiriman/list.php',
          'daftar'  => $listdata
    );
    $load->view('admin/dashbord',$data);
  }

  function tambah(){
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('keterangan','keterangan','required');

    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $dataform = array(
          'keterangan' => $i->post('keterangan'),
            'tipe_carabelanja' => $i->post('tipe')
        );
        $this->MA_Carabelanja->input_data($dataform);
        redirect(base_url('admin/CA_Pengiriman'));
      }
    }
      $load=$this->load;
      $data=array(
            'halaman' => 'pengiriman/form.php',
            'jenis_form'=> 'tambah'

      );
      $load->view('admin/dashbord',$data);
  }
  function edit(){
    $load=$this->load;
    $i = $this->input;
    $ID= $i->post('idedu');

    $valid 		= $this->form_validation;
    $valid->set_rules('keterangan','keterangan','required');

    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $dataform = array(
          'keterangan' => $i->post('keterangan'),
            'tipe_carabelanja' => $i->post('tipe')
        );

        $where = array(
          'id_carabelanja' => $ID
        );
        $this->MA_Carabelanja->update_data($where,$dataform);
        redirect(base_url('admin/CA_Pengiriman'));
      }
    }
    $id=$this->uri->segment(4);
    $list_data= $this->MA_Carabelanja->list_edit($id)->result_array();

    $data=array(
          'halaman' => 'pengiriman/form.php',
          'jenis_form'=> 'edit',
          'data_edit' => $list_data

    );
    $load->view('admin/dashbord',$data);
  }
  function delete(){
      $id=$this->uri->segment(4);
      $where = array('id_carabelanja' => $id );
        $load=$this->load;
        $this->MA_Carabelanja->delete($where);
        redirect(base_url('admin/CA_Pengiriman'));

  }

}
