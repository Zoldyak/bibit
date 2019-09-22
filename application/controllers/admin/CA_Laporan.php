<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('MA_Laporan');
    //Codeigniter : Write Less Do More
  }

  function index()
  {

    $i = $this->input;
    $load=$this->load;
    $load->model('MA_Edukasi');
    $idkat=1;
    $listdata= $this->MA_Laporan->list_laporan()->result_array();
    // print_r($listdata);

    $data=array(
          'halaman' => 'laporan/list.php',
          'daftar'  => $listdata

    );
    $load->view('admin/dashbord',$data);
  }
  function detaillaporan1(){

    $bulan=$this->uri->segment(5);
    $tahun=$this->uri->segment(6);
    $sisa=$this->uri->segment(7);

    $i = $this->input;
    $load=$this->load;
    $load->model('MA_Edukasi');
    $idkat=1;

    $listdata= $this->MA_Laporan->list_detaillaporan($bulan,$tahun)->result_array();
    // print_r($listdata);
    $data=array(
          'halaman' => 'laporan/detaillist.php',
          'daftar1'  => $listdata,
          'jumlahsisabulanini' => $sisa,
          'bulan' => $bulan,
          'tahun' =>$tahun

    );
    $load->view('admin/dashbord',$data);
  }
  function laporan(){


    $maxid= $this->MA_Laporan->maxid()->result_array();
    foreach ($maxid as $key) {
      if (empty($key['id_rekap'])) {
      $max_id=1;
      }
      else {
        $max_id=$key['id_rekap']+1;
      }
    }
    $bulan=$this->uri->segment(4);
    $tahun=$this->uri->segment(5);
    $pemasukan=$this->uri->segment(6);
    $pengeluaran=$this->uri->segment(7);
    $jumlahbulanlalu=0;
    $sisabulanlalu= $this->MA_Laporan->sisa_bulan_lalu()->result_array();
    // print_r($sisabulanlalu);
    foreach ($sisabulanlalu as $bulanlalu ) {
    $jumlahbulanlalu=$bulanlalu['sisa_bulan'];
    }
    date_default_timezone_set('Asia/Jakarta');
    $tanggal=date('Y-m-d');
    $totalbulanini=$jumlahbulanlalu+$pemasukan-$pengeluaran;
    $dataform = array('id_rekap' => $max_id,
                      'jumlah_pengeluaran' => $pengeluaran,
                      'jumlah_pemasukan' => $pemasukan,
                      'sisa_bulan'=>$totalbulanini,
                      'tanggal_rekap' => $tanggal);
    $insertrekap=$this->db->insert('rekap', $dataform);
    if ($insertrekap) {
      $dataupdate=array(
        'id_rekap'=>$max_id
      );
      $where = "month(tanggal)=".$bulan." AND year(tanggal)=".$tahun;
      $this->db->where($where);
      $updatedata=$this->db->update('transaksi', $dataupdate);
      if ($updatedata) {
        redirect(base_url('admin/CA_Laporan'));
      }
    }

  }
  function exel(){
      $load=$this->load;
        $bulan=$this->uri->segment(4);
        $tahun=$this->uri->segment(5);
        $sisa=$this->uri->segment(6);
        $listdata= $this->MA_Laporan->list_detaillaporan($bulan,$tahun)->result_array();
        $data=array(
              'halaman' => 'laporan/printexel.php',
              'daftar1'  => $listdata,
              'jumlahsisabulanini' => $sisa,
              'bulan' => $bulan,
              'tahun' =>$tahun

        );

          $load->view('admin/laporan/printexel',$data);
  }

}
