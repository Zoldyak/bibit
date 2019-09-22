<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Kategori extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('MA_Kategori');
  }

  function index()
  {

    $load=$this->load;
    $load->model('MA_Kategori');
    $idkat=1;
      $listdata= $this->MA_Kategori->list_ketegori()->result_array();

    $data=array(
          'halaman' => 'Kategori/list.php',
          'daftar'  => $listdata
    );

    // $data['alamat']='berita/list.php';
    //   $data['coba']='percobaan';

  $load->view('admin/dashbord',$data);
  }
  function tambah(){
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('kategori','Kategori','required');
    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $dataform = array(
        	'nama_ketegori' => $i->post('kategori')
        );
        $this->MA_Kategori->input_data($dataform);
        redirect(base_url('admin/CA_Kategori'));
      }
    }

      $load=$this->load;
      $data=array(
            'halaman' => 'Kategori/form.php',
            'jenis_form'=> 'tambah'

      );
      $load->view('admin/dashbord',$data);
  }

  function edit(){
    $load=$this->load;
    $i = $this->input;
    $IDKAT= $i->post('idkat');



    $valid 		= $this->form_validation;
    $valid->set_rules('kategori','Kategori','required');
    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $dataform = array(
        	'nama_ketegori' => $i->post('kategori')
        );

        $where = array(
      		'id_ketegori' => $IDKAT
      	);
        $this->MA_Kategori->update_data($where,$dataform);
        redirect(base_url('admin/CA_Kategori'));
      }
    }
    $id=$this->uri->segment(4);
    $list_data= $this->MA_Kategori->list_edit($id)->result_array();

    $data=array(
          'halaman' => 'Kategori/form.php',
          'jenis_form'=> 'edit',
          'data_edit' => $list_data

    );
    $load->view('admin/dashbord',$data);
  }
  function edit1(){
    $load=$this->load;
    $i = $this->input;
    $id=$this->uri->segment(4);
    echo "idnya adalah $id";
    echo $i->post('kategori');


  }
  function delete(){
      $id=$this->uri->segment(4);
      $where = array('id_ketegori' => $id );
        $load=$this->load;
        $this->MA_Kategori->delete($where);
        redirect(base_url('admin/CA_Kategori'));

  }

}
