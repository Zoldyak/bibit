<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CP_User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('MP_User');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $load->model('MP_User');
    $idkat=1;
    $listdata= $this->MP_User->list_user()->result_array();


    $data=array(
          'halaman' => 'user/list.php',
          'daftar'  => $listdata
    );
    $load->view('pemilik/dashbord',$data);
  }

  function tambah(){
      $load=$this->load;
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('nama_lengkap','Nama Lengkap','required');
    $valid->set_rules('email','email','required');
    $valid->set_rules('Password','Password','required');
    $valid->set_rules('alamat','alamat','required');
    $valid->set_rules('hp','hp','required');
    $valid->set_rules('alamat','alamat','required');
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
            $dataform = array('nama_lengkap' => $i->post('nama_lengkap'),
                              'username'=> $i->post('email'),
                              'Password'=>md5($i->post('Password')),
                              'alamat'=>$i->post('alamat'),
                              'HP'=>$i->post('hp'),
                              'foto'=>$fileFoto1['upload_data']['file_name'],
                              'level'=> 1,
                               'status'=>'aktif');;
              $insert=$this->MP_User->input_data($dataform);
              if ($insert) {
                redirect(base_url('pemilik/CP_User'));
              }
              else{
                redirect(base_url('pemilik/CP_User/tambah'));
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
    //$listdatakategori= $this->MP_User->list_produk_ketegori()->result_array();

      $load=$this->load;
      $data=array(
            'halaman' => 'user/form.php',
            'jenis_form'=> 'tambah'


      );
      $load->view('pemilik/dashbord',$data);
  }
  function edit(){
    $load=$this->load;
  $i = $this->input;
  $IDPRO= $i->post('id');
  $valid 		= $this->form_validation;
  $valid->set_rules('nama_lengkap','Nama Lengkap','required');
  $valid->set_rules('email','email','required');
  $valid->set_rules('Password','Password','required');
  $valid->set_rules('alamat','alamat','required');
  $valid->set_rules('hp','hp','required');
  $valid->set_rules('alamat','alamat','required');

      if (!empty($i->post('aksi'))) {

            $config['upload_path'] = './assets/frontend/image';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '3048';
            $config['remove_space'] = TRUE;
            $load->library('upload',$config);
            if ($this->upload->do_upload('foto')) {
              $fileFoto1 = array('upload_data' => $this->upload->data());
              $fileFoto1['upload_data']['file_name'];
              $dataform = array('nama_lengkap' => $i->post('nama_lengkap'),
                                'username'=> $i->post('email'),
                                'Password'=>md5($i->post('Password')),
                                'alamat'=>$i->post('alamat'),
                                'HP'=>$i->post('hp'),
                                'foto'=>$fileFoto1['upload_data']['file_name'],
                                'level'=> 1,
                                 'status'=>'aktif');;
              $where = array(
                'username' => $IDPRO
              );
              $this->MP_User->update_data($where,$dataform);
              redirect(base_url('pemilik/CP_User'));
            }
            else{
              $dataform = array('nama_lengkap' => $i->post('nama_lengkap'),
                                'username'=> $i->post('email'),
                                'Password'=>md5($i->post('Password')),
                                'alamat'=>$i->post('alamat'),
                                'HP'=>$i->post('hp'),
                                'level'=> 1,
                                 'status'=>'aktif');;
              $where = array(
                'username' => $IDPRO
              );
              $this->MP_User->update_data($where,$dataform);
              redirect(base_url('pemilik/CP_User'));
            }
          // }



      }

    $id=$this->uri->segment(4);
    $list_data= $this->MP_User->list_edit($id)->result_array();
    //$listdatakategori= $this->MP_User->list_produk_ketegori()->result_array();
    $data=array(
          'halaman' => 'user/form.php',
          'jenis_form'=> 'edit',

          'data_edit' => $list_data

    );
    $load->view('pemilik/dashbord',$data);
  }
  function delete(){
      $id=$this->uri->segment(4);
      $where = array('username' => $id );
        $load=$this->load;
        $this->MP_User->delete($where);
        redirect(base_url('pemilik/CP_User'));

  }
}
