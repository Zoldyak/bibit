<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Tentang extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('MA_Tentang');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $listdata= $this->MA_Tentang->list_tentang()->result_array();

  $data=array(
        'halaman' => 'tentang/list.php',
        'daftar'  => $listdata
  );
  $load->view('admin/dashbord',$data);
  }
  function tambah(){
      $load=$this->load;
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('nama_karyawan','Nama Karyawan','required');
    $valid->set_rules('nama_jabatan','Jabatan','required');
    $valid->set_rules('Alamat','Alamat diantar','required');
    $valid->set_rules('Hp','No Hp','required');
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
              'nama' => $i->post('nama_karyawan'),
              'jabatan' => $i->post('nama_jabatan'),
              'alamat' => $i->post('Alamat'),
              'no_hp' => $i->post('Hp'),
              'foto'=>$fileFoto1['upload_data']['file_name']

            );
              $insert=$this->MA_Tentang->input_data($dataform);
              if ($insert) {
                redirect(base_url('admin/CA_Tentang'));
              }
              else{
                redirect(base_url('admin/CA_Tentang/tambah'));
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

      $load=$this->load;
      $data=array(
            'halaman' => 'tentang/form.php',
            'jenis_form'=> 'tambah'

      );
      $load->view('admin/dashbord',$data);
  }
  function edit(){
    $load=$this->load;
  $i = $this->input;
  $IDTENTANG= $i->post('id');
  $valid 		= $this->form_validation;
  $valid->set_rules('nama_karyawan','Nama Karyawan','required');
  $valid->set_rules('nama_jabatan','Jabatan','required');
  $valid->set_rules('Alamat','Alamat diantar','required');
  $valid->set_rules('Hp','No Hp','required');
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
                'nama' => $i->post('nama_karyawan'),
                'jabatan' => $i->post('nama_jabatan'),
                'alamat' => $i->post('Alamat'),
                'no_hp' => $i->post('Hp'),
                'foto'=>$fileFoto1['upload_data']['file_name']

              );
              $where = array(
                'id_tentang' => $IDTENTANG
              );
              $this->MA_Tentang->update_data($where,$dataform);
              redirect(base_url('admin/CA_Tentang'));
            }
            else{
              $dataform = array(
                'nama' => $i->post('nama_karyawan'),
                'jabatan' => $i->post('nama_jabatan'),
                'alamat' => $i->post('Alamat'),
                'no_hp' => $i->post('Hp'),
              );
              $where = array(
                'id_tentang' => $IDTENTANG
              );
              $this->MA_Tentang->update_data($where,$dataform);
              redirect(base_url('admin/CA_Tentang'));
            }
          // }



      }
    }
    $id=$this->uri->segment(4);
    $list_data= $this->MA_Tentang->list_edit($id)->result_array();
    $data=array(
          'halaman' => 'tentang/form.php',
          'jenis_form'=> 'edit',
          'data_edit' => $list_data

    );
    $load->view('admin/dashbord',$data);
  }
  function delete(){
      $id=$this->uri->segment(4);
      $where = array('id_tentang' => $id );
        $load=$this->load;
        $this->MA_Tentang->delete($where);
        redirect(base_url('admin/CA_Tentang'));

  }

}
