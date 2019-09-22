<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Edukasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MA_Edukasi');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $load->model('MA_Edukasi');
    $idkat=1;
      $listdata= $this->MA_Edukasi->list_edukasi()->result_array();

    $data=array(
          'halaman' => 'edukasi/list.php',
          'daftar'  => $listdata
    );
    $load->view('admin/dashbord',$data);
  }

  function tambah(){
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('judul','judul','required');
    $valid->set_rules('url','url','required');
    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $dataform = array(
          'judul' => $i->post('judul'),
          'alamat_web' => $i->post('url')

        );
        $this->MA_Edukasi->input_data($dataform);
        redirect(base_url('admin/CA_Edukasi'));
      }
    }
      $load=$this->load;
      $data=array(
            'halaman' => 'edukasi/form.php',
            'jenis_form'=> 'tambah'

      );
      $load->view('admin/dashbord',$data);
  }
  function edit(){
    $load=$this->load;
    $i = $this->input;
    $IDEDU= $i->post('idedu');

    $valid 		= $this->form_validation;
    $valid->set_rules('judul','judul','required');
    $valid->set_rules('url','url','required');
    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $dataform = array(
          'judul' => $i->post('judul'),
          'alamat_web' => $i->post('url')
        );

        $where = array(
          'id_edukasi' => $IDEDU
        );
        $this->MA_Edukasi->update_data($where,$dataform);
        redirect(base_url('admin/CA_Edukasi'));
      }
    }
    $id=$this->uri->segment(4);
    $list_data= $this->MA_Edukasi->list_edit($id)->result_array();

    $data=array(
          'halaman' => 'edukasi/form.php',
          'jenis_form'=> 'edit',
          'data_edit' => $list_data

    );
    $load->view('admin/dashbord',$data);
  }
  function delete(){
      $id=$this->uri->segment(4);
      $where = array('id_edukasi' => $id );
        $load=$this->load;
        $this->MA_Edukasi->delete($where);
        redirect(base_url('admin/CA_Edukasi'));

  }

}
