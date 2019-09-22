<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Produk extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('MA_Produk');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $load->model('MA_Produk');
    $idkat=1;
    $listdata= $this->MA_Produk->list_produk()->result_array();


    $data=array(
          'halaman' => 'produk/list.php',
          'daftar'  => $listdata
    );
    $load->view('admin/dashbord',$data);
  }

  function tambah(){
      $load=$this->load;
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('nama_produk','Nama Produk','required');
    $valid->set_rules('sendiri','Harga diambil sendiri','required');
    $valid->set_rules('antar','Harga diantar','required');
    $valid->set_rules('keterangan','Keterangan','required');
    if($valid->run() != false){
      if (!empty($i->post('aksi'))) {
        $config['upload_path'] = './assets/frontend/image';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3048';
        $config['remove_space'] = TRUE;
        $load->library('upload',$config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $fileFoto1 = array('upload_data' => $this->upload->data());
            echo $fileFoto1['upload_data']['file_name'];
            $dataform = array(
              'nama_produk' => $i->post('nama_produk'),
              'harga_diambilsendiri' => $i->post('sendiri'),
              'username' =>$this->session->userdata('nama_lengkap'),
              'id_ketegori' => $i->post('kategori'),
              'id_subketegori' => $i->post('subkategori'),
              'harga_diantar' => $i->post('antar'),
              'jumlah' => $i->post('jumlahbibt'),
              'Keterangan' => $i->post('keterangan'),
              'harga_diambilsendiri' => $i->post('sendiri'),
              'foto'=>$fileFoto1['upload_data']['file_name']

            );
              $insert=$this->MA_Produk->input_data($dataform);
              if ($insert) {
                redirect(base_url('admin/CA_Produk'));
              }
              else{
                redirect(base_url('admin/CA_Produk/tambah'));
              }
          }
          else {
            $error=$this->upload->display_errors();
            $this->session->set_flashdata('msg',
              '<div class="alert alert-danger">
                   '.$error.'.</p>
              </div>');

          }




      }
    }
    $listdatakategori= $this->MA_Produk->list_produk_ketegori()->result_array();

      $load=$this->load;
      $data=array(
            'halaman' => 'produk/form.php',
            'jenis_form'=> 'tambah',
            'daftarkategori' => $listdatakategori

      );
      $load->view('admin/dashbord',$data);
  }
  function edit(){
    $load=$this->load;
  $i = $this->input;
  $IDPRO= $i->post('id');
  $valid 		= $this->form_validation;
  $valid->set_rules('nama_produk','Nama Produk','required');
  $valid->set_rules('sendiri','Harga diambil sendiri','required');
  $valid->set_rules('antar','Harga diantar','required');
  $valid->set_rules('keterangan','Keterangan','required');

      if (!empty($i->post('aksi'))) {

            $config['upload_path'] = './assets/frontend/image';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '3048';
            $config['remove_space'] = TRUE;
            $load->library('upload',$config);
            if ($this->upload->do_upload('foto')) {
              $fileFoto1 = array('upload_data' => $this->upload->data());
              $fileFoto1['upload_data']['file_name'];
              $dataform = array(
                'nama_produk' => $i->post('nama_produk'),
                'harga_diambilsendiri' => $i->post('sendiri'),
                'username' =>$this->session->userdata('nama_lengkap'),
                'id_ketegori' => $i->post('kategori'),
                'jumlah' => $i->post('jumlahbibt'),
                'id_subketegori' => $i->post('subkategori'),
                'harga_diantar' => $i->post('antar'),
                'Keterangan' => $i->post('keterangan'),
                'harga_diambilsendiri' => $i->post('sendiri'),
                'foto'=>$fileFoto1['upload_data']['file_name']

              );
              $where = array(
                'id_produk' => $IDPRO
              );
              $this->MA_Produk->update_data($where,$dataform);
              redirect(base_url('admin/CA_Produk'));
            }
            else{
              $dataform = array(
                'nama_produk' => $i->post('nama_produk'),
                'harga_diambilsendiri' => $i->post('sendiri'),
                'username' =>$this->session->userdata('nama_lengkap'),
                'id_ketegori' => $i->post('kategori'),
                'jumlah' => $i->post('jumlahbibt'),
                'id_subketegori' => $i->post('subkategori'),
                'harga_diantar' => $i->post('antar'),
                'Keterangan' => $i->post('keterangan'),
                'harga_diambilsendiri' => $i->post('sendiri')

              );
              $where = array(
                'id_produk' => $IDPRO
              );
              $this->MA_Produk->update_data($where,$dataform);
              redirect(base_url('admin/CA_Produk'));
            }
          // }



      }

    $id=$this->uri->segment(4);
    $list_data= $this->MA_Produk->list_edit($id)->result_array();
    $listdatakategori= $this->MA_Produk->list_produk_ketegori()->result_array();
    $data=array(
          'halaman' => 'produk/form.php',
          'jenis_form'=> 'edit',
          'daftarkategori' => $listdatakategori,
          'data_edit' => $list_data

    );
    $load->view('admin/dashbord',$data);
  }
  function delete(){
      $id=$this->uri->segment(4);
      $where = array('id_produk' => $id );
        $load=$this->load;
        $this->MA_Produk->delete($where);
        redirect(base_url('admin/CA_Produk'));

  }
function ajax_subkategotri(){
    // $id='2';
  $id=$this->input->post('id');
		$data= $this->MA_Produk->list_produk_subketegori($id);
    // print_r($data);
  echo json_encode($data);
  // echo json_encode($hasil);
}


}
