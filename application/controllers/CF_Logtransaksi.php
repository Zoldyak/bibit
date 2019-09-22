<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_Logtransaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MF_Produk');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $username=$this->session->userdata('username');
    $listlogtransaksi=$this->MF_Produk->list_transaksi($username)->result_array();
    $data=array(
          'halaman' => 'logtransaksi.php',
          'listlog' => $listlogtransaksi
    );
    $this->load->view('frontend/dasbord',$data);
  }
  function detail_transaksi(){
    $id=$this->uri->segment(3);
    $listdetailtransaksi=$this->MF_Produk->detaillist_transaksi($id)->result_array();

    $data=array(
          'halaman' => 'detaillogtransaksi.php',
          'detaillistlog' => $listdetailtransaksi
    );
    $this->load->view('frontend/dasbord',$data);
  }
  function transfer(){
      $id=$this->uri->segment(3);
      $listdetailtransaksi=$this->MF_Produk->detaillist_transaksi($id)->result_array();
      $data=array(
            'halaman' => 'transfer.php',
            'id'      => $id,
            'detaillistlog' => $listdetailtransaksi

      );
      $this->load->view('frontend/dasbord',$data);
  }
  function add_transfer(){
    $load=$this->load;
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_pemesanan=date('Y-m-d H:i:s');
    $i = $this->input;
    $valid 		= $this->form_validation;
    $valid->set_rules('jumlahtransfer','Jumlah transfer ','required');
      if($valid->run() != false){
          $jumlah=$i->post('jumlahtransfer');
          $id=$i->post('idtrans');
          // echo "$id";
          $listdetailtransaksi=$this->MF_Produk->transaksi_id($id)->result_array();
          foreach ($listdetailtransaksi as $row) {
            $bayar=$row['tottal_bayar'];
          }
          $username=$this->session->userdata('username');
          $hasil=$bayar - $jumlah;
          if ($hasil <= 0) {
            $config['upload_path'] = './assets/frontend/image';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '3048';
            $config['remove_space'] = TRUE;
            $load->library('upload',$config);
            $this->upload->initialize($config);
              if ($this->upload->do_upload('foto')) {
                $fileFoto1 = array('upload_data' => $this->upload->data());
                $fileFoto = $this->upload->data();
                $where = array(
              		'id_transaksi' => $id
              	);
                $i = $this->input;
                $dataform=array('bukti'             =>$fileFoto1['upload_data']['file_name'],
                                'status_pembayaran' =>'Lunas',
                                'total_transfer'    =>$i->post('jumlahtransfer'),
                                'tanggal'  =>$tanggal_pemesanan,
                                'username'          =>$username,
                                'Status_pengiriman'=> 'Proses',
                                'keterangan'=>'Pembelian Bibit'
                                );

                                  $bismilah=$this->MF_Produk->update_data($where,$dataform);
                                  $dataformlog = array('id_transaksi' => $id,
                                                       'tanggal_log'=>$tanggal_pemesanan,
                                                       'status'=>'Pembayaran');
                                   $this->db->insert('log_transaksi', $dataformlog);

                                redirect(base_url('CF_Logtransaksi'));
              }

          }
          else{
            $this->session->set_flashdata('msg',
                    '<div class="alert alert-danger">
                       Uang yang anda tranfer kurang
                    </div>');

                      redirect(base_url('CF_Logtransaksi/transfer'));
          }
      }


  }
  function bataspemesanan(){
    $id=$this->uri->segment(3);
    $load=$this->load;
    $i = $this->input;
    $dataupdate=array();
        $listdetailpemesanan=$this->MF_Produk->list_barang_pemesanan($id)->result_array();

        foreach ($listdetailpemesanan as $pesan) {

          $jumlahpesan=$pesan['Jumlah_barang'];
          $jumlahproduk=$pesan['jumlah'];
          $totalproduk=$jumlahpesan+$jumlahproduk;
          $idproduk=$pesan['id_produk'];
          $dataupdate[] = array(
        'id_produk' => $idproduk ,
        'jumlah' => $totalproduk

        );
        }
        print_r($dataupdate);
        $updatebarang=$this->db->update_batch('produk', $dataupdate, 'id_produk');
        if ($updatebarang) {
          $where = array('id_transaksi' => $id );
            $deletepemesanan=$this->MF_Produk->deletepemesanan($where);
            $deletetransaksi=$this->MF_Produk->deletetransaksi($where);
            $this->db->delete('log_transaksi', array('id_transaksi' => $id));
            redirect(base_url('CF_Logtransaksi'));
        }
        else {
          redirect(base_url('CF_Logtransaksi'));

        }
  }
  function cektransaksi(){
    $id=$this->uri->segment(3);
    $listdetailtransaksi=$this->MF_Produk->cektransaksi($id)->result_array();
      $listdetailgambartransaksi=$this->MF_Produk->cekgambartransaksi($id)->result_array();
    $data=array(
          'halaman' => 'cekogtransaksi.php',
          'cekdetaillistlog' => $listdetailtransaksi,
          'cekgambar'=>$listdetailgambartransaksi
    );
    $this->load->view('frontend/dasbord',$data);
  }

}
