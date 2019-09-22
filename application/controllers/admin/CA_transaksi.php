<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $load=$this->load;
    $load->model('MA_transaksi');
    //Codeigniter : Write Less Do More
  }

  function list_transaksi()
  {
    $load=$this->load;
      $id=$this->uri->segment(4);

      if (empty($id)) {
          $listtransaksi=$this->MA_transaksi->listall_transaksi()->result_array();

          $data=array(
              'halaman'   => 'transaksi/list.php',
              'daftar'    => $listtransaksi,

          );
      }
      else{
        $where = array(
          'id_transaksi' => $id
        );
        $i = $this->input;
        $dataform=array('Notifikasi'             =>'Sudah dibaca',

                        );
        $this->MA_transaksi->update_notif($where,$dataform);
        $listtransaksi=$this->MA_transaksi->listid_transaksi($id)->result_array();
        $data=array(
            'halaman'   => 'transaksi/list.php',
            'daftar'    => $listtransaksi,

        );
      }
      $load->view('admin/dashbord',$data);
  }
  function detail_list_transaksi(){
      $load=$this->load;
    $id=$this->uri->segment(4);
    $detaillisttransaksi=$this->MA_transaksi->detail_list($id)->result_array();
    $data=array(
        'halaman'   => 'transaksi/detaillist.php',
        'daftar'    => $detaillisttransaksi);
          $load->view('admin/dashbord',$data);
  }
function form_update(){
    $load=$this->load;
    $id=$this->uri->segment(4);
    $detaillisttransaksi=$this->MA_transaksi->detail_update($id)->result_array();
    $data=array(
        'halaman'   => 'transaksi/form.php',
        'daftar'    => $detaillisttransaksi);
          $load->view('admin/dashbord',$data);
}
function update_pengiriman(){
  date_default_timezone_set('Asia/Jakarta');
  $tanggal=date('Y-m-d H:i:s');
  echo $this->input->post('id');
  echo $this->input->post('proses');

  $where = array('id_transaksi' =>$this->input->post('id'));
  $dataform=array('Status_pengiriman'=>$this->input->post('proses'));
  $updatedata=$this->MA_transaksi->update_data($where,$dataform);
   $dataformlog = array('id_transaksi' => $this->input->post('id'),
                        'tanggal_log'=>$tanggal,
                        'status'=>$this->input->post('proses'));
    $this->db->insert('log_transaksi', $dataformlog);
    redirect(base_url('admin/CA_transaksi/list_transaksi'));

}

  function Pembatalan(){
    $id=$this->uri->segment(4);
      $where = array('id_transaksi' =>$id);
      $dataform=array('Status_pengiriman'=>'Proses',
    'status_pembayaran'=>'Dibatalkan',
    'Notifikasi'=>Null,
  'bukti'=>Null,
  'total_transfer'=>' ');
  $updatepembatalan=$this->MA_transaksi->update_batal($where,$dataform);
      redirect(base_url('admin/CA_transaksi/list_transaksi'));
  }
}
