<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Subkat extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('MA_Kategori');
      $this->load->model('MA_Subkat');
    //Codeigniter : Write Less Do More
  }

  function index()
  {

    $load=$this->load;
    $load->model('MA_Subkat');
    $idkat=1;
      $listdata= $this->MA_Subkat->list_subketegori()->result_array();
    $data=array(
        'halaman'   => 'Subkat/list.php',
        'daftar'    => $listdata,

    );

    // $data['alamat']='berita/list.php';
    //   $data['coba']='percobaan';

  $load->view('admin/dashbord',$data);
  }
  function tambah(){
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('subkategori','Subkategori','required');
    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $dataform = array(
        	'nama_subketegori' => $i->post('subkategori'),
          'id_ketegori'=> $i->post('idkat')
        );
        $this->MA_Subkat->input_data($dataform);
        redirect(base_url('admin/CA_Subkat'));
      }
      else {

          redirect(base_url('admin/CA_Subkat/tambah'));
      }
    }

      $load=$this->load;
      $listdatakat= $this->MA_Kategori->list_ketegori()->result_array();

      $data=array(
            'halaman' => 'Subkat/form.php',
            'jenis_form'=> 'tambah',
            'daftarkat' => $listdatakat

      );
      $load->view('admin/dashbord',$data);
  }

  function edit(){
    $load=$this->load;
    $i = $this->input;
    $IDSUBKAT= $i->post('idsubkat');



    $valid 		= $this->form_validation;
    $valid->set_rules('subKategori','SubKategori','required');
    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $dataform = array(
        	'nama_subketegori' => $i->post('subKategori'),
          'id_ketegori'=> $i->post('idkat')
        );

        $where = array(
      		'id_subketegori' => $IDSUBKAT
      	);
        $this->MA_Subkat->update_data($where,$dataform);
        redirect(base_url('admin/CA_Subkat'));
      }
    }
    $id=$this->uri->segment(4);
    $list_data= $this->MA_Subkat->list_edit($id)->result_array();
    $listdatakat= $this->MA_Kategori->list_ketegori()->result_array();
    $data=array(
          'halaman' => 'Subkat/form.php',
          'jenis_form'=> 'edit',
          'data_edit' => $list_data,
          'daftarkat' => $listdatakat

    );
    $load->view('admin/dashbord',$data);
  }
  function edit1(){
    $load=$this->load;
    $i = $this->input;
    $id=$this->uri->segment(4);
    echo "idnya adalah $id";
    echo $i->post('kategori');
    echo $i->post('idkat');


  }
  function delete(){
      $id=$this->uri->segment(4);
      $where = array('id_subketegori' => $id );
        $load=$this->load;
        $this->MA_Subkat->delete($where);
        redirect(base_url('admin/CA_Subkat'));

  }

}
