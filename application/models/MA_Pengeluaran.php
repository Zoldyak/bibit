<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Pengeluaran extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function listallgaji(){
      $query=$this->db->query('SELECT
      MONTH(transaksi.tanggal) AS bulan,
      year (transaksi.tanggal) AS tahun,
      Sum(transaksi.jumlah_pengeluaran) as jumlahpengeluaran
      FROM
      transaksi
      WHERE
      transaksi.lvl = "2"
      GROUP BY tahun,bulan');
    return $query;
  }
  function listalbarang(){
      $query=$this->db->query('SELECT
      MONTH(transaksi.tanggal) AS bulan,
      year (transaksi.tanggal) AS tahun,
      Sum(transaksi.jumlah_pengeluaran) as jumlahpengeluaran
      FROM
      transaksi
      WHERE
      transaksi.lvl = "3"
      GROUP BY tahun,bulan');
    return $query;
  }
  function listdetailbarang($bulan,$tahun){

    $query=$this->db->query("SELECT *,
        MONTH (tanggal) AS bulan,
        year (tanggal) AS tahun
        FROM
        transaksi
        WHERE
        transaksi.lvl = '3' and MONTH(tanggal)='$bulan' and YEAR(tanggal)='$tahun'
        ");
    return $query;
  }
  function listdetailgaji($bulan,$tahun){

    $query=$this->db->query("SELECT *,
        MONTH (tanggal) AS bulan,
        year (tanggal) AS tahun
        FROM
        transaksi
        WHERE
        transaksi.lvl = '2' and MONTH(tanggal)='$bulan' and YEAR(tanggal)='$tahun'
        ");
    return $query;
  }
  function detail_pengeluaran($id){
    return $this->db->get_where('transaksi',array('id_transaksi'=>$id));

  }
  function update_data1($where,$dataform){
    $this->db->where($where);
  $this->db->update('transaksi',$dataform);
  }
  function delete($where){
    $this->db->where($where);
    $this->db->delete('transaksi');
  }
}
