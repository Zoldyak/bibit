<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $load=$this->load;
    $load->view('login');
  }
  function auth(){
    $load=$this->load;
    $this->load->model('M_login');
    $valid 		= $this->form_validation;
    $valid->set_rules('username','Username','required|valid_email');
		$valid->set_rules('password','Password','required');

    if($valid->run() != false){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $where= array('username' =>$username ,
                    'password'=>md5($password)
                  );
      $jumlah=$this->M_login->cek_row($where)->num_rows();
      if ($jumlah > 0) {
        $list_user=$this->M_login->cek_list($where)->result_array();
        print_r($list_user);
        foreach ($list_user as $row ) {
        $level=$row['level'];
        $status=$row['status'];

        $this->session->set_userdata('coba','administrator');
        $this->session->set_userdata('username', $row['username']);
        $this->session->set_userdata('Level', $row['level']);
        $this->session->set_userdata('nama_lengkap',  $row['nama_lengkap']);
      }
        if ($level == 1 && $status=='aktif') {
        redirect(base_url('admin/CA_Dahsbord'));

        }
        elseif ($level == 2 && $status=='aktif') {
          redirect(base_url('pemilik/CP_Dahsbord'));
        }
        elseif ($level == 3 && $status=='aktif') {
          redirect(base_url());
        }
      }
      else{
        $this->session->set_flashdata('msg',
                '<div class="alert alert-danger">
                  Login Gagal
                </div>');
        $load->view('login');
      }

		}



  }
  function logout(){
	$this->session->sess_destroy();
	redirect(base_url());
}
}
