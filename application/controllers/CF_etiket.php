<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_etiket extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('pdf');
    $this->load->model('MF_etiket');
    $this->load->model('MF_Produk');
    //Codeigniter : Write Less Do More
  }

  function pdf()
  {
      $i = $this->input;
        $id=$i->post('idtrans');
    // $id=$this->uri->segment(3);
      $listdetailgambartransaksi=$this->MF_etiket->cektransaksi($id)->result_array();
    $listdetailtransaksi=$this->MF_etiket->list_etiket($id)->result();
    $listdetailtanggalsampai=$this->MF_etiket->cektanggalsampai($id)->result_array();
    $terima="0000-00-00 00:00:00";
    foreach ($listdetailtanggalsampai as $key1 ) {
        $terima=$key1['tanggal_log'];
    }
    $status='-';
    foreach ($listdetailgambartransaksi as $key) {
        $user=$key['username'];
        $pesan=$key['tanggal_pemesanan'];
        $bayar=$key['tanggal'];
  $Alamat=$key['alamat_pengiriman'];

        if ($key['status']=='Barang Telah Dikirim') {
          $status=$key['id_log'];

        }
        $metode=$key['metode'];

    }
    $pdf = new FPDF('P','mm','A4');
       // membuat halaman baru
       $pdf->AddPage();
       // setting jenis font yang akan digunakan
       $pdf->SetFont('Arial','B',16);
       // mencetak string

       $pdf->SetTextColor(0, 143, 23);
       $pdf->Cell(50,7,'Toms Agribis',0,1,'C');

       $pdf->SetTextColor(0,0,0);
       $pdf->SetFont('Arial','B',16);
       $pdf->Cell(120,7,'',0,1);
       $pdf->Cell(190,7,'Bukti Transaksi Pembayaran Toms Agribis',0,1,'C');
       $pdf->SetFont('Arial','B',10);
       $pdf->Cell(120,7,'',0,1);
       $pdf->Cell(30,6,'ID Transaksi:'.$id,0,1,'C');
       if ($metode=='diantar') {
         $pdf->Cell(33,6,'No Pengiriman:'.$status,0,1,'C');
       }

        $pdf->Cell(100,6,'Nama Pembeli:'.$user,0,1,'C');
        if ($metode=='diantar') {


          $pdf->Cell(75,6,'Alamat Pengiriman:'.$Alamat,0,1,'C');

        }

        $pdf->Cell(73,6,'Tanggal Pemesanan:'.$pesan,0,1,'C');
        $pdf->Cell(75,6,'Tanggal Pembayaran:'.$bayar,0,1,'C');
        $pdf->Cell(81,6,'Tanggal Barang Diterima:'.$terima,0,1,'C');

       // $pdf->Cell(150,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
       // Memberikan space kebawah agar tidak terlalu rapat
       $pdf->Cell(120,7,'',0,1);
       $pdf->SetFont('Arial','B',10);
       $pdf->Cell(20,6,'No',1,0);
       $pdf->Cell(40,6,'Nama Barang',1,0);
       $pdf->Cell(27,6,'Jumlah Barang',1,0);
       $pdf->Cell(37,6,'Status Pengiriman',1,0);
       $pdf->Cell(40,6,'Harga Barang',1,0);
       $pdf->Cell(30,6,'Total Harga',1,1);
       $pdf->SetFont('Arial','',10);
       $no=0;
        $jumlah1 = 0;
       // $mahasiswa = $this->db->get('mahasiswa')->result();
       foreach ($listdetailtransaksi as $row){
         $jumlah1 += $row->jumlah_harga;
         $filename='transaksi'.$row->tanggal.'.pdf';
            $no++;
           $pdf->Cell(20,6,$no,1,0);
           $pdf->Cell(40,6,$row->nama_barang,1,0);
           $pdf->Cell(27,6,$row->Jumlah_barang,1,0);
           $pdf->Cell(37,6,$row->Status_pengiriman,1,0);
           $pdf->Cell(40,6,$row->harga_barang,1,0);
           $pdf->Cell(30,6,$row->jumlah_harga,1,1);
       }
       $pdf->Cell(164,6,'Total pembayaran',1,0);
       // $pdf->Cell(85,6,'',1,0);
       // $pdf->Cell(27,6,'',1,0);
       // $pdf->Cell(25,6,'',1,0);
       $pdf->Cell(30,6,$jumlah1,1,1);
      // $pdf->Output('transaksi.pdf','D');
      $pdf->Output('transaksi.pdf','I');
      // redirect(base_url('CF_Logtransaksi'));

  }

}
