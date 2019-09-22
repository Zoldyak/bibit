<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MF_Produk extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function list_produk(){
  $query1=$this->db->select('*')
     ->from('produk as t1')
     ->join('kategori as t2', 't1.id_ketegori = t2.id_ketegori')
     ->join('sub_ketegori as t3', 't1.id_subketegori = t3.id_subketegori')
     ->get();
  return $query1;
  }
  function list_produk_pupuler(){
    $query1=$this->db->query('SELECT *,
produk.foto,
produk.harga_diambilsendiri,
produk.harga_diantar,
produk.nama_produk,
produk.id_produk,
Sum(pemasanan.Jumlah_barang) AS jumlahbarang,
pemasanan.tanggal_pemesanan,
MONTH(tanggal_pemesanan) AS bulan,
year(tanggal_pemesanan) AS tahun,
kategori.nama_ketegori
FROM
produk
INNER JOIN pemasanan ON produk.id_produk = pemasanan.id_produk
INNER JOIN sub_ketegori ON produk.id_subketegori = sub_ketegori.id_subketegori
INNER JOIN kategori ON produk.id_ketegori = kategori.id_ketegori
GROUP BY
produk.id_produk
ORDER BY
jumlahbarang desc
limit 5
');
  // $query1=$this->db->select('*')
  //    ->from('produk as t1')
  //    ->join('kategori as t2', 't1.id_ketegori = t2.id_ketegori')
  //    ->join('sub_ketegori as t3', 't1.id_subketegori = t3.id_subketegori')
  //    ->limit('5')
  //    ->get();
  return $query1;
  }
  function list_produk_ketegori($id){
    $query1=$this->db->select('*')
       ->from('produk as t1')
       ->where('t1.id_subketegori',$id)
       ->join('kategori as t2', 't1.id_ketegori = t2.id_ketegori')
       ->join('sub_ketegori as t3', 't1.id_subketegori = t3.id_subketegori')
       ->limit('5')
       ->get();

    return $query1;
  }
  function list_detail($id){
      return $this->db->get_where('produk',array('id_produk'=>$id));
  }
  function list_transaksi($username){
    $query1=$this->db->distinct('t2.tanggal_pemesanan')
      ->select('t2.tanggal_pemesanan,
t1.id_transaksi,
t1.tottal_bayar,
t1.total_transfer,
t1.Status_pengiriman,
t1.bukti,
t1.status_pembayaran')
       ->from('transaksi as t1')
       ->where('t1.username',$username)
       ->join('pemasanan as t2', 't1.id_transaksi = t2.id_transaksi')
       ->get();
       return $query1;
  }

  function detaillist_transaksi($id){
    $query1=$this->db->select('*')
       ->from('transaksi as t1')
       ->where('t1.id_transaksi',$id)
       ->join('pemasanan as t2', 't1.id_transaksi = t2.id_transaksi')
       ->get();
       return $query1;
  }
  function transaksi_id($id){
    return $this->db->get_where('transaksi',array('id_transaksi'=>$id));
  }
  function update_data($where,$dataform){

    $this->db->where($where);
  $this->db->update('transaksi',$dataform);
  }

  function list_search($namabibit){
    $query1=$this->db->select('*')
       ->from('produk as t1')
       ->where('t1.nama_produk',$namabibit)
       ->join('kategori as t2', 't1.id_ketegori = t2.id_ketegori')
       ->join('sub_ketegori as t3', 't1.id_subketegori = t3.id_subketegori')
       ->get();

    return $query1;

  }
  function list_barang_pemesanan($id){
$query1=$this->db->select('*')
   ->from('pemasanan as t1')
   ->where('t1.id_transaksi',$id)
   ->join('produk as t2', 't1.id_produk = t2.id_produk')
   ->get();
    return $query1;
  }
  function deletepemesanan($where){
    $this->db->where($where);
    $this->db->delete('pemasanan');
  }
  function deletetransaksi($where){
    $this->db->where($where);
    $this->db->delete('transaksi');
  }
  function cekgambartransaksi($id){
    $query1=$this->db->select('*')
       ->from('transaksi as t1')
       ->where('t1.id_transaksi',$id)
       ->join('log_transaksi as t2', 't1.id_transaksi = t2.id_transaksi','LEFT')
       ->join('pemasanan as t3', 't1.id_transaksi = t3.id_transaksi')
       ->order_by('id_log','DESC')
       ->limit(1)
       ->get();
       return $query1;
  }

  function cektransaksi($id){
    $query1=$this->db->select('*')
       ->from('transaksi as t1')
       ->where('t1.id_transaksi',$id)
       ->join('log_transaksi as t2', 't1.id_transaksi = t2.id_transaksi','LEFT')
       ->join('pemasanan as t3', 't1.id_transaksi = t3.id_transaksi')
       ->get();
       return $query1;
  }
}
