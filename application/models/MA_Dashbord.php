<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MA_Dashbord extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function listgrappenjualan($plilihantahun){
    $query1=$this->db->query('SELECT
Sum(pemasanan.Jumlah_barang) AS jumlahbarang,
MONTH(tanggal_pemesanan) AS bulan,
year(tanggal_pemesanan) AS tahun,
kategori.nama_ketegori
FROM
produk
INNER JOIN pemasanan ON produk.id_produk = pemasanan.id_produk
INNER JOIN sub_ketegori ON produk.id_subketegori = sub_ketegori.id_subketegori
INNER JOIN kategori ON produk.id_ketegori = kategori.id_ketegori
WHERE year(`tanggal_pemesanan`)='.$plilihantahun.'
GROUP BY
bulan
ORDER BY
bulan ASC');
  // $query1=$this->db->select('*')
  //    ->from('produk as t1')
  //    ->join('kategori as t2', 't1.id_ketegori = t2.id_ketegori')
  //    ->join('sub_ketegori as t3', 't1.id_subketegori = t3.id_subketegori')
  //    ->limit('5')
  //    ->get();
  return $query1;
  }
  function list_produk_pupuler($plilihantahun)
  {
    $query2=$this->db->query('SELECT *,
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
WHERE year(`tanggal_pemesanan`)='.$plilihantahun.'
GROUP BY
produk.id_produk
ORDER BY
jumlahbarang desc
');
return $query2;
}
}
