<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CF_Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MF_Cart_model');
    }

    public function index()
    {
      $load=$this->load;

        if (!$this->cart->contents()) {
            $pesan=$this->data['message'] = '<p>Your cart is empty!</p>';
        } else {
            $pesan=$this->data['message'] = $this->session->flashdata('message');
        }

        $data=array(
              'halaman' => 'cart.php',

              'message'=> '$pesan'
        );
          $load->view('frontend/dasbord',$data);
        // $this->load->view('home/app', $this->data);

    }

    public function add()
    {
      	$cty = $this->input->post('JumlahBibit');
        $data = array(
            'id' => $this->input->post('idproduk'),
            'jumtersedia'=> $this->input->post('Totaltersedia'),
            'name' => $this->input->post('namabibit'),
            'metode' => $this->input->post('metode'),
            'harga_barang'=> $this->input->post('HargaBibit'),
            'price' => $this->input->post('HargaBibit'),
            'alamat_pengiriman'=>$this->input->post('alamat'),
            'qty' => $cty
        );
        $this->cart->insert($data);
        redirect(base_url());
        // redirect('cart');
    }

    function del(){
        $this->cart->destroy();
        redirect(base_url());
    }

    function remove($rowid)
    {
        if ($rowid == "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect(base_url());
    }

    function update_cart()
    {
        foreach ($_POST['cart'] as $id => $cart) {
            $price = $cart['price'];
            $amount = $price * $cart['qty'];

            $this->Cart_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
        }

        redirect('cart');
    }

    function pesansekarang(){
      date_default_timezone_set('Asia/Jakarta');
      $tanggal_pemesanan=date('Y-m-d H:i:s');
      $listtransaksi=$this->MF_Cart_model->list_transaksi()->result_array();
      foreach ($listtransaksi as $rowtransaksi ) {
        $id=$rowtransaksi['maxid'];

      }
      if ($listtransaksi==0) {
        $maxid1=1;
      }
      else {

      $maxid1=$id+1;
      }


      $username=$this->session->userdata('username');
          if (!empty($username)) {
            if (!empty($this->input->post('total'))) {
              # code...

      $datatransaksi = array('id_transaksi' => $maxid1,
                              'tottal_bayar'=>$this->input->post('total'),
                              'username'=> $username,
                              'status_pembayaran' => 'Belum Lunas',
                              'Status_pengiriman' =>'Proses',
                              'Notifikasi' => 'Belum Dibaca'
                            );
      $inserttransaksi=$this->db->insert('transaksi',$datatransaksi);
      $dataformlog = array('id_transaksi' => $maxid1,
                           'tanggal_log'=>$tanggal_pemesanan,
                           'status'=>'Pemesanan');
       $this->db->insert('log_transaksi', $dataformlog);
      if ($inserttransaksi) {
        $idppesan=$this->input->post('rowid');
        	$result = array();
          $dataupdate = array();
          foreach ($idppesan as $key => $value) {
            $result[] = array('id_produk'=>$_POST['produkID'][$key],
                              'id_transaksi' => $maxid1,
                              'nama_barang'=>$_POST['namaproduk'][$key],
                              'Jumlah_barang'=>$_POST['jumlahbarang'][$key],
                              'harga_barang'=>$_POST['hargabarang'][$key],
                              'metode'=>$_POST['metode'][$key],
                              'jumlah_harga'=>$_POST['bayar'][$key],
                            'tanggal_pemesanan'=>$tanggal_pemesanan,
                            'username'=>$username,
                            'alamat_pengiriman'=>$_POST['alamat'][$key]);
            $dataupdate[]=array('id_produk'=>$_POST['produkID'][$key],
                                'jumlah'=>$_POST['tersedia'][$key]);
          }
          $res = $this->db->insert_batch('pemasanan', $result);
          if ($res) {
            $resupdate=$this->db->update_batch('produk', $dataupdate, 'id_produk');
              $this->cart->destroy();
            redirect(base_url());
          }
          else {
          redirect(base_url('CF_Cart'));
          }
      }
}
else{
  redirect(base_url());
}
}
else{
  redirect(base_url('C_Login'));
}

    }
}
