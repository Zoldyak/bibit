<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_slide extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MA_Slide');
    $this->load->model('MA_Produk');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    // $load->model('MA_Slide');
    $idkat=1;

      $listdata= $this->MA_Slide->list_slide()->result_array();

    $data=array(
          'halaman' => 'slide/list.php',

          'daftar'  => $listdata
    );
    $load->view('admin/dashbord',$data);
  }

  function tambah(){
      $load=$this->load;
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('judul','judul','required');
    if($valid->run() != false){
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
            'judul' => $i->post('judul'),
            'id_subketegori' => $i->post('kategori'),
            'status'=>0,
            'foto'=>$fileFoto1['upload_data']['file_name']

          );
        }

        $this->MA_Slide->input_data($dataform);
        redirect(base_url('admin/CA_Slide'));
      }
    }
    $listdatakategori= $this->MA_Slide->list_subproduk_ketegori()->result_array();

      $load=$this->load;
      $data=array(
            'halaman' => 'slide/form.php',
              'daftarkategori' => $listdatakategori,
            'jenis_form'=> 'tambah'

      );
      $load->view('admin/dashbord',$data);
  }
  function edit(){
    $load=$this->load;
    $i = $this->input;
    $IDSLIDE= $i->post('idslide');

    $valid 		= $this->form_validation;
    $valid->set_rules('judul','judul','required');

    if($valid->run() != false){
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
            'judul' => $i->post('judul'),
            'id_subketegori' => $i->post('kategori'),
            'foto'=>$fileFoto1['upload_data']['file_name']
          );
          $where = array(
            'id_slide' => $IDSLIDE
          );
            $this->MA_Slide->update_data($where,$dataform);
            redirect(base_url('admin/CA_Slide'));
        }
        else {
          $dataform = array(
            'judul' => $i->post('judul'),

            'id_subketegori' => $i->post('kategori'),
          );
          $where = array(
            'id_slide' => $IDSLIDE
          );
            $this->MA_Slide->update_data($where,$dataform);
        }



        $this->MA_Slide->update_data($where,$dataform);
        redirect(base_url('admin/CA_Slide'));
      }
    }
    $id=$this->uri->segment(4);
    $list_data= $this->MA_Slide->list_edit($id)->result_array();
  $listdatakategori= $this->MA_Slide->list_subproduk_ketegori()->result_array();
    $data=array(
          'halaman' => 'slide/form.php',
          'jenis_form'=> 'edit',
          'daftarkategori' => $listdatakategori,
          'data_edit' => $list_data

    );
    $load->view('admin/dashbord',$data);
  }
  function delete(){
      $id=$this->uri->segment(4);

        $listdata= $this->MA_Slide->list_slide()->num_rows();
        if ($listdata > 1) {
          $list_data= $this->MA_Slide->list_edit($id)->result_array();
          foreach ($list_data as $row) {
            $status=$row['status'];
          }

          if ($status==1) {
            $where = array('id_slide' => $id );
              $load=$this->load;
              $delete= $this->MA_Slide->delete($where);
              $max= $this->MA_Slide->maxid()->result_array();
              print_r($max);
              foreach ($max as $rowmax) {
                $maxid=$rowmax['id_slide'];
              }
              $where = array('id_slide' => $maxid);
              $updatemax = array('status' => 1 );
                $updatestatus=  $this->MA_Slide->updatests($where,$updatemax);
          }
          else{
              $where = array('id_slide' => $id );
              $load=$this->load;
              $delete=  $this->MA_Slide->delete($where);
          }
        }
        else{
          $this->session->set_flashdata('msg',
                  '<div class="alert alert-danger">
                      <h4>Gagal Hapus</h4>
                        <p>Data kurang dari 1</p>
                  </div>');
        }

        redirect(base_url('admin/CA_Slide'));

  }

}
