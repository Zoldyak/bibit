<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MP_Laporan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_laporan(){
        $query=$this->db->query("SELECT
Sum(transaksi.total_transfer) AS pemasukan_bulan,
Sum(transaksi.jumlah_pengeluaran) AS pengeluaran_bulan,
rekap.id_rekap,
MONTH(  `tanggal` ) AS bulan,
YEAR(  `tanggal` ) AS tahun,
transaksi.id_rekap AS rekap_id,
transaksi.id_transaksi as idtransaksi,
rekap.sisa_bulan AS sisabulan
FROM
transaksi
LEFT JOIN rekap ON transaksi.id_rekap = rekap.id_rekap
WHERE
transaksi.status_pembayaran = 'Lunas'
GROUP BY
transaksi.id_rekap,
bulan,
tahun
order by bulan asc
");
        return $query;
  }
  function list_detaillaporan($bulan,$tahun){
        $query1=$this->db->query("SELECT *,
          MONTH(transaksi.tanggal) AS bulan,
          YEAR(transaksi.tanggal) AS tahun
         FROM
        transaksi
         WHERE
         transaksi.status_pembayaran = 'Lunas'
          and
        MONTH(transaksi.tanggal)='$bulan' AND
        YEAR(transaksi.tanggal)='$tahun'");
        return $query1;
  }
  function sisa_bulan_lalu(){

    $this->db->order_by('id_rekap', 'DESC');
    $query1=$this->db->get('rekap',1);
    return $query1;
  }
  function maxid(){
    $this->db->select_max('id_rekap');
    $query2=$this->db->get('rekap',1);
      return $query2;
  }
}
// SELECT *, jumlah_pengeluaran as pemasukan,
// FROM
// transaksi
// WHERE
// MONTH(transaksi.tanggal)='$bulan' AND
// YEAR(transaksi.tanggal)='$tahun'
