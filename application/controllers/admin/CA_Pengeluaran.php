<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CA_Pengeluaran extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MF_Cart_model');
    $this->load->model('MA_Pengeluaran');
    $this->load->model('MA_Tentang');
    //Codeigniter : Write Less Do More
  }

  function gaji()
  {
    $load=$this->load;
    $i=$this->input;

    $listgaji=$this->MA_Pengeluaran->listallgaji()->result_array();
    $data = array('halaman' => 'pengeluaran/listgaji.php',
                  'daftar'=>$listgaji);
                    $load->view('admin/dashbord',$data);
  }
  function detailgaji(){
    $bulan=$this->uri->segment(4);
    $tahun=$this->uri->segment(5);
    $load=$this->load;
    $i=$this->input;

    $listgaji=$this->MA_Pengeluaran->listdetailgaji($bulan,$tahun)->result_array();

    $data = array('halaman' => 'pengeluaran/listdetailgaji.php',
                  'daftar'=>$listgaji);
                    $load->view('admin/dashbord',$data);
  }

  function barang()
  {
    $load=$this->load;
    $i=$this->input;
      // $listtransaksi=$this->MF_Cart_model->list_transaksi()->row();
    $listbarang=$this->MA_Pengeluaran->listalbarang()->result_array();
    $data = array('halaman' => 'pengeluaran/listbarang.php',
                  'daftar'=>$listbarang);
                    $load->view('admin/dashbord',$data);
  }
  function detailbarang(){
    $bulan=$this->uri->segment(4);
    $tahun=$this->uri->segment(5);
    $load=$this->load;
    $i=$this->input;

    $listbarang=$this->MA_Pengeluaran->listdetailbarang($bulan,$tahun)->result_array();

    $data = array('halaman' => 'pengeluaran/listdetailbarang.php',
                  'daftar'=>$listbarang);
                    $load->view('admin/dashbord',$data);
  }
  function add_pengeluaran(){
    $load=$this->load;
    $i = $this->input;
    date_default_timezone_set('Asia/Jakarta');
    if (!empty($i->post('aksi'))) {
      $bulan=$i->post('bulan');
    }
    if($i->post('jenisform')=='gaji'){
    $bulan=$i->post('bulan');
    $tanggal=date('Y-'.$bulan.'-01' );
  }
  else{
    $tanggal=$i->post('bulan');
  }

      $kategoriform=$this->uri->segment(4);
      $jenisform=$this->uri->segment(5);
      $listtransaksi=$this->MF_Cart_model->list_transaksi()->result_array();

      foreach ($listtransaksi as $rowtransaksi ) {
        $id=$rowtransaksi['maxid'];

      }
      if ($listtransaksi==0) {
        $maxid=1;
      }
      else {

      $maxid=$id+1;
      }
      if (!empty($i->post('namapengeluaran'))) {
        $dataform=array('id_transaksi'=> $maxid,
                        'tanggal'=> $tanggal,
                        'nama_pengeluaran'    =>$i->post('namapengeluaran'),
                        'jumlah_pengeluaran'    =>$i->post('pengeluaran'),
                        'lvl'    =>$i->post('level'),
                        'status_pembayaran'=>'Lunas',
                        'keterangan'=>$i->post('keterangan')
                        );
        $inserttransaksi=$this->db->insert('transaksi',$dataform);
        redirect(base_url('admin/CA_Pengeluaran/'.$i->post('jenisform')));
      }
          $listdata= $this->MA_Tentang->list_tentang()->result_array();

      $data = array('halaman' => 'pengeluaran/form.php',
                    'jenis_form'=>$jenisform,
                    'list_karyawan'=>$listdata,
                    'kategori_form'=>$kategoriform );
                      $load->view('admin/dashbord',$data);
  }
  function update_pengeluaran(){
    $load=$this->load;
    $i = $this->input;
    $kategoriform=$this->uri->segment(4);
    $jenisform=$this->uri->segment(5);
    $id=$this->uri->segment(6);
    if($i->post('jenisform')=='gaji'){
    $bulan=$i->post('bulan');
    $tanggal=date('Y-'.$bulan.'-01');
  }
  else{
    $tanggal=$i->post('bulan');
  }
    if (!empty($i->post('namapengeluaran'))) {
      $idtransaksi=$i->post('idtrans');

      $where = array('id_transaksi' =>$idtransaksi);
      $dataform=array('tanggal'=> $tanggal,
                      'nama_pengeluaran'    =>$i->post('namapengeluaran'),
                      'jumlah_pengeluaran'    =>$i->post('pengeluaran'),
                      'lvl'    =>$i->post('level'),
                      'keterangan'=>$i->post('keterangan')
                      );
                      $update=$this->MA_Pengeluaran->update_data1($where,$dataform);

                      redirect(base_url('admin/CA_Pengeluaran/'.$i->post('jenisform')));



    }
  $listdata= $this->MA_Tentang->list_tentang()->result_array();
    $listgaji=$this->MA_Pengeluaran->detail_pengeluaran($id)->result_array();
    $data = array('halaman' => 'pengeluaran/form.php',
                  'jenis_form'=>$jenisform,
                  'list_karyawan'=>$listdata,
                  'detailpengeluaran'=>$listgaji,
                  'kategori_form'=>$kategoriform);
                    $load->view('admin/dashbord',$data);
  }
  function delete(){
      $id=$this->uri->segment(4);
      $listgaji=$this->MA_Pengeluaran->detail_pengeluaran($id)->result_array();
      foreach ($listgaji as $row) {
        $id_rekap=$row['id_rekap'];
      }
      if (!empty($id_rekap)) {
        $this->session->set_flashdata('msg',
                '<div class="alert alert-danger">

                    <p>Data tidak bisa dihapus</p><br><p>sudah di rekap</p>
                </div>');
                redirect(base_url('admin/CA_Pengeluaran/barang'));
      }
      else{
      $where = array('id_transaksi' => $id );
        $load=$this->load;
        $this->MA_Pengeluaran->delete($where);
        redirect(base_url('admin/CA_Pengeluaran/barang'));}

  }

}
